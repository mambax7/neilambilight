<?php
include "../../../include/cp_header.php";
include "../function.php";
include "../class/themeset.php";
include "../class/selectdb.php";
include "imguploader.php";
include_once XOOPS_ROOT_PATH . "/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH . "/Frameworks/art/functions.admin.php";

$turnsimg   = (empty($_REQUEST['i'])) ? "" : $_REQUEST['i'];
$imgb       = (empty($_REQUEST['b'])) ? "" : $_REQUEST['b'];
$dbswitchok = (empty($_REQUEST['dbswitch'])) ? "" : $_REQUEST['dbswitch'];
$op         = (empty($_REQUEST['op'])) ? "" : $_REQUEST['op'];
$nsn        = (empty($_REQUEST['nsn'])) ? "" : $_REQUEST['nsn'];

switch ($op) {
    case "newmarquee01":
        insert_flashimg(a);
        redirect_header(XOOPS_URL . '/modules/neothemesadmin/admin/flashimgtable.php', 0, _MA_NEODWADMIN_ADDDATA);

        break;
    case "newmarquee02":
        insert_flashimg(b, $dbswitchok);
        redirect_header(XOOPS_URL . '/modules/neothemesadmin/admin/flashimgtable.php', 0, _MA_NEODWADMIN_ADDDATA);

        break;
    default:
        $main = add_form($nsn, $turnsimg, $imgb);
}

/**
 * @param string $nsn
 * @param string $turnsimg
 * @param string $imgb
 * @return string
 */
function add_form($nsn = "", $turnsimg = "", $imgb = "")
{
    if (!empty($nsn)) {
        //編輯內容

        global $xoopsDB;

        $kset = '0'; //switch條件
        //搜尋neothemesflash資料表
        $selectneothemesflash = neothemesflash::publicselectdb4($kset, $nsn, $number, $content, $url, $target, $post_date, $imgid, $themesid);
        list($nsn, $number, $content, $url, $target, $post_date, $imgid, $themesid) = $selectneothemesflash;

        $imgb       = "$number";
        $title1     = "$content";
        $title2     = "$url";
        $targetop   = "$target";
        $nsna       = "$number";
        $opture     = "newmarquee02";
        $dbswitch   = "$nsn";
        $title3     = _MA_NEODWADMIN_EDITORA;  //新增
        $flashtexta = "$themesid";
    } else {
        //新增內容

        $kset = '1'; //switch條件
        //搜尋neothemesflash資料表
        $selectneothemesflash = neothemesflash::publicselectdb4($kset, $nsn, $number, $content, $url, $target, $post_date, $imgid, $themesid);
        list($nsn, $number, $content, $url, $target, $post_date, $imgid, $themesid) = $selectneothemesflash;

        $title1     = "";
        $title2     = "";
        $targetop   = "self";
        $nsna       = $nsn + 1;
        $fnsnid     = "$nsna";
        $opture     = "newmarquee01";
        $dbswitch   = "";
        $title3     = _MA_NEODWADMIN_NEW;
        $flashtexta = "";
    }

    //新增與編輯Flash圖片共用表格欄位
    include_once(XOOPS_ROOT_PATH . "/class/xoopsformloader.php");
    $XoopsFormText[1] = new XoopsFormText(_MA_NEODWADMIN_FLASHIMAGECAPTION, "content", 60, 255, $title1);
    $XoopsFormText[2] = new XoopsFormText(_MA_NEODWADMIN_FLASHIMAGELINK, "url", 60, 255, $title2);
    //$formTextArea[1] = new XoopsFormTextArea (_MA_NEODWADMIN_ENTERTHEFLASHHELP, "themesid", $flashtexta, 6, 100);
    $select[1]     = new XoopsFormSelect(_MA_NEODWADMIN_FLASHIMAGEOPEN, "target", "$targetop", 2);
    $optionsa["0"] = "self";
    $optionsa["1"] = "blank";
    $select[1]->addOptionArray($optionsa);

    //先建構class($themesetclass)
    $themesetclass = new  themesetclass;
    $topvsplit     = $themesetclass->themespublicb($variableok, $setting);
    list($variableoka, $settinga) = $topvsplit;
    $variablesplit = preg_split('/;/', $variableoka);

    $flashimgwh = $variablesplit[4];          //說明文字："Flash圖檔大小：

    $img_date = date("H:i:s");

    $xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];
    $FormFile[1] = new XoopsFormFile("{$flashimgwh}", "upfile[]", 2048000);

    $filelist           = "<div style='width: 400px' ><img  style='width: 400px''  src='" . XOOPS_URL . "/uploads/$xoops_theme/p{$imgid}.jpg?state={$img_date}' ></div><br />";
    $FormFile[2]        = new XoopsFormLabel(_MA_NEODWADMIN_FLASHTHUMBNAIL, "$filelist");
    $time_date          = date("Y-m-d H:i:s", mktime(date(H) + 0, date(i), date(s), date(m), date(d), date(Y)));
    $XoopsFormHidden[1] = new XoopsFormHidden("post_date", $time_date);
    $XoopsFormHidden[2] = new XoopsFormHidden("fnsnid", $fnsnid);
    $XoopsFormHidden[3] = new XoopsFormHidden("dbswitch", $dbswitch);
    $XoopsFormHidden[4] = new XoopsFormHidden("filenane", 'newflashimg.php');
    $XoopsFormHidden[5] = new XoopsFormHidden("imgnumber", $nsna);
    $XoopsFormHidden[6] = new XoopsFormHidden("imgidq", $imgid);
    $XoopsFormHidden[7] = new XoopsFormHidden("themesid", $xoops_theme);

    $title            = "$nsna";
    $XoopsFormText[3] = new XoopsFormText(_MA_NEODWADMIN_ORDER, "nnumber", 1, 255, $imgb);
    $form             = new XoopsThemeForm("<h4>{$title3}" . _MA_NEODWADMIN_NUMBER . "($turnsimg)" . _MA_NEODWADMIN_OFTHEFLASHIMAGE . "</h4>", "form", $_SERVER['PHP_SELF']);
    $form->addElement($XoopsFormText[1]);
    $form->addElement($XoopsFormText[2]);
    //$form->addElement($formTextArea[1]);
    $form->addElement($select[1]);
    $form->addElement($FormFile[1]);
    if ($opture == "newmarquee02") {
        $form->addElement($FormFile[2]);
    }

    $form->addElement($XoopsFormHidden[1]);
    $form->addElement($XoopsFormHidden[2]);
    $form->addElement($XoopsFormHidden[3]);
    $form->addElement($XoopsFormHidden[4]);
    $form->addElement($XoopsFormHidden[5]);
    $form->addElement($XoopsFormHidden[6]);
    $form->addElement($XoopsFormHidden[7]);
    $form->addElement($XoopsFormText[3]);
    $form->setExtra('enctype="multipart/form-data"');
    $form->addElement(new XoopsFormHidden("op", "$opture"));
    $form->addElement(new XoopsFormButton("", "", _MA_NEODWADMIN_SENT, "submit"));
    $main = $form->render();
    return $main;
}

/**
 * @param $a
 * @param $dbswitchok
 */
function insert_flashimg($a, $dbswitchok)
{
    global $xoopsDB;

    switch ($a) {
        case "a":
            //新增內容SQL語法
            $sql = "insert into " . $xoopsDB->prefix('neothemesflash') . "
  (`nnumber`  ,`content`  ,  `url` ,  `target` ,  `post_date` ,  `imgid`,  `themesid`)
  values
  ('{$_POST['nnumber']}'  , '{$_POST['content']}'  ,  '{$_POST['url']}'   ,  '{$_POST['target']}'  ,  '{$_POST['post_date']}' ,  '{$_POST['imgnumber']}' ,  '{$_POST['themesid']}')";
            $xoopsDB->queryF($sql);

            $pimg = p . "{$_POST['imgnumber']}";
            save_pic($img = $pimg, $width0 = 1275, $height0 = 308, $imageconvert = jpg);

            //儲存最後一次新增的nsn
            $sql = "update " . $xoopsDB->prefix("neothemesconfig") . " set   
	fnsnid = '{$_POST['fnsnid']}' ";
            $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());
            break;

        case "b":
            $sql  = "update " . $xoopsDB->prefix("neothemesflash") . " set   
	nnumber = '{$_POST['nnumber']}',
	content = '{$_POST['content']}', 	
	url= '{$_POST['url']}',
	target= '{$_POST['target']}',  
	post_date= '{$_POST['post_date']}', 
	themesid= '{$_POST['themesid']}' 				
       where  nsn= '{$dbswitchok}' ";
            $pimg = p . "{$_POST['imgidq']}";
            save_pic($img = $pimg, $width0 = 1275, $height0 = 308, $imageconvert = jpg);
            $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());

            //儲存最後一次更新的nsn
            $sql = "update " . $xoopsDB->prefix("neothemesconfig") . " set   
	fnsnid = '{$dbswitchok}' ";
            $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());

            break;
    }
}

xoops_cp_header();
loadModuleAdminMenu(4);
//引入CSS
include "tplthemescss.php";
echo $main;
xoops_cp_footer();
