<?php
include "../../../include/cp_header.php";
include "../function.php";
include "../class/themeset.php";
include "../class/selectdb.php";
    
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";
    

$b=(empty($_REQUEST['b']))?"":$_REQUEST['b'];
$menub=$b+1;
$menuc=(empty($_REQUEST['c']))?"":$_REQUEST['c'];
$dbswitchok=(empty($_REQUEST['dbswitch']))?"":$_REQUEST['dbswitch'];
$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$nsn=(empty($_REQUEST['nsn']))?"":$_REQUEST['nsn'];
$j=(empty($_REQUEST['j']))?"":$_REQUEST['j'];

 
switch ($op) {
 case "newmenu01":
if (empty($_POST['manugroup'])) {
    redirect_header($_SERVER['PHP_SELF'].'?c=2', 3, _MA_NEODWADMIN_SELECTMAINCATEGORY);    //請選擇按鈕所屬主分類
} else {
    insert_menu(a);
    redirect_header(XOOPS_URL. '/modules/neothemesadmin/admin/menutable.php', 0, _MA_NEODWADMIN_ADDDATA);    //資料已新增
}

 break;
 case "newmenu02":
insert_menu(b, $dbswitchok);
redirect_header(XOOPS_URL. '/modules/neothemesadmin/admin/menutable.php', 0, _MA_NEODWADMIN_INFORMATIONTOMODIFY);    //資料已修改
 break;
 default:
 $main = menu_form($nsn, $menub, $menuc, $j);
}



function menu_form($nsn= "", $menub="", $menuc="", $j="")
{
    if (!empty($nsn)) {
        //編輯內容
        global $xoopsDB;
        $kset='0'; //switch條件
        //搜尋neothemesmenu資料表
        $selectneothemesmenu =neothemesmenu::publicselectdb5($kset, $nsn, $nnumber, $master_slave, $manugroup, $content, $url, $target, $post_date);
        list($nsnid, $nnumber, $master_slave, $manugroup, $content, $url, $target, $post_date) = $selectneothemesmenu;
        $urlsplit=preg_split('/,/', $url);
        $menub="$manugroup";
        $nnumber="$nnumber";
        $title1 = "$content";
        $title2="$urlsplit[0]";
        $targetop = "$target";
        $nsna = "$number";
        $opture="newmenu02";
        $dbswitch="$nsn";
        $title3=_MA_NEODWADMIN_EDITORA;  //編輯
    } else {
        //新增內容
$kset='1'; //switch條件
//搜尋neothemesmenu資料表
$selectneothemesmenu =neothemesmenu::publicselectdb5($kset, $nsn, $nnumber, $master_slave, $manugroup, $content, $url, $target, $post_date);
        list($nsnid, $nnumber, $master_slave, $manugroup, $content, $url, $target, $post_date) = $selectneothemesmenu;
        $urlsplit=preg_split('/,/', $url);
        $nnumber=$menub;
        $menub=($menuc == 1)?"$nnumber":"";




        $title1 = "";
        $title2="";
        $targetop = "self";
        $nsna = $nsn+1;
        $menuid ="$nsna";
        $opture="newmenu01";
        $dbswitch="";
        $title3=_MA_NEODWADMIN_NEW; //新增
    }





    //呼叫DB::neothemesconfig
    $neothemesconfigvsplit =neothemesconfig::publicselectdb1($nsn, $field, $modulesid, $mnsnid, $fnsnid, $menuid);
    list($nsnid, $field, $modulesid, $mnsnid, $fnsnid, $menuid) = $neothemesconfigvsplit;
    $fieldsplit=preg_split('/;/', $field);

    global $xoopsDB;
    //新增與編輯共用表格欄位

    $kset='2'; //switch條件
    //先建構class($themesetclass)
    $themesetclass   = new  themesetclass;
    $topvsplit =$themesetclass-> themespublicb($variableok, $setting);
    list($variableoka, $settinga) = $topvsplit;

    //切割$variableok陣列內容
    $variablesplit=preg_split('/;/', $variableoka);
    $menulimit=$variablesplit[6];          //按鈕上限

    //搜尋neothemesmenu資料表
    $selectneothemesmenu =neothemesmenu::publicselectdb5($kset, $nsn, $nnumber, $master_slave, $manugroup, $content, $url, $target, $post_date, $a, $b, $menulimit, $j, $menuc);
    list($nsnid, $nnumber, $master_slave, $manugroup, $content, $url, $target, $post_date, $all_news, $optionsb) = $selectneothemesmenu;
    $time_date=date("Y-m-d H:i:s", mktime(date(H)+0, date(i), date(s), date(m), date(d), date(Y)));


    foreach ($all_news  as $y) {
        $all_nenutop.= $y;
    }



    //主按鈕及子按鈕的標題字判斷
$titletext=($menuc == 1)?_MA_NEODWADMIN_MAIN:_MA_NEODWADMIN_CHILD;  //主:子
//排序判斷，主按鈕排序=$nnumber，子按鈕排序=0
$nnumber=($menuc == 1)?"$nnumber":"0";


    $main="
<form name='form' id='form' method='post'  action='{$_SERVER['PHP_SELF']}' onsubmit='return xoopsFormValidate_form();' enctype='multipart/form-data'>
<table width='100%' class='outer' cellspacing='1'>
<tr><th colspan='2'><h4>{$title3}{$titletext}"._MA_NEODWADMIN_BUTTON."</h4></th></tr>       
<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>"._MA_NEODWADMIN_BUTTONNAME."</span>
	<span class='caption-marker'>*</span>
	</div></td><td class='even'>
	<input type='text' name='content' title='"._MA_NEODWADMIN_BUTTONNAME."' id='content' size='60' maxlength='255' value='$title1' /></td></tr>	
<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>"._MA_NEODWADMIN_BUTTONLINK."</span>
	<span class='caption-marker'>*</span></div></td>
	<td class='even'><input type='text' name='url' title='"._MA_NEODWADMIN_BUTTONLINK."' id='url' size='60' maxlength='255' value='$title2'  /></td></tr>
";


    //分類按鈕選單判斷
    if ($menuc == 1) {
        $main.="<input type='hidden' name='manugroup' id='manugroup' value='$menub' />";
    } else {
        $main.="
<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>"._MA_NEODWADMIN_SELECTTHECORRESPONDING."</span>
	<span class='caption-marker'>*</span></div>
	</td><td class='even'><select size='6'  name='manugroup' id='manugroup' title='"._MA_NEODWADMIN_SELECTTHECORRESPONDING."'>$all_nenutop</select></td></tr>
";
    }






    $main.="	
<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>"._MA_NEODWADMIN_BUTTONTOOPENTHEWAY."</span>
	<span class='caption-marker'>*</span></div></td>
	<td class='even'>
	<select size='2'  name='target' id='target' title='"._MA_NEODWADMIN_BUTTONTOOPENTHEWAY."' >
	<option value='0' {$targeta}>self</option>
	<option value='1' {$targetb}>blank</option>
	</select></td></tr>
	

<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>"._MA_NEODWADMIN_ORDER."</span>
	<span class='caption-marker'>*</span></div>
	</td><td class='even'><input type='text' name='nnumber' title='"._MA_NEODWADMIN_ORDER."' id='nnumber' size='1' maxlength='255' value='$nnumber'  />
	</td></tr>


<tr valign='top' align='left'>
	<td class='head'></td>
	<td class='even'>
	<input type='submit' class='formButton' name=''  id='' value='"._MA_NEODWADMIN_SENT."' title='"._MA_NEODWADMIN_SENT."'  />
	</td></tr>
</table>
 <input type='hidden' name='post_date' id='post_date' value='$time_date' />
    <input type='hidden' name='menuid' id='menuid' value='$menuid' />
    <input type='hidden' name='dbswitch' id='dbswitch' value='$dbswitch' />
    <input type='hidden' name='filenane' id='filenane' value='newflashimg.php' />
    <input type='hidden' name='master_slave' id='master_slave' value='$menuc' />
    <input type='hidden' name='op' id='op' value='$opture' />
    
    </form>

  				
<script type='text/javascript'>
<!--//
function xoopsFormValidate_form() { 
var myform = window.document.form; 
return true;
}
//--></script>
  				
  ";
    return $main;
}








function insert_menu($a, $dbswitchok)
{
    global $xoopsDB;
  
    $slave=(empty($_REQUEST['master_slave']))?"":$_REQUEST['master_slave'];
      
      
    if ($slave==1) {
        //post=url+manual
        $url=(empty($_REQUEST['url']))?"":$_REQUEST['url'];
        $manual=(empty($_REQUEST['manual']))?"":$_REQUEST['manual'];
        $urltt="{$url},{$manual}";
    } else {
        $urltt="{$_POST['url']}";
    }


    $analysis=$_POST['manugroup'];
    $analysisb=substr_replace($analysis, '', 0, 1);


    //比對$analysis變數是否夾帶*號，有*=次分類，無*號=主分類
    // $analysisa=strpos ($analysis, '*');


    if (strpos("/{$analysis}/i", '*') === false) {//子選單設定
        $master_slave="{$_POST['master_slave']}";
        $manugroup=$analysis;
    } else {                                        //子子選單設定
        $snid=$analysisb;
        $master_slave='3';
 
        //搜尋neothemesmenu資料表
 $kset='4'; //switch條件
//將$snid送入neothemesmenu資料表帶出$manugroup值出來
$selectneothemesmenu =neothemesmenu::publicselectdb5($kset, $nsn, $nnumber, $master_slave, $manugroup, $content, $url, $target, $post_date, $snid, $b, $menulimit);
        list($nsnid, $nnumber, $master_slave, $manugroup, $content, $url, $target, $post_date, $all_news, $optionsb) = $selectneothemesmenu;
    }


    echo $manugroup;

    switch ($a) {
case "a":
  $sql="insert into " . $xoopsDB->prefix('neothemesmenu') . "
  (`nnumber` ,`master_slave`  ,`manugroup`  ,`content`  ,  `url` ,  `target` ,  `post_date` , `snid`)
  values
  ('{$_POST['nnumber']}' , '{$master_slave}' , '{$manugroup}'  , '{$_POST['content']}'  ,  '{$urltt}'   ,  '{$_POST['target']}'  ,  '{$_POST['post_date']}' ,  '{$snid}')";
   $xoopsDB -> queryF($sql) ;




//儲存最後一次新增的nsn
      $sql = "update ".$xoopsDB->prefix("neothemesconfig")." set   
	menuid = '{$_POST['menuid']}' ";
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());
break;


case "b":
    $sql = "update ".$xoopsDB->prefix("neothemesmenu")." set   
	nnumber = '{$_POST['nnumber']}',
	master_slave = '{$master_slave}',
	manugroup = '{$manugroup}',	
	content = '{$_POST['content']}', 			
	url= '{$urltt}',		
	target= '{$_POST['target']}',  		
	post_date= '{$_POST['post_date']}',	
	snid='{$snid}'
    where  nsn= '{$dbswitchok}'";
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());



//儲存最後一次更新的nsn
    $sql = "update ".$xoopsDB->prefix("neothemesconfig")." set   
	menuid = '{$dbswitchok}' ";
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());
break;
}
}

    
xoops_cp_header();
loadModuleAdminMenu(5);

//引入CSS
include "tplthemescss.php";

echo $main;
xoops_cp_footer();
