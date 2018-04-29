<?php	
global  $xoopsConfig;
include_once XOOPS_ROOT_PATH.'/modules/neothemesadmin/language/'.$xoopsConfig['language'].'/blocks.php';

switch ($xoops_dirname) {
  case "tadnews":
$nsn=(empty($_REQUEST['nsn']))?"":$_REQUEST['nsn'];
!empty($nsn) ? tad_newsmate($nsn) : '';
  break;

  case "tinyd0":
$tinydid=(empty($_REQUEST['id']))?"":$_REQUEST['id'];
!empty($tinydid) ? tinyd0mate($tinydid) : '';
  break;
  
  case "neilhonorlist":
$hc_id=(empty($_REQUEST['hc_id']))?"":$_REQUEST['hc_id'];
!empty($hc_id) ? neilhonorlistmate($hc_id) : '';
  break;
 
  case "neilshop":
$productid=(empty($_REQUEST['productid']))?"":$_REQUEST['productid'];
!empty($productid) ? neilshopmate($productid) : '';
$sortid=(empty($_REQUEST['sortid']))?"":$_REQUEST['sortid'];
!empty($sortid) ? neilshopsortmate($sortid) : '';
  break;

  case "neilvideosvote":
$item_id=(empty($_REQUEST['item_id']))?"":$_REQUEST['item_id'];
!empty($item_id) ? neilvideosvotelistmate($item_id) : '';
  break;
  
  default:

}




//tadnews模組mate強化設定
function tad_newsmate($nsn="")
{
    //引入模組DB函數-初始化設定

    $dbneme="tad_news";
    $where=" where `nsn` = ".$nsn."";
    $moduledb=moduledb($dbneme, $where);
    //去除段行處理
    $news_content=phpstrip_tags($moduledb['news_content']);
    //限制字串輸出長度
    $news_content = mb_substr($news_content, 0, 325, 'utf8');
    //輸入meta函數
    //$xoops_meta_description="",$image=""
    keywordsfunction($news_content);

    return true;
}


//tinyd0模組mate強化設定
function tinyd0mate($tinydid="")
{
    //引入模組DB函數-初始化設定
    $dbneme="tinycontent0";
    $where=" where `storyid` = ".$tinydid."";
    $moduledb=moduledb($dbneme, $where);
    //去除段行處理
    $text=phpstrip_tags($moduledb['text']);
    //限制字串輸出長度
    $text = mb_substr($text, 0, 325, 'utf8');
    //輸入meta函數
    //$xoops_meta_description="",$image=""
    keywordsfunction($text);
    return true;
}


//neilhonorlist模組mate強化設定
function neilhonorlistmate($hc_id="")
{
    global $xoopsModule;
    //引入模組DB函數-初始化設定
    $dbneme="neilhonorcontent";
    $where=" where `hc_id` = ".$hc_id."";
    $moduledb=moduledb($dbneme, $where);
    //去除段行處理
    $honor_content=phpstrip_tags($moduledb['honor_content']);
    //限制字串輸出長度
    $honor_content = mb_substr($honor_content, 0, 325, 'utf8');
    //輸入meta函數
    //$xoops_meta_description="",$image=""

    if (file_exists(XOOPS_ROOT_PATH.'/uploads/'.$xoopsModule->getVar("dirname").'/cover/'.$moduledb['honorimgid'])) {
        $image=XOOPS_URL.'/uploads/'.$xoopsModule->getVar("dirname").'/cover/'.$moduledb['honorimgid'];
    } else {
        $image=XOOPS_URL.'/modules/'.$xoopsModule->getVar("dirname").'/images/defaultimg.jpg';
    }
    keywordsfunction($honor_content, $image, $moduledb['honortitle']);
    return true;
}


//neilshop模組mate強化設定
function neilshopmate($productid="")
{
    global $xoopsModule;
    //引入模組DB函數-初始化設定
    $dbneme="neilshopproductcontent";
    $where=" where `productid` = ".$productid."";
    $moduledb=moduledb($dbneme, $where);
    //去除段行處理
    $description=phpstrip_tags($moduledb['description']);
    //限制字串輸出長度
    $description=mb_substr($description, 0, 325, 'utf8');
    //輸入meta函數
    //$xoops_meta_description="",$image=""

    if (file_exists(XOOPS_ROOT_PATH.'/uploads/'.$xoopsModule->getVar("dirname").'/image/.thumbs/'.$moduledb['blockimg'].'.jpg')) {
        $image=XOOPS_URL.'/uploads/'.$xoopsModule->getVar("dirname").'/image/.thumbs/'.$moduledb['blockimg'].'.jpg';
    } else {
        $image=XOOPS_URL.'/modules/'.$xoopsModule->getVar("dirname").'/images/defaultimg.jpg';
    }
    keywordsfunction($description, $image, $moduledb['productidtitle']);
    return true;
}
    
function neilshopsortmate($sortid="")
{
    global $xoopsModule;
    //引入模組DB函數-初始化設定
$dbneme="neilshopsort";  //資料表名稱
$where=" where `sortid` = '".$sortid."'";
    $moduledb=moduledb($dbneme, $where);
    //去除段行處理
    $description=phpstrip_tags($moduledb['sorttext']);
    //限制字串輸出長度
    $description=mb_substr($description, 0, 325, 'utf8');
    //輸入meta函數
    //$xoops_meta_description="",$image=""

    $image=XOOPS_URL.'/modules/'.$xoopsModule->getVar("dirname").'/images/defaultimg.jpg';
    keywordsfunction($description, $image, $moduledb['sorttitle']);
    return true;
}



//neilvideosvote模組mate強化設定
function neilvideosvotelistmate($item_id="")
{
    global $xoopsModule;
    //引入模組DB函數-初始化設定
    $dbneme="neilvideosvote_item";
    $where=" where `item_id` = ".$item_id."";
    $moduledb=moduledb($dbneme, $where);
    //去除段行處理
    $item_description=phpstrip_tags($moduledb['item_description']);
    //限制字串輸出長度
    $item_description = mb_substr($item_description, 0, 325, 'utf8');
    //輸入meta函數
    //$xoops_meta_description="",$image=""

    $image="http://img.youtube.com/vi/".$moduledb['link']."/sddefault.jpg";
    keywordsfunction($item_description, $image, $moduledb['item_name']);
    return true;
}
