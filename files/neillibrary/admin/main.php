<?php
//-- 引入檔案 --//
$xoopsOption['template_main'] = "後台樣板檔.html";  //樣板檔
include 'header.php'; //XOOPS檔頭
include_once "../function.php"; //引入自訂的共同函數檔

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

include "footer.php"; //XOOPS檔尾
?>