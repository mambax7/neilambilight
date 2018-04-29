<?php
include 'header.php'; //XOOPS檔頭
include "../function.php";
//引入CSS
include "tplthemescss.php";

$op  = (empty($_REQUEST['op'])) ? "" : $_REQUEST['op'];
$nsn = (empty($_REQUEST['nsn'])) ? "" : $_REQUEST['nsn'];

switch ($op) {
    case "keyword01":
        keyword_insert();
        redirect_header(XOOPS_URL . '/modules/neothemesadmin/admin/keywordmeta.php', 0, _MA_NEODWADMIN_ADDDATA);    //資料已新增
        break;

    case "keyword02":
        keyword_updated($nsn);
        redirect_header(XOOPS_URL . '/modules/neothemesadmin/admin/keywordmeta.php', 0, _MA_NEODWADMIN_INFORMATIONTOMODIFY);     //資料已修改
        break;

    default:
        $main = menu_form($nsn);
}

/**
 * @param string $nsn
 * @return string
 */
function menu_form($nsn = "")
{
    global $xoopsDB, $xoopsModule;

    if (empty($nsn)) {
        $op = 'keyword01';
        if (empty($keywordidname['name'])) {
            $keywordidname['name'] = _MA_NOTSET;
        }
    } else {
        //讀取neothemeskeyword資料表
        //$neothemeskeyword=neothemeskeyword($nsn);

        //引入模組DB函數-初始化設定
        $dbneme           = "neothemeskeyword";
        $where            = " where `nsn` = '" . $nsn . "'";
        $neothemeskeyword = moduledb($dbneme, $where);

        //模組ID讀取模組名稱
        //$keywordidname=modulesdb($dirname=$neothemeskeyword['keywordid']);

        //引入模組DB函數-初始化設定
        $dbneme        = "modules";
        $where         = " where `dirname` = '" . $neothemeskeyword['keywordid'] . "'";
        $keywordidname = moduledb($dbneme, $where);

        if ($neothemeskeyword['keywordid'] == modules) {
            $keywordidname['name'] = _MA_NEODWADMIN_DISPLAYALLPAGESKEYWORD;
        }
        if ($neothemeskeyword['keywordid'] == system) {
            $keywordidname['name'] = _MA_NEODWADMIN_DISPLAYHOMEKEYWORD;
        }

        $op       = 'keyword02';
        $nsninput = "<input type='hidden' name='nsn' value='" . $nsn . "'>";
        if ($neothemeskeyword['keywordid'] == modules) {
            $selected = "selected='selected'";
        }
    }

    //引入模組選單
    $input1['modules'] = modulesnameoption($name = $neothemeskeyword['keywordid']);
    //引入input物件
    $input1['keywordcenter'] = inputtext($class, $name = "keywordcenter", $value = $neothemeskeyword['keywordcenter'], $placeholder = _MA_NEODWADMIN_ENTERKEYWORDS);
    //引入textarea物件
    $input1['wdescription'] = inputtextarea($class, $name = "wdescription", $id = "wdescription", $rows = "10", $cols = "80", $value = $neothemeskeyword['wdescription']);
    //引入input物件
    $input1['title'] = inputtext($class, $name = "title", $value = $neothemeskeyword['title'], $placeholder = _MA_NEODWADMIN_METATITLE);

    $tablebox = "<div class='container'>
	
	   <div class='page-header'>
  <h2>" . _MA_KEYWORDMETAPHP02 . "<small> &nbsp;Create a keyword setting</small>&nbsp;&nbsp; <a class='btn btn-primary active'  href='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/keywordmeta.php'' >" . _MA_KEYWORDMETAPHP03 . "</a></h2>
</div>	
	<form method='post'  action='{$_SERVER['PHP_SELF']}' role='form' >
		<div class='form-group'>
 <table class='table'>
    <thead>
      <tr>
        <th colspan='2'>" . _MA_NEODWADMIN_CONFIGURATIONSETTINGS . "</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>" . _MA_NEODWADMIN_ENTERKEYWORDS3 . "</td>
        <td><div class='col-md-12'>" . $keywordidname['name'] . "</div></td>
    
      </tr> 		
    		
    		   <tr>
        <td>" . _MA_NEODWADMIN_CONFIGURATIONKEYWORDS . "</td>
        <td> <div class='col-md-8'>  <select name='keywordid'  class='form-control col-md-2' >
		
    	" . $input1['modules'] . "   
  </select>	</div></td>
    
      </tr>
      <tr>
        <td style='width: 20%'>" . _MA_NEODWADMIN_ENTERKEYWORDS . "</td>
        <td><div class='col-md-12 '>
   " . $input1['keywordcenter'] . "
     <span id='helpBlock' class='help-block'>" . _MA_NEODWADMIN_ENTERKEYWORDS2 . "</span>
     </div>
     	  
     	  </td>
    
      </tr>
      <tr>
        <td>" . _MA_NEODWADMIN_ENTERKEYWORDDESCRIPTION . "</td>
        <td><div class='col-md-12 '>
   " . $input1['wdescription'] . "
        </div></td>
      
      </tr>
      <tr>
        <td>" . _MA_NEODWADMIN_METATITLE . "</td>
        <td><div class='col-md-12 '>
   " . $input1['title'] . "
     <span id='helpBlock' class='help-block'>" . _MA_NEODWADMIN_METATITLE2 . "</span>
     </div></td>
     
      </tr>
     </tbody>
  </table></div>
 <input type='hidden' name='op' value='" . $op . "'>  
 " . $nsninput . "
	  <button type='submit'  class='buttond btn btn-primary btn-lg btn-block btn-bottom active'>" . _MA_NEODWADMIN_SENT . "</button>    	  
  	  </form></div>";

    return $tablebox;
}

//儲存最後一次更新的modulesid
/**
 * @param string $keywordid
 */
function keyword_updatensn($keywordid = "")
{
    global $xoopsDB;
    //儲存最後一次新增的nsn
    $sql = "update " . $xoopsDB->prefix("neothemesconfig") . " set   
	modulesid = '$keywordid'";
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());
}

//新增關鍵字
function keyword_insert()
{
    global $xoopsDB;

    //去除空白跟HTML標籤
    $keywordcenter = phpstrip_tags($_POST['keywordcenter']);
    $wdescription  = phpstrip_tags($_POST['wdescription']);
    $title         = phpstrip_tags($_POST['title']);

    //新增內容SQL語法
    $sql = "insert into " . $xoopsDB->prefix('neothemeskeyword') . "
 (`keywordid`  ,  `keywordcenter` ,  `wdescription` ,  `title`)
  values
  ('{$_POST['keywordid']}'  ,  '$keywordcenter'  ,  '$wdescription' ,  '$title')";
    $xoopsDB->query($sql);

    //儲存最後一次新增的nsn
    keyword_updatensn($_POST['keywordid']);
}

//編輯關鍵字
/**
 * @param string $nsn
 */
function keyword_updated($nsn = "")
{
    global $xoopsDB;
    //去除空白跟HTML標籤
    $keywordcenter = phpstrip_tags($_POST['keywordcenter']);
    $wdescription  = phpstrip_tags($_POST['wdescription']);
    $title         = phpstrip_tags($_POST['title']);

    $sql = "update " . $xoopsDB->prefix("neothemeskeyword") . " set   
	keywordid = '{$_POST['keywordid']}', 		
	keywordcenter = '$keywordcenter', 
	wdescription = '$wdescription',
	title = '$title'		
    where  nsn= '$nsn' ";
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());

    //儲存最後一次新增的nsn
    keyword_updatensn($_POST['keywordid']);
}

loadModuleAdminMenu(2);

echo $main;
//xoops_cp_footer();
include "footer.php"; //XOOPS檔尾
