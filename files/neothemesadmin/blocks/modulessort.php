<?php
global  $xoopsConfig,$xoopsModule;
include_once XOOPS_ROOT_PATH.'/modules/neothemesadmin/language/'.$xoopsConfig['language'].'/blocks.php';
//圖檔位置
$xooprurl=XOOPS_URL;
$img_date = date("H:i:s");
//取得neothemesflash資料表內容

if (!empty($xoopsModule)) {
    $moduleid=$xoopsModule->dirname();
}

if (!empty($xoopsModule)) {
    $modulename=$xoopsModule->name();
}
//接收變數
$tadnewsncsn=(empty($_REQUEST['ncsn']))?"":$_REQUEST['ncsn'];
$tad_faqfcsn=(empty($_REQUEST['fcsn']))?"":$_REQUEST['fcsn'];
$tadgallerycsn=(empty($_REQUEST['csn']))?"":$_REQUEST['csn'];
$tad_calcate_sn=(empty($_REQUEST['cate_sn']))?"":$_REQUEST['cate_sn'];
$taduploaderofcatsn=(empty($_REQUEST['of_cat_sn']))?"":$_REQUEST['of_cat_sn'];
$tadlinkcatesn=(empty($_REQUEST['cate_sn']))?"":$_REQUEST['cate_sn'];
$tad_playerpcsn=(empty($_REQUEST['pcsn']))?"":$_REQUEST['pcsn'];
$tad_discussBoardID=(empty($_REQUEST['BoardID']))?"":$_REQUEST['BoardID'];


switch ($moduleid) {
case "tadnews":
list($menuitem, $moduletitle) = modulesort_tadnews($xooprurl, $tadnewsncsn);

break;

case "tad_faq":
list($menuitem, $moduletitle) = modulesort_tad_faq($xooprurl, $tad_faqfcsn);
break;

case "tadgallery":
list($menuitem, $moduletitle) = modulesort_tadgallery($xooprurl, $tadgallerycsn);
break;


case "tad_cal":
list($menuitem, $moduletitle) = modulesort_tad_cal($xooprurl, $tad_calcate_sn);
break;

case "tad_uploader":
list($menuitem, $moduletitle) = modulesort_tad_uploader($xooprurl, $taduploaderofcatsn);
break;

case "tad_link":
list($menuitem, $moduletitle) = modulesort_tad_link($xooprurl, $tadlinkcatesn);
break;

case "tad_player":
list($menuitem, $moduletitle) =modulesort_tad_player($xooprurl, $tad_playerpcsn);
break;

case "tad_discuss":
list($menuitem, $moduletitle) =modulesort_tad_discuss($xooprurl, $tad_discussBoardID);
break;


default:
$menuitem="";
}






//tadnews
function modulesort_tadnews($xooprurl, $tadnewsncsn)
{
    global $xoopsDB;

    $sql = "select ncsn,nc_title from " . $xoopsDB->prefix('tad_news_cate')   . " where `not_news` = '0'";
    $result = $xoopsDB -> query($sql) or die($sql);
    while (list($ncsn, $nc_title) = $xoopsDB -> fetchRow($result)) {
        $menuitem.="<li role='presentation'><a title='{$nc_title}' role='menuitem' tabindex='-1' href='{$xooprurl}/modules/tadnews/index.php?ncsn={$ncsn}'>{$nc_title}</a></li>";
    }

    $sql = "select nc_title from " . $xoopsDB->prefix('tad_news_cate')   . " where `not_news` = '0' and `ncsn` = '$tadnewsncsn'";
    $result = $xoopsDB -> query($sql) or die($sql);
    list($nc_title) = $xoopsDB -> fetchRow($result);


    return array($menuitem,$nc_title);
}



//tad_faq
function modulesort_tad_faq($xooprurl, $tad_faqfcsn)
{
    global $xoopsDB;

    $sql = "select fcsn,title from " . $xoopsDB->prefix('tad_faq_cate') ;
    $result = $xoopsDB -> query($sql) or die($sql);
    while (list($fcsn, $title) = $xoopsDB -> fetchRow($result)) {
        $menuitem.="<li role='presentation'><a title='{$title}' role='menuitem' tabindex='-1' href='{$xooprurl}/modules/tad_faq/index.php?fcsn={$fcsn}'>{$title}</a></li>";
    }


    $sql = "select title from " . $xoopsDB->prefix('tad_faq_cate')   . " where  `fcsn` = '$tad_faqfcsn'";
    $result = $xoopsDB -> query($sql) or die($sql);
    list($title) = $xoopsDB -> fetchRow($result);


    return array($menuitem,$title);
}

//tadgallery
function modulesort_tadgallery($xooprurl, $tadgallerycsn)
{
    global $xoopsDB;

    $sql = "select csn,title from " . $xoopsDB->prefix('tad_gallery_cate');
    $result = $xoopsDB -> query($sql) or die($sql);
    while (list($csn, $title) = $xoopsDB -> fetchRow($result)) {
        $menuitem.="<li role='presentation'><a title='{$title}' role='menuitem' tabindex='-1' href='{$xooprurl}/modules/tadgallery/index.php?csn={$csn}'>{$title}</a></li>";
    }


    $sql = "select title from " . $xoopsDB->prefix('tad_gallery_cate')   . " where  `csn` = '$tadgallerycsn'";
    $result = $xoopsDB -> query($sql) or die($sql);
    list($title) = $xoopsDB -> fetchRow($result);


    return array($menuitem,$title);
}




//tad_cal
function modulesort_tad_cal($xooprurl, $tad_calcate_sn)
{
    global $xoopsDB;

    $sql = "select cate_sn,cate_title from " . $xoopsDB->prefix('tad_cal_cate')   . " where `cate_enable` = '1'";
    $result = $xoopsDB -> query($sql) or die($sql);
    while (list($cate_sn, $cate_title) = $xoopsDB -> fetchRow($result)) {
        $menuitem.="<li role='presentation'><a title='{$cate_title}' role='menuitem' tabindex='-1' href='{$xooprurl}/modules/tad_cal/index.php?cate_sn={$cate_sn}'>{$cate_title}</a></li>";
    }
 
    $sql = "select cate_title from " . $xoopsDB->prefix('tad_cal_cate')   . " where  `cate_enable` = '1' and `cate_sn` = '$tad_calcate_sn'";
    $result = $xoopsDB -> query($sql) or die($sql);
    list($cate_title) = $xoopsDB -> fetchRow($result);


    return array($menuitem,$cate_title);
}





//tad_uploader
function modulesort_tad_uploader($xooprurl, $taduploaderofcatsn)
{
    global $xoopsDB;

    $sql = "select cat_sn,cat_title from " . $xoopsDB->prefix('tad_uploader')   . " where `cat_enable` = '1'";
    $result = $xoopsDB -> query($sql) or die($sql);
    while (list($cat_sn, $cat_title) = $xoopsDB -> fetchRow($result)) {
        $menuitem.="<li role='presentation'><a title='{$cat_title}' role='menuitem' tabindex='-1' href='{$xooprurl}/modules/tad_uploader/index.php?of_cat_sn={$cat_sn}'>{$cat_title}</a></li>";
    }
 
    $sql = "select cat_title from " . $xoopsDB->prefix('tad_uploader')   . " where  `cat_enable` = '1'  and  `cat_sn` = '$taduploaderofcatsn'";
    $result = $xoopsDB -> query($sql) or die($sql);
    list($cat_title) = $xoopsDB -> fetchRow($result);


    return array($menuitem,$cat_title);
}





//tad_link
function modulesort_tad_link($xooprurl, $tadlinkcatesn)
{
    global $xoopsDB;

    $sql = "select cate_sn,cate_title from " . $xoopsDB->prefix('tad_link_cate');
    $result = $xoopsDB -> query($sql) or die($sql);
    while (list($cate_sn, $cate_title) = $xoopsDB -> fetchRow($result)) {
        $menuitem.="<li role='presentation'><a title='{$cate_title}' role='menuitem' tabindex='-1' href='{$xooprurl}/modules/tad_link/index.php?cate_sn={$cate_sn}'>{$cate_title}</a></li>";
    }
 
    $sql = "select cate_title from " . $xoopsDB->prefix('tad_link_cate')   . " where   `cate_sn` = '$tadlinkcatesn'";
    $result = $xoopsDB -> query($sql) or die($sql);
    list($cate_title) = $xoopsDB -> fetchRow($result);


    return array($menuitem,$cate_title);
}



//tad_player
function modulesort_tad_player($xooprurl, $tad_playerpcsn)
{
    global $xoopsDB;

    $sql = "select pcsn,title from " . $xoopsDB->prefix('tad_player_cate');
    $result = $xoopsDB -> query($sql) or die($sql);
    while (list($pcsn, $title) = $xoopsDB -> fetchRow($result)) {
        $menuitem.="<li role='presentation'><a title='{$title}' role='menuitem' tabindex='-1' href='{$xooprurl}/modules/tad_player/index.php?pcsn={$pcsn}'>{$title}</a></li>";
    }
 
    $sql = "select title from " . $xoopsDB->prefix('tad_player_cate')   . " where   `pcsn` = '$tad_playerpcsn'";
    $result = $xoopsDB -> query($sql) or die($sql);
    list($title) = $xoopsDB -> fetchRow($result);


    return array($menuitem,$title);
}


//tad_discuss
function modulesort_tad_discuss($xooprurl, $tad_discussBoardID)
{
    global $xoopsDB;

    $sql = "select BoardID,BoardTitle from " . $xoopsDB->prefix('tad_discuss_board')   . " where `BoardEnable` = '1'";
    $result = $xoopsDB -> query($sql) or die($sql);
    while (list($BoardID, $BoardTitle) = $xoopsDB -> fetchRow($result)) {
        $menuitem.="<li role='presentation'><a title='{$BoardTitle}' role='menuitem' tabindex='-1' href='{$xooprurl}/modules/tad_discuss/discuss.php?BoardID={$BoardID}'>{$BoardTitle}</a></li>";
    }
    $sql = "select BoardTitle from " . $xoopsDB->prefix('tad_discuss_board')   . " where `BoardEnable` = '1' and  `BoardID` = '$tad_discussBoardID'";
    $result = $xoopsDB -> query($sql) or die($sql);
    list($BoardTitle) = $xoopsDB -> fetchRow($result);


    return array($menuitem,$BoardTitle);
}


$this->assign("modulename", _MB_MODULESINDEX1.$modulename._MB_MODULESINDEX2);
if (!empty($moduletitle)) {
    $this->assign("xoops_pagetitle", $moduletitle);
}
$this->assign("menuitem", $menuitem);
