<?php
include "../../../include/cp_header.php";
include "../function.php";
include "../class/function.php";
include "../class/themeset.php";
include "../class/selectdb.php";
include "../glyphicon.php";
include_once XOOPS_ROOT_PATH . "/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH . "/Frameworks/art/functions.admin.php";

$op      = (empty($_REQUEST['op'])) ? "" : $_REQUEST['op'];
$sorting = (empty($_REQUEST['sorting'])) ? "" : $_REQUEST['sorting'];
$sortid  = (empty($_REQUEST['sortid'])) ? "" : $_REQUEST['sortid'];

switch ($op) {
    case "insert":
        insert_blocksort();
        redirect_header(XOOPS_URL . '/modules/neothemesadmin/admin/blockmenusort.php', 0, _MA_NEODWADMIN_ADDDATA);    //資料已新增
        break;
    case "update":
        update_blocksort();
        redirect_header(XOOPS_URL . '/modules/neothemesadmin/admin/blockmenusort.php', 0, _MA_NEODWADMIN_UPDATE);   //資料已更新
        break;
    default:
        $main = blockmenusortform($sorting, $sortid);
}

function blockmenusortform($sorting, $sortid)
{
    $xoopsurl = XOOPS_URL;

    if (!empty($sortid)) {
        global $xoopsDB;
        $sql = "select * from " . $xoopsDB->prefix('neoblockmenusort') . " where `sortid` = '$sortid'";
        $result = $xoopsDB->query($sql) or die($sql);
        list($sortid, $sorttitle, $sortimg, $sorting, $radiogstyle, $imgstyle) = $xoopsDB->fetchRow($result);
        $opvalue = "update";

        switch ($radiogstyle) {
            case "text":
                $inlineRadio1   = "checked=checked'";
                $sortimgiconbox = "";
                $imgstylebox    = "display:none";
                break;
            case "img":
                $inlineRadio2   = "checked=checked'";
                $imgstylebox    = "";
                $sortimgiconbox = 'display:none';
                break;
        }

        switch ($imgstyle) {
            case "random":
                $imgstyle1 = "checked=checked'";

                break;
            case "sorting":
                $imgstyle2 = "checked=checked'";
                break;
        }

        if ($sortimg == 0) {
            $sortimgselected01 = "selected='selected'";
        } elseif ($sortimg == 1) {
            $sortimgselected02 = "selected='selected'";
        } elseif ($sortimg == 2) {
            $sortimgselected03 = "selected='selected'";
        } elseif ($sortimg == 3) {
            $sortimgselected04 = "selected='selected'";
        } elseif ($sortimg == 4) {
            $sortimgselected05 = "selected='selected'";
        } elseif ($sortimg == 5) {
            $sortimgselected06 = "selected='selected'";
        } elseif ($sortimg == 6) {
            $sortimgselected07 = "selected='selected'";
        } elseif ($sortimg == 7) {
            $sortimgselected08 = "selected='selected'";
        } elseif ($sortimg == 7) {
            $sortimgselected08 = "selected='selected'";
        } elseif ($sortimg == 8) {
            $sortimgselected09 = "selected='selected'";
        } elseif ($sortimg == 9) {
            $sortimgselected10 = "selected='selected'";
        } elseif ($sortimg == 10) {
            $sortimgselected11 = "selected='selected'";
        } elseif ($sortimg == 11) {
            $sortimgselected12 = "selected='selected'";
        } elseif ($sortimg == 12) {
            $sortimgselected13 = "selected='selected'";
        } elseif ($sortimg == 13) {
            $sortimgselected14 = "selected='selected'";
        } elseif ($sortimg == 14) {
            $sortimgselected15 = "selected='selected'";
        } elseif ($sortimg == 15) {
            $sortimgselected16 = "selected='selected'";
        } elseif ($sortimg == 16) {
            $sortimgselected17 = "selected='selected'";
        } elseif ($sortimg == 17) {
            $sortimgselected18 = "selected='selected'";
        }

        $glyphiconicon = glyphiconicon($sortimg);
    } else {
        $opvalue        = "insert";
        $imgstylebox    = "display:none";
        $sortimgiconbox = 'display:none';
        $imgstyle1      = "checked=checked'";
    }

    $form = "<form name='form' id='form' method='post'  action='{$_SERVER['PHP_SELF']}' onsubmit='return xoopsFormValidate_form();' enctype='multipart/form-data'>
<table width='100%' class='outer' cellspacing='1'>
<tr><th colspan='2'><h4>新增區塊分類</h4></th></tr>       

<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>分類名稱</span>
	<span class='caption-marker'>*</span>
	</div></td><td class='even'>
	<input type='text' name='sorttitle' title='分類名稱' id='sorttitle' size='60' maxlength='255' value='{$sorttitle}' /></td></tr>	


<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>選擇按鈕樣式</span>
	<span class='caption-marker'>*</span>
	</div></td><td class='even'>

 <label class='radio-inline'>
  <input type='radio' id='inlineRadio1' {$inlineRadio1} name='radiogstyle' value='text'> 文字按鈕
</label>
<label class='radio-inline'>
  <input type='radio'  id='inlineRadio2' {$inlineRadio2}  name='radiogstyle' value='img'>圖檔按鈕
</label>
  </td></tr>	
		
<tr valign='top' align='left' style='{$sortimgiconbox}' id='sortimgiconbox'>
	<td class='head' >
	<div  class='xoops-form-element-caption'>
	<span class='caption-text'>選擇分類中所有按鈕圖示</span><span id='sortimgicon'><span class='{$glyphiconicon}' aria-hidden='true'></span></span>
	<span class='caption-marker'>*</span></div></td>
	<td  class='even' >
	<select size='3'  name='sortimg' id='sortimg' title='選擇分類按鈕圖示' >
	<option value='0' {$sortimgselected01}>按鈕圖標01</option>
	<option value='1' {$sortimgselected02}>按鈕圖標02</option>
	<option value='2' {$sortimgselected03}>按鈕圖標03</option>
	<option value='3' {$sortimgselected04}>按鈕圖標04</option>
	<option value='4' {$sortimgselected05}>按鈕圖標05</option>
	<option value='5' {$sortimgselected06}>按鈕圖標06</option>
	<option value='6' {$sortimgselected07}>按鈕圖標07</option>
	<option value='7' {$sortimgselected08}>按鈕圖標08</option>	
    <option value='8' {$sortimgselected09}>按鈕圖標09</option>	
    <option value='9' {$sortimgselected10}>按鈕圖標10</option>	 
    <option value='10' {$sortimgselected11}>按鈕圖標11</option>	   
    <option value='11' {$sortimgselected12}>按鈕圖標12</option>	   
    <option value='12' {$sortimgselected13}>按鈕圖標13</option>	  
     <option value='13' {$sortimgselected14}>按鈕圖標14</option>
      <option value='14' {$sortimgselected15}>按鈕圖標15</option>  
      <option value='15' {$sortimgselected16}>按鈕圖標16</option>     
      <option value='16' {$sortimgselected17}>按鈕圖標17</option>    
       <option value='17' {$sortimgselected18}>按鈕圖標18</option>      	       	      	    	 	      	     	  	  													
	</select></td></tr>		
		


<tr style='{$imgstylebox}' id='imgstylebox' valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>圖片按鈕顯示方式</span>
	<span class='caption-marker'>*</span>
	</div></td><td class='even'>

 <label class='radio-inline'>
  <input type='radio' {$imgstyle1}  name='imgstyle' value='random'> 隨機顯示
</label>
<label class='radio-inline'>
  <input type='radio' {$imgstyle2}  name='imgstyle' value='sorting'>排序顯示
</label>
  </td></tr>


		
<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>順序</span>
	<span class='caption-marker'>*</span></div>
	</td><td class='even'><input type='text' name='sorting' title='排序' id='sorting' size='1' maxlength='255' value='{$sorting}'  />
	</td></tr>		
		
	
<tr valign='top' align='left'>
	<td class='head'></td>
	<td class='even'>
	<input type='submit' class='formButton' name=''  id='' value='送出' title='送出'  />
	</td></tr>
</table>
    <input type='hidden' name='op' id='op' value='{$opvalue}' />	
    <input type='hidden' name='sortid' id='sortid' value='{$sortid}' />	
	
	
	
	
	
	
	</table>	
	
	</form>
	

		

	
	
	";

    return $form;
}

function insert_blocksort()
{
    global $xoopsDB;

    //新增內容SQL語法
    $sql = "insert into " . $xoopsDB->prefix('neoblockmenusort') . "
  (`sorttitle`  ,`sortimg`  ,  `sorting` ,  `radiogstyle` ,  `imgstyle`)
  values
  ('{$_POST['sorttitle']}'  , '{$_POST['sortimg']}'  ,  '{$_POST['sorting']}' ,  '{$_POST['radiogstyle']}' ,  '{$_POST['imgstyle']}')";
    $xoopsDB->queryF($sql);
}

function update_blocksort()
{
    global $xoopsDB;

    //新增內容SQL語法
    $sql = "update " . $xoopsDB->prefix("neoblockmenusort") . " set   
	sorttitle = '{$_POST['sorttitle']}',
	sortimg = '{$_POST['sortimg']}', 	
	sorting= '{$_POST['sorting']}',
	radiogstyle= '{$_POST['radiogstyle']}',
	imgstyle= '{$_POST['imgstyle']}'
	where  sortid= '{$_POST['sortid']}' ";
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());
}

//引入CSS
xoops_cp_header();
loadModuleAdminMenu(6);
include "tplthemescss.php";

echo $main;
xoops_cp_footer();
