<?php	
include_once XOOPS_ROOT_PATH . "/modules/neothemesadmin/function.php";
global  $xoopsDB, $xoopsConfig, $xoopsModule, $xoopsModuleConfig, $xoopsOption, $xoopsTheme, $xoopsConfigMetaFooter, $xoTheme, $xoopsTpl;


//引入網址函數
$httphosturl=httphosturl();



//取得佈景ID
$xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];

//判斷tadtools有沒有安裝
$module_handler = &xoops_getHandler('module');
$tadtools= &$module_handler->getByDirname('tadtools');

empty($tadtools) ? $ifinstallation=true : $ifinstallation=false; // get TRUE

if (!empty($tadtools)) {
    //判斷佈景有無寫入tadtools
    $sql = "select tt_theme from " . $xoopsDB->prefix('tadtools_setup')   . " where `tt_theme` = '{$xoops_theme}'";
    $result = $xoopsDB -> query($sql) or die($sql);
    $tt_themeNY = $xoopsDB -> getRowsNum($result);
    if (empty($tt_themeNY)) {
        echo _MD_JOINTADTOOLS;
    }
}


//取得模組ID
$xoops_dirname = $this->_tpl_vars['xoops_dirname'];
$xoops_url=XOOPS_URL;
//接收變數
$page=(empty($_REQUEST['page']))?"":$_REQUEST['page'];
$pageid=empty($page) ? 'page=sponsor' : '';

$designer=(empty($_REQUEST['designer']))?"":$_REQUEST['designer'];
$designerid=empty($designer) ? 'designer=theauthor' : '';

$evaluation_sn=(empty($_REQUEST['evaluation_sn']))?"":$_REQUEST['evaluation_sn'];
//引入設備判斷
include "program/browserversion.php";
//引入網址判斷與法
include "program/ifthedevice.php";
//引入模組操作說明
include "program/instructions.php";


/*===網站放大====*/
$this->assign('zoomff', $_SESSION['themes']['zoomff']);
$this->assign('zoom', $_SESSION['themes']['zoom']);
$this->assign('zoomwidth', $_SESSION['themes']['screenwidth']);
$this->assign('exchange', $_SESSION['themes']['exchange']);

if ($_SESSION['themes']['exchange']=='exchange') {
    $_SESSION['themes']['zoomff']='';
    $_SESSION['themes']['zoom']='';
    $_SESSION['themes']['exchange']='';
    $_SESSION['themes']['screenwidth']='';
}


//取得當前時間
$img_date = date("H:i:s");
//外框設定
$frame['outer']="<div id='frametopl'></div><div id='framebottoml'></div><div id='frametopr'></div><div id='framebottomr'></div><div id='leftframe'></div><div id='righttframe'></div>";
$frame['information']="<div  class='di01'></div><div class='di02'></div>";
$frame['bottomimg']="<div id='bdtiv01'></div> <div id='bdtiv02'></div> <div id='bdtiv03'></div> <div id='bdtiv04'></div><div id='bdtiv05'></div><div id='bdtiv06'></div>";
//判斷LOGO圖片是否存在
if (file_exists(XOOPS_ROOT_PATH.'/uploads/neilambilight/logoimg.png')) {
    $logofileexists=true;
} else {
    $logofileexists=false;
}

//判斷ICON是否存在
if (file_exists(XOOPS_ROOT_PATH.'/uploads/neilambilight/icon.png')) {
    $iconimg=XOOPS_URL.'/uploads/'.$xoops_theme.'/icon.png?state='.$img_date;
} else {
    $iconimg=XOOPS_URL.'/themes/'.$xoops_theme.'/default/icon.png';
}

//判斷CSS檔案是否存在
if (file_exists(XOOPS_ROOT_PATH.'/themes/neilambilight/'.$_SESSION["Themefolder"].'/css/modules/'.$xoops_dirname.'.css')) {
    $modulescss="<link href='{$xoops_url}/themes/{$xoops_theme}/{$_SESSION['Themefolder']}/css/modules/{$xoops_dirname}.css' rel='stylesheet' media='all'>";
}



//判斷爬蟲
$boxNY=empty($webreptil) ? 'style="display:none;"' : 'style="display:blocks;  opacity:1;"';

//關鍵字打開區塊
$keywordid=isset($_REQUEST['keyword'])?$_REQUEST['keyword']:"";
if (!empty($keywordid)) {
    $boxNY="style=display:blocks;  opacity:1;";
}



if (!empty(trim($this->_tpl_vars['xoops_contents'])) or !empty($page) or !empty($designer)) {
    $contentstrue=true;
}



//取得網址後方變數
$querytrue=$httphosturl['querytrue'];




//說明區塊
if (!empty($page)) {
    $httphosturlb=str_replace('&page=sponsor', '', $httphosturl['url']);
    if (!preg_match("/&/i", $httphosturl['url'])) {
        $querytrue='?';
        $httphosturlb=str_replace('?page=sponsor', '', $httphosturl['url']);
    }
}
if (!empty($designer)) {
    $httphosturla=str_replace('&designer=theauthor', '', $httphosturl['url']);
    if (!preg_match("/&/i", $httphosturl['url'])) {
        $querytrue='?';
        $httphosturla=str_replace('?designer=theauthor', '', $httphosturl['url']);
    }
}
if (empty($httphosturlb) and empty($httphosturla)) {
    $httphosturlb=$httphosturl['url'];
    $httphosturla=$httphosturl['url'];
}






//判斷是否為首頁及xoops_pagetitle是否為空值
if (!empty($this->_tpl_vars['xoops_pagetitle']) and $xoops_dirname == system) {
    $titleif=true;
}

//強制關閉右區塊
$modulesid=array("tad_assignment","tad_lunch2","tad_repair","tad_web","tad_meeting");
foreach ($modulesid as $key) {
    if ($xoops_dirname==$key) {
        $this->_tpl_vars['xoBlocks']['canvas_right']=false;
    }
}



//判斷左右區塊並給ID參數
$centerdivwcss="";
//左區塊開啟+右區塊開啟
if (!empty($this->_tpl_vars['xoBlocks']['canvas_left']) and !empty($this->_tpl_vars['xoBlocks']['canvas_right'])) {
    $centerdivwcss="lrdivtrue";
} elseif (!empty($this->_tpl_vars['xoBlocks']['canvas_left'])) { //只開左區塊
    $centerdivwcss="ldivtrue";
} elseif (!empty($this->_tpl_vars['xoBlocks']['canvas_right'])) { //只開右區塊
    $centerdivwcss="rdivtrue";
} else {
    $centerdivwcss="rdivfalse";
}

//佈景預設jquery.js路徑
$jqueryjs="themes/".$xoops_theme."/{$_SESSION['Themefolder']}/js/jquery.js";
$jqueryjsmigrate="themes/".$xoops_theme."/{$_SESSION['Themefolder']}/js/jquery-migrate.min.js";

if (empty($frame['information'])) {
    $themefolder=null;
}




if (!empty($designer)) {
    $page=$designer;
}

switch ($page) {
 case "sponsor":
$pagetpl="sponsorshiplist.tpl";
break;

case "theauthor":
$pagetpl="designer.tpl";
break;

 default:
$pagetpl="contentsdiv.tpl";
}






include "program/sponsor.php";
include "program/designer.php";

$this->assign('jqueryjsmigrate', $jqueryjsmigrate);
$this->assign('jqueryjs', $jqueryjs);
$this->assign('modulescss', $modulescss);
$this->assign('pageid', $pageid);
$this->assign('boxNY', $boxNY);
$this->assign('contentstrue', $contentstrue);
$this->assign('pagetpl', $pagetpl);
$this->assign('querytrue', $querytrue);
$this->assign('centerdivwcss', $centerdivwcss);
$this->assign('tpl_pagetitle', $GLOBALS['xoopsConfig']['slogan']);
$this->assign('ifinstallation', $ifinstallation);
$this->assign('iconimg', $iconimg);
$this->assign('logofileexists', $logofileexists);
$this->assign('frame', $frame);
$this->assign('titleif', $titleif);
$this->assign('httphosturl', $httphosturl['url']);
$this->assign('httphosturla', $httphosturla);
$this->assign('httphosturlb', $httphosturlb);
$this->assign('designerid', $designerid);




//取得最頂層到Xoops根目錄的路徑
$rootpath = XOOPS_ROOT_PATH;

include_once XOOPS_ROOT_PATH . "/modules/neothemesadmin/directory.php";
