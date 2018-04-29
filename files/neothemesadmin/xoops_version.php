<?php
include_once XOOPS_ROOT_PATH . '/modules/neothemesadmin/language/' . $xoopsConfig['language'] . '/blocks.php';

$modversion = array();

//---模組基本資訊---//
$modversion['name']        = _MI_NEODWADMIN_MODULES;   //Neodw佈景管理模組
$modversion['version']     = _MA_NEODWADMIN_MODULESVERSION;
$modversion['description'] = _MI_NEODWADMIN_MODULESADMIN;
$modversion['author']      = _MI_NEODWADMIN_XUJIAYUNEOHSU;
//$modversion['credits'] = _MI_相關有功人員;
$modversion['help']        = 'page=help';
$modversion['license']     = 'GNU GPL 2.0';
$modversion['license_url'] = 'www.gnu.org/licenses/gpl-2.0.html/';
$modversion['image']       = "images/logo.png";
$modversion['dirname']     = basename(__DIR__);

//---模組狀態資訊---//
$modversion['release_date']        = '2017/6/2';
$modversion['module_website_url']  = 'http://neodw.com/neil/';
$modversion['module_website_name'] = _MI_NEILEWB;
$modversion['module_status']       = 'release';
$modversion['author_website_url']  = 'http://網址/';
$modversion['author_website_name'] = _MI_NEILEWB;
$modversion['min_php']             = 5.6;
$modversion['min_xoops']           = '2.58';

//---後台使用系統選單---//
$modversion['system_menu'] = 0;

//---自動執行設定---//
$modversion['onUpdate']  = "include/onUpdate.php";
$modversion['onInstall'] = "include/onInstall.php";

//訪客使用權限
$modversion['hasSearch'] = 1;

//---資料表架構---//
$modversion['sqlfile']['mysql'] = "sql/neothemesconfig.sql";
$modversion['tables']           = array(
    'neothemesconfig',
    'neothemeskeyword',
    'neothemesmarquee',
    'neothemesflash',
    'neothemesmenu',
    'neorightmenu',
    'neoblockmenusort',
    'neoblockmenubutton',
    'neocontactusform'
);

//---管理介面設定---//
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu']  = "admin/menu.php";

//---前台主選單設定---//
$modversion['hasMain'] = 1;

//---樣板設定---//
$modversion['templates']                    = array();
$i                                          = 0;
$modversion['templates'][$i]['file']        = 'contactusform.tpl';
$modversion['templates'][$i]['description'] = '_MI_CONTACTUSFORM';

//---偏好設定---//
//$modversion['config'] = array();

$modversion['blocks'] = array();
$i                    = 1;

/*=================按鈕區塊====================*/
$modversion['blocks'][$i]['file']        = "neoblockmenubutton.php";
$modversion['blocks'][$i]['name']        = _MI_NEODWADMIN_MENUBLOCKS;
$modversion['blocks'][$i]['description'] = _MI_NEODWADMIN_MENUBLOCKS1;
$modversion['blocks'][$i]['show_func']   = "neoblockmenubutton_block_show";
$modversion['blocks'][$i]['template']    = "neoblockmenubutton.tpl";
$modversion['blocks'][$i]['edit_func']   = "neoblockmenubutton_block_edit";
$modversion['blocks'][$i]['options']     = "|20";
$i++;

/*=================多層按鈕區塊====================*/
$modversion['blocks'][$i]['file']        = "neoblockmenulayers.php";
$modversion['blocks'][$i]['name']        = _MI_NEOBLOCKMENULAYERS;
$modversion['blocks'][$i]['description'] = _MI_NEOBLOCKMENULAYERS1;
$modversion['blocks'][$i]['show_func']   = "neoblockmenulayers_block_show";
$modversion['blocks'][$i]['template']    = "neoblockmenulayers.tpl";
$modversion['blocks'][$i]['edit_func']   = "neoblockmenulayers_block_edit";
$modversion['blocks'][$i]['options']     = "20|10|";
$i++;

/*============警示區塊===================*/
$modversion['blocks'][$i]['file']        = "alertsncdr.php";
$modversion['blocks'][$i]['name']        = _MI_ALERTSNCDR;
$modversion['blocks'][$i]['description'] = _MI_ALERTSNCDR1;
$modversion['blocks'][$i]['show_func']   = "alertsncdr_block_show";
$modversion['blocks'][$i]['template']    = "alertsncdr.tpl";
$modversion['blocks'][$i]['edit_func']   = "alertsncdr_block_edit";
$modversion['blocks'][$i]['options']     = "||";
$i++;
