<?php

//分頁物件
class PageBar
{
    // 目前所在頁碼
    public $current;
    // 所有的資料數量 (rows)
    public $total;
    // 每頁顯示幾筆資料
    public $limit;
    // 目前在第幾層的頁數選項？
    public $pCurrent;
    // 總共分成幾頁？
    public $pTotal;
    // 每一層最多有幾個頁數選項可供選擇，如：3 = {[1][2][3]}
    public $pLimit;
    public $prev;
    public $next;
    public $prev_layer = ' ';
    public $next_layer = ' ';
    public $first;
    public $last;
    public $bottons = array();
    // 要使用的 URL 頁數參數名？
    public $url_page = "g2p";
    // 要使用的 URL 讀取時間參數名？
    public $url_loadtime = "loadtime";
    // 會使用到的 URL 變數名，給 process_query() 過濾用的。
    public $used_query = array();
    // 目前頁數顏色
    public $act_color = "#990000";
    public $query_str; // 存放 URL 參數列

    public function __construct($total, $limit, $page_limit)
    {
        $mydirname = basename(dirname(__FILE__)) ;
        /*	$this->prev = "<img src='".XOOPS_URL."/modules/{$mydirname}/images/1leftarrow.gif' alt='"._BP_BACK_PAGE."' align='absmiddle' hspace=3>"._BP_BACK_PAGE;
            $this->next = "<img src='".XOOPS_URL."/modules/{$mydirname}/images/1rightarrow.gif' alt='"._BP_NEXT_PAGE."' align='absmiddle' hspace=3>"._BP_NEXT_PAGE;
            $this->first = "<img src='".XOOPS_URL."/modules/{$mydirname}/images/2leftarrow.gif' alt='"._BP_FIRST_PAGE."' align='absmiddle' hspace=3>"._BP_FIRST_PAGE;
            $this->last = "<img src='".XOOPS_URL."/modules/{$mydirname}/images/2rightarrow.gif' alt='"._BP_LAST_PAGE."' align='absmiddle' hspace=3>"._BP_LAST_PAGE;  */

        $this->prev = _BP_BACK_PAGE;
        $this->next = _BP_NEXT_PAGE;
        $this->first = "<img src='".XOOPS_URL."/modules/{$mydirname}/images/2leftarrow.gif' alt='"._BP_FIRST_PAGE."' align='absmiddle' hspace=3>"._BP_FIRST_PAGE;
        $this->last = "<img src='".XOOPS_URL."/modules/{$mydirname}/images/2rightarrow.gif' alt='"._BP_LAST_PAGE."' align='absmiddle' hspace=3>"._BP_LAST_PAGE;


        $this->limit = $limit;
        $this->total = $total;
        $this->pLimit = $page_limit;
    }

    public function init()
    {
        $this->used_query = array($this->url_page, $this->url_loadtime);
        $this->query_str = $this->processQuery($this->used_query);
        $this->glue = ($this->query_str == "")?'?':
        '&';
        $this->current = (isset($_GET["$this->url_page"]))? $_GET["$this->url_page"]:
        1;
        $this->pTotal = ceil($this->total / $this->limit);
        $this->pCurrent = ceil($this->current / $this->pLimit);
    }

    //初始設定
    public function set($active_color = "none", $buttons = "none")
    {
        if ($active_color != "none") {
            $this->act_color = $active_color;
        }

        if ($buttons != "none") {
            $this->buttons = $buttons;
            $this->prev = $this->buttons['prev'];
            $this->next = $this->buttons['next'];
            $this->prev_layer = $this->buttons['prev_layer'];
            $this->next_layer = $this->buttons['next_layer'];
            $this->first = $this->buttons['first'];
            $this->last = $this->buttons['last'];
        }
    }

    // 處理 URL 的參數，過濾會使用到的變數名稱
    public function processQuery($used_query)
    {
        // 將 URL 字串分離成二維陣列
        $vars = explode("&", $_SERVER['QUERY_STRING']);
        for ($i = 0; $i < count($vars); $i++) {
            $var[$i] = explode("=", $vars[$i]);
        }

        // 過濾要使用的 URL 變數名稱
        for ($i = 0; $i < count($var); $i++) {
            for ($j = 0; $j < count($used_query); $j++) {
                if (isset($var[$i][0]) && $var[$i][0] == $used_query[$j]) {
                    $var[$i] = array();
                }
            }
        }

        // 合併變數名與變數值
        for ($i = 0; $i < count($var); $i++) {
            $vars[$i] = implode("=", $var[$i]);
        }

        // 合併為一完整的 URL 字串
        $processed_query = "";
        for ($i = 0; $i < count($vars); $i++) {
            $glue = ($processed_query == "")?'?':
            '&';
            // 開頭第一個是 '?' 其餘的才是 '&'
            if ($vars[$i] != "") {
                $processed_query .= $glue.$vars[$i];
            }
        }
        return $processed_query;
    }

    // 製作 sql 的 query 字串 (LIMIT)
    public function sqlQuery()
    {
        $row_start = ($this->current * $this->limit) - $this->limit;
        $sql_query = " LIMIT {$row_start}, {$this->limit}";
        return $sql_query;
    }


    // 製作 bar
    public function makeBar($url_page = "none")
    {
        if ($url_page != "none") {
            $this->url_page = $url_page;
        }
        $this->init();

        // 取得目前時間
        $loadtime = '&loadtime='.time();

        // 取得目前頁框(層)的第一個頁數啟始值，如 6 7 8 9 10 = 6
        $i = ($this->pCurrent * $this->pLimit) - ($this->pLimit - 1);

        $bar_center = "";
        while ($i <= $this->pTotal && $i <= ($this->pCurrent * $this->pLimit)) {
            if ($i == $this->current) {
                //	$bar_center = "{$bar_center}<font color='{$this->act_color}'>{$i}</font>";
                $bar_center = "{$bar_center}<li class='active'><a  href='#NO'>{$i}</a></li>";
            } else {
                $bar_center .= "<li> <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}'' title='{$i}'>{$i}</a></li> ";
            }
            $i++;
        }
        $bar_center = $bar_center . "";

        // 往前跳一頁
        if ($this->current <= 1) {
            $bar_left = " <li><a href='#no'>{$this->prev}</a> </li>";
            $bar_first = " {$this->first} ";
        } else {
            $i = $this->current-1;
            $bar_left = "<li> <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}' title='"._BP_BACK_PAGE."'>{$this->prev}</a></li> ";
            $bar_first = " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}=1{$loadtime}' title='"._BP_FIRST_PAGE."'>{$this->first}</a> ";
        }

        // 往後跳一頁
        if ($this->current >= $this->pTotal) {
            $bar_right = " <li><a href='#no'>{$this->next}</a></li> ";
            $bar_last = " {$this->last} ";
        } else {
            $i = $this->current + 1;
            $bar_right = " <li><a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}' title='"._BP_NEXT_PAGE."'>{$this->next}</a></li> ";
            $bar_last = " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$this->pTotal}{$loadtime}' title='"._BP_LAST_PAGE."'>{$this->last}</a> ";
        }

        // 往前跳一整個頁框(層)
        if (($this->current - $this->pLimit) < 1) {
            $bar_l = " {$this->prev_layer} ";
        } else {
            $i = $this->current - $this->pLimit;
            $bar_l = " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}' title='".sprintf($this->pLimit, _BP_GO_BACK_PAGE)."'>{$this->prev_layer}</a> ";
        }

        //往後跳一整個頁框(層)
        if (($this->current + $this->pLimit) > $this->pTotal) {
            $bar_r = " {$this->next_layer} ";
        } else {
            $i = $this->current + $this->pLimit;
            $bar_r = " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}' title='".sprintf($this->pLimit, _BP_GO_NEXT_PAGE)."'>{$this->next_layer}</a> ";
        }

        $page_bar['center'] = $bar_center;
        //	$page_bar['left'] = $bar_first . $bar_l . $bar_left;
        //	$page_bar['right'] = $bar_right . $bar_r . $bar_last;
        $page_bar['left'] =   $bar_left;
        $page_bar['right'] = $bar_right ;
    
        //	$page_bar['current'] = $this->current;
        //	$page_bar['total'] = $this->pTotal;
        $page_bar['sql'] = $this->sqlQuery();
        return $page_bar;
    }
}
