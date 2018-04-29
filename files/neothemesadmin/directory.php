<?php	
//selectdb.php
//引入瀏覽裝置判斷

$xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];
include "{$rootpath}/themes/{$xoops_theme}/program/ifthedevice.php";


$selectdbphp=true;
include "{$rootpath}/modules/neothemesadmin/blocks/selectdb.php";
include "{$rootpath}/modules/neothemesadmin/class/selectdb.php";
include "{$rootpath}/modules/neothemesadmin/class/function.php";
include "{$rootpath}/modules/neothemesadmin/class/themeset.php";

//輸出$mid數值到樣板
$this->assign('neomodule', $mid);
//使用neothemesadmin的編號進行判斷，如為空值則不讀取以下code。
if ($mid != '') {
    //撈取neothemesconfig資料表內容
    $neothemesconfig=true;
    include "{$rootpath}/modules/neothemesadmin/blocks/selectdb.php";
    //各項參數
    include "{$rootpath}/modules/neothemesadmin/blocks/tplparameter.php";
    //marquee
    include "{$rootpath}/modules/neothemesadmin/blocks/marquee.php";
    //SEO
    include "{$rootpath}/modules/neothemesadmin/blocks/themesseo.php";
    //模組分類選單
    include "{$rootpath}/modules/neothemesadmin/blocks/modulessort.php";

    //menu
    if ($themefolder=='computer' or $_SESSION["Themefolder"]=='computer') {
        include "{$rootpath}/modules/neothemesadmin/blocks/themesmenu.php";
        //FLASH
        include "{$rootpath}/modules/neothemesadmin/blocks/flashimg.php";
    } else {
        include "{$rootpath}/modules/neothemesadmin/blocks/themesmenuphone.php";
        //FLASH
        include "{$rootpath}/modules/neothemesadmin/blocks/flashimgphone.php";
    }
    //輸出樣板
    include "{$rootpath}/modules/neothemesadmin/blocks/assigntpl.php";
    //輸出樣板
    include "{$rootpath}/modules/neothemesadmin/blocks/rmenu.php";
}
