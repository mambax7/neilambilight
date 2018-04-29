<?php
global $xoopsConfig, $xoopsModule, $xoopsDB;
include_once XOOPS_ROOT_PATH . '/modules/neothemesadmin/language/' . $xoopsConfig['language'] . '/blocks.php';

//讀取遠端佈景版本已通知更新
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://neodw.com/themesversion.php?themes=' . $xoops_theme);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$themesversion = curl_exec($ch);
curl_close($ch);

$themesversion = preg_split('/,/', $themesversion);

//當前佈景版本編號
$themesversionlocalhost = _MA_NEODWADMIN_THEMESID;
//判斷當前佈景版本是否比最新版本舊
if ($themesversionlocalhost < $themesversion[0]) {
    $updatethemes = true;
}
$this->assign("updatethemes", $updatethemes);
$this->assign("themesversion", $themesversion[0]);
$this->assign("updatethemesurl", $themesversion[1]);
//line
$line = empty($line) ? 'neilhsu168' : $line;
$this->assign("line", $line);

//是否顯示line按鈕
$this->assign("lineYN", $fieldsplit[21]);

//FB會員ID
$fburl = empty($fburl) ? 'neodwxoops' : $fburl;
$this->assign("fbuID", $fburl);

//是否顯示FB-messages按鈕
$this->assign("fbYN", $fieldsplit[22]);

//FB按鈕
$fbfansurl = empty($fbfansurl) ? 'https://www.facebook.com/NeilHsu168/' : $fbfansurl;
$this->assign("fbfansurl", $fbfansurl);

//是否顯示FB連結按鈕
$this->assign("fbfansurlYN", $fieldsplit[23]);

//聯絡我們按鈕
$contactusurl = XOOPS_URL . '/modules/neothemesadmin/contactusform.php';
$contactus    = empty($contactus) ? $contactusurl : $contactus;
if (strpos($contactus, '@')) {
    $mailto = 'mailto:';
}

$this->assign("mailto", $mailto);

$this->assign("contactus", $contactus);

//抓取未讀取的聯絡我們
$sql    = "select count(*) from " . $xoopsDB->prefix("neocontactusform");
$result = $xoopsDB->query($sql);

if (!empty($result)) {
    $sql = "select * from " . $xoopsDB->prefix('neocontactusform') . " where `readtrue` = '0'";
    $result = $xoopsDB->query($sql) or die($sql);
    $nonumber = $xoopsDB->getRowsNum($result);
    $this->assign("nonumber", $nonumber);
}

//是否顯示聯絡我們按鈕
$this->assign("contactusYN", $fieldsplit[24]);

//跑馬燈速度
$this->assign("alsspeed", $fieldsplit[9] . '0');

//跑馬燈速度
$this->assign("marqueestyle", $fieldsplit[25]);
if ($fieldsplit[25] == 1) {
    $marqueesdirection = 'up';
}
if ($fieldsplit[25] == 0) {
    $marqueesdirection = 'left';
}
$this->assign("marqueesdirection", $marqueesdirection);

//JS播放器樣式
$this->assign("jsplaystyle", $fieldsplit[26]);

$enableawide = ($fieldsplit[16] == "") ? "1" : "$fieldsplit[16]";

//判斷模組版本是否比現在的版本新

$sql = "select version  from " . $xoopsDB->prefix('modules') . " where `dirname` = 'neothemesadmin'";
$result = $xoopsDB->query($sql) or die($sql);
list($version) = $xoopsDB->fetchRow($result);
$justnow = _MA_NEODWADMIN_MODULESVERSION . '0';

//吧模組編號加上.分割
$str     = $version;
$split   = ".";
$version = substr($str, 0, 1) . $split . substr($str, 1);

if ($justnow > $version) {
    $modulesversion = true;
}

$this->assign("justnow", $justnow);
$this->assign("version", $version);
$this->assign("modulesversion", $modulesversion);

//開啟或關閉網站自動放大功能
if (!isset($fieldsplit[27])) {
    $fieldsplit[27] = 1;
}

$this->assign("zoomswitch", $fieldsplit[27]);

//開啟或關閉XOOPS內建廣告
if (!isset($fieldsplit[28])) {
    $fieldsplit[28] = 0;
}

$this->assign("xoopsad", $fieldsplit[28]);
