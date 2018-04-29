<?php
//header.php 是自訂的檔案，給前台所有檔案用的，將每個檔案都要引入的東西都在這裡做設定。

include_once "../../mainfile.php";  //一定要引入的XOOPS網站設定檔
include_once "function.php";        //引入自訂的共同函數檔

//判斷是否對該模組有管理權限，若有管理權 $isAdmin=true;
$isAdmin=false;
if ($xoopsUser) {
    $module_id = $xoopsModule->getVar('mid');
    $isAdmin=$xoopsUser->isAdmin($module_id);
}
