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
define('_THEME_WELCOME01', '歡迎參觀：');
define('_THEME_WELCOME02', '網站');
define('_THEME_LINE01', '加入');
define('_THEME_LINE02', '好友');
define('_THEME_FB01', '使用FB-messages與');
define('_THEME_FB02', '交談');
define('_THEME_USER01', '您好');
define('_THEME_USER02', ' [帳號管理]');
define('_THEME_USERPM','收件夾');
define('_THEME_THEMEADMIN','前往neothemesadmin佈景管理');
define('_THEME_KEYWORDBUTTON','網站關鍵字說明');

define('_THEME_MENU01','網站選單');
define('_THEME_MENU02','返回首頁');
define('_THEME_MENU02LINK','index.php');
define('_THEME_MENU03','管理後台');
define('_THEME_MENU04','網站登出');
define('_THEME_MENU04LINK','user.php?op=logout');
define('_THEME_MENU05','網站登入');
define('_THEME_MENU05LINK','user.php');
define('_THEME_MENU06','流量統計');
define('_THEME_MENU06LINK','modules/logcounterx/'); 
define('_THEME_MENU07','網站導覽');
define('_THEME_MENU07LINK','modules/tad_sitemap/'); 
define('_THEME_MENU08','帳號管理');
define('_THEME_MENU08LINK','user.php'); 
define('_THEME_MENU09','註冊會員');
define('_THEME_MENU10','網站維護');

define('_THEME_SEARCCH01','開啟網站搜尋'); 
define('_THEME_SEARCCH01','關閉網站搜尋'); 

//keywordstpl.tpl
define('_THEME_Close','關閉區塊'); 
define('_THEME_KEYWORDS','關鍵字：'); 

//searchtpl.tpl
define('_THEME_SEARCH01','網站搜尋：'); 
define('_THEME_SEARCH02','送出搜尋'); 
define('_THEME_SEARCH03','請輸入搜尋關鍵字'); 

/*===註冊表單防機器人========*/
define('_MD_NOTWELCOME','機器人請勿註冊'); 
define('_MD_IMNOTAROBOT','我不是機器人(請勾選)'); 

/*==返回上一頁跟返回首頁=====*/
define('_MD_GLYPHICONARROWLEFT','返回上一頁'); 
define('_MD_GLYPHICONHOME','返回首頁'); 


/*==========佈景加入tadtools==========*/
define('_MD_JOINTADTOOLS',"您尚未吧neilambilight佈景加入到tadtools中，所以會出現空白畫面，不用緊張，請您前往設定加入tadtools即可恢復正常<a href={$xoopsurl}/modules/neothemesadmin/admin/jointadtools.php>【前往設定】</a>"); 


//descriptiontpl.tpl
define('_THEME_DESCRIPTION','使用neilambilight佈景需搭配安裝tadtools模組，佈景及模組功能才能正常使用，您目前尚未安裝，請<a href="http://120.115.2.90/modules/tad_modules/index.php?module_sn=1" target="_blank">【前往下載tadtools模組】</a>並安裝。'); 


//playerimgtpl.tpl
define('_THEME_IMGADMIN','管理播放器'); 

//footertpl.tpl
define('_THEME_NEODW','網站佈景設計：Neil網站設計工坊'); 
define('_THEME_CREATIVECOMMONS',$xoops_theme.'佈景採用CC授權名標示─相同方式分享'); 
define('_THEME_FOOTADMIN','管理頁腳內容'); 
define('_THEME_TOP','返回頂端');
define('_THEME_GOINDEX','返回首頁');


//開發單位說明
define('_THEME_TVersion','佈景版本：');
define('_THEME_TVersiona',$xoops_theme);
define('_THEME_OKbrowser','適用瀏覽器：IE11、IE10、IE9、Firefox、Google');
define('_THEME_DevelopmentUnitc','<strong>Xoops<a  title="Neil網站設計工坊"  target="_blank" href="http://neodw.com/">網站佈景設計</a>：<a  title="Neil網站設計工坊"  target="_blank" href="http://neodw.com/">Neil網站設計工坊</a></strong> ');
define('_THEME_Versionxoops','Xoops版本：');
define('_THEME_NCreator',"Xoops網站佈景設計者：");
define('_THEME_Designer',"徐嘉裕 Neilhsu");
define('_THEME_langxoops','網站語系：');
define('_THEME_SPONSORSHIPLIST','佈景贊助開發名單');


//sponsorshiplist.tpl
define('_THEME_SPONSORLIST',$xoops_theme.'佈景開發贊助名單'); 
define('_THEME_DESIGNER',$xoops_theme.'佈景設計者：徐嘉裕 Neil hsu'); 

//Block login
define('THEME_LOGIN', '您的帳號');
define('THEME_PASS', '您的密碼');
define('THEME_MAIL', '輸入您的電子郵件');
define('THEME_MAILTEXT', '電子郵件：');
//system
define('THEME_SEARCH_TEXT', '搜尋...');
define('THEME_TOPBOXSHOW', '開啟上方區塊');
/*
// system_notification_select.html
define('THEME_SHOWHIDE_NOTIFICATION', '顯示 / 隱藏');
define('THEME_SHOWHIDE_NOTIFICATION_DESC', '顯示或隱藏通知選項');
define('THEME_RSS', 'Feed RSS');
define('THEME_SEARCH', '搜尋');
define('THEME_DESC_SEARCH', '站內搜尋');
define('THEME_KEYWORDS', '輸入關鍵字');

// blockszone and centerblocks.html
define('THEME_THISBLOCK_EDIT', '編輯此區塊');
define('THEME_VIEWALL', '觀看全部');
*/

// blocks
define('THEME_NOBOX', '[nobox]');
define('THEME_BLOCKSADMIN01A', '開啟區塊管理');
define('THEME_BLOCKSADMIN01B', '關閉區塊管理');
define('THEME_BLOCKSADMIN02', '編輯區塊');
define('THEME_BLOCKSADMIN03', '複製區塊');
define('THEME_BLOCKSADMIN04', '模組管理');
define('THEME_BLOCKSADMIN05', '刪除區塊');
define('THEME_FBBUTTON', '的FB網頁');
define('THEME_CONTACTUS', '聯絡我們');




/* ------------------- xo_footerstatic.html ------------------- */
define('_THEME_INBOX', '查看您的訊息');
define('_THEME_INBOX_NOTREAD', '未閱讀的訊息');
define('_THEME_NOTIFICATIONS', '查看您的通知訊息');
define('_THEME_PROFILE', '檢視帳號');
define('_THEME_ADMINISTRATION', '管理區');
define('_THEME_LOGOUT', '登出');
define('THEME_EDITPROFILE', '編輯帳號');
define('THEME_USER', '使用者');
define('THEME_CPHOME', '管理區');
define('THEME_BANS', '廣告管理');
define('THEME_BKAD', '區塊管理');
define('THEME_ADGS', '群組管理');
define('THEME_PREF', '偏好設定');
define('THEME_INSTALLEDMODULES', '模組管理');
define('THEME_IMAGES', '頭像');
define('THEME_MDAD', '模組');
define('THEME_SMLS', '表情圖管理');
define('THEME_RANK', '使用者等級');
define('THEME_EUSER', '編輯使用者');
define('THEME_FINDUSER', '搜尋使用者');
define('THEME_MLUS', '傳送電子郵件');
define('THEME_AVATARS', '頭像管理');
define('THEME_TPLS', '模板管理');
define('THEME_COMMENTS', '評語管理');
define('THEME_ADMTOOLS', '工具'); // add for xoops 2.5.0
define('THEME_ADMCLEAN', '維護'); // add for xoops 2.5.0
define('THEME_SYSSETTING', '系統模組設定'); // add for xoops 2.5.0
define('THEME_UPTOP', '到頂端'); // add for xoops 2.5.0
