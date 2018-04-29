<?php
include "../../../include/cp_header.php";
include "../function.php";
include "../class/selectdb.php";	

include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";

$dbswitch=(empty($_REQUEST['dbswitch']))?"":$_REQUEST['dbswitch'];
$mnsnidb=(empty($_REQUEST['mnsnidb']))?"":$_REQUEST['mnsnidb'];
$dbswitchok="{$dbswitch};{$mnsnidb}";
$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$nsn=(empty($_REQUEST['nsn']))?"":$_REQUEST['nsn'];
$mnsnida=(empty($_REQUEST['mnsnida']))?"":$_REQUEST['mnsnida'];

switch ($op){	
case "newmarquee01":  	  	 
insert_marquee(a,$dbswitchok); 
redirect_header(XOOPS_URL. '/modules/neothemesadmin/admin/marqueetable.php' ,0 , _MA_NEODWADMIN_ADDDATA);    //資料已新增
break; 
case "newmarquee02":  
insert_marquee(b,$dbswitchok); 
redirect_header(XOOPS_URL. '/modules/neothemesadmin/admin/marqueetable.php' ,0 , _MA_NEODWADMIN_UPDATE);   //資料已更新 
break; 
default:
$main = add_form($nsn,$mnsnida);
}



function add_form($nsn= "",$mnsnida){	
if(!empty($nsn)){	//編輯
global $xoopsDB;  
$kset='0'; //switch條件
//搜尋neothemesmarquee資料表
$selectmarquee =neothemesmarquee::publicselectdb3($kset,$nsn,$number,$content,$url,$target,$post_date);
list($nsn,$number,$content,$url,$target,$post_date) = $selectmarquee;

$title1 = "$content";
$title2="$url";
$targetop = "$target";
$nsna = "$number";
$opture="newmarquee02";
$dbswitch="$nsn";
}else{   //新增

$kset='1'; //switch條件
//搜尋neothemesmarquee資料表
$selectmarquee =neothemesmarquee::publicselectdb3($kset,$nsn,$number,$content,$url,$target,$post_date);
list($nsn,$number,$content,$url,$target,$post_date) = $selectmarquee;
$title1 = "";
$title2="";
$targetop = "self";
$nsna = $nsn+1;
$mnsnid ="$nsna";
$opture="newmarquee01";
$dbswitch="$nsn";
}

//新增與編輯跑馬燈共用表格欄位
include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");	
$XoopsFormText[1]  = new XoopsFormText (_MA_NEODWADMIN_MARQUEETITLE, "content", 60, 255,$title1);   //跑馬燈標題
$XoopsFormText[2]  = new XoopsFormText (_MA_NEODWADMIN_MARQUEELINKS, "url", 60, 255,$title2);  //跑馬燈連結
$select[1] = new XoopsFormSelect (_MA_NEODWADMIN_LINKOPEN, "target", "$targetop",2);   //跑馬燈連結開啟方式
$optionsa["0"]="self";
$optionsa["1"]="blank";
$select[1]->addOptionArray($optionsa);
$time_date=date("Y-m-d H:i:s",mktime (date(H)+0, date(i), date(s), date(m), date(d), date(Y)));
$XoopsFormHidden[1] = new XoopsFormHidden("post_date", $time_date);
$XoopsFormHidden[2] = new XoopsFormHidden("mnsnid", $mnsnid);
$XoopsFormHidden[3] = new XoopsFormHidden("dbswitch", $dbswitch);
$XoopsFormHidden[4] = new XoopsFormHidden("mnsnidb", $mnsnida);
$title="$nsna";
$XoopsFormText[3]  = new XoopsFormText (_MA_NEODWADMIN_ORDER, "nnumber", 1, 255,$title);  //順序
$form = new XoopsThemeForm(_MA_NEODWADMIN_ADDMARQUEE,"form", $_SERVER['PHP_SELF']);
$form->addElement($XoopsFormText[1]);
$form->addElement($XoopsFormText[2]);
$form->addElement($select[1]);
$form->addElement($XoopsFormHidden[1]);
$form->addElement($XoopsFormHidden[2]);
$form->addElement($XoopsFormHidden[3]);
$form->addElement($XoopsFormHidden[4]);
$form->addElement($XoopsFormText[3]);
$form->setExtra('enctype="multipart/form-data"');	
$form->addElement(new XoopsFormHidden ("op", "$opture"));
$form->addElement(new XoopsFormButton ("", "", _MA_NEODWADMIN_SENT, "submit"));  //送出
  $main = $form->render(); 
  return $main;
}


function insert_marquee($a,$dbswitchok){		
  global $xoopsDB;   
switch ($a){
case "a": 
//新增內容SQL語法  
  $sql="insert into " . $xoopsDB->prefix('neothemesmarquee') . "
  (`nnumber`  ,`content`  ,  `url` ,  `target` ,  `post_date`)
  values
  ('{$_POST['nnumber']}'  , '{$_POST['content']}'  ,  '{$_POST['url']}'   ,  '{$_POST['target']}'  ,  '{$_POST['post_date']}')";
   $xoopsDB -> queryF($sql) ;

//儲存最後一次新增的nsn	
      $sql = "update ".$xoopsDB->prefix("neothemesconfig")." set   
	mnsnid = '{$dbswitchok}'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());		
break;
case "b":  	
	$sql = "update ".$xoopsDB->prefix("neothemesmarquee")." set   
	nnumber = '{$_POST['nnumber']}',
	content = '{$_POST['content']}', 	
	url= '{$_POST['url']}',
	target= '{$_POST['target']}',  
	post_date= '{$_POST['post_date']}' 		
       where  nsn= '{$dbswitchok}' ";	
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

//儲存最後一次更新的nsn	
      $sql = "update ".$xoopsDB->prefix("neothemesconfig")." set   
	mnsnid = '{$dbswitchok}' ";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());		
break;
}
}

	
xoops_cp_header();
loadModuleAdminMenu(3);

//引入CSS
include "tplthemescss.php";	

echo $main;
xoops_cp_footer();	
	?>