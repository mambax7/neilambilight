<?php
include "../../../include/cp_header.php";
include "../function.php";
include "../class/function.php";
include "../class/themeset.php";
include "../class/selectdb.php";

include_once XOOPS_ROOT_PATH . "/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH . "/Frameworks/art/functions.admin.php";

$op     = (empty($_REQUEST['op'])) ? "" : $_REQUEST['op'];
$number = (empty($_REQUEST['number'])) ? "" : $_REQUEST['number'];
$nsn    = (empty($_REQUEST['nsn'])) ? "" : $_REQUEST['nsn'];
$y      = (empty($_REQUEST['y'])) ? "" : $_REQUEST['y'];

switch ($op) {
    case "rightmenu01":
        insert_rightmenu(a);
        redirect_header(XOOPS_URL . '/modules/neothemesadmin/admin/rightmenu.php', 0, _MA_NEODWADMIN_ADDDATA);    //資料已新增
        break;
    case "rightmenu02":
        insert_rightmenu(b, $nsn);
        redirect_header(XOOPS_URL . '/modules/neothemesadmin/admin/rightmenu.php', 0, _MA_NEODWADMIN_UPDATE);   //資料已更新
        break;
    default:
        $main = rightmenutable($number, $nsn, $y);
}

function rightmenutable($number, $nsn, $y)
{
    if ($y == '1') {
        global $xoopsDB;

        $sql = "select * from " . $xoopsDB->prefix('neorightmenu') . " where `nsn` = '$nsn'";
        $result = $xoopsDB->query($sql) or die($sql);
        list($nsn, $title, $url, $target, $snid) = $xoopsDB->fetchRow($result);
    }

    if ($target == 0) {
        $targeta = "selected='selected'";
    }

    if ($target == 1) {
        $targetb = "selected='selected'";
    }

    if ($y == '1') {
        $number = $snid;
        $opneme = 'rightmenu02';
    } else {
        $opneme = 'rightmenu01';
    }

    $form = "<form name='form' id='form' method='post'  action='{$_SERVER['PHP_SELF']}' onsubmit='return xoopsFormValidate_form();' enctype='multipart/form-data'>
<table width='100%' class='outer' cellspacing='1'>
<tr><th colspan='2'><h4>新增選單按鈕</h4></th></tr>       

<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>按鈕名稱</span>
	<span class='caption-marker'>*</span>
	</div></td><td class='even'>
	<input type='text' name='title' title='按鈕名稱' id='title' size='60' maxlength='255' value='{$title}' /></td></tr>	

	
	<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>按鈕連結</span>
	<span class='caption-marker'>*</span></div></td>
	<td class='even'><input type='text' name='url' title='按鈕連結' id='url' size='60' maxlength='255' value='{$url}'  /></td></tr>
		
<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>按鈕開啟方式</span>
	<span class='caption-marker'>*</span></div></td>
	<td class='even'>
	<select size='2'  name='target' id='target' title='按鈕開啟方式' >
	<option value='0' {$targeta}>self</option>
	<option value='1' {$targetb}>blank</option>
	</select></td></tr>		
		
		
<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>順序</span>
	<span class='caption-marker'>*</span></div>
	</td><td class='even'><input type='text' name='snid' title='順序' id='snid' size='1' maxlength='255' value='{$number}'  />
	</td></tr>		
		
		
		
		
		
		
		
		
		
		
	
	
<tr valign='top' align='left'>
	<td class='head'></td>
	<td class='even'>
	<input type='submit' class='formButton' name=''  id='' value='送出' title='送出'  />
	</td></tr>
</table>
    <input type='hidden' name='op' id='op' value='{$opneme}' />	
	<input type='hidden' name='nsn' id='nsn' value='{$nsn}' />	
	
	
	
	
	
	
	
	</table>	
	
	</form>";

    return $form;
}

function insert_rightmenu($a, $nsn)
{
    global $xoopsDB;
    switch ($a) {
        case "a":
            //新增內容SQL語法
            $sql = "insert into " . $xoopsDB->prefix('neorightmenu') . "
  (`title`  ,`url`  ,  `target` ,  `snid`)
  values
  ('{$_POST['title']}'  , '{$_POST['url']}'  ,  '{$_POST['target']}'   ,  '{$_POST['snid']}')";
            $xoopsDB->queryF($sql);

            break;
        case "b":
            $sql = "update " . $xoopsDB->prefix("neorightmenu") . " set   
	title = '{$_POST['title']}',
	url = '{$_POST['url']}', 	
	target= '{$_POST['target']}',
	snid= '{$_POST['snid']}'
       where  nsn= '{$nsn}' ";
            $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());

            break;
    }
}

//引入CSS
xoops_cp_header();
loadModuleAdminMenu(6);
include "tplthemescss.php";

echo $main;
xoops_cp_footer();
