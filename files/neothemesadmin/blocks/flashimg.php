<?php
global $xoopsConfig;
include_once XOOPS_ROOT_PATH . '/modules/neothemesadmin/language/' . $xoopsConfig['language'] . '/blocks.php';
//圖檔位置
$xooprurl = XOOPS_URL . '/uploads/' . $xoops_theme . '/';
$img_date = date("H:i:s");
//取得neothemesflash資料表內容

if ($xoops_theme == "neilambilight") { //如果是neilambilight佈景themesid可以是空值
    $theme = "OR  `themesid`=''";
}

$dbnane = $xoopsDB->prefix('neothemesflash');
$sql    = "select * from $dbnane where   `themesid`='{$xoops_theme}' {$theme} order by  nnumber asc";    //大到小
$result = $xoopsDB->query($sql);
$i      = 0;

while (list($nsn, $nnumber, $content, $url, $target, $post_date, $imgid, $themesid) = $xoopsDB->fetchRow($result)) {

    //先建構class($target)
    $targetclass = new  targetclass;
    //將$target變數送入class中，然後取得對應的值
    $target = $targetclass->functionpublica($target);

    if ($i == '0') {
        $itemactive = 'item active';
    } else {
        $itemactive = 'item';
    }

    $flashimg[$nsn][themesid]   = $themesid;
    $flashimg[$nsn][itemactive] = $itemactive;
    $flashimg[$nsn][url]        = $url;
    $flashimg[$nsn][content]    = $content;
    $flashimg[$nsn][target]     = $target;
    $flashimg[$nsn][imgid]      = $xooprurl . 'p' . $imgid . '.jpg?state=' . $img_date;

    $i++;
}

for ($a = 0; $a < $i; $a++) {
    if ($a == 0) {
        $active = 'active';
    } else {
        $active = '';
    }

    $jsbuttom[$a][a]      = $a;
    $jsbuttom[$a][active] = $active;
}

if ($i == 0) {
    $itemactive            = 'item active';
    $xooprurl              = XOOPS_URL . '/themes/' . $xoops_theme . '/default/';
    $flashimg[$i][target]  = '_blank';
    $flashimg[$i][content] = _MB_NEODWADMIN_TITLE;
    $flashimg[$i][url]     = 'http://neodw.com/';
    $flashimg[$i][imgid]   = $xooprurl . 'p1' . $imgid . '.png?state=' . $img_date;
}

$this->assign("jsbuttom", $jsbuttom);
$this->assign("flashimgi", $i);
$this->assign("flashimg", $flashimg);
