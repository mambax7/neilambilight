<?php
//tad老師 tad_form 模組自動更新程式範例修改

include "../class/themeset.php";

/**
 * @return bool
 */
function xoops_module_update_neothemesadmin()
{
    include XOOPS_ROOT_PATH . '/modules/neothemesadmin/class/themesset/defaultltheme.php';
    $xoops_theme = $installtheme;
    global $xoopsDB;

    if (!chk_chk1()) {
        go_update1();
    }
    go_update2();
    go_update3();
    if (!chk_chk4()) {
        go_update4();
    }
    go_update5($xoops_theme, $theme_set_allowed);
    go_update6($xoops_theme);
    go_update7($xoops_theme);
    go_update8($xoops_theme);
    if (!chk_chk9()) {
        go_update9();
    }
    if (!chk_chk10()) {
        go_update10();
    }
    if (!chk_chk11()) {
        go_update11();
    }
    go_update12();
    go_update13();
    go_update14();
    go_update15();
    go_update16();
    return true;
}

/**
 * @return bool
 */
function chk_chk1()
{
    global $xoopsDB;
    $sql    = "select count(`snid`) from " . $xoopsDB->prefix("neothemesmenu");
    $result = $xoopsDB->query($sql);
    if (empty($result)) {
        return false;
    }
    return true;
}

/**
 * @return bool
 */
function go_update1()
{
    global $xoopsDB;
    $sql = "ALTER TABLE " . $xoopsDB->prefix("neothemesmenu") . " ADD `snid` INT( 255)UNSIGNED NOT NULL";
    $xoopsDB->queryF($sql) or redirect_header(XOOPS_URL, 3, mysql_error());
    return true;
}

/*function chk_chk2(){
    global $xoopsDB;
    $sql="select nnumber from ".$xoopsDB->prefix("neothemesmenu");
    $result=$xoopsDB->query($sql);
    $type  = mysql_field_type($result, 0);
    if($type!='int') return false;	 //如果$type不等於int時，回傳return false;
    return true;
}*/

/**
 * @return bool
 */
function go_update2()
{
    global $xoopsDB;
    $sql = "ALTER TABLE " . $xoopsDB->prefix("neothemesmenu") . "
    CHANGE `nnumber` `nnumber` INT( 255)NOT NULL";
    $xoopsDB->query($sql) or die($sql);
    return true;
}

/**
 * @return bool
 */
function go_update3()
{
    global $xoopsDB;
    $dbnane = $xoopsDB->prefix('session');
    $sql    = "TRUNCATE `$dbnane`;";
    $result = $xoopsDB->query($sql);
    return true;
}

//新增neorightmenu資料表
/**
 * @return bool
 */
function chk_chk4()
{
    global $xoopsDB;
    $sql    = "select count(*) from " . $xoopsDB->prefix("neorightmenu");
    $result = $xoopsDB->query($sql);
    if (empty($result)) {
        return false;
    }
    return true;
}

function go_update4()
{
    global $xoopsDB;
    $sql = "CREATE TABLE `" . $xoopsDB->prefix("neorightmenu") . "` (
   `nsn` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `target` varchar(255) NOT NULL,
  `snid` int(255)  NOT NULL,   
  PRIMARY KEY (`nsn`)
)  ENGINE=MyISAM;";
    $xoopsDB->queryF($sql);
}

/**
 * @param $xoops_theme
 * @param $theme_set_allowed
 * @return bool
 */
function go_update5($xoops_theme, $theme_set_allowed)
{
    global $xoopsDB;

    $sql = "ALTER TABLE " . $xoopsDB->prefix("neothemesconfig") . " 
	ADD `line` varchar(255) NOT NULL DEFAULT '' AFTER `menuid`,
	ADD `fburl` varchar(255) NOT NULL DEFAULT '' AFTER `line`,
	ADD `fbfansurl` varchar(255) NOT NULL DEFAULT '' AFTER `fburl`,
	ADD `contactus` varchar(255) NOT NULL DEFAULT '' AFTER `fbfansurl`";
    $xoopsDB->queryF($sql);
    $sql = "ALTER TABLE " . $xoopsDB->prefix("neothemeskeyword") . " 
	ADD `title` varchar(255) NOT NULL DEFAULT '' AFTER `wdescription`";
    $xoopsDB->queryF($sql);

    $sql = "update " . $xoopsDB->prefix("neothemesconfig") . " set `field`='02;0;1;0;b;b;b;0;0;7;1;0;0;1;1;1;1;01;;;1;1;1;1;1;1;1;1;0'";
    $xoopsDB->queryF($sql);

    $sql = "update " . $xoopsDB->prefix("config") . " set `conf_value`='{$xoops_theme}' where  conf_name = 'theme_set' ";
    $xoopsDB->queryF($sql);

    $sql = "update " . $xoopsDB->prefix("config") . " set `conf_value`='$theme_set_allowed' where  conf_name = 'theme_set_allowed' ";
    $xoopsDB->queryF($sql);

    return true;
}

/**
 * @param $xoops_theme
 * @return bool
 */
function go_update6($xoops_theme)
{
    //$xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];
    copy(XOOPS_ROOT_PATH . '/themes/' . $xoops_theme . '/default/xo_metas.tpl', XOOPS_ROOT_PATH . '/modules/system/themes/default/xotpl/xo_metas.tpl');

    return true;
}

/**
 * @param $xoops_theme
 * @return bool
 */
function go_update7($xoops_theme)
{
    global $xoopsDB;

    //判斷tadtools有沒有安裝
    $module_handler = &xoops_getHandler('module');
    $tadtools       = &$module_handler->getByDirname('tadtools');

    empty($tadtools) ? $ifinstallation = true : $ifinstallation = false; // get TRUE

    if (!empty($tadtools)) {
        $sql = "select tt_theme from " . $xoopsDB->prefix('tadtools_setup') . " where `tt_theme` = '{$xoops_theme}'";
        $result = $xoopsDB->query($sql) or die($sql);
        $tt_themeNY = $xoopsDB->getRowsNum($result);

        if (empty($tt_themeNY)) {
            $sql = "insert into " . $xoopsDB->prefix('tadtools_setup') . "
 (`tt_theme`  ,  `tt_use_bootstrap` ,  `tt_bootstrap_color` ,  `tt_theme_kind`)
  values
  ('{$xoops_theme}'  ,  '1'  ,  'bootstrap3' ,  'bootstrap3')";
            $xoopsDB->query($sql);
        }
    } else {
        redirect_header('http://120.115.2.90/modules/tad_modules/index.php?module_sn=1', 0, _MI_NEODWADMIN_TADTOOLS);
    }

    return true;
}

/**
 * @param $xoops_theme
 * @return bool
 */
function go_update8($xoops_theme)
{
    global $xoopsDB;

    $sql    = "select flashtext from " . $xoopsDB->prefix("neothemesflash");
    $result = $xoopsDB->query($sql);

    if (!empty($result)) {
        $sql = "ALTER TABLE `" . $xoopsDB->prefix("neothemesflash") . "` CHANGE `flashtext` `themesid` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''";
        $xoopsDB->queryF($sql) or redirect_header(XOOPS_URL, 3, $xoopsDB->error());
    }

    return true;
}

//新增neoblockmenusort資料表
/**
 * @return bool
 */
function chk_chk9()
{
    global $xoopsDB;
    $sql    = "select count(*) from " . $xoopsDB->prefix("neoblockmenusort");
    $result = $xoopsDB->query($sql);
    if (empty($result)) {
        return false;
    }
    return true;
}

function go_update9()
{
    global $xoopsDB;
    $sql = "CREATE TABLE `" . $xoopsDB->prefix("neoblockmenusort") . "` (
   `sortid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `sorttitle` varchar(255) NOT NULL,
  `sortimg` varchar(255) NOT NULL,
  `sorting` int(255)  NOT NULL,   
  PRIMARY KEY (`sortid`)
) ENGINE=MyISAM;";
    $xoopsDB->queryF($sql);
}

//新增neoblockmenubutton資料表
/**
 * @return bool
 */
function chk_chk10()
{
    global $xoopsDB;
    $sql    = "select count(*) from " . $xoopsDB->prefix("neoblockmenubutton");
    $result = $xoopsDB->query($sql);
    if (empty($result)) {
        return false;
    }
    return true;
}

function go_update10()
{
    global $xoopsDB;
    $sql = "CREATE TABLE `" . $xoopsDB->prefix("neoblockmenubutton") . "` (
  `bid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `sortid` int(255)  NOT NULL,   
  `buttontitle` varchar(255) NOT NULL,
  `buttonurl` varchar(255) NOT NULL,
  `target` enum('0','1') NOT NULL default '0',  
  `sortyn` enum('y','n') NOT NULL default 'n',
  `modulesid` varchar(255) NOT NULL,  
  `variableid` varchar(255) NOT NULL,    
  `orderid` int(255)  NOT NULL,   
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM;";
    $xoopsDB->queryF($sql);
}

//新增neocontactusform資料表
/**
 * @return bool
 */
function chk_chk11()
{
    global $xoopsDB;
    $sql    = "select count(*) from " . $xoopsDB->prefix("neocontactusform");
    $result = $xoopsDB->query($sql);
    if (empty($result)) {
        return false;
    }
    return true;
}

function go_update11()
{
    global $xoopsDB;
    $sql = "CREATE TABLE `" . $xoopsDB->prefix("neocontactusform") . "` (
  `cfid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `tel_user` varchar(255) NOT NULL,
  `citytel_user` varchar(255) NOT NULL,  
  `radiog` enum('male','female') NOT NULL,  
  `texe_user` text NOT NULL,
  `cfidtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `readtrue` int(5)  NOT NULL,   
   PRIMARY KEY (`cfid`)
) ENGINE=MyISAM;";
    $xoopsDB->queryF($sql);
}

/**
 * @return bool
 */
function go_update12()
{
    global $xoopsDB;
    //搜尋模組ID
    $sql = "select mid   from " . $xoopsDB->prefix('modules') . " where `dirname` = 'neothemesadmin'";
    $result = $xoopsDB->query($sql) or die($sql);
    list($mid) = $xoopsDB->fetchRow($result);

    $sql = "insert into " . $xoopsDB->prefix('group_permission') . "
  (`gperm_groupid`  ,`gperm_itemid`  ,  `gperm_modid`,  `gperm_name`)
  values
  ('2'  , '{$mid}'  ,  '1' ,  'module_read')";
    $xoopsDB->queryF($sql);

    $sql = "insert into " . $xoopsDB->prefix('group_permission') . "
  (`gperm_groupid`  ,`gperm_itemid`  ,  `gperm_modid`,  `gperm_name`)
  values
  ('3'  , '{$mid}'  ,  '1' ,  'module_read')";
    $xoopsDB->queryF($sql);

    return true;
}

//ALTER TABLE `x769xoops258_neoblockmenusort` ADD `radiogstyle` ENUM('text','img') NOT NULL DEFAULT 'text' AFTER `sorting`;

//新增neoblockmenusort資料表

/**
 * @return bool
 */
function go_update13()
{
    global $xoopsDB;

    $sql    = "select radiogstyle from " . $xoopsDB->prefix("neoblockmenusort");
    $result = $xoopsDB->query($sql);
    if (empty($result)) {
        $sql = "ALTER TABLE " . $xoopsDB->prefix("neoblockmenusort") . " 
	ADD `radiogstyle` enum('text','img') NOT NULL default 'text' AFTER `sorting`,
	ADD `imgstyle` enum('random','sorting') NOT NULL default 'sorting' AFTER `radiogstyle`";
        $xoopsDB->queryF($sql);
    }

    $sql    = "select buttonimg from " . $xoopsDB->prefix("neoblockmenubutton");
    $result = $xoopsDB->query($sql);
    if (empty($result)) {
        $sql = "ALTER TABLE " . $xoopsDB->prefix("neoblockmenubutton") . " 
	ADD `buttonimg` varchar(255) NOT NULL AFTER `orderid`";
        $xoopsDB->queryF($sql);
    }

    return true;
}

/**
 * @return bool
 */
function go_update14()
{
    $xoopsversion = preg_replace('/XOOPS /', '', XOOPS_VERSION);

    if ($xoopsversion < '2.5.8') {
        redirect_header('http://120.115.2.90/modules/tad_uploader/index.php?of_cat_sn=16', 0, _MI_NEODWADMIN_XOOPSUPGRADE);
    }
    return true;
}

/**
 * @return bool
 */
function go_update15()
{
    global $xoopsDB;
    $sql = "ALTER TABLE `" . $xoopsDB->prefix("neoblockmenubutton") . "` CHANGE `sortyn` `sortyn` ENUM('y','n','z') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'n'";

    $xoopsDB->queryF($sql);

    return true;
}

/**
 * @return bool
 */
function go_update16()
{
    global $xoopsDB;

    $sql    = "select  count(`contactmatters`) from " . $xoopsDB->prefix("neothemesconfig");
    $result = $xoopsDB->query($sql);

    if (empty($result)) {
        $sql = "ALTER TABLE " . $xoopsDB->prefix("neothemesconfig") . " 
	ADD `contactmatters` varchar(255) NOT NULL DEFAULT '' AFTER `contactus`";
        $xoopsDB->queryF($sql);

        $sql = "ALTER TABLE " . $xoopsDB->prefix("neocontactusform") . " 
	ADD `contactmatters`  varchar(255) NOT NULL default '' AFTER `readtrue`,
	ADD `replytext`  longtext NOT NULL AFTER `contactmatters`,		
	ADD `replytime`  datetime NOT NULL default '0000-00-00 00:00:00' AFTER `replytext`";
        $xoopsDB->queryF($sql);

        $sql = "ALTER TABLE " . $xoopsDB->prefix("neothemesmarquee") . " 
	ADD `enable`  enum('1','0') NOT NULL default '1' AFTER `post_date`";
        $xoopsDB->queryF($sql);
        $sql = "update " . $xoopsDB->prefix("neothemesconfig") . " set `mnsnid`=''";
        $xoopsDB->queryF($sql);
    }

    if (file_exists(XOOPS_ROOT_PATH . '/modules/neothemesadmin/contactusformpost.php')) {
        unlink(XOOPS_ROOT_PATH . '/modules/neothemesadmin/contactusformpost.php');//將檔案刪除
    }
    if (file_exists(XOOPS_ROOT_PATH . '/modules/neothemesadmin/newmarquee.php')) {
        unlink(XOOPS_ROOT_PATH . '/modules/neothemesadmin/newmarquee.php');//將檔案刪除
    }
    return true;
}


