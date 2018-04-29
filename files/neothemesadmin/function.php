<?php
//function.php 是將前後台都會用到的函數放到這裡

//引入TadTools的函式庫
if (!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php")) {
    redirect_header("http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50", 3, _TAD_NEED_TADTOOLS);
}
include_once XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php";
//引入Neil函數庫
include_once XOOPS_ROOT_PATH."/modules/neillibrary/function.php";

//關鍵字查詢模組option
 function modulesnameoption($dirname="")
 {
     global $xoopsDB;

     $dbneme="neothemeskeyword";
     $where=" order by  nsn DESC";
     $keyword=databasetablewhile($dbneme, $where);
     //去除已選擇模組
     foreach ($keyword as $key=> $val) {
         $usekeywordid[]=$keyword[$key]['keywordid'];
         if ($dirname!=$keyword[$key]['keywordid']) {
             $usekdb.="`dirname` !='".$keyword[$key]['keywordid']."' && ";
         }
     }


     $usekdb=substr($usekdb, 0, -3);
     if (!empty($usekdb)) {
         $or='&&';
     }
 
     //網站首頁
     if (!in_array("system", $usekeywordid) or $dirname==system) {
         $modulesoption="
    <option selected='selected'  value='system' >"._MA_NEODWADMIN_DISPLAYHOMEKEYWORD."</option>
";
     }
     //全部頁面
     if (!in_array("modules", $usekeywordid) or $dirname==modules) {
         $modulesoption.="
    <option selected='selected'   value='modules' >"._MA_NEODWADMIN_DISPLAYALLPAGESKEYWORD."</option> 
";
     }
     $dirname_idoption=$dirname;
     $sql = "select name,dirname from " . $xoopsDB->prefix('modules')   . "  where `hasmain` !=0   &&  `dirname`  !='pm'  &&  `dirname`  !='profile' $or  $usekdb";
     $result = $xoopsDB -> query($sql) or die($sql);
     while (list($name, $dirname) = $xoopsDB -> fetchRow($result)) {
         if ($dirname==$dirname_idoption) {
             $selected="selected='selected'";
         }
         $modulesoption.="<option ".$selected."   value='".$dirname."'   >".$name."</option>";
         unset($selected);
     }
     return $modulesoption;
 }




 
//關鍵字輸出
function keywordsfunction($xoops_meta_description="", $image="", $xoops_pagetitle="")
{
    global $xoopsTpl;
    $xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];
    if (empty($image)) {
        //判斷佈景LOGO圖片是否存在
        if (file_exists(XOOPS_ROOT_PATH.'/uploads/neilambilight/logoimg.png')) {
            $image="".XOOPS_URL."/uploads/neilambilight/logoimg.png";
        } else {
            $image="".XOOPS_URL."/themes/".$xoops_theme."/default/logoimg.png";
        }
    }
    if (!empty($xoops_pagetitle)) {
        $xoopsTpl->assign("xoops_pagetitle", $xoops_pagetitle);
    }
    $xoopsTpl->assign("xoops_meta_description", $xoops_meta_description);
    $xoopsTpl->assign("metaimage", $image);

    return true;
}
