<?php
//-- 引入檔案 --//
include "header.php";
$xoopsOption['template_main'] = "前台樣板檔.html";
include_once XOOPS_ROOT_PATH."/header.php";

//-- 所有函數 --//


//-- 流程判斷 ($op 為XOOPS常用之動作變數，用來告知程式欲執行之動作)--//
$op=isset($_REQUEST['op'])?$_REQUEST['op']:"";

switch($op){
  case "動作1":
  //執行對應函數
  break;

  default:
  //預設動作
}
$xoopsTpl->assign( "toolbar" , toolbar_bootstrap($interface_menu)) ;
$xoopsTpl->assign( "bootstrap" , get_bootstrap()) ;
$xoopsTpl->assign( "jquery" , get_jquery(true)) ;
$xoopsTpl->assign( "isAdmin" , $isAdmin) ;
include_once XOOPS_ROOT_PATH.'/footer.php';
?>