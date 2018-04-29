<?php
//function.php 是將前後台都會用到的函數放到這裡

//引入TadTools的函式庫
if (!file_exists(XOOPS_ROOT_PATH . "/modules/tadtools/tad_function.php")) {
    redirect_header("http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50", 3, _TAD_NEED_TADTOOLS);
}
include_once XOOPS_ROOT_PATH . "/modules/tadtools/tad_function.php";
include_once "phpinput.php";        //引入input函數
//綠界金流
//include "ecpaycheck.php";

//頁面開啟方式
function pagemethod($types = "")
{
    switch ($types) {
        case "0":
            $pagemethod['text'] = _MS_SHARED31;
            $pagemethod['way']  = "_self";
            break;
        case "1":
            $pagemethod['text'] = _MS_SHARED32;
            $pagemethod['way']  = "_blank";
            break;
    }

    return $pagemethod;
}

//黑名單
function blacklistfunction($suid = "")
{
    //開啟訂購人資料表
    $dbneme            = "neilshoppurchaser";
    $where             = " where `uid` = '" . $suid . "' ";   //where數值-修改
    $blacklistfunction = moduledb($dbneme, $where);

    $blacklist = $blacklistfunction['blacklist'] == 1 ? true : false; // get TRUE
    return $blacklist;
}

//讀取頁面檢查
function readpermission($user_uid = "")
{
    global $xoopsDB, $xoopsUser, $isAdmin;

    //取的UID
    $xoops_uid = $xoopsUser->getVar('uid');
    if ($xoops_uid == $user_uid or $isAdmin == true) {
        $readpermission = true;
    }

    return $readpermission;
}

//取得客戶端ip位置
function get_real_ip()
{
    $ip = false;
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) {
            array_unshift($ips, $ip);
            $ip = false;
        }
        for ($i = 0; $i < count($ips); $i++) {
            if (!eregi("^(10|172.16|192.168).", $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

//陣列轉字串AND字串轉陣列
function phpconversion($conversion = "", $type = "")
{
    if ($type == 'serialize') {     //陣列轉字串
        $conversion = serialize($conversion);
    }
    if ($type == 'unserialize') {    //字串轉陣列
        $conversion = unserialize($conversion);
    }
    return $conversion;
}

function youtubeurl($youtubeurl = "")
{
    //解析youtube網址?v值
    $url    = $youtubeurl;
    $urlarr = parse_url($url);
    parse_str($urlarr['query'], $parr);
    $honoryoutube = $parr[v];
    return $honoryoutube;
}

//PHP斷行去HTML標籤
function phpstrip_tags($notags = '')
{            //php去除段行
    $notags = strip_tags($notags);
    $notags = preg_replace("/\s(?=)/", "", $notags);
    $notags = preg_replace("/\&gt;/", "", $notags);
    $notags = preg_replace('/\s(?=\s)/', '', $notags);
    $notags = preg_replace('/[\n\r\t]/', '', $notags);
    $notags = preg_replace('/&nbsp;/', '', $notags);
    $notags = preg_replace('/&quot;/', '', $notags);
    return $notags;
}

//時間函數
function timedate($datevar = "", $type = "", $calculate = "", $m = "", $d = "", $y = "")
{
    switch ($type) {
        case "1":
            //當前時間計算-時,分,秒,月,日,年 +10
            $timedate = date("" . $datevar . "", mktime(date("H"), date("i"), date("s"), date("m") + $m, date("d") + $d, date("Y") + $y));
            break;
        case "2":
            //自訂時間計算天數
            if ($calculate == "-") {
                //減去天數
                $date = date_create($datevar);
                date_sub($date, date_interval_create_from_date_string("{$d} days"));
                $timedate = date_format($date, 'Y-m-d H:i:s');
            } else {
                //加上天數
                $date = date_create($datevar);
                date_add($date, date_interval_create_from_date_string("{$d} days"));
                $timedate = date_format($date, 'Y-m-d H:i:s');
            }
            break;

        default:
            //原生時間-Y-m-d H:i:s
            $timedate = date("" . $datevar . "");
    }

    return $timedate;
}

//切割字串
function cuttingfunction($cutting = "", $sign = "")
{
    $cuttingfunction = preg_split("/{$sign}/", $cutting);
    return $cuttingfunction;
}

//擷取網址
function httphosturl($keywordid = "")
{
    //取得網址後方變數
    $query = $_SERVER[QUERY_STRING];
    if (!empty($query)) {
        $httphosturl['querytrue'] = '&';
    } else {
        $httphosturl['querytrue'] = '?';
    }

    //取得當前頁面完整網址
    $httphost               = $_SERVER['HTTP_HOST'];
    $httphosturl['phpself'] = $_SERVER['PHP_SELF'];
    $httphosturl['user']    = $_SERVER['HTTP_USER_AGENT'];

    if (empty($keywordid) and !empty($query)) {
        $httpstring = '?' . $_SERVER[QUERY_STRING];
    } else {
        $httphosturl['querytrue'] = '?';
    }
    $http                = 'http://';
    $httphosturl['url']  = $http . $httphost . $httphosturl['phpself'] . $httpstring;
    $httphosturl['page'] = $httpstring;
    return $httphosturl;
}

//查詢資料表while全部數值
function databasetablewhile($dbneme = "", $where = "")
{
    global $xoopsDB;
    $sql    = "select * from " . $xoopsDB->prefix($dbneme) . "  " . $where . "";
    $result = $xoopsDB->query($sql);
    $i      = 1;
    while ($keyword = $xoopsDB->fetchArray($result)) {
        $keywordArr[$i] = $keyword;
        $i++;
    };
    return $keywordArr;
}

//查詢資料表while全部數值有bar值
function databasetablewhilebar($dbneme = "", $where = "", $onepage = "", $allpage = "")
{
    global $xoopsDB;
    $sql    = "select * from " . $xoopsDB->prefix($dbneme) . "  " . $where . "";
    $result = $xoopsDB->query($sql);

    $total  = $xoopsDB->getRowsNum($result);
    $navbar = new PageBar($total, $onepage, $allpage);
    $mybar  = $navbar->makeBar();
    $bar    = sprintf($mybar['total'], $mybar['current']) . "{$mybar['left']}{$mybar['center']}{$mybar['right']}";
    $sql    .= $mybar['sql'];
    //分頁工具列為 $bar
    $result = $xoopsDB->query($sql) or die($sql);

    $i = 1;
    while ($keyword = $xoopsDB->fetchArray($result)) {
        $keywordArr[$i] = $keyword;
        $i++;
    };

    return array($keywordArr, $bar);
}

//查詢資料表單一筆數值
function moduledb($dbneme = "", $where = "")
{
    global $xoopsDB;

    $sql = "select * from " . $xoopsDB->prefix($dbneme) . " " . $where . "";
    $result = $xoopsDB->query($sql) or die($sql);
    $kdescription = $xoopsDB->fetchArray($result);

    return $kdescription;
}

//更新資料單一筆
function update($dbname = "", $set = "")
{
    //$set="set name='var' , name2='var2' where field='$field'";
    global $xoopsDB;
    $sql = "update " . $xoopsDB->prefix($dbname) . " " . $set . "";
    $xoopsDB->queryF($sql) or web_error($sql);
    return true;
}

//新增一筆資料
function insert($dbname = "", $values = "")
{
    global $xoopsDB;
    //$values="(name1,name2,name3) values('{$var1}','{$var2}','{$var3}')";
    $sql = "insert into " . $xoopsDB->prefix($dbname) . " " . $values . "";
    $xoopsDB->query($sql) or web_error($sql);
    return true;
}

//狀態顯示
function enable($envar = "")
{
    switch ($envar) {
        case "0":
            $enable = _MS_SHARED04;
            break;
        case "1":
            $enable = _MS_SHARED03;
            break;
        default:
            $enable = _MS_SHARED03;
    }
    return $enable;
}

//刪除資料
function deletefunction($where = "", $DBname = "")
{
    global $xoopsDB;
    $sql = "delete from " . $xoopsDB->prefix($DBname) . " " . $where . "";
    $xoopsDB->queryF($sql);
}

//抓取TAD模組中的FB-ID
function tad_loginappid()
{
    $modhandler        = xoops_getHandler('module');
    $config_handler    = xoops_getHandler('config');
    $xoopsModule       = &$modhandler->getByDirname("tad_login");
    $modConfig         = &$config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));
    $xoopsModuleConfig = &$config_handler->getConfigsByCat(0, $mid);
    return $modConfig['appId'];
}

//瀏覽裝置判斷
function check_mobile()
{
    $regex_match = "/(nokia|ipod|blackberry|mobile|ipad|windows phone|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
    $regex_match .= "htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
    $regex_match .= "blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
    $regex_match .= "symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
    $regex_match .= "jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
    $regex_match .= ")/i";
    return preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
    //return preg_match($regex_match, android);
}
