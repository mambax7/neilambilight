<?php

global $xoopsDB;

$sql    = "select nsn,field,contactus from " . $xoopsDB->prefix("neothemesconfig");
$result = $xoopsDB->query($sql);

if (!empty($result)) {
    $selectdb = $xoopsDB->prefix('neothemesconfig');
    $sql      = "select nsn,field,contactus   from  $selectdb";
    $result = $xoopsDB->query($sql) or die($sql);
    list($nsn, $field, $contactus) = $xoopsDB->fetchRow($result);
    $fieldsplit = preg_split('/;/', $field);   //編號到19
}

$adminmenu[0]['title'] = _MA_NEODWADMIN_MANAGEMENTHOME;            //管理首頁
$adminmenu[0]['link']  = "admin/index.php";
$adminmenu[1]['title'] = _MA_NEODWADMIN_SCENESETTING;               //佈景設定
$adminmenu[1]['link']  = "admin/settings.php";
$adminmenu[2]['title'] = _MA_NEODWADMIN_KEYWORDMANAGEMENTA;             //關鍵字管理
$adminmenu[2]['link']  = "admin/keywordmeta.php";
$adminmenu[3]['title'] = _MA_NEODWADMIN_MARQUEEMANAGEMENTA;             //跑馬燈管理
$adminmenu[3]['link']  = "admin/marqueetable.php";
$adminmenu[4]['title'] = _MA_NEODWADMIN_FLASHIMAGEMANAGEMENT;          //Flash圖片管理
$adminmenu[4]['link']  = "admin/flashimgtable.php";
$adminmenu[5]['title'] = _MA_NEODWADMIN_SITEMENUMANAGEMENT;           //網站選單管理
$adminmenu[5]['link']  = "admin/menutable.php";

if ($fieldsplit[20] == 2) {
    $adminmenu[6]['title'] = _MA_NEODWADMIN_RIGHTMENU;              //右網站選單管理
    $adminmenu[6]['link']  = "admin/rightmenu.php";
}

$module = (empty($_REQUEST['module'])) ? "" : $_REQUEST['module'];

//判斷tadtools有沒有安裝
$module_handler = xoops_gethandler('module');
$tadtools       = $module_handler->getByDirname('tadtools');

empty($tadtools) ? $ifinstallation = true : $ifinstallation = false; // get TRUE

if (!empty($tadtools) && $module != 'tadtools') {
    $xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];
    $sql         = "select tt_theme from " . $xoopsDB->prefix('tadtools_setup') . " where `tt_theme` = '{$xoops_theme}'";
    $result      = $xoopsDB->query($sql) || die($sql);
    $tt_themeNY  = $xoopsDB->getRowsNum($result);

    if (empty($tt_themeNY)) {
        $adminmenu[7]['title'] = _MA_TADTOOLS;           //加入tadtools
        $adminmenu[7]['link']  = "admin/jointadtools.php";
    }
}

$adminmenu[8]['title'] = _MA_BLOCKSMENU;          //按鈕區塊管理
$adminmenu[8]['link']  = "admin/blockmenusort.php";

if (!empty($fieldsplit[24]) and empty($contactus)) {
    $adminmenu[9]['title'] = _MA_CONTACTUS;          //聯絡我們管理
    $adminmenu[9]['link']  = "admin/contactustable.php";
}
?>
