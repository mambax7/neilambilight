<?php
include 'header.php'; //XOOPS檔頭
include "../function.php";
include "../mailfunction.php";
//引入CSS
include "tplthemescss.php";

$cfid = (empty($_REQUEST['cfid'])) ? "" : $_REQUEST['cfid'];
$op   = (empty($_REQUEST['op'])) ? "" : $_REQUEST['op'];

switch ($op) {

    case "replyupdate":
        $url = replyupdate();
        redirect_header(XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/contactuscontent.php" . $url . "", 0, _MS_SHARED02);

        break;

    default:
        snidup($cfid);
        $main = contactuscontent();
}

/**
 * @param $cfid
 * @return string
 */
function contactuscontent($cfid)
{
    global $cfid, $xoopsModule;

    //開啟聯絡我們資料表
    $dbneme               = "neocontactusform";
    $where                = " where `cfid` = '" . $cfid . "'";   //where數值-修改
    $contactuscontentlist = moduledb($dbneme, $where);

    $texe_user = preg_replace("/\s(?=)/", "<p>", $contactuscontentlist['texe_user']);

    //回覆判斷
    if (empty($contactuscontentlist['replytext'])) {
        $box = inputtextarea($class = "", $name = "replytext", $id = "replytext", $rows = "6", $cols = "80", $value = "") . " <span id='helpBlock' class='help-block'>" . _MA_CONTACTUSTABLEPHP36 . "</span>" . "  
<input type='hidden' name='email_user' value='" . $contactuscontentlist['email_user'] . "'>
<input type='hidden' name='name_user' value='" . $contactuscontentlist['name_user'] . "'>	
<input type='hidden' name='cfid' value='" . $contactuscontentlist['cfid'] . "'>	
<button  type='submit' name='op' value='replyupdate' class='btn btn-primary btn-lg btn-block'>" . _MA_CONTACTUSTABLEPHP37 . "</button> </div>";

        $boxtd = "<td colspan='3'>" . $box . "</td>";
    } else {
        $replytext = preg_replace("/\s(?=)/", "<p>", $contactuscontentlist['replytext']);
        $box       = sprintf(_MA_CONTACTUSTABLEPHP35, $replytext);
        $boxtd     = " <td>" . sprintf(_MA_CONTACTUSTABLEPHP38, $contactuscontentlist['replytime']) . "</td><td colspan='2'>" . $box . "</td>";
    }

    //性別
    switch ($contactuscontentlist['radiog']) {
        case "male":
            $gender = _MA_CONTACTUSTABLEPHP21;
            break;
        case "female":
            $gender = _MA_CONTACTUSTABLEPHP22;
            break;
    }

    $divcenter = "
<div class='container'>
	 	<form method='post'  action='{$_SERVER['PHP_SELF']}'>		
   <div class='page-header'>
  <h2>" . _MA_CONTACTUSTABLEPHP26 . "<small> &nbsp;Contact us for the letter</small>&nbsp;&nbsp; <a class='btn btn-warning active'  href='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/contactustable.php'>" . _MA_GOCONTACTUSTABLEPHP . "</a></h2>
</div>
	
    
     <div class='form-group col-md-12'>
     	<table class='table'>
  <tr>
    <td style='width: 33%;'>" . sprintf(_MA_CONTACTUSTABLEPHP27, $contactuscontentlist['cfidtime']) . "</td>
    <td style='width: 33%;'>" . sprintf(_MA_CONTACTUSTABLEPHP28, $contactuscontentlist['name_user']) . "</td>
    <td style='width: 33%;'>" . sprintf(_MA_CONTACTUSTABLEPHP29, $contactuscontentlist['email_user']) . "</td>
 
  </tr>
  <tr>
    <td>" . sprintf(_MA_CONTACTUSTABLEPHP30, $contactuscontentlist['tel_user']) . "</td>
    <td>" . sprintf(_MA_CONTACTUSTABLEPHP31, $contactuscontentlist['citytel_user']) . "</td>
    <td>" . sprintf(_MA_CONTACTUSTABLEPHP32, $gender) . "</td>
 
  </tr>
    <tr>
       <td >" . sprintf(_MA_CONTACTUSTABLEPHP33, $contactuscontentlist['contactmatters']) . "</td>
    <td colspan='2'>" . sprintf(_MA_CONTACTUSTABLEPHP34, $texe_user) . "</td>
  
  </tr>
   <tr>
   " . $boxtd . "
  </tr>
</table> 
     	 
     	 </div>	 </form></div>


";

    return $divcenter;
}

/**
 * @return string
 */
function replyupdate()
{
    global $cfid;

    //儲存回覆內容
    $setvar = "set replytext='{$_POST[replytext]}', replytime='" . timedate($datevar = "Y-m-d H:i:s") . "'  where cfid='" . $cfid . "'";
    update($dbname = "neocontactusform", $set = $setvar);
    contactforreplymail($usermail = "" . $_POST['email_user'] . "", $text = "" . $_POST[replytext] . "", $usermane = "" . $_POST['name_user'] . "", $timedate = "" . timedate($datevar = "Y-m-d H:i:s") . "");
    $url = "?cfid=" . $cfid . "";
    return $url;
}

function snidup()
{
    global $cfid;
    $setvar = "set readtrue='1'  where cfid='" . $cfid . "'";
    update($dbname = "neocontactusform", $set = $setvar);
}

loadModuleAdminMenu(9);
echo $main;

include "footer.php"; //XOOPS檔尾
