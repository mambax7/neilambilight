<?php

include 'header.php'; //XOOPS檔頭
include "../function.php";
//引入CSS
include "tplthemescss.php";

$table = keyword_table();

/**
 * @return string
 */
function keyword_table()
{
    global $xoopsModule;
    //讀取neothemesconfig資料表
    //引入模組DB函數-初始化設定
    $dbneme          = "neothemesconfig";
    $where           = " ";
    $neothemesconfig = moduledb($dbneme, $where);

    //讀取neothemeskeyword資料表

    $dbneme  = "neothemeskeyword";
    $where   = " order by  nsn DESC";
    $keyword = databasetablewhile($dbneme, $where);
    foreach ($keyword as $key => $val) {
        if ($neothemesconfig['modulesid'] == $keyword[$key]['keywordid']) {
            $classtrue = 'focus';
        }

        //模組ID讀取模組名稱
        //$keywordidname=modulesdb($dirname=$keyword[$key]['keywordid']);

        //引入模組DB函數-初始化設定
        $dbneme        = "modules";
        $where         = " where `dirname` = '" . $keyword[$key]['keywordid'] . "'";
        $keywordidname = moduledb($dbneme, $where);

        if ($keyword[$key]['keywordid'] == modules) {
            $keywordidname['name'] = _MA_NEODWADMIN_DISPLAYALLPAGESKEYWORD;
        }
        if ($keyword[$key]['keywordid'] == system) {
            $keywordidname['name'] = _MA_NEODWADMIN_DISPLAYHOMEKEYWORD;
        }
        $tablecenter .= "
   <tr id='deletetr{$key}' class='" . $classtrue . "'>
        <td >" . $keyword[$key]['nsn'] . "</td>
        <td >" . $keyword[$key]['keywordid'] . "(" . $keywordidname['name'] . ")</td>
        <td >" . $keyword[$key]['keywordcenter'] . "</td>
          <td >" . $keyword[$key]['title'] . "</td>
            <td > <a  class='btn btn-default active' href='" . XOOPS_URL . "/modules/neothemesadmin/admin/newkeyword.php?nsn=" . $keyword[$key]['nsn'] . "'>" . _MA_NEODWADMIN_EDITORA . "</a>
                <a  id='deletebotton{$key}' class='btn btn-default active deleteeach'  mane='1," . $keyword[$key]['nsn'] . "," . $keywordidname['name'] . "," . _MA_AJAXDESCRIPTION . "'  href='#NO'>" . _MA_NEODWADMIN_DELETEA . "</a></td>
      </tr>
";
        unset($classtrue);
    }

    $table = "
<div class='container'>
   <div class='page-header'>
  <h2>" . _MA_KEYWORDMETAPHP01 . "<small> &nbsp;Keyword page list</small>&nbsp;&nbsp; <a class='btn btn-primary active'  href='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/newkeyword.php'' >" . _MA_NEODWADMIN_ADDKEYWORD . "</a></h2>
</div>	
<div class='form-group'>
	 <table class='table table-striped'>
    <thead>
      <tr>
        <th>ID</th>
        <th>" . _MA_NEODWADMIN_KEYWORDTARGETED . "</th>
        <th>" . _MA_NEODWADMIN_KEYWORDCONTENT . "</th>
        <th>" . _MA_NEODWADMIN_METATITLETABLE . "</th>
        <th>" . _MA_NEODWADMIN_OPERATING . "</th>
      </tr>
    </thead>
    <tbody>
    " . $tablecenter . "
     
    </tbody>
  </table>
	
	</div>

    
    </div>";

    return $table;
}

loadModuleAdminMenu(2);

echo $table;

include "footer.php"; //XOOPS檔尾
