<?php
/*
 * Suico theme
 * In memory of Marcello Brandao
 * @copyright       (c) 2000-2016 XOOPS Project (www.xoops.org)
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license 3.0
 * @package         themes
 * @since           2.5.x
 * @author          Kris <http://www.xoofoo.org/>
 * @maintained      The XOOPS Project (http://xoops.org)
 */
$xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];
$xoopsurl=XOOPS_URL;
//headertpl.tpl
define('_THEME_WELCOME01', 'Welcome to visit:');
define('_THEME_WELCOME02', 'Website');
define('_THEME_LINE01', 'Join');
define('_THEME_LINE02', 'Friends');
define('_THEME_FB01', 'Using FB-messages with');
define('_THEME_FB02', 'Conversation');
define('_THEME_USER01', 'Hello');
define('_THEME_USER02', ' [Accounting]');
define('_THEME_USERPM', 'Inbox');
define('_THEME_THEMEADMIN', 'Go to neothemesadmin Scene Management');
define('_THEME_KEYWORDBUTTON', 'Site keyword description');

define('_THEME_MENU01', 'Site menu');
define('_THEME_MENU02', 'Return to homepage');
define('_THEME_MENU02LINK','index.php');
define('_THEME_MENU03', 'Management Background');
define('_THEME_MENU04', 'Website Logout');
define('_THEME_MENU04LINK','user.php?op=logout');
define('_THEME_MENU05', 'Website Login');
define('_THEME_MENU05LINK','user.php');
define('_THEME_MENU06', 'Flow Statistics');
define('_THEME_MENU06LINK','modules/logcounterx/');
define('_THEME_MENU07', 'Site Navigation');
define('_THEME_MENU07LINK','modules/tad_sitemap/');
define('_THEME_MENU08', 'Account Manager');
define('_THEME_MENU08LINK','user.php');
define('_THEME_MENU09', 'Registration Member');
define('_THEME_MENU10', 'Website Maintenance');

define('_THEME_SEARCCH00', 'Open Site Search');
define('_THEME_SEARCCH01', 'Close Site Search');

//keywordstpl.tpl
define('_THEME_Close', 'Close block');
define('_THEME_KEYWORDS','Keyword:');

//searchtpl.tpl
define('_THEME_SEARCH01', 'Website Search:');
define('_THEME_SEARCH02', 'Send search');
define('_THEME_SEARCH03', 'Please enter a search key');

/*===Registration form anti-robot ========*/
define('_MD_NOTWELCOME', 'Robots do not register');
define('_MD_IMNOTAROBOT', 'I am not a robot (checked)');

/*==Back to previous page and return to the home page =====*/
define('_MD_GLYPHICONARROWLEFT', 'Return to previous page');
define('_MD_GLYPHICONHOME', 'Return to homepage');


/*========== Scene is added to tadtools==========*/
define('_MD_JOINTADTOOLS',"You haven't added the neilambilight scene to tadtools, so there will be a blank screen. No need to worry, please go to Settings and join tadtools to restore normal <a href={$xoopsurl}/modules/neothemesadmin/admin /jointadtools.php>[Go to Settings]</a>");


//descriptiontpl.tpl
define('_THEME_DESCRIPTION', 'Use the neilambilight set must be installed with the tadtools module. The set and module functions will work properly. You are not currently installed. Please <a href="http://120.115.2.90/modules/tad_modules/index .php?module_sn=1" target="_blank">Go to download the tadtools module</a> and install it.');


//playerimgtpl.tpl
define('_THEME_IMGADMIN', 'Manage Player');

//footertpl.tpl
define('_THEME_NEODW', 'Website Design: Neil Website Design Workshop');
define('_THEME_CREATIVECOMMONS', $xoops_theme.' Scenes are marked with a CC license name - shared in the same way');
define('_THEME_FOOTADMIN', 'Manage footer content');
define('_THEME_TOP', 'Back to the top');
define('_THEME_GOINDEX', 'Return to homepage');

//Development unit description
define('_THEME_TVersion', 'Set version:');
define('_THEME_TVersiona',$xoops_theme);
define('_THEME_OKbrowser', 'For browsers: IE11, IE10, IE9, Firefox, Google');
define('_THEME_DevelopmentUnitc','<strong>Xoops<a title="NeilWeb Design Workshop" target="_blank" href="http://neodw.com/">Website Design</a>:<a Title="Neil Web Design Workshop" target="_blank" href="http://neodw.com/">Neil Web Design Workshop</a></strong> ');
define('_THEME_Versionxoops', 'Xoops version:');
define('_THEME_NCreator',"Xoops Website Scene Designer:");
define('_THEME_Designer',"Xu Jiayu Neilhsu");
define('_THEME_langxoops', 'Website Language:');
define('_THEME_SPONSORSHIPLIST', 'Set Sponsored Development List');


//sponsorshiplist.tpl
define('_THEME_SPONSORLIST', $xoops_theme.' Scene Development Sponsorship List');
define('_THEME_DESIGNER', $xoops_theme.' Scene designer: Xu Jiayu Neil hsu');

//Block login
define('THEME_LOGIN', 'Your account');
define('THEME_PASS', 'Your password');
define('THEME_MAIL', 'Enter your email');
define('THEME_MAILTEXT', 'Email:');
//system
define('THEME_SEARCH_TEXT', 'Search...');
define('THEME_TOPBOXSHOW', 'Turn on the upper block');
/*
// system_notification_select.html
define('THEME_SHOWHIDE_NOTIFICATION', 'Show/Hide');
define('THEME_SHOWHIDE_NOTIFICATION_DESC', 'Show or hide notification options');
define('THEME_RSS', 'Feed RSS');
define('THEME_SEARCH', 'Search');
define('THEME_DESC_SEARCH', 'Search in site');
define('THEME_KEYWORDS', 'Enter keywords');

// blockszone and centerblocks.html
define('THEME_THISBLOCK_EDIT', 'Edit this block');
define('THEME_VIEWALL', 'Watch all');
*/

// blocks
define('THEME_NOBOX', '[nobox]');
define('THEME_BLOCKSADMIN01A', 'Open Block Management');
define('THEME_BLOCKSADMIN01B', 'Close block management');
define('THEME_BLOCKSADMIN02', 'Edit Block');
define('THEME_BLOCKSADMIN03', 'Copy block');
define('THEME_BLOCKSADMIN04', 'Module Management');
define('THEME_BLOCKSADMIN05', 'Delete blocks');
define('THEME_FBBUTTON', 'The FB page');
define('THEME_CONTACTUS', 'Contact Us');




/* ------------------- xo_footerstatic.html ------------------- */
define('_THEME_INBOX', 'View your message');
define('_THEME_INBOX_NOTREAD', 'Unread message');
define('_THEME_NOTIFICATIONS', 'View your notification message');
define('_THEME_PROFILE', 'View Account');
define('_THEME_ADMINISTRATION', 'Management Area');
define('_THEME_LOGOUT', 'Logout');
define('THEME_EDITPROFILE', 'Edit Account');
define('THEME_USER', 'User');
define('THEME_CPHOME', 'Management Area');
define('THEME_BANS', 'Ad management');
define('THEME_BKAD', 'Block Management');
define('THEME_ADGS', 'Group Management');
define('THEME_PREF', 'Preferences');
define('THEME_INSTALLEDMODULES', 'Module Management');
define('THEME_IMAGES', 'Avatar');
define('THEME_MDAD', 'Module');
define('THEME_SMLS', 'Emoji Management');
define('THEME_RANK', 'user level');
define('THEME_EUSER', 'Edit User');
define('THEME_FINDUSER', 'Search User');
define('THEME_MLUS', 'Send E-mail');
define('THEME_AVATARS', 'Avatar Management');
define('THEME_TPLS', 'Template Management');
define('THEME_COMMENTS', 'Review Manager');
define('THEME_ADMTOOLS', 'Tools'); // add for xoops 2.5.0
define('THEME_ADMCLEAN', 'Maintain'); // add for xoops 2.5.0
define('THEME_SYSSETTING', 'System Module Settings'); // add for xoops 2.5.0
define('THEME_UPTOP', 'To the top'); // add for xoops 2.5.0
