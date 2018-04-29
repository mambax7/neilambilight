<?php
include "header.php";
$xoopsOption['template_main'] = "contactusform.tpl";
include_once XOOPS_ROOT_PATH . "/header.php";
include "mailfunction.php";

$xoopsTpl->assign('xoops_module_header', "

<script>var xoopsjsurl='" . XOOPS_URL . "';</script>
<script src='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar('dirname') . "/js/formvalidation.js'></script>	
<script src='" . XOOPS_URL . "/modules/neillibrary/js/dist/sweetalert.min.js'></script>	
<link rel='stylesheet' type='text/css' media='screen' href='" . XOOPS_URL . "/modules/neillibrary/js/dist/sweetalert.css'>			

");

$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : "";

switch ($op) {
    case "contactustosend":
        //機器人檢查
        if ($_POST['verification'] != agree) {
            redirect_header(XOOPS_URL, 0, _MD_NOTWELCOME);
        }
        contactustosend();
        redirect_header(XOOPS_URL, 0, _MD_COMPLETETHEFORM);

        break;

    default:
        $contactusform = contactusform();
}

function contactusform()
{

    //開啟neothemesconfig資料表
    $dbneme          = "neothemesconfig";
    $where           = " where `nsn` = '1'";   //where數值-修改
    $neothemesconfig = moduledb($dbneme, $where);
    //切割陣列
    $fieldsplit = cuttingfunction($cutting = $neothemesconfig['field'], $sign = ";");

    if (empty($fieldsplit[24]) or !empty($neothemesconfig['contactus'])) {
        redirect_header(XOOPS_URL, 0, '');
    }

    //姓名
    $contactusform['name_user'] = inputtext($class = "", $name = "name_user", $value = "", $placeholder = "" . _MD_CONTACTENTER . "" . _MD_CONTACTNAME . "", $id = "name_user");
    //E-MAIL
    $contactusform['email_user'] = inputtext($class = "", $name = "email_user", $value = "", $placeholder = "" . _MD_CONTACTENTER . "" . _MD_CONTACTEMAIL . "", $id = "email_user");
    //聯絡手機
    $contactusform['tel_user'] = inputtext($class = "", $name = "tel_user", $value = "", $placeholder = "" . _MD_CONTACTENTER . "" . _MD_CONTACTTELEPHONE . "", $id = "tel_user");
    //連絡市話
    $contactusform['citytel_user'] = inputtext($class = "", $name = "citytel_user", $value = "", $placeholder = "" . _MD_CONTACTENTER . "" . _MD_CONTACTTELECITYPHONE . "", $id = "citytel_user");
    //您的性別
    //選擇操作
    $radiogArr              = array(); //建構陣列
    $i                      = 0;
    $radiogArr[$i]['value'] = "male";
    $radiogArr[$i]['text']  = _MD_CONTACTGENDER01;
    $radiogArr[$i]['id']    = "male";
    $i++;
    $radiogArr[$i]['value'] = "female";
    $radiogArr[$i]['text']  = _MD_CONTACTGENDER02;
    $radiogArr[$i]['id']    = "female";
    $i++;

    foreach ($radiogArr as $key => $val) {
        $contactusform['radiog'] .= radioinlinelist($dataid = $radiogArr[$key]['id'], $class = "", $name = "radiog", $text = $radiogArr[$key]['text'], $value = $radiogArr[$key]['value'], $oid = "male", $id = $radiogArr[$key]['id']);
    }

    //聯絡事項
    $dbneme             = "neothemesconfig";
    $where              = "  order by  contactmatters  ASC";  //where數值
    $neothemesconfigbox = moduledb($dbneme, $where);

    //切割陣列
    $fieldsplit = cuttingfunction($cutting = $neothemesconfigbox['contactmatters'], $sign = ",");

    foreach ($fieldsplit as $key => $val) {
        if (!empty($val)) {
            $contactusform['contactmatters'] .= optionselect($dataid = $val, $optionname = $val, $oid = "", $value = $val);
        }
    }

    //事項說明
    $contactusform['texe_user'] = inputtextarea($class = "", $name = "texe_user", $id = "texe_user", $rows = "6", $cols = "80", $value = "");

    //不是機器人
    $contactusform['mycheck'] = checkbox($dataid = true, $name = "mycheck", $value = "1", $optionname = "" . _MD_CONTACTROBOT . "", $oid = "", $i, $class = "checkboxinput");

    return $contactusform;
}

//送出聯絡我們表單
function contactustosend()
{


    //姓名驗證去HTML標籤
    $nameuser = phpstrip_tags($notags = $_POST["name_user"]);

    //E-MAIL驗證
    $email = $_POST["email_user"];
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
        redirect_header(XOOPS_URL . '/modules/neothemesadmin/contactusform.php', 0, _MA_MAILCORRECTFORMAT);
    }

    //手機驗證
    $preg = $_POST["tel_user"];
    if (!preg_match("/^[09]{2}[0-9]{8}$/", $preg)) {
        redirect_header(XOOPS_URL . '/modules/neothemesadmin/contactusform.php', 0, _MA_PHONECORRECT);
    }

    //市話驗證去HTML標籤
    $cityteluser = phpstrip_tags($notags = $_POST["citytel_user"]);

    //說明事項去HTML標籤
    $texe_user = phpstrip_tags($notags = $_POST['texe_user']);

    $valuesvar = "(name_user,email_user,tel_user,citytel_user,radiog,contactmatters,texe_user) values('{$nameuser}','{$_POST['email_user']}','{$_POST['tel_user']}','{$cityteluser}','{$_POST['radiog']}','{$_POST['contactmatters']}','{$texe_user}')";
    insert($dbname = "neocontactusform", $values = $valuesvar);

    //讀取最新一筆cfid
    $dbneme             = "neocontactusform";
    $where              = " order by  cfid  DESC";   //where數值-修改
    $neocontactusformDB = moduledb($dbneme, $where);

    //發送通知管理員
    contactusadminmail($cfid = $neocontactusformDB['cfid'], $usermane = $nameuser, $getGroupid = 1, $timedate = "" . timedate($datevar = "Y-m-d H:i:s") . "");
}

$xoopsTpl->assign("contactusform", $contactusform);
$xoopsTpl->assign("xoops_pagetitle", _MD_TITLEM);

include_once XOOPS_ROOT_PATH . '/footer.php';
