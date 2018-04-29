<?php
include "../../../include/cp_header.php";
include "../function.php";
include "../class/themeset.php";
include "../class/selectdb.php";
include "imguploader.php";
include "analyzefbid.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";



//呼叫DB::neothemesconfig
$neothemesconfigvsplit =neothemesconfig::publicselectdb1($nsn, $field);
list($nsn, $field) = $neothemesconfigvsplit;
$fieldsplit=preg_split('/;/', $field);   //編號到20


//取得$fieldsplit陣列的總數
$fieldsplitTotal=count($fieldsplit);


//最後一次設定編號備註

//$field29
//$fieldsplit[28]
//$XoopsFormHidden[36]




$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
switch ($op) {

case "save_news":

  
  insert_news();
 redirect_header($_SERVER['PHP_SELF'], 0, _MA_NEODWADMIN_SHBU);   //設定已更新
break;
 default:
$main = add_form($fieldsplit);
}


function add_form($fieldsplit="")
{
    include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");

    global $xoopsDB;

    //讀取LINE及fb欄位
    $sql = "select line,fburl,fbfansurl,contactus from " . $xoopsDB->prefix('neothemesconfig')   . " where `nsn` = '1' ";
    $result = $xoopsDB -> query($sql) or die($sql);
    list($line, $fburl, $fbfansurl, $contactus) = $xoopsDB -> fetchRow($result);


    $form = new XoopsThemeForm("<h4>"._MA_NEODWADMIN_STYLE."</h4>", "form", $_SERVER['PHP_SELF']);  //佈景樣式設定
    $xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];



    //先建構class($themesetclass)
    $themesetclass   = new  themesetclass;
    $topvsplit =$themesetclass-> themespublicb($variableok, $setting);
    list($variableoka, $settinga) = $topvsplit;


    //切割$setting陣列內容
    $settingsplit=preg_split('/;/', $settinga);


    //取得$fieldspli陣列的總數
    $Ftotalsum=count($settingsplit);

    //可選擇欄位總數
    $Ftotal=$Ftotalsum;


    //設定欄位預設皆為1，並依序將$settingsplit[$i];值解入$setting[$i]陣列中。
    for ($i=0; $i<$Ftotal; $i++) {
        $setting[$i]=$settingsplit[$i];
    }



    //切割$variableok陣列內容
    $variablesplit=preg_split('/;/', $variableoka);
    //佈景圖片各項設定參數
$imgfileok=$variablesplit[0];           // logo圖片檔案格式
$imgwh=$variablesplit[2];                   //logo圖檔大小：;
$flashimgfileok=$variablesplit[3];     //說明文字："圖檔格式：jpg";
$flashimgwh=$variablesplit[4];          //說明文字：圖檔大小：
$logostyle=$variablesplit[7];          //LOGO樣式
$imgfileok2=$variablesplit[8];           // logo2圖片檔案格式
$imgwh2=$variablesplit[9];                   //logo2圖檔大小說明：;


//佈景設定 群組A

    //是否啟用NO-IE6設置
    if ($setting[0]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_YSENOIE6, "field2", "$fieldsplit[1]", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));  //是否啟用NO-IE6設置 啟用/不啟用
    } else {
        $form->addElement(new XoopsFormHidden("field2", "$fieldsplit[1]"));
    }


    //是否顯示FLASH上的搜尋區塊
    if ($setting[1]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_SEARCH, "field3", "$fieldsplit[2]", _MA_NEODWADMIN_SHOW, _MA_NEODWADMIN_NSHOW));  //是否顯示FLASH上的搜尋區塊 顯示/不顯示
    } else {
        $form->addElement(new XoopsFormHidden("field3", "$fieldsplit[2]"));
    }


    //是否解除全站自動錨點功能
    if ($setting[2]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_AUTOMATICANCHOR, "field4", "$fieldsplit[3]", _MA_NEODWADMIN_REMOVE, _MA_NEODWADMIN_NOREMOVE));  //是否解除全站自動錨點功能  解除/不解除
    } else {
        $form->addElement(new XoopsFormHidden("field4", "$fieldsplit[3]"));
    }


    //是否啟用FB及G+的API按鈕功能
    if ($setting[3]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_FBGAPI, "field11", "$fieldsplit[10]", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));  //是否啟用FB及G+的API按鈕功能 啟用/不啟用
    } else {
        $form->addElement(new XoopsFormHidden("field11", "$fieldsplit[10]"));
    }


    //輸入LINE帳號
    if ($setting[25]==1) {
        $form->addElement(new XoopsFormText(_MA_NEODWADMIN_line, "line", 40, 255, "$line"));
    } else {
        $form->addElement(new XoopsFormHidden("line", "$line"));
    }


    //是否啟用LINE按鈕功能
    if ($setting[26]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_LINEBOTTON, "field22", "$fieldsplit[21]", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));  //是否啟用FB及G+的API按鈕功能 啟用/不啟用
    } else {
        $form->addElement(new XoopsFormHidden("field22", "$fieldsplit[21]"));
    }


    //輸入FB網址
    if ($setting[27]==1) {
        $form->addElement(new XoopsFormText(_MA_NEODWADMIN_FBURL, "fburl", 40, 255, "$fburl"));
    } else {
        $form->addElement(new XoopsFormHidden("fburl", "$fburl"));
    }

    //是否啟用FB-messages按鈕功能
    if ($setting[28]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_FBNY, "field23", "$fieldsplit[22]", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));  //是否啟用FB及G+的API按鈕功能 啟用/不啟用
    } else {
        $form->addElement(new XoopsFormHidden("field23", "$fieldsplit[22]"));
    }




    //輸入FB粉絲團網址
    if ($setting[29]==1) {
        $form->addElement(new XoopsFormText(_MA_NEODWADMIN_FBFANSURL, "fbfansurl", 40, 255, "$fbfansurl"));
    } else {
        $form->addElement(new XoopsFormHidden("fbfansurl", "$fbfansurl"));
    }


    //是否啟用FB粉絲團按鈕功能
    if ($setting[30]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_FBFANSURLNY, "field24", "$fieldsplit[23]", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));  //是否啟用FB及G+的API按鈕功能 啟用/不啟用
    } else {
        $form->addElement(new XoopsFormHidden("field24", "$fieldsplit[23]"));
    }


    //輸入聯絡我們網址
    if ($setting[31]==1) {
        $form->addElement(new XoopsFormText(_MA_NEODWADMIN_CONTACTUS, "contactus", 40, 255, "$contactus"));
    } else {
        $form->addElement(new XoopsFormHidden("contactus", "$contactus"));
    }


    //是否啟用聯絡我們按鈕功能
    if ($setting[32]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_CONTACTUSNY, "field25", "$fieldsplit[24]", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));  //是否啟用FB及G+的API按鈕功能 啟用/不啟用
    } else {
        $form->addElement(new XoopsFormHidden("field25", "$fieldsplit[24]"));
    }



    //是否啟用網站隨電腦解析度自動放大功能(解析度大於1440時會自動放大)
    if (!isset($fieldsplit[27])) {
        $fieldsplit[27]=1;
    }

    if ($setting[35]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_WEBSITEZOOM, "field28", "$fieldsplit[27]", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));  //是否啟用FB及G+的API按鈕功能 啟用/不啟用
    } else {
        $form->addElement(new XoopsFormHidden("field28", "$fieldsplit[27]"));
    }




    //是否啟用Xoops內建廣告功能
    if (!isset($fieldsplit[28])) {
        $fieldsplit[28]=0;
    }

    if ($setting[36]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_XOOPSAD, "field29", "$fieldsplit[28]", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));  //是否啟用FB及G+的API按鈕功能 啟用/不啟用
    } else {
        $form->addElement(new XoopsFormHidden("field29", "$fieldsplit[28]"));
    }




    //選擇右區塊顯示方式
    if ($setting[4]==1) {
        $select_a[5] = new XoopsFormSelect(_MA_NEODWADMIN_RIGHTDISPLAY, "field1", "$fieldsplit[0]", 2);  //選擇右區塊顯示方式
$optionsa["01"]=_MA_NEODWADMIN_RIGHTSHOWTHERIGHT; //右區塊顯示佈景右方
$optionsa["02"]=_MA_NEODWADMIN_RIGHTSHOWTHEBOTTOM;  //右區塊顯示佈景下方
$select_a[5] ->addOptionArray($optionsa);
        $form->addElement($select_a[5]);
    } else {
        $form->addElement(new XoopsFormHidden("field1", "$fieldsplit[0]"));
    }


    //如$fieldsplit[15]為空值時，$fieldsplit[15]="1";
    $asjsValue=($fieldsplit[15]=="")?"1":"$fieldsplit[15]";


    //選擇佈景外框判斷程式配置
    if ($setting[19]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_SETSFRAMEJUDGMENT, "field16", "$asjsValue", _MA_NEODWADMIN_AS3, _MA_NEODWADMIN_JS));  //選擇佈景外框判斷程式配置  AS3程式/JS程式
    } else {
        $form->addElement(new XoopsFormHidden("field16", "$asjsValue"));
    }



    //如$fieldsplit[15]為空值時，$fieldsplit[15]="1";
$asjsValue=($fieldsplit[16]=="")?"1":"$fieldsplit[16]"; //假/真

//選擇是否啟用寬版功能(USER瀏覽器大於及等於1280時版面會切換成寬版)
    if ($setting[20]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_SELECTENABLEWIDE, "field17", "$asjsValue", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));
    } else {
        $form->addElement(new XoopsFormHidden("field17", "$asjsValue"));
    }


    //選擇顯示佈景顏色
    if ($setting[21]==1) {
        $select_b[1] = new XoopsFormSelect(_MA_NEODWADMIN_THEMESCOLOR, "field18", "$fieldsplit[17]", 2);  //選擇右區塊顯示方式
$optionsa["01"]=_MA_NEODWADMIN_THEMESCOLORBLUE; //藍色版
$optionsa["02"]=_MA_NEODWADMIN_THEMESCOLORGREEN;  //綠色版
$optionsa["03"]=_MA_NEODWADMIN_THEMESCOLORPINKPURPLE;  //粉紅紫色版
$optionsa["04"]=_MA_NEODWADMIN_ORANGEEDITION;  //橘色版
$select_b[1] ->addOptionArray($optionsa);

        $form->addElement($select_b[1]);
    } else {
        $form->addElement(new XoopsFormHidden("field18", "$fieldsplit[17]"));
    }



    if ($setting[22]==1) {
        $tfValue01=($fieldsplit[18]=="")?"1":"$fieldsplit[18]"; //假/真
    
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_ENABLEFLASH, "field19", "{$tfValue01}", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));
    } else {
        $form->addElement(new XoopsFormHidden("field19", "{$tfValue01}"));
    }


    //是否啟用行動裝置minithemes佈景的自動切換功能!

    if ($setting[23]==1) {
        $tfValue02=($fieldsplit[19]=="")?"0":"$fieldsplit[19]"; //假/真
    

        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_MINITHEMES, "field20", "{$tfValue02}", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));
    } else {
        $form->addElement(new XoopsFormHidden("field20", "{$tfValue02}"));
    }






    //關鍵字設定 群組B
    //$form->addElement(new XoopsFormLabel("<h3>"._MA_NEODWADMIN_KEYWORDSETTINGS."</h3>", "")); //關鍵字設定


    //是否於前端顯示關鍵字配置
if ($setting[5]==1) {                       //是否於前端顯示關鍵字配置<br />(觀看配置情形)
$form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_KEYWORDTARGETING, "field8", "$fieldsplit[7]", _MA_NEODWADMIN_SHOW, _MA_NEODWADMIN_NSHOW));
} else {
    $form->addElement(new XoopsFormHidden("field8", "$fieldsplit[7]"));
}


    //是否啟用隨機顯示關鍵字功能
if ($setting[6]==1) {                       //是否啟用隨機顯示關鍵字功能
$form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_RANDOMKEYWORD, "field9", "$fieldsplit[8]", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));
} else {
    $form->addElement(new XoopsFormHidden("field9", "$fieldsplit[8]"));
}

    //JS播放器設定
    $form->addElement(new XoopsFormLabel("<h3>"._MA_NEODWADMIN_JSPLAY."</h3>", ""));

    //JS播放器設定顯示方式
    if ($setting[34]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_JSPLAYSTYLE, "field27", "$fieldsplit[26]", _MA_NEODWADMIN_JSPLAYSTYLE01, _MA_NEODWADMIN_JSPLAYSTYLE02));
    } else {
        $form->addElement(new XoopsFormHidden("field27", "$fieldsplit[26]"));
    }



    //按鈕設定  群組C                   //按鈕設定
    $form->addElement(new XoopsFormLabel("<h3>"._MA_NEODWADMIN_BUTTONTOSETTHE."</h3>", ""));


    //使用自動或手動按鈕對應模組反向功能
if ($setting[7]==1) {                            //使用自動或手動按鈕對應模組反向功能
$form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_BUTTONTOREVERSE, "field12", "$fieldsplit[11]", _MA_NEODWADMIN_AUTOMATIC, _MA_NEODWADMIN_MANUAL));
} else {
    $form->addElement(new XoopsFormHidden("field12", "$fieldsplit[11]"));
}

    //是否啟用子按鈕對應模組自動展開功能
    if ($setting[8]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_AUTOMATICALLYEXPAND, "field13", "$fieldsplit[12]", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));
    } else {
        $form->addElement(new XoopsFormHidden("field13", "$fieldsplit[12]"));
    }

    //是否啟用子按鈕底圖70%透明效果
    if ($setting[9]==1) {
        $form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_70TRANSPARENCY, "field14", "$fieldsplit[13]", _MA_NEODWADMIN_YSE, _MA_NEODWADMIN_NO));
    } else {
        $form->addElement(new XoopsFormHidden("field14", "$fieldsplit[13]"));
    }

    //佈景上方主選單樣式選擇
    if ($setting[10]==1) {
        $select_c[4] = new XoopsFormSelect(_MA_NEODWADMIN_MAINMENUSTYLES, "field5", "$fieldsplit[4]", 1);
        $optionsb["b"]=_MA_NEODWADMIN_STYLEBDROPDOWNISPLAY;  //樣式B:子選單下拉顯示
        $select_c[4]->addOptionArray($optionsb);
        $form->addElement($select_c[4]);
    } else {
        $XoopsFormHidden[11] = new XoopsFormHidden("field5", "$fieldsplit[4]");
        $form->addElement($XoopsFormHidden[11]);
    }




    //選擇右上方網站選單的顯示方式

    if ($setting[24]==1) {
        $tfValue03=($fieldsplit[20]=="")?"1":"$fieldsplit[20]"; //假/真

        $radio[1] = new XoopsFormRadio("選擇右上方網站選單按鈕的顯示方式", "field21", "{$tfValue03}", '&nbsp;&nbsp;');  //選擇跑馬燈速度
        $options["1"]="顯示預設選單";
        $options["2"]="顯示自訂選單(須於後台建立按鈕)";
        $options["3"]="顯示網站主選單";
        $radio[1]->addOptionArray($options);
        $form->addElement($radio[1]);
    } else {
        $form->addElement(new XoopsFormHidden("field21", "{$tfValue03}"));
    }






    //跑馬燈設定 群組D
$form->addElement(new XoopsFormLabel("<h3>"._MA_NEODWADMIN_MARQUEESET."</h3>", ""));  //跑馬燈設定


//是否啟用引入其他模組的內容顯示於跑馬燈中
if ($setting[11]==1) {                        //是否啟用新聞模組的內容顯示於跑馬燈功能
$form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_THENEWSMODULESHOWATTHEMARQUEE, "field15", "$fieldsplit[14]", _MA_NEODWADMIN_TRUETADNEWS, _MA_NEODWADMIN_FALSETADNEWS));
} else {
    $form->addElement(new XoopsFormHidden("field15", "$fieldsplit[14]"));
}



    //跑馬燈樣式選擇
    if ($setting[12]==1) {
        $select_d[2] = new XoopsFormSelect(_MA_NEODWADMIN_MARQUEESTYLEOPTIONS, "field7", "$fieldsplit[6]", 2);   //跑馬燈樣式選擇
$optionsd["a"]=_MA_NEODWADMIN_STYLEA;      //樣式A:跑馬燈文字右往左
$optionsd["b"]=_MA_NEODWADMIN_STYLEB;      //樣式B:跑馬燈文字下往上
$select_d[2]->addOptionArray($optionsd);
        $form->addElement($select_d[2]);
    } else {
        $form->addElement(new XoopsFormHidden("field7", "$fieldsplit[6]"));
    }

    //選擇跑馬燈速度
    if ($setting[13]==1) {
        $select_d[3] = new XoopsFormSelect(_MA_NEODWADMIN_MARQUEESPEED, "field10", "$fieldsplit[9]", 1);   //選擇跑馬燈速度
        $optionse["1"]=_MA_NEODWADMIN_SPEED1;
        $optionse["2"]=_MA_NEODWADMIN_SPEED2;
        $optionse["3"]=_MA_NEODWADMIN_SPEED3;
        $optionse["4"]=_MA_NEODWADMIN_SPEED4;
        $optionse["5"]=_MA_NEODWADMIN_SPEED5;
        $optionse["6"]=_MA_NEODWADMIN_SPEED6;
        $optionse["7"]=_MA_NEODWADMIN_SPEED7;
        $optionse["8"]=_MA_NEODWADMIN_SPEED8;
        $optionse["9"]=_MA_NEODWADMIN_SPEED9;
        $optionse["10"]=_MA_NEODWADMIN_SPEED10;
        $select_d[3]->addOptionArray($optionse);
        $form->addElement($select_d[3]);
    } else {
        $form->addElement(new XoopsFormHidden("field10", "$fieldsplit[9]"));
    }




    //設定跑馬燈顯示方式
if ($setting[33]==1) {                        //設定跑馬燈顯示方式
$form->addElement(new XoopsFormRadioYN(_MA_NEODWADMIN_MARQUEETEYLE, "field26", "$fieldsplit[25]", MARQUEETEYLE01, MARQUEETEYLE02));
} else {
    $form->addElement(new XoopsFormHidden("field26", "$fieldsplit[25]"));
}







    //LOGO設定  群組F
$form->addElement(new XoopsFormLabel("<h3>"._MA_NEODWADMIN_LOGOSET."</h3>", ""));  //LOGO設定

//LOGO樣式選擇
    if ($setting[14]==1) {
        $select_f[1]= new XoopsFormSelect(_MA_NEODWADMIN_LOGOSTYLEOPTIONS, "field6", "$fieldsplit[5]", 2);  //LOGO樣式選擇
$optionsc["a"]=_MA_NEODWADMIN_STYLEAIMAGETEXT;              //樣式A:圖片+文字顯示
$optionsc["b"]=_MA_NEODWADMIN_STYLEBIMAGEDISPLAYS;          //樣式B:圖片顯示
$select_f[1]->addOptionArray($optionsc);
        $form->addElement($select_f[1]);
    } else {
        $form->addElement(new XoopsFormHidden("field6", "$fieldsplit[5]"));
    }

    //上傳LOGO圖檔
    if ($setting[15]==1) {
        $form->addElement(new XoopsFormFile(_MA_NEODWADMIN_UPLOADLOGO, "upfile[]", 2048000));
    } else {
        $form->addElement(new XoopsFormHidden("upfile[]", ''));
    }

    //圖檔樣式說明
    if ($setting[16]==1) {
        //$filelistest[a] =_MA_NEODWADMIN_JPGEA;
$filelistesta ="<span>"._MA_NEODWADMIN_MAKEA."{$imgwh}"._MA_NEODWADMIN_THESIZEOFTHE."</span>";    //<span>製作1張{$imgwh}大小的{$imgfileok}圖檔</span>



$fieldn=$fieldsplit[5];

        //如果LOGO設定來源指定樣式B，則$fieldn=樣式B;

        $img_date = date("H:i:s");



        if (file_exists(XOOPS_ROOT_PATH.'/uploads/'.$xoops_theme.'/logoimg.png')) {
            $filelist="<img  src='".XOOPS_URL."/uploads/$xoops_theme/logoimg.png?state={$img_date}' ><br />$filelistesta";
        } else {
            $filelist="<img  src='".XOOPS_URL."/themes/$xoops_theme/default/logoimg.png' ><br />$filelistesta";
        }


        $form->addElement(new XoopsFormLabel(_MA_NEODWADMIN_EXPLAIN, "$filelist"));  //說明
    }
    $form->addElement(new XoopsFormHidden("filenane", 'settings.php'));




    /*================第2圖檔上傳=====================*/

    //上傳第二LOGO圖檔

    if ($setting[17]==1) {
        $form->addElement(new XoopsFormFile(_MA_NEODWADMIN_SECONDLOGO, "upfile[]", 2048000));
    } else {
        $form->addElement(new XoopsFormHidden("upfile[]", ''));
    }




    //圖檔樣式說明
if ($setting[18]==1) {   //<span>製作1張{$imgwh2}大小的{$imgfileok2}圖檔</span>
$filelistestb ="<span>"._MA_NEODWADMIN_MAKEA."{$imgwh2}"._MA_NEODWADMIN_THESIZEOFTHE."</span>";


    if (file_exists(XOOPS_ROOT_PATH.'/uploads/'.$xoops_theme.'/icon.png')) {
        $filelist="<img  src='".XOOPS_URL."/uploads/$xoops_theme/icon.png?state={$img_date}' ><br />$filelistestb";
    } else {
        $filelist="<img  src='".XOOPS_URL."/themes/$xoops_theme/default/icon.png' ><br />$filelistestb";
    }




    $fieldn=$fieldsplit[5];
    $FormFile_f[5]= new XoopsFormLabel(_MA_NEODWADMIN_EXPLAIN, "$filelist");
    $form->addElement(new XoopsFormHidden("fielda", "logo2{$imgfileok2}"));
    $form->addElement($FormFile_f[5]);
}
    $form->addElement(new XoopsFormHidden("filenane", 'settings.php'));


    $form->setExtra('enctype="multipart/form-data"');
    $form->addElement(new XoopsFormHidden("op", "save_news"));
    $form->addElement(new XoopsFormButton("", "", _MA_NEODWADMIN_SENT, "submit"));
    $main = $form->render();
    return $main;
}








function insert_news()
{
    global $xoopsDB;




    $fburlanalyze=analyzefbid($fburl=$_POST['fburl']);

    for ($x=1; $x<=29; $x++) {
        $fildida=field.$x;
        $fieldupdate[$x-1]= $_POST[$fildida];
    }
    $fieldimplode=implode(';', $fieldupdate);
    $sql = "update ".$xoopsDB->prefix("neothemesconfig")." set   
	field='{$fieldimplode}',line='{$_POST['line']}',fburl='{$fburlanalyze}',fbfansurl='{$_POST['fbfansurl']}',contactus='{$_POST['contactus']}'";
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());
    save_pic($logo=logoimg, $width0=429, $height0=149, $imageconvert=png, $icon=icon, $width1=16, $height1=16);
}




//引入CSS


    
xoops_cp_header();
loadModuleAdminMenu(1);
include "tplthemescss.php";



echo $main;
xoops_cp_footer();
