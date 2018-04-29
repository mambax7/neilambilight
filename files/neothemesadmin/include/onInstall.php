<?php
function xoops_module_install_neothemesadmin(&$module)
{
global  $xoopsDB;
include XOOPS_ROOT_PATH . '/modules/neothemesadmin/class/themesset/defaultltheme.php';



    
    
$xoops_theme = $installtheme;

$sql = "update " . $xoopsDB->prefix("config") . " set `conf_value`='{$xoops_theme}' where  conf_name = 'theme_set' ";
  $xoopsDB->queryF($sql);

  $sql = "update " . $xoopsDB->prefix("config") . " set `conf_value`='$theme_set_allowed' where  conf_name = 'theme_set_allowed' ";
    $xoopsDB->queryF($sql);

//判斷tadtools有沒有安裝
$module_handler = &xoops_gethandler('module');
$tadtools= &$module_handler->getByDirname('tadtools');

empty($tadtools) ? $ifinstallation=true : $ifinstallation=false; // get TRUE

if(!empty($tadtools)){
$sql = "select tt_theme from " . $xoopsDB->prefix('tadtools_setup')   . " where `tt_theme` = '{$xoops_theme}'";
 $result = $xoopsDB -> query($sql) or die($sql);  
$tt_themeNY = $xoopsDB -> getRowsNum($result);  

if(empty($tt_themeNY)){
$sql="insert into " . $xoopsDB->prefix('tadtools_setup') . "
 (`tt_theme`  ,  `tt_use_bootstrap` ,  `tt_bootstrap_color` ,  `tt_theme_kind`)
  values
  ('{$xoops_theme}'  ,  '1'  ,  'bootstrap3' ,  'bootstrap3')";
$xoopsDB->query($sql);
}  
}else{
redirect_header('http://120.115.2.90/modules/tad_modules/index.php?module_sn=1', 0 , _MI_NEODWADMIN_TADTOOLS);

}  

copy(XOOPS_ROOT_PATH.'/themes/'.$xoops_theme.'/default/xo_metas.tpl' , XOOPS_ROOT_PATH.'/modules/system/themes/default/xotpl/xo_metas.tpl');

//判斷Xoops版本
$xoopsversion = preg_replace('/XOOPS /', '', XOOPS_VERSION);     

if($xoopsversion < '2.5.8'){
redirect_header('http://120.115.2.90/modules/tad_uploader/index.php?of_cat_sn=16', 0 , _MI_NEODWADMIN_XOOPSUPGRADE);


}


	return true;
}
