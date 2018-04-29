<?php
global $xoopsConfig;
include_once XOOPS_ROOT_PATH . '/modules/neothemesadmin/language/' . $xoopsConfig['language'] . '/blocks.php';

$dbneme          = "neothemesconfig";
$where           = "  where `nsn` = '1'";  //where數值
$neothemesconfig = moduledb($dbneme, $where);
//切割陣列
$fieldsplit = cuttingfunction($cutting = $neothemesconfig['field'], $sign = ";");

$marquee = $fieldsplit[14] == 0 ? custom() : modulescontent();  // 0自訂1播放模組內容

//播放模組跑馬燈內容
function modulescontent()
{
    //開啟neothemesconfig資料表
    $dbneme          = "neothemesconfig";
    $where           = "  where `nsn` = '1'";  //where數值
    $neothemesconfig = moduledb($dbneme, $where);

    //字串轉陣列
    $moduleArr = phpconversion($conversion = $neothemesconfig['mnsnid'], $type = "unserialize");

    //資料流判斷
    switch ($moduleArr['moduleid']) {
        case "tadnews":

            //字串轉陣列
            $modulesortArr = phpconversion($conversion = $moduleArr['modulesort'], $type = "unserialize");

            //解分類
            $serviceDB .= " &&";
            foreach ($modulesortArr as $key => $val) {
                $serviceDB .= "  `ncsn` = '" . $val . "' ||";
            }

            $serviceDBtrue = substr($serviceDB, 0, -2);

            $dbneme    = "tad_news";
            $where     = "  where `enable` = '1' " . $serviceDBtrue . "  order by  nsn  DESC  Limit " . $moduleArr['countbox'] . "";  //where數值
            $marqueeBD = databasetablewhile($dbneme, $where);

            //變更陣列mane
            foreach ($marqueeBD as $key => $val) {
                $marqueetext[$key]['title']  = $marqueeBD[$key]['news_title'];
                $marqueetext[$key]['url']    = "" . XOOPS_URL . "/modules/tadnews/index.php?nsn=" . $marqueeBD[$key]['nsn'] . "";
                $marqueetext[$key]['time']   = "" . substr($marqueeBD[$key]['start_day'], 0, 10) . "";
                $marqueetext[$key]['target'] = "_self";
            }

            break;

        case "tad_honor":
            $dbneme    = "tad_honor";
            $where     = "   order by  honor_sn  DESC  Limit " . $moduleArr['countbox'] . "";  //where數值
            $marqueeBD = databasetablewhile($dbneme, $where);

            //變更陣列mane
            foreach ($marqueeBD as $key => $val) {
                $marqueetext[$key]['title']  = $marqueeBD[$key]['honor_title'];
                $marqueetext[$key]['url']    = "" . XOOPS_URL . "/modules/tad_honor/index.php?honor_sn=" . $marqueeBD[$key]['honor_sn'] . "";
                $marqueetext[$key]['time']   = "" . substr($marqueeBD[$key]['honor_date'], 0, 10) . "";
                $marqueetext[$key]['target'] = "_self";
            }

            break;

        case "neilshop":
            //字串轉陣列
            $modulesortArr = phpconversion($conversion = $moduleArr['modulesort'], $type = "unserialize");

            //解分類
            $serviceDB .= " &&";
            foreach ($modulesortArr as $key => $val) {
                $serviceDB .= "  `sortid` = '" . $val . "' ||";
            }

            $serviceDBtrue = substr($serviceDB, 0, -2);

            $dbneme    = "neilshopproductcontent";
            $where     = "  where `productstatus` != 'notshelves' and `marqueetitle` != ''  " . $serviceDBtrue . "  order by  productid  DESC  Limit " . $moduleArr['countbox'] . "";  //where數值
            $marqueeBD = databasetablewhile($dbneme, $where);

            //變更陣列mane
            foreach ($marqueeBD as $key => $val) {
                $marqueetext[$key]['title']  = $marqueeBD[$key]['marqueetitle'];
                $marqueetext[$key]['url']    = "" . XOOPS_URL . "/modules/neilshop/shopwcase.php?productid=" . $marqueeBD[$key]['productid'] . "";
                $marqueetext[$key]['time']   = "" . substr($marqueeBD[$key]['setuptime'], 0, 10) . "";
                $marqueetext[$key]['target'] = "_self";
            }

            break;

    }

    return $marqueetext;
}

//自訂跑馬燈內容
function custom()
{
    //開啟跑馬燈資料表
    $dbneme              = "neothemesmarquee";
    $where               = " where `enable` = '1'  order by  nnumber  ASC  Limit 20";
    $neothemesmarqueeArr = databasetablewhile($dbneme, $where);
    foreach ($neothemesmarqueeArr as $key => $val) {
        $marqueetext[$key]['time']  = "" . substr($neothemesmarqueeArr[$key]['post_date'], 0, 10) . "";
        $marqueetext[$key]['title'] = $neothemesmarqueeArr[$key]['content'];
        $marqueetext[$key]['url']   = $neothemesmarqueeArr[$key]['url'];

        //頁面開啟方式
        $target                      = pagemethod($types = $neothemesmarqueeArr[$key]['target']);
        $marqueetext[$key]['target'] = $target['way'];
    }

    return $marqueetext;
}

//預設空值顯示內容
function defaultmarquee()
{
    $marqueetext[$key]['title']  = _MB_NEODWADMIN_TITLE;
    $marqueetext[$key]['url']    = "http://neodw.com/";
    $marqueetext[$key]['time']   = "" . timedate($datevar = "Y-m-d") . "";
    $marqueetext[$key]['target'] = "_blank";

    return $marqueetext;
}

$marquee = empty($marquee) ? defaultmarquee() : $marquee; // get FALSE
count($marquee) == '1' ? $scrollingitems = '0' : $scrollingitems = '1'; // get FALSE

//marquee
$this->assign("marqueetext", $marquee);
$this->assign("scrollingitems", $scrollingitems);
