<?php
include "../../../include/cp_header.php";
include "../function.php";


include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";

include "../class/function.php";
include "../class/themeset.php";
include "../class/selectdb.php";


$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$op1=(empty($_REQUEST['op1']))?"":$_REQUEST['op1'];


switch ($op){
 case "themesname":   	  
 	 

snidup($op1); 
redirect_header(XOOPS_URL. '/modules/neothemesadmin/admin/index.php',0 , _MA_NEODWADMIN_SHBU);    //設定已更新
break;

 default:
$main=jointadtools();
}







function jointadtools(){	


 global $xoopsDB;  
 
$module_handler = &xoops_gethandler('module');
$tadtools= &$module_handler->getByDirname('tadtools');


if(!empty($tadtools)){
$sqlg = "select tt_theme from " . $xoopsDB->prefix('tadtools_setup')   . " where `tt_theme_kind` = 'html'";
$resultg = $xoopsDB -> query($sqlg) or die($sqlg);  
 while(list($tt_theme) = $xoopsDB -> fetchRow($resultg)){  
$tt_themeok[]=$tt_theme;  
 }
}else{
redirect_header(XOOPS_URL. '/modules/neothemesadmin/admin/index.php', 0 , "請您先安裝tadtools2.74版(包括以上)模組" );

}
//先建構class($themesetclass)
$themesetclass   = new  themesetclass;  
$topvsplit =$themesetclass-> themespublicb($variableok,$setting); 
list($variableoka,$settinga) = $topvsplit;
$variablesplit=preg_split('/;/',$variableoka); 


$themesname=$variablesplit[10];          

	
if (in_array("$themesname", $tt_themeok)) {
redirect_header(XOOPS_URL. '/modules/neothemesadmin/admin/index.php', 0 , "{$themesname}佈景已經加入tadtools模組中了" );
}else{




$divcenter.="	<div id='themesname'><form method='post'  action='{$_SERVER['PHP_SELF']}'> 
<h3>將{$themesname}佈景加到tadtools模組中</h3>
     <input type='hidden' name='op' value='themesname'>
     <input type='hidden' name='op1' value='{$themesname}'>  	 
         <input type='submit' value='送出'>   		  	  
  	  </form></div>";  





}	
	
	
	
	
	
	




return $divcenter;
}



function snidup($op1){
  global $xoopsDB; 
    
$sql="insert into " . $xoopsDB->prefix('tadtools_setup') . "
 (`tt_theme`  ,  `tt_use_bootstrap` ,  `tt_bootstrap_color` ,  `tt_theme_kind`)
  values
  ('{$op1}'  ,  '1'  ,  'bootstrap3' ,  'bootstrap3')";
$xoopsDB->query($sql);



	}









//引入CSS


	
xoops_cp_header();
loadModuleAdminMenu(7);
include "tplthemescss.php";	



echo $main;
xoops_cp_footer();
	
	
	?>