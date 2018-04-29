<?php		
include_once XOOPS_ROOT_PATH."/modules/neillibrary/language/{$xoopsConfig['language']}/shared.php";	
$xoops_theme = $GLOBALS['xoopsConfig']['theme_set'] ;	
			
//index.php
define("_MA_NEODWADMIN_SCENESETTING",	"Scene setting");	
define("_MA_NEODWADMIN_KEYWORDMANAGEMENT",	"Keyword Management");		
define("_MA_NEODWADMIN_MARQUEEMANAGEMENT",	"Marquee Management");		
define("_MA_NEODWADMIN_FLASHIMAGE",	"Flash image management");		
define("_MA_NEODWADMIN_WEBSITEMENU","Site menu management");
define("_MA_NEODWADMIN_BLOCKMENU","Block Menu Management");
define("_MA_NEODWADMIN_REPORTAPROBLEM","Report a problem");		
define("_MA_NEODWADMIN_HOME","Home");	
define("_MA_NEODWADMIN_DEVELOPMENTUNIT","Development Unit:");		
define("_MA_NEODWADMIN_NEODW","Neil website design workshop");			
define("_MA_NEODWADMIN_DEVELOPER","Developer:");		
define("_MA_NEODWADMIN_NEOHSU","Xu Jiayu (Neil Hsu)");	
define("_MA_NEODWADMIN_CONTACT","Contact the developer");	
define("_MA_NEODWADMIN_MODULENAME","Module name: Neodw themes admin modules");		
define("_MA_NEODWADMIN_MODULEVERSIONRC6","Module version:1.0");		
define("_MA_NEODWADMIN_LICENSE","License：");	
define("_MA_NEODWADMIN_CCLICENSE","Commons license - Attribution - Share Alike 3.0");	
define("_MA_NEODWADMIN_THECURRENTSETS","The current sets：");	
define("_MA_NEODWADMIN_SPONSOR","Sponsor us");	
	
//settings.php
define("_MA_NEODWADMIN_SHBU",	"Settings have been updated");
define("_MA_NEODWADMIN_STYLE",	"Scene style settings");
define("_MA_NEODWADMIN_YSENOIE6",   "Whether or not to enable NO-IE6 settings");
define("_MA_NEODWADMIN_SEARCH",	 "Whether to display the search block on the FLASH");
define("_MA_NEODWADMIN_AUTOMATICANCHOR", "Whether to lift the automatic station anchor function");
define("_MA_NEODWADMIN_FBGAPI", "API button functionality enabled FB and G +");
define("_MA_NEODWADMIN_RIGHTDISPLAY", "Choose the right block display");
define("_MA_NEODWADMIN_RIGHTSHOWTHERIGHT", "Right block shows the setting right of the");
define("_MA_NEODWADMIN_RIGHTSHOWTHEBOTTOM", "The right block shows the scene below");
define("_MA_NEODWADMIN_SETSFRAMEJUDGMENT", "Select a theme frame to judge the program configuration");
define("_MA_NEODWADMIN_SELECTENABLEWIDE", "Select the Wide function is enabled (USER browser is greater than and equal to the 1280 forum will switch to Wide)");
define("_MA_NEODWADMIN_KEYWORDSETTINGS", "Keyword Settings");
define("_MA_NEODWADMIN_KEYWORDTARGETING", "Keyword-targeted <br /> (see the configuration situation is displayed on the front)");
define("_MA_NEODWADMIN_RANDOMKEYWORD", "Whether or not to enable random keyword function");
define("_MA_NEODWADMIN_BUTTONTOSETTHE", "Button to set the");
define("_MA_NEODWADMIN_JSPLAY", "JS Player settings");
define("_MA_NEODWADMIN_JSPLAYSTYLE", "JS Player style selection");
define("_MA_NEODWADMIN_JSPLAYSTYLE01", "JS Player picture moves left and right");
define("_MA_NEODWADMIN_JSPLAYSTYLE02", "JS Player picture fades in and out");
define("_MA_NEODWADMIN_BUTTONTOREVERSE", "Use automatic or manual button corresponding to the module reverse function");
define("_MA_NEODWADMIN_AUTOMATICALLYEXPAND", "Whether or not to enable the child button corresponding module auto-start function");
define("_MA_NEODWADMIN_70TRANSPARENCY", "Whether or not to enable the sub button on the base map 70% transparency");
define("_MA_NEODWADMIN_MAINMENUSTYLES", "Scenery above the main menu style options");
define("_MA_NEODWADMIN_STYLEBDROPDOWNISPLAY", "Style B: sub-menu drop-down display");
define("_MA_NEODWADMIN_MARQUEESET", "Marquee set");
define("_MA_NEODWADMIN_THENEWSMODULESHOWATTHEMARQUEE", "Whether to enable the contents of news module shows the function of the Marquee");
define("_MA_NEODWADMIN_TRUETADNEWS", "Display news module content");
define("_MA_NEODWADMIN_FALSETADNEWS", "Display custom marquee content");
define("_MA_NEODWADMIN_MARQUEETEYLE", "Select marquee display");
define("_MA_NEODWADMIN_MARQUEESTYLEOPTIONS", "Marquee style options");
define("_MA_NEODWADMIN_STYLEA","Style A: Marquee text right to left");
define("_MA_NEODWADMIN_STYLEB","Style B: Marquee text bottom to top");
define("_MA_NEODWADMIN_MARQUEESPEED","Select the Marquee speed");
define("_MA_NEODWADMIN_SPEED1","Speed ​​1");
define("_MA_NEODWADMIN_SPEED2","Speed 2");
define("_MA_NEODWADMIN_SPEED3","Speed 3");
define("_MA_NEODWADMIN_SPEED4","Speed 4");
define("_MA_NEODWADMIN_SPEED5","Speed 5");
define("_MA_NEODWADMIN_SPEED6","Speed 6");
define("_MA_NEODWADMIN_SPEED7","Speed 7");
define("_MA_NEODWADMIN_SPEED8","Speed 8");
define("_MA_NEODWADMIN_SPEED9","Speed 9");
define("_MA_NEODWADMIN_SPEED10","Speed 10");
define("MARQUEETEYLE01","Moving up and down");
define("MARQUEETEYLE02","Move left and right");
define("_MA_NEODWADMIN_LOGOSET","LOGO set");
define("_MA_NEODWADMIN_LOGOSTYLEOPTIONS","LOGO style options");
define("_MA_NEODWADMIN_STYLEAIMAGETEXT","Style A: Image + text");
define("_MA_NEODWADMIN_STYLEBIMAGEDISPLAYS","Style B: Image displays");
define("_MA_NEODWADMIN_UPLOADLOGO","Upload the LOGO image file need to open<br />themes/$xoops_theme/img/share Folder write permissions to 777");
define("_MA_NEODWADMIN_JPGEA","<span>Production of a W68, H71, the size of jpg images</span>");
define("_MA_NEODWADMIN_MAKEA","Make a");
define("_MA_NEODWADMIN_THESIZEOFTHE","The size of the");
define("_MA_NEODWADMIN_DRAWING","Drawing");
define("_MA_NEODWADMIN_EXPLAIN","Explain");   
define("_MA_NEODWADMIN_SECONDLOGO","Upload the second LOGO image file need to open<br />themes/$xoops_theme/img/share Folder write permissions to 777");   
define("_MA_NEODWADMIN_line","Enter LINE account");
define("_MA_NEODWADMIN_LINEBOTTON","Whether to enable LINE button function");
define("_MA_NEODWADMIN_FBURL","Enter the FB personal [home] URL or the ID of the individual FB (for FB newsletters)");
define("_MA_NEODWADMIN_FBNY","Whether to enable FB newsletter button function");
define("_MA_NEODWADMIN_FBFANSURL","Enter FB personal page or fan group and club button URL");
define("_MA_NEODWADMIN_FBFANSURLNY","Whether to enable FB link button function");
define("_MA_NEODWADMIN_CONTACTUS","Enter contact us button URL (optional E - MAIL)");
define("_MA_NEODWADMIN_CONTACTUSNY","Whether to enable contact us button function");
define("_MA_NEODWADMIN_WEBSITEZOOM","Whether to enable the website to automatically zoom in with the resolution of the computer (the resolution will be automatically enlarged when it is greater than 1440)");
define("_MA_NEODWADMIN_XOOPSAD","hether to enable Xoops built-in advertising");
 
/*===========2012717新增=====================*/
define("_MA_NEODWADMIN_THEMESCOLOR", "Select the color of the scenery");
define("_MA_NEODWADMIN_THEMESCOLORBLUE", "Blue version");
define("_MA_NEODWADMIN_THEMESCOLORGREEN", "Green version");
define("_MA_NEODWADMIN_THEMESCOLORPINKPURPLE", "Pink purple version");
define("_MA_NEODWADMIN_ORANGEEDITION", "Orange version");

define("_MA_NEODWADMIN_ENABLEFLASH", "Whether to enable JS player");
define("_MA_NEODWADMIN_MINITHEMES", "Whether to enable the automatic switching function of the mobile device minithemes scene!");
define("_MA_NEODWADMIN_RIGHTMENUSTYLE", "Select the display method of the website menu in the upper right");

//keywordmeta.php
define("_MA_NEODWADMIN_OFALLPAGES","Of all pages");  
define("_MA_NEODWADMIN_DISPLAYHOME","Display Home");   
define("_MA_NEODWADMIN_ADDKEYWORD","Add Keyword Settings");
define("_MA_NEODWADMIN_KEYWORDTARGETED","Add Keyword Settings");
define("_MA_NEODWADMIN_KEYWORDCONTENT","Keyword content");
define("_MA_NEODWADMIN_DATAISNOTAVAILABLE","Unable to obtain a list of <br />");
define("_MA_NEODWADMIN_XOOPSBUILTINMETAKEYWORDS","Obtain Xoops built-in Meta keywords and keyword descriptive text");
define("_MA_NOTSET","No keywords page has been set");
define("_MA_AJAXDESCRIPTION","Keywords");
define("_MA_KEYWORDMETAPHP01","Keyword module page list");
define("_MA_KEYWORDMETAPHP02","Keyword module settings");
define("_MA_KEYWORDMETAPHP03","Return to keyword list");

//newkeyword.php
define("_MA_NEODWADMIN_ADDDATA","Information has been added");   
define("_MA_NEODWADMIN_INFORMATIONTOMODIFY","Data has been modified");   
define("_MA_NEODWADMIN_CONFIGURATIONKEYWORDS","Configuration keywords");   
define("_MA_NEODWADMIN_DISPLAYALLPAGESKEYWORD","Configure :: display all the pages keyword");   
define("_MA_NEODWADMIN_DISPLAYHOMEKEYWORD","Configuration :: Display Home Keyword");   
define("_MA_NEODWADMIN_MODULEKEYWORD","Module keyword");   
define("_MA_NEODWADMIN_EDITKEYWORDCONFIGURATION","Edit keyword configuration module");  
define("_MA_NEODWADMIN_ENTERKEYWORDS","Enter keywords");
define("_MA_NEODWADMIN_ENTERKEYWORDS3","Current keyword module page");
define("_MA_NEODWADMIN_ENTERKEYWORDS2","Please use lowercase letters and numbers between keywords and keywords. For example: keyword A and keyword B. The front end of the scene will be displayed in tabs with variables.");
define("_MA_NEODWADMIN_ENTERKEYWORDS","Enter keywords<br /><br />Keywords with the keyword, separated<br /><br />For example :: Keyword A keyword B. The ...");  

define("_MA_NEODWADMIN_ENTERKEYWORDDESCRIPTION","Enter Keyword Description");   
define("_MA_NEODWADMIN_CONFIGURATIONSETTINGS","<h4>The keyword configuration settings</h4>");  
define("_MA_NEODWADMIN_METATITLE","Enter one of the most important keywords");
define("_MA_NEODWADMIN_METATITLE2","Used to rush search engine rankings for the first page");
define("_MA_NEODWADMIN_METATITLETABLE","Keyword");

//newmarquee.php
define("_MA_NEODWADMIN_UPDATE","Information has been updated");  
//define("_MA_NEODWADMIN_MARQUEETITLE","Marquee title");  
define("_MA_NEODWADMIN_MARQUEELINKS","Marquee Links");  
//define("_MA_NEODWADMIN_LINKOPEN","Marquee link opens the way");  
define("_MA_NEODWADMIN_ORDER","Order");  
//define("_MA_NEODWADMIN_ADDMARQUEE","Add Marquee");  


//marqueetable.php
define("_MA_NEODWADMIN_SELECTNEWSMODULE","<h4>Chosen to display the content at the Marquee in the news module</h4>");  
define("_MA_NEODWADMIN_SELECTTHENEWSCATEGORIES","Chosen to display in the Marquee in the news");  
define("_MA_NEODWADMIN_NEWSERIC","Enter significantly in the Marquee News ERIC");  
define("_MA_NEODWADMIN_SELECTNEWSMODULE","<h3>Select News module</h3>News, the News module and tadnews module currently supports course you must have to install these two modules or one of them, in order to use this feature.");  
define("_MA_NEODWADMIN_NEWS","News module");  
define("_MA_NEODWADMIN_TADMEWS","tadnews module");  
define("_MA_NEODWADMIN_ADDED","Added");  
define("_MA_NEODWADMIN_DISPLAYMARQUEENEWS","Displayed on the news content in the Marquee");  
define("_MA_NEODWADMIN_MARQUEECONTENT","Marquee content");  
define("_MA_NEODWADMIN_LINKOPEN","Link Open");  
define("_MA_MARQUEETABLEPHP01","Custom Marquee Management");
define("_MA_MARQUEETABLEPHP02","Add Marquee");
define("_MA_MARQUEETABLEPHP03","Marquee title");
define("_MA_MARQUEETABLEPHP04","Marquee Link");
define("_MA_MARQUEETABLEPHP05","Marquee List");
define("_MA_MARQUEETABLEPHP07","Sorting");
define("_MA_MARQUEETABLEPHP08","Marquee content");
define("_MA_MARQUEETABLEPHP09","Page conversion");
define("_MA_MARQUEETABLEPHP10","Edit Marathon");
define("_MA_MARQUEETABLEPHP11","Marquee information");
define("_MA_MARQUEETABLEPHP12","Marquee Play Module Content Management");
define("_MA_MARQUEETABLEPHP13","Select playback module");
define("_MA_MARQUEETABLEPHP14","Select module classification");
define("_MA_MARQUEETABLEPHP15","Show all categories");
define("_MA_MARQUEETABLEPHP16","If you need to play the module content in the Marquee, go to -> Scene Settings -> Marquee Settings to change the settings");
define("_MA_MARQUEETABLEPHP17","Go to scene settings");
define("_MA_MARQUEETABLEPHP18","If you need to play custom content, please go to -> Scene Settings -> Marquee Settings to change settings");
define("_MA_MARQUEETABLEPHP19","Showing a few things");
define("_MA_MARQUEETABLEPHP20","Marquee Play Content");
define("_MA_MARQUEETABLEPHP21","Play module: %s");
define("_MA_MARQUEETABLEPHP22","Display the number of pens：%s pen");
define("_MA_MARQUEETABLEPHP23","Reset Marquee");
define("_MA_MARQUEETABLEPHP24","Displayed in the marquee news content");


//flashimgtable.php
define("_MA_NEODWADMIN_NEWFLASHIMAGE","New Flash image");  
define("_MA_NEODWADMIN_YOUCANADD5","Total of the five images can be added, the remaining");  
define("_MA_NEODWADMIN_ZHANGFLASIMAGE","Zhang Flash image can add");  
define("_MA_NEODWADMIN_THUMBNAIL","Thumbnail");  
define("_MA_NEODWADMIN_IMAGECAPTION","Image caption");  
define("_MA_NEODWADMIN_TAPTOOPENMODE","Tap to open mode");  
define("_MA_NEODWADMIN_CREATIONDATE","Creation date");  


//newflashimg.php
define("_MA_NEODWADMIN_FLASHIMAGECAPTION","Flash image caption");  
define("_MA_NEODWADMIN_FLASHIMAGELINK","Flash Image Link");  
define("_MA_NEODWADMIN_ENTERTHEFLASHHELP","Enter Flash image shows");  
define("_MA_NEODWADMIN_FLASHIMAGEOPEN","Flash Image Open");  
define("_MA_NEODWADMIN_DRAWINGNEEDTOOPEN","Upload the image file need to open");  
define("_MA_NEODWADMIN_WRITEPERMISSIONSTO777","Folder write permissions to 777");  
define("_MA_NEODWADMIN_FLASHTHUMBNAIL","Flash thumbnail of the image");  
define("_MA_NEODWADMIN_NUMBER","Number");  
define("_MA_NEODWADMIN_OFTHEFLASHIMAGE","Of the Flash image");  

//menutable.php
define("_MA_NEODWADMIN_GROUP","Group");  
define("_MA_NEODWADMIN_ANEWMAINBUTTON","[Add a main button]");  
define("_MA_NEODWADMIN_NEWTIMESBUTTON","[The Add button]");  
define("_MA_NEODWADMIN_THEMAINNUMBEROFBUTTONS","The main number of buttons that can be created:");  
define("_MA_NEODWADMIN_HASBEENESTABLISHED","Has been established:");  
define("_MA_NEODWADMIN_ALSOTHEREMAINING","The main buttons, and the remaining:");  
define("_MA_NEODWADMIN_CANBEESTABLISHED","Main button can be established");  
define("_MA_NEODWADMIN_BUTTONNAME","Button name");  

//newmenu.php
define("_MA_NEODWADMIN_SELECTMAINCATEGORY","Please select the button belongs to the main classification");  
define("_MA_NEODWADMIN_MAIN","Main");  
define("_MA_NEODWADMIN_CHILD","Child");  
define("_MA_NEODWADMIN_BUTTONNAME","Button name");  
define("_MA_NEODWADMIN_BUTTONLINK","Button link");  
define("_MA_NEODWADMIN_SELECTTHECORRESPONDING","Select the main button of the corresponding");  
define("_MA_NEODWADMIN_MANUALLYSELECTTHE","The manually select the button corresponding to the module will be selected modules of the main button to show a reverse state.");  
define("_MA_NEODWADMIN_DONOTSETTHEREVERSE","Does not set the button to reverse");  
define("_MA_NEODWADMIN_BUTTONTOOPENTHEWAY","Button to open the way");  

//confirmdel.php
define("_MA_NEODWADMIN_UNABLETOREMOVECONTENT","Unable to delete the specified<br />");  
define("_MA_NEODWADMIN_THEFILEHASBEENDELETED","The file has been deleted");  
define("_MA_NEODWADMIN_YOUSURETHATYOUWANT","You sure that you want");  
define("_MA_NEODWADMIN_DELETEOPERATION","Delete operation?");  
define("_MA_NEODWADMIN_NOTE","Note!");  
define("_MA_NEODWADMIN_DELETE","Delete");  
define("_MA_NEODWADMIN_SUBBUTTONTODELETE","Will be deleted along together with the son of the button belongs.");  


//contactustable.php
define("_MA_XOOPPSMAIL","Go to Xoops email settings");
define("_MA_GOCONTACTUSTABLEPHP","Back to Contact us");
define("_MA_CONTACTUSTABLEPHP01","Contact Us Management");
define("_MA_CONTACTUSTABLEPHP02","Contact editing");
define("_MA_CONTACTUSTABLEPHP03","Display all");
define("_MA_CONTACTUSTABLEPHP04","Already read");
define("_MA_CONTACTUSTABLEPHP05","Not read");
define("_MA_CONTACTUSTABLEPHP06","Choose to contact us");
define("_MA_CONTACTUSTABLEPHP07","Please enter contact details such as Matters 1, Matters 2, Matters 3");
define("_MA_CONTACTUSTABLEPHP08","Please enter the contact information in lowercase in English.");
define("_MA_CONTACTUSTABLEPHP09","Select");
define("_MA_CONTACTUSTABLEPHP10","Contact time");
define("_MA_CONTACTUSTABLEPHP11","Names");
define("_MA_CONTACTUSTABLEPHP12","Describe matters");
define("_MA_CONTACTUSTABLEPHP13","Gender");
define("_MA_CONTACTUSTABLEPHP14","Status");
define("_MA_CONTACTUSTABLEPHP15","Active");
define("_MA_CONTACTUSTABLEPHP16","Reply status");
define("_MA_CONTACTUSTABLEPHP17","replied");
define("_MA_CONTACTUSTABLEPHP18","no reply");
define("_MA_CONTACTUSTABLEPHP19","Not read");
define("_MA_CONTACTUSTABLEPHP20","Already read");
define("_MA_CONTACTUSTABLEPHP21","male");
define("_MA_CONTACTUSTABLEPHP22","Female");
define("_MA_CONTACTUSTABLEPHP23","Checking is set to read");
define("_MA_CONTACTUSTABLEPHP24","Delete content");
define("_MA_CONTACTUSTABLEPHP25","Select operation");
define("_MA_CONTACTUSTABLEPHP26","Contact us for content");
define("_MA_CONTACTUSTABLEPHP27","Letter time：%s");
define("_MA_CONTACTUSTABLEPHP28","Names：%s");
define("_MA_CONTACTUSTABLEPHP29","E-MAIL：%s"); 
define("_MA_CONTACTUSTABLEPHP30","cellphone：%s");
define("_MA_CONTACTUSTABLEPHP31","City Telephone：%s");
define("_MA_CONTACTUSTABLEPHP32","gender：%s");
define("_MA_CONTACTUSTABLEPHP33","Contact matters：%s");
define("_MA_CONTACTUSTABLEPHP34","Contact content：<p>%s");
define("_MA_CONTACTUSTABLEPHP35","Reply content：<p>%s");
define("_MA_CONTACTUSTABLEPHP36","Please enter the reply content. After sending, the system will reply to the email address of the sender by MAIL.");
define("_MA_CONTACTUSTABLEPHP37","Send reply content");
define("_MA_CONTACTUSTABLEPHP38","Reply time：%s");
//imguploader.php
define("_MA_NEODWADMIN_UPLOADSUCCESSFUL","Upload successful!");  


//neoGreenleisure.php
define("_MA_NEODWADMIN_FLASHTHEFILETHEFORMAT","Flash image file formats:");  
define("_MA_NEODWADMIN_FLASHIMAGEFILESIZE","Flash file size:");  

//menu.php
define("_MA_NEODWADMIN_MANAGEMENTHOME","Home");  
define("_MA_NEODWADMIN_SCENESETTING","Scene setting");  
define("_MA_NEODWADMIN_KEYWORDMANAGEMENTA","Keyword admin");  
define("_MA_NEODWADMIN_MARQUEEMANAGEMENTA","Marquee admin");  
define("_MA_NEODWADMIN_FLASHIMAGEMANAGEMENT","Flash admin");  
define("_MA_NEODWADMIN_SITEMENUMANAGEMENT","menu admin");  

//Paging
define("_BP_BACK_PAGE","Previous page");
define("_BP_NEXT_PAGE","Next page");
define("_BP_FIRST_PAGE","First page");
define("_BP_LAST_PAGE","Last page");
define("_BP_GO_BACK_PAGE","Go previous %s page");
define("_BP_GO_NEXT_PAGE","Go next %s page");
define("_BP_TOOLBAR","Total %s pages, currently in the first %s page：");

//Sharing
define("_MA_NEODWADMIN_AS3","AS3 programming");
define("_MA_NEODWADMIN_JS","JS program");
define("_MA_NEODWADMIN_YSE","Enabled");
define("_MA_NEODWADMIN_NO","Not enabled");
define("_MA_NEODWADMIN_SHOW","Show");
define("_MA_NEODWADMIN_NSHOW","Do not show");
define("_MA_NEODWADMIN_REMOVE","Remove");
define("_MA_NEODWADMIN_NOREMOVE","Not lifted");
define("_MA_NEODWADMIN_AUTOMATIC","Automatic");
define("_MA_NEODWADMIN_MANUAL","Manual");
define("_MA_NEODWADMIN_DELETE","[Delete]");
define("_MA_NEODWADMIN_EDITOR","[Edit]");
define("_MA_NEODWADMIN_BLOCKMEUNADMIN","[Button management]");
define("_MA_NEODWADMIN_OPERATING","Operating");
define("_MA_NEODWADMIN_DETERMINE","Determine");
define("_MA_NEODWADMIN_CANCELED","Canceled");
define("_MA_NEODWADMIN_EDITORA","Editor");
define("_MA_NEODWADMIN_NEW","New");  
define("_MA_NEODWADMIN_BUTTON","Button"); 
define("_MA_NEODWADMIN_SENT","Sent");   
define("_MA_WATCHTHECONTENT","Watch the details");
define("_MA_CHOOSECATEGORY","Please select a type");
