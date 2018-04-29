<?php
global  $xoopsConfig;
include_once XOOPS_ROOT_PATH.'/modules/neothemesadmin/language/'.$xoopsConfig['language'].'/blocks.php';
//圖檔位置
$xooprurl=XOOPS_URL.'/uploads/'.$xoops_theme.'/';
$img_date = date("H:i:s");

if ($xoops_theme=="neilambilight") { //如果是neilambilight佈景themesid可以是空值
    $theme="OR  `themesid`=''";
}
  $dbnane=$xoopsDB->prefix('neothemesflash');
   $sql="select * from $dbnane where   `themesid`='{$xoops_theme}' {$theme}  order by RAND()";    //大到小
   $result=$xoopsDB->query($sql);
  list($nsn, $nnumber, $content, $url, $target, $post_date, $imgid, $themesid) = $xoopsDB -> fetchRow($result);
 //先建構class($target)
$targetclass   = new  targetclass;
 //將$target變數送入class中，然後取得對應的值
$target=$targetclass-> functionpublica($target);

if (!empty($nsn)) {
    $flashimg[url]=$url;
    $flashimg[content]=$content;
    $flashimg[target]=$target;
    $flashimg[imgid]=$xooprurl.'p'.$imgid.'.jpg?state='.$img_date;
}




  

if (empty($nsn)) {
    $xooprurl=XOOPS_URL.'/themes/'.$xoops_theme.'/default/';
    $flashimg[target]='_blank';
    $flashimg[content]=_MB_NEODWADMIN_TITLE;
    $flashimg[url]='http://neodw.com/';
    $flashimg[imgid]=$xooprurl.'p1'.$imgid.'.png?state='.$img_date;
}


  

$this->assign("flashimg", $flashimg);
