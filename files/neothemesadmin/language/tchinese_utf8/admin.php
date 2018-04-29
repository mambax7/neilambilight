<?php
include_once XOOPS_ROOT_PATH."/modules/neillibrary/language/{$xoopsConfig['language']}/shared.php";	
$xoops_theme = $GLOBALS['xoopsConfig']['theme_set'] ;	
			
//index.php
define("_MA_NEODWADMIN_SCENESETTING",	"佈景設定");	
define("_MA_NEODWADMIN_KEYWORDMANAGEMENT",	"關鍵字管理");		
define("_MA_NEODWADMIN_MARQUEEMANAGEMENT",	"跑馬燈管理");		
define("_MA_NEODWADMIN_FLASHIMAGE",	"JS圖片播放器管理");		
define("_MA_NEODWADMIN_WEBSITEMENU","網站選單管理");
define("_MA_NEODWADMIN_BLOCKMENU","區塊選單管理");		
define("_MA_NEODWADMIN_REPORTAPROBLEM","問題回報");		
define("_MA_NEODWADMIN_HOME","返回首頁");	
define("_MA_NEODWADMIN_DEVELOPMENTUNIT","開發單位：");		
define("_MA_NEODWADMIN_NEODW","Neil網站設計工坊");			
define("_MA_NEODWADMIN_DEVELOPER","開發者：");		
define("_MA_NEODWADMIN_NEOHSU","徐嘉裕(Neil Hsu)");	
define("_MA_NEODWADMIN_CONTACT","聯絡開發者");	
define("_MA_NEODWADMIN_MODULENAME","模組名稱：Neodw佈景管理模組");		
define("_MA_NEODWADMIN_MODULEVERSIONRC6","模組版本：");		
define("_MA_NEODWADMIN_LICENSE","授權方式：");	
define("_MA_NEODWADMIN_CCLICENSE","姓名標示─相同方式分享 3.0 台灣");	
define("_MA_NEODWADMIN_THECURRENTSETS","目前的佈景：");	
define("_MA_NEODWADMIN_SPONSOR","贊助我們");	
	
//settings.php
define("_MA_NEODWADMIN_SHBU",	"設定已更新");
define("_MA_NEODWADMIN_STYLE",	"佈景樣式設定");
define("_MA_NEODWADMIN_YSENOIE6",   "是否啟用NO-IE6設置");
define("_MA_NEODWADMIN_SEARCH",	 "是否顯示JS播放器上的搜尋區塊");
define("_MA_NEODWADMIN_AUTOMATICANCHOR", "是否解除全站自動錨點功能");
define("_MA_NEODWADMIN_FBGAPI", "是否啟用FB及G+的API按鈕功能");
define("_MA_NEODWADMIN_RIGHTDISPLAY", "選擇右區塊顯示方式");
define("_MA_NEODWADMIN_RIGHTSHOWTHERIGHT", "右區塊顯示佈景右方");
define("_MA_NEODWADMIN_RIGHTSHOWTHEBOTTOM", "右區塊顯示佈景下方");
define("_MA_NEODWADMIN_SETSFRAMEJUDGMENT", "選擇佈景外框判斷程式配置");
define("_MA_NEODWADMIN_SELECTENABLEWIDE", "選擇是否啟用寬版功能");
define("_MA_NEODWADMIN_KEYWORDSETTINGS", "關鍵字設定");
define("_MA_NEODWADMIN_KEYWORDTARGETING", "是否於前端顯示關鍵字配置<br />(觀看配置情形)");
define("_MA_NEODWADMIN_RANDOMKEYWORD", "是否啟用隨機顯示關鍵字功能");
define("_MA_NEODWADMIN_BUTTONTOSETTHE", "按鈕設定");
define("_MA_NEODWADMIN_JSPLAY", "JS播放器設定");
define("_MA_NEODWADMIN_JSPLAYSTYLE", "JS播放器樣式選擇");
define("_MA_NEODWADMIN_JSPLAYSTYLE01", "JS播放器圖片左右移動");
define("_MA_NEODWADMIN_JSPLAYSTYLE02", "JS播放器圖片淡入淡出");
define("_MA_NEODWADMIN_BUTTONTOREVERSE", "使用自動或手動按鈕對應模組反向功能");
define("_MA_NEODWADMIN_AUTOMATICALLYEXPAND", "是否啟用子按鈕對應模組自動展開功能");
define("_MA_NEODWADMIN_70TRANSPARENCY", "是否啟用子按鈕底圖70%透明效果");
define("_MA_NEODWADMIN_MAINMENUSTYLES", "佈景上方主選單樣式選擇");
define("_MA_NEODWADMIN_STYLEBDROPDOWNISPLAY", "樣式B:子選單下拉顯示");
define("_MA_NEODWADMIN_MARQUEESET", "跑馬燈設定");
define("_MA_NEODWADMIN_THENEWSMODULESHOWATTHEMARQUEE", "是否啟用新聞模組的內容顯示於跑馬燈功能");
define("_MA_NEODWADMIN_TRUETADNEWS", "顯示新聞模組內容");
define("_MA_NEODWADMIN_FALSETADNEWS", "顯示自訂跑馬燈內容");
define("_MA_NEODWADMIN_MARQUEETEYLE", "選擇跑馬燈顯示方式");
define("_MA_NEODWADMIN_MARQUEESTYLEOPTIONS", "跑馬燈樣式選擇");
define("_MA_NEODWADMIN_STYLEA","樣式A:跑馬燈文字右往左");
define("_MA_NEODWADMIN_STYLEB","樣式B:跑馬燈文字下往上");
define("_MA_NEODWADMIN_MARQUEESPEED","選擇跑馬燈速度");
define("_MA_NEODWADMIN_SPEED1","速度1");
define("_MA_NEODWADMIN_SPEED2","速度2");
define("_MA_NEODWADMIN_SPEED3","速度3");
define("_MA_NEODWADMIN_SPEED4","速度4");
define("_MA_NEODWADMIN_SPEED5","速度5");
define("_MA_NEODWADMIN_SPEED6","速度6");
define("_MA_NEODWADMIN_SPEED7","速度7");
define("_MA_NEODWADMIN_SPEED8","速度8");
define("_MA_NEODWADMIN_SPEED9","速度9");
define("_MA_NEODWADMIN_SPEED10","速度10");
define("MARQUEETEYLE01","上下移動");
define("MARQUEETEYLE02","左右移動");
define("_MA_NEODWADMIN_LOGOSET","LOGO設定");
define("_MA_NEODWADMIN_LOGOSTYLEOPTIONS","LOGO樣式選擇");
define("_MA_NEODWADMIN_STYLEAIMAGETEXT","樣式A:圖片+文字顯示");
define("_MA_NEODWADMIN_STYLEBIMAGEDISPLAYS","樣式B:圖片顯示");
define("_MA_NEODWADMIN_UPLOADLOGO","上傳佈景LOGO圖檔");
define("_MA_NEODWADMIN_JPGEA","<span>製作1張W68,H71大小的jpg圖檔</span>");
define("_MA_NEODWADMIN_MAKEA","製作1張");
define("_MA_NEODWADMIN_THESIZEOFTHE","大小的圖檔(任何圖檔格式都可以最好是PNG透明圖檔)");
define("_MA_NEODWADMIN_DRAWING","圖檔");
define("_MA_NEODWADMIN_EXPLAIN","說明");   
define("_MA_NEODWADMIN_SECONDLOGO","上傳網站icon.png小圖示(顯示在瀏覽器頁籤的圖示)");   
define("_MA_NEODWADMIN_line","輸入LINE帳號");   
define("_MA_NEODWADMIN_LINEBOTTON","是否啟用LINE按鈕功能");   
define("_MA_NEODWADMIN_FBURL","輸入FB個人【首頁】網址或是個人FB的ID(FB簡訊用的)");   
define("_MA_NEODWADMIN_FBNY","是否啟用FB簡訊按鈕功能");   
define("_MA_NEODWADMIN_FBFANSURL","輸入FB個人網頁或粉絲團及社團按鈕網址");   
define("_MA_NEODWADMIN_FBFANSURLNY","是否啟用FB連結按鈕功能");   
define("_MA_NEODWADMIN_CONTACTUS","輸入聯絡我們按鈕網址(可填E-MAIL)");   
define("_MA_NEODWADMIN_CONTACTUSNY","是否啟用聯絡我們按鈕功能");   
define("_MA_NEODWADMIN_WEBSITEZOOM","是否啟用網站隨電腦解析度自動放大功能(解析度大於1440時會自動放大)");   
define("_MA_NEODWADMIN_XOOPSAD","是否啟用Xoops內建廣告功能");   
/*===========2012717新增=====================*/
define("_MA_NEODWADMIN_THEMESCOLOR", "選擇佈景的顏色");
define("_MA_NEODWADMIN_THEMESCOLORBLUE", "藍色版");
define("_MA_NEODWADMIN_THEMESCOLORGREEN", "綠色版");
define("_MA_NEODWADMIN_THEMESCOLORPINKPURPLE", "粉紅紫色版");
define("_MA_NEODWADMIN_ORANGEEDITION", "橘色版");

define("_MA_NEODWADMIN_ENABLEFLASH", "是否啟用JS播放器");
define("_MA_NEODWADMIN_MINITHEMES", "是否啟用行動裝置minithemes佈景的自動切換功能!");
define("_MA_NEODWADMIN_RIGHTMENUSTYLE", "選擇右上方網站選單的顯示方式");


//keywordmeta.php
define("_MA_NEODWADMIN_OFALLPAGES","全體頁面");  
define("_MA_NEODWADMIN_DISPLAYHOME","顯示首頁");   
define("_MA_NEODWADMIN_ADDKEYWORD","新增關鍵字設定");
define("_MA_NEODWADMIN_KEYWORDTARGETED","關鍵字配置模組名稱");
define("_MA_NEODWADMIN_KEYWORDCONTENT","已設關鍵字");
define("_MA_NEODWADMIN_DATAISNOTAVAILABLE","無法取得資料列表<br />");
define("_MA_NEODWADMIN_XOOPSBUILTINMETAKEYWORDS","取得Xoops內建Meta關鍵字及關鍵字說明文字");
define("_MA_NOTSET","尚未設定關鍵字頁面");
define("_MA_AJAXDESCRIPTION","關鍵字");
define("_MA_KEYWORDMETAPHP01","關鍵字模組頁面列表");
define("_MA_KEYWORDMETAPHP02","關鍵字模組設定");
define("_MA_KEYWORDMETAPHP03","返回關鍵字列表");

//newkeyword.php
define("_MA_NEODWADMIN_ADDDATA","資料已新增");   
define("_MA_NEODWADMIN_INFORMATIONTOMODIFY","資料已修改");   
define("_MA_NEODWADMIN_CONFIGURATIONKEYWORDS","選擇關鍵字顯示模組");   
define("_MA_NEODWADMIN_DISPLAYALLPAGESKEYWORD","全部頁面");   
define("_MA_NEODWADMIN_DISPLAYHOMEKEYWORD","網站首頁");   
define("_MA_NEODWADMIN_MODULEKEYWORD","模組關鍵字");   
define("_MA_NEODWADMIN_EDITKEYWORDCONFIGURATION","編輯關鍵字配置模組");  
define("_MA_NEODWADMIN_ENTERKEYWORDS","輸入關鍵字");  
define("_MA_NEODWADMIN_ENTERKEYWORDS3","目前關鍵字模組頁面");  
define("_MA_NEODWADMIN_ENTERKEYWORDS2","關鍵字與關鍵字之間請用英文小寫,號區隔,例如:關鍵字A,關鍵字B,佈景前端會以標籤方式帶變數呈現。");  
define("_MA_NEODWADMIN_ENTERKEYWORDDESCRIPTION","輸入關鍵字說明");   
define("_MA_NEODWADMIN_CONFIGURATIONSETTINGS","<h4>關鍵字配置設定</h4>");  
define("_MA_NEODWADMIN_METATITLE","輸入最主力關鍵字一組");  
define("_MA_NEODWADMIN_METATITLE2","用來衝搜尋引擎第一頁排名用的");  
define("_MA_NEODWADMIN_METATITLETABLE","主力關鍵字");  

//newmarquee.php
define("_MA_NEODWADMIN_UPDATE","資料已更新");  
//define("_MA_NEODWADMIN_MARQUEETITLE","跑馬燈標題");  
define("_MA_NEODWADMIN_MARQUEELINKS","跑馬燈連結");  
//define("_MA_NEODWADMIN_LINKOPEN","跑馬燈連結開啟方式");  
define("_MA_NEODWADMIN_ORDER","順序");  
//define("_MA_NEODWADMIN_ADDMARQUEE","新增跑馬燈");  


//marqueetable.php
define("_MA_NEODWADMIN_SELECTNEWSMODULE","<h4>選擇要顯示內容於跑馬燈中的新聞模組</h4>");  
define("_MA_NEODWADMIN_SELECTTHENEWSCATEGORIES","選擇要顯示於跑馬燈中的新聞分類");  
define("_MA_NEODWADMIN_NEWSERIC","輸入顯於跑馬燈中新聞總筆數");  
define("_MA_NEODWADMIN_SELECTNEWSMODULE","<h3>選擇新聞模組</h3>目前支援顯示News模組及tadnews模組中新聞，當然您必須要有安裝這兩個模組或其中1個，才能使用本項功能。");  
define("_MA_NEODWADMIN_NEWS","News模組");  
define("_MA_NEODWADMIN_TADMEWS","tadnews模組");  
define("_MA_NEODWADMIN_ADDED","新增時間");  
define("_MA_NEODWADMIN_DISPLAYMARQUEENEWS","顯示於跑馬燈中新聞內容");  
define("_MA_NEODWADMIN_LINKOPEN","連結開啟方式");  
define("_MA_MARQUEETABLEPHP01","自訂跑馬燈管理"); 
define("_MA_MARQUEETABLEPHP02","新增跑馬燈"); 
define("_MA_MARQUEETABLEPHP03","跑馬燈標題");  
define("_MA_MARQUEETABLEPHP04","跑馬燈連結");  
define("_MA_MARQUEETABLEPHP05","跑馬燈列表");  
define("_MA_MARQUEETABLEPHP07","排序");  
define("_MA_MARQUEETABLEPHP08","跑馬燈內容");  
define("_MA_MARQUEETABLEPHP09","頁面轉換");  
define("_MA_MARQUEETABLEPHP10","編輯跑馬燈"); 
define("_MA_MARQUEETABLEPHP11","跑馬燈資料"); 
define("_MA_MARQUEETABLEPHP12","跑馬燈播放模組內容管理"); 
define("_MA_MARQUEETABLEPHP13","選擇播放模組"); 
define("_MA_MARQUEETABLEPHP14","選擇模組分類"); 
define("_MA_MARQUEETABLEPHP15","顯示全部分類內容"); 
define("_MA_MARQUEETABLEPHP16","跑馬燈如需改為播放模組內容請到->佈景設定->跑馬燈設定中變更設定"); 
define("_MA_MARQUEETABLEPHP17","前往佈景設定"); 
define("_MA_MARQUEETABLEPHP18","跑馬燈如需改為播放自訂內容請到->佈景設定->跑馬燈設定中變更設定"); 
define("_MA_MARQUEETABLEPHP19","顯示幾筆內容"); 
define("_MA_MARQUEETABLEPHP20","跑馬燈播放內容"); 
define("_MA_MARQUEETABLEPHP21","播放模組：%s"); 
define("_MA_MARQUEETABLEPHP22","顯示筆數：%s 筆"); 
define("_MA_MARQUEETABLEPHP23","重新設定跑馬燈"); 
define("_MA_MARQUEETABLEPHP24","顯示於跑馬燈中新聞內容"); 


//flashimgtable.php
define("_MA_NEODWADMIN_NEWFLASHIMAGE","新增播放器圖片");  
define("_MA_NEODWADMIN_YOUCANADD5","共可新增5張圖檔，剩餘");  
define("_MA_NEODWADMIN_ZHANGFLASIMAGE","張圖片可以新增");  
define("_MA_NEODWADMIN_THUMBNAIL","縮圖");  
define("_MA_NEODWADMIN_IMAGECAPTION","圖片標題");  
define("_MA_NEODWADMIN_TAPTOOPENMODE","點選開啟方式");  
define("_MA_NEODWADMIN_CREATIONDATE","建立日期");  


//newflashimg.php
define("_MA_NEODWADMIN_FLASHIMAGECAPTION","圖片標題");  
define("_MA_NEODWADMIN_FLASHIMAGELINK","圖片連結");  
define("_MA_NEODWADMIN_ENTERTHEFLASHHELP","輸入圖片說明");  
define("_MA_NEODWADMIN_FLASHIMAGEOPEN","圖片開啟方式");  
define("_MA_NEODWADMIN_DRAWINGNEEDTOOPEN","上傳圖檔需開啟");  
define("_MA_NEODWADMIN_WRITEPERMISSIONSTO777","資料夾寫入權限777");  
define("_MA_NEODWADMIN_FLASHTHUMBNAIL","圖片縮圖");  
define("_MA_NEODWADMIN_NUMBER","編號");  
define("_MA_NEODWADMIN_OFTHEFLASHIMAGE","的圖片");  

//menutable.php
define("_MA_NEODWADMIN_GROUP","群組");  
define("_MA_NEODWADMIN_ANEWMAINBUTTON","[新增主按鈕]");  
define("_MA_NEODWADMIN_NEWTIMESBUTTON","[新增次按鈕]");  
define("_MA_NEODWADMIN_THEMAINNUMBEROFBUTTONS","可以建立的主按鈕數量：");  
define("_MA_NEODWADMIN_HASBEENESTABLISHED","個，目前已經建立：");  
define("_MA_NEODWADMIN_ALSOTHEREMAINING","個主按鈕，還剩餘：");  
define("_MA_NEODWADMIN_CANBEESTABLISHED","個主按鈕可以建立");  
define("_MA_NEODWADMIN_BUTTONNAME","按鈕名稱");  

//newmenu.php
define("_MA_NEODWADMIN_SELECTMAINCATEGORY","請選擇按鈕所屬主分類");  
define("_MA_NEODWADMIN_MAIN","主");  
define("_MA_NEODWADMIN_CHILD","子");  
define("_MA_NEODWADMIN_BUTTONNAME","按鈕名稱");  
define("_MA_NEODWADMIN_BUTTONLINK","按鈕連結");  
define("_MA_NEODWADMIN_SELECTTHECORRESPONDING","選擇對應的主按鈕");  
define("_MA_NEODWADMIN_MANUALLYSELECTTHE","手動選擇主按鈕對應的模組,主按鈕將於所選之模組中呈現反向狀態。");  
define("_MA_NEODWADMIN_DONOTSETTHEREVERSE","不設定按鈕反向");  
define("_MA_NEODWADMIN_BUTTONTOOPENTHEWAY","按鈕開啟方式");  

//confirmdel.php
define("_MA_NEODWADMIN_UNABLETOREMOVECONTENT","無法刪除指定內容<br />");  
define("_MA_NEODWADMIN_THEFILEHASBEENDELETED","檔案已刪除");  
define("_MA_NEODWADMIN_YOUSURETHATYOUWANT","您確定要進行");  
define("_MA_NEODWADMIN_DELETEOPERATION","刪除操作嗎？");  
define("_MA_NEODWADMIN_NOTE","注意!!!");  
define("_MA_NEODWADMIN_DELETE","[刪除]");  
define("_MA_NEODWADMIN_SUBBUTTONTODELETE","將會連同所屬之子按鈕一起刪除!");  


//contactustable.php
define("_MA_XOOPPSMAIL","前往Xoops電子郵件設定");  
define("_MA_GOCONTACTUSTABLEPHP","返回聯絡我們");  
define("_MA_CONTACTUSTABLEPHP01","聯絡我們管理");  
define("_MA_CONTACTUSTABLEPHP02","聯絡事項編輯");  
define("_MA_CONTACTUSTABLEPHP03","顯示全部");  
define("_MA_CONTACTUSTABLEPHP04","已讀取");  
define("_MA_CONTACTUSTABLEPHP05","未讀取"); 
define("_MA_CONTACTUSTABLEPHP06","選擇聯絡我們狀態"); 
define("_MA_CONTACTUSTABLEPHP07","請輸入聯絡事項例如事項1,事項2,事項3"); 
define("_MA_CONTACTUSTABLEPHP08","請輸入聯絡事項用英文小寫,區隔前端會以下拉選單方式呈現"); 
define("_MA_CONTACTUSTABLEPHP09","選取"); 
define("_MA_CONTACTUSTABLEPHP10","聯絡時間"); 
define("_MA_CONTACTUSTABLEPHP11","姓名"); 
define("_MA_CONTACTUSTABLEPHP12","說明事項"); 
define("_MA_CONTACTUSTABLEPHP13","性別"); 
define("_MA_CONTACTUSTABLEPHP14","狀態"); 
define("_MA_CONTACTUSTABLEPHP15","操作"); 
define("_MA_CONTACTUSTABLEPHP16","回覆狀態"); 
define("_MA_CONTACTUSTABLEPHP17","已回覆"); 
define("_MA_CONTACTUSTABLEPHP18","未回覆"); 
define("_MA_CONTACTUSTABLEPHP19","未讀取"); 
define("_MA_CONTACTUSTABLEPHP20","已讀取"); 
define("_MA_CONTACTUSTABLEPHP21","男性"); 
define("_MA_CONTACTUSTABLEPHP22","女性"); 
define("_MA_CONTACTUSTABLEPHP23","核取設為已讀"); 
define("_MA_CONTACTUSTABLEPHP24","刪除核取內容"); 
define("_MA_CONTACTUSTABLEPHP25","選擇操作"); 
define("_MA_CONTACTUSTABLEPHP26","聯絡我們來函內容"); 
define("_MA_CONTACTUSTABLEPHP27","來函時間：%s"); 
define("_MA_CONTACTUSTABLEPHP28","姓名：%s"); 
define("_MA_CONTACTUSTABLEPHP29","E-MAIL：%s"); 
define("_MA_CONTACTUSTABLEPHP30","手機號碼：%s"); 
define("_MA_CONTACTUSTABLEPHP31","市內電話：%s"); 
define("_MA_CONTACTUSTABLEPHP32","性別：%s"); 
define("_MA_CONTACTUSTABLEPHP33","聯絡事項：%s"); 
define("_MA_CONTACTUSTABLEPHP34","聯絡內容：<p>%s"); 
define("_MA_CONTACTUSTABLEPHP35","回覆內容：<p>%s"); 
define("_MA_CONTACTUSTABLEPHP36","請輸入回覆內容，送出後系統會以MAIL回覆來函者郵件帳號"); 
define("_MA_CONTACTUSTABLEPHP37","送出回覆內容"); 
define("_MA_CONTACTUSTABLEPHP38","回覆時間：%s"); 
//imguploader.php
define("_MA_NEODWADMIN_UPLOADSUCCESSFUL","上傳成功！");  


//neoGreenleisure.php
define("_MA_NEODWADMIN_FLASHTHEFILETHEFORMAT","圖檔格式：");  
define("_MA_NEODWADMIN_FLASHIMAGEFILESIZE","圖檔大小：");  

//分頁
define("_BP_BACK_PAGE","上一頁");
define("_BP_NEXT_PAGE","下一頁");
define("_BP_FIRST_PAGE","第一頁");
define("_BP_LAST_PAGE","最後頁");
define("_BP_GO_BACK_PAGE","前 %s 頁");
define("_BP_GO_NEXT_PAGE","後 %s 頁");
define("_BP_TOOLBAR","共 %s 頁，目前在第 %s 頁：");

//共用
define("_MA_NEODWADMIN_AS3","AS3程式");
define("_MA_NEODWADMIN_JS","JS程式");
define("_MA_NEODWADMIN_YSE","啟用");
define("_MA_NEODWADMIN_NO","不啟用");
define("_MA_NEODWADMIN_SHOW","顯示");
define("_MA_NEODWADMIN_NSHOW","不顯示");
define("_MA_NEODWADMIN_REMOVE","解除");
define("_MA_NEODWADMIN_NOREMOVE","不解除");
define("_MA_NEODWADMIN_AUTOMATIC","自動");
define("_MA_NEODWADMIN_MANUAL","手動");
define("_MA_NEODWADMIN_DELETEA","刪除");
define("_MA_NEODWADMIN_EDITOR","[編輯]");
define("_MA_NEODWADMIN_BLOCKMEUNADMIN","[按鈕管理]");
define("_MA_NEODWADMIN_OPERATING","操作");
define("_MA_NEODWADMIN_DETERMINE","確定");
define("_MA_NEODWADMIN_CANCELED","取消");
define("_MA_NEODWADMIN_EDITORA","編輯");
define("_MA_NEODWADMIN_NEW","新增");  
define("_MA_NEODWADMIN_BUTTON","按鈕"); 
define("_MA_NEODWADMIN_SENT","送出");   
define("_MA_WATCHTHECONTENT","觀看詳細內容");   
define("_MA_CHOOSECATEGORY","請選擇分類"); 
?>