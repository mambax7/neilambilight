<?php

//order函數
/**
 * @param $radiogstyle
 * @param $imgstyle
 * @return string
 */
function orderfunction($radiogstyle, $imgstyle)
{
    if ($radiogstyle == img) { //判斷按鈕是圖片還是文字
        switch ($imgstyle) {
            case "random":
                $order = "order by RAND()";
                break;
            case "sorting":
                $order = "order by  orderid ASC";
                break;
        }
    } else {
        $order = "order by  orderid ASC";
    }
    return $order;
}

//target函數
/**
 * @param $target
 * @return string
 */
function target($target)
{
    switch ($target) {
        case "0":
            $target = '_self';
            break;
        case "1":
            $target = '_blank';
            break;
    }
    return $target;
}

//按鈕函數
//list($in,$intwo) = menufunction($sortyn,$modulesid,$variableid,$variableidarray,$modulesidarray,$moduleid);
/**
 * @param string $a
 * @param string $b
 * @param string $c
 * @param string $d
 * @param string $e
 * @param string $f
 * @return array
 */
function menufunction($a = '', $b = '', $c = '', $d = '', $e = '', $f = '')
{
    switch ($b) {
        case "tinyd0":
            list($in, $intwo) = menutinyd0($c, $d, $a);
            $c = $in;
            $d = $intwo;
            break;

        case "tinyd1":
            list($in, $intwo) = menutinyd1($c, $d, $a);
            $c = $in;
            $d = $intwo;
            break;

        case "tinyd2":
            list($in, $intwo) = menutinyd2($c, $d, $a);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_lunch2":
            list($in, $intwo) = tad_lunch2function($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "fileup":
            list($in, $intwo) = fileupfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_web":
            list($in, $intwo) = tad_webfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_uploader":
            list($in, $intwo) = tad_uploaderfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_link":
            list($in, $intwo) = tad_linkfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tadgallery":
            list($in, $intwo) = tadgalleryfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_evaluation":
            list($in, $intwo) = tad_evaluationfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tadnews":
            list($in, $intwo) = tadnewsfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "neilvideosvote":
            list($in, $intwo) = neilvideosvotefunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_faq":
            list($in, $intwo) = tad_faqfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_form":
            list($in, $intwo) = tad_formfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_honor":
            list($in, $intwo) = tad_honorfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_idioms":
            list($in, $intwo) = tad_idiomsfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_rss":
            list($in, $intwo) = tad_rssfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_tv":
            list($in, $intwo) = tad_tvfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_timeline":
            list($in, $intwo) = tad_timelinefunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_sitemap":
            list($in, $intwo) = tad_sitemapfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_cal":
            list($in, $intwo) = tad_calfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_player":
            list($in, $intwo) = tad_playerfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_repair":
            list($in, $intwo) = tad_repairfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_book3":
            list($in, $intwo) = tad_book3function($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_meeting":
            list($in, $intwo) = tad_meetingfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_discuss":
            list($in, $intwo) = tad_discussfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "tad_assignment":
            list($in, $intwo) = tad_assignmentfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "neilhonorlist":
            list($in, $intwo) = neilhonorlistfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        case "neilcounselingrecord":
            list($in, $intwo) = neilcounselingrecordfunction($c, $d, $a, $b, $f, $e);
            $c = $in;
            $d = $intwo;
            break;

        default:
            $c = false;
            $d = false;

    }

    return array($c, $d);
}

//學生輔導
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function neilcounselingrecordfunction($c, $d, $a, $b, $f, $e)
{
    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tinyd0模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @return array
 */
function menutinyd0($c, $d, $a)
{
    switch ($a) {

        case "n":    //單頁

            $id = (empty($_REQUEST['id'])) ? "" : $_REQUEST['id'];
            if (!empty($id)) {
                $invariable = 'id=' . $id;
            }
            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tinyd1模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @return array
 */
function menutinyd1($c, $d, $a)
{
    switch ($a) {

        case "n":    //單頁

            $id = (empty($_REQUEST['id'])) ? "" : $_REQUEST['id'];
            if (!empty($id)) {
                $invariable = 'id=' . $id;
            }
            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            break;
    }
    return array($in, $intwo);
}

//tinyd2模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @return array
 */
function menutinyd2($c, $d, $a)
{
    switch ($a) {

        case "n":    //單頁

            $id = (empty($_REQUEST['id'])) ? "" : $_REQUEST['id'];
            if (!empty($id)) {
                $invariable = 'id=' . $id;
            }
            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            break;
    }
    return array($in, $intwo);
}

//tad_lunch2模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_lunch2function($c, $d, $a, $b, $f, $e)
{

    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁

            break;
        case "y":   //分類

            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//fileup模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function fileupfunction($c, $d, $a, $b, $f, $e)
{

    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_web模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_webfunction($c, $d, $a, $b, $f, $e)
{

    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_uploader模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_uploaderfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;

    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁

            break;
        case "y":   //分類

            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            $sql    = "select cat_sn,of_cat_sn from " . $xoopsDB->prefix('tad_uploader') . " where $c";
            $result = $xoopsDB->query($sql);
            while (list($cat_sn, $of_cat_sn) = $xoopsDB->fetchRow($result)) {
                $cat_snid[$cat_sn] = 'of_cat_sn=' . $cat_sn;
            }

            if (!empty($cat_snid)) {
                array_unshift($cat_snid, (string)$c);
                if (in_array((string)$invariable, $cat_snid)) {  //單值-> 陣列
                    $in    = true;
                    $intwo = true;
                }
            } else {
                if (in_array((string)$invariable, $d)) {
                    $in = true;
                }
                if ($c == $invariable) {
                    $intwo = true;
                }
            }

            break;
        case "z":   //模組全部
            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_link模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_linkfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁
            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            $sql    = "select link_sn from " . $xoopsDB->prefix('tad_link') . " where $c";
            $result = $xoopsDB->query($sql);
            while (list($link_sn) = $xoopsDB->fetchRow($result)) {
                $cat_snid[$link_sn] = 'link_sn=' . $link_sn;
            }
            array_unshift($cat_snid, (string)$c); //吧$C加到陣列開頭

            if (in_array((string)$invariable, $cat_snid)) {  //單值-> 陣列
                $in    = true;
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tadgallery模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tadgalleryfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;

    switch ($a) {

        case "n":    //單頁
            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            $sql    = "select sn,csn from " . $xoopsDB->prefix('tad_gallery') . " where $c";
            $result = $xoopsDB->query($sql);
            while (list($sn, $csn) = $xoopsDB->fetchRow($result)) {
                $cat_snid[$sn] = 'sn=' . $sn;
            }
            array_unshift($cat_snid, (string)$c); //吧$C加到陣列開頭

            if (in_array((string)$invariable, $cat_snid)) {  //單值-> 陣列
                $in    = true;
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_evaluation模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_evaluationfunction($c, $d, $a, $b, $f, $e)
{

    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁
            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tadnews模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tadnewsfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁
            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            $tag_sn = (empty($_REQUEST['tag_sn'])) ? "" : $_REQUEST['tag_sn'];
            if (!empty($tag_sn)) {
                $invariable = 'prefix_tag=' . $tag_sn;
            } else {
                $invariable = $_SERVER[QUERY_STRING]; //取得網址變數
            }

            $c = str_replace('tag_sn', 'prefix_tag', $c);

            $sql    = "select nsn from " . $xoopsDB->prefix('tad_news') . " where $c";
            $result = $xoopsDB->query($sql);
            while (list($nsn) = $xoopsDB->fetchRow($result)) {
                $cat_snid[$nsn] = 'nsn=' . $nsn;
            }
            array_unshift($cat_snid, (string)$c); //吧$C加到陣列開頭
            /*var_dump($cat_snid);exit;*/

            if (in_array((string)$invariable, $cat_snid)) {  //單值-> 陣列
                $in    = true;
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//neilvideosvote模組

/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function neilvideosvotefunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;

    switch ($a) {

        case "n":    //單頁
            $item_id = (empty($_REQUEST['item_id'])) ? "" : $_REQUEST['item_id'];  //分類id
            if (!empty($item_id)) {
                $invariable = 'item_id=' . $item_id;
            }
            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            $cat_id  = (empty($_REQUEST['cat_id'])) ? "" : $_REQUEST['cat_id'];  //分類id
            $item_id = (empty($_REQUEST['item_id'])) ? "" : $_REQUEST['item_id'];  //分類id

            if (!empty($cat_id)) {
                $invariable = 'cat_id=' . $cat_id;
            }

            if (!empty($item_id)) {
                $invariable = 'item_id=' . $item_id;
            }

            //$invariable=$_SERVER[QUERY_STRING]; //取得網址變數

            $sql    = "select item_id,cat_id from " . $xoopsDB->prefix('neilvideosvote_item') . " where $c";
            $result = $xoopsDB->query($sql);
            while (list($item_id, $cat_id) = $xoopsDB->fetchRow($result)) {
                $cat_snid[$item_id] = 'item_id=' . $item_id;
            }
            array_unshift($cat_snid, (string)$c); //吧$C加到陣列開頭

            if (in_array((string)$invariable, $cat_snid)) {  //單值-> 陣列
                $in    = true;
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_faq模組

/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_faqfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;

    switch ($a) {

        case "n":    //單頁
            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_form模組

/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_formfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;

    switch ($a) {

        case "n":    //單頁
            $ofsn = (empty($_REQUEST['ofsn'])) ? "" : $_REQUEST['ofsn'];  //分類id

            if (!empty($ofsn)) {
                $invariable = 'ofsn=' . $ofsn;
            }

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_honor模組

/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_honorfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;

    switch ($a) {

        case "n":    //單頁
            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_idioms模組

/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_idiomsfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;

    switch ($a) {

        case "n":    //單頁

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_rss模組

/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_rssfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;

    switch ($a) {

        case "n":    //單頁

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_tv模組

/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_tvfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;

    switch ($a) {

        case "n":    //單頁

            break;
        case "y":   //分類

            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_timeline模組

/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_timelinefunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;

    switch ($a) {

        case "n":    //單頁

            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_sitemap模組

/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_sitemapfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;

    switch ($a) {

        case "n":    //單頁

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_cal模組

/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_calfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;

    switch ($a) {

        case "n":    //單頁

            break;
        case "y":   //分類

            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_player模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_playerfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁
            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            $sql    = "select psn from " . $xoopsDB->prefix('tad_player') . " where $c";
            $result = $xoopsDB->query($sql);
            while (list($psn) = $xoopsDB->fetchRow($result)) {
                $cat_snid[$psn] = 'psn=' . $psn;
            }
            array_unshift($cat_snid, (string)$c); //吧$C加到陣列開頭

            if (in_array((string)$invariable, $cat_snid)) {  //單值-> 陣列
                $in    = true;
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_repair模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_repairfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁
            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類
            $unit_menu_id = (empty($_REQUEST['unit_menu_id'])) ? "" : $_REQUEST['unit_menu_id'];  //分類id
            $repair_sn    = (empty($_REQUEST['repair_sn'])) ? "" : $_REQUEST['repair_sn'];  //單頁id
            if (!empty($unit_menu_id)) {
                $invariable = 'unit_menu_id=' . $unit_menu_id;
            }

            if (!empty($repair_sn)) {
                $invariable = 'repair_sn=' . $repair_sn;
            }

            $c1 = str_replace('unit_menu_id', 'unit_sn', $c);

            $sql    = "select repair_sn from " . $xoopsDB->prefix('tad_repair') . " where $c1";
            $result = $xoopsDB->query($sql);
            while (list($repair_sn) = $xoopsDB->fetchRow($result)) {
                $cat_snid[$repair_sn] = 'repair_sn=' . $repair_sn;
            }

            array_unshift($cat_snid, (string)$c); //吧$C加到陣列開頭

            if (in_array((string)$invariable, $cat_snid)) {  //單值-> 陣列
                $in    = true;
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_book3模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_book3function($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁
            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            $tbsn  = (empty($_REQUEST['tbsn'])) ? "" : $_REQUEST['tbsn'];  //分類id
            $tbdsn = (empty($_REQUEST['tbdsn'])) ? "" : $_REQUEST['tbdsn'];  //單頁id
            if (!empty($tbsn)) {
                $invariable = 'tbsn=' . $tbsn;
            }

            if (!empty($tbdsn)) {
                $invariable = 'tbdsn=' . $tbdsn;
            }

            $sql    = "select tbdsn from " . $xoopsDB->prefix('tad_book3_docs') . " where $c";
            $result = $xoopsDB->query($sql);
            while (list($tbdsn) = $xoopsDB->fetchRow($result)) {
                $cat_snid[$tbdsn] = 'tbdsn=' . $tbdsn;
            }
            array_unshift($cat_snid, (string)$c); //吧$C加到陣列開頭

            if (in_array((string)$invariable, $cat_snid)) {  //單值-> 陣列
                $in    = true;
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_meeting模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_meetingfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁
            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_discuss模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_discussfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁
            $DiscussID = (empty($_REQUEST['DiscussID'])) ? "" : $_REQUEST['DiscussID'];  //單頁id

            if (!empty($DiscussID)) {
                $invariable = 'DiscussID=' . $DiscussID;
            }

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            $BoardID   = (empty($_REQUEST['BoardID'])) ? "" : $_REQUEST['BoardID'];  //分類id
            $DiscussID = (empty($_REQUEST['DiscussID'])) ? "" : $_REQUEST['DiscussID'];  //單頁id
            if (!empty($BoardID)) {
                $invariable = 'BoardID=' . $BoardID;
            }

            if (!empty($DiscussID)) {
                $invariable = 'DiscussID=' . $DiscussID;
            }

            $sql    = "select DiscussID from " . $xoopsDB->prefix('tad_discuss') . " where $c";
            $result = $xoopsDB->query($sql);
            while (list($DiscussID) = $xoopsDB->fetchRow($result)) {
                $cat_snid[$DiscussID] = 'DiscussID=' . $DiscussID;
            }
            array_unshift($cat_snid, (string)$c); //吧$C加到陣列開頭

            if (in_array((string)$invariable, $cat_snid)) {  //單值-> 陣列
                $in    = true;
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//tad_assignment模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function tad_assignmentfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁

            break;
        case "y":   //分類
            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}

//neilhonorlist模組
/**
 * @param $c
 * @param $d
 * @param $a
 * @param $b
 * @param $f
 * @param $e
 * @return array
 */
function neilhonorlistfunction($c, $d, $a, $b, $f, $e)
{
    global $xoopsDB;
    //var_dump($e);exit;
    switch ($a) {

        case "n":    //單頁
            $invariable = $_SERVER[QUERY_STRING]; //取得網址變數

            if (in_array((string)$invariable, $d)) {
                $in = true;
            }
            if ($c == $invariable) {
                $intwo = true;
            }

            break;
        case "y":   //分類

            $honor_id = (empty($_REQUEST['honor_id'])) ? "" : $_REQUEST['honor_id'];  //分類id
            $hc_id    = (empty($_REQUEST['hc_id'])) ? "" : $_REQUEST['hc_id'];  //單頁id
            if (!empty($honor_id)) {
                $invariable = 'honor_id=' . $honor_id;
            }

            if (!empty($hc_id)) {
                $invariable = 'hc_id=' . $hc_id;
            }

            $sql    = "select hc_id from " . $xoopsDB->prefix('neilhonorcontent') . " where $c";
            $result = $xoopsDB->query($sql);
            while (list($hc_id) = $xoopsDB->fetchRow($result)) {
                $cat_snid[$hc_id] = 'hc_id=' . $hc_id;
            }
            array_unshift($cat_snid, (string)$c); //吧$C加到陣列開頭

            if (in_array((string)$invariable, $cat_snid)) {  //單值-> 陣列
                $in    = true;
                $intwo = true;
            }

            break;
        case "z":   //模組全部

            if (in_array((string)$f, $e)) {
                $in = true;
            }
            if ($b == $f) {
                $intwo = true;
            }

            break;
    }
    return array($in, $intwo);
}
