<?php
include 'header.php'; //XOOPS檔頭
include_once XOOPS_ROOT_PATH . "/modules/neillibrary/class/bar.php";
include "../function.php";
//引入CSS
include "tplthemescss.php";

$op      = (empty($_REQUEST['operating'])) ? "" : $_REQUEST['operating'];
$roption = (empty($_REQUEST['r'])) ? "" : $_REQUEST['r'];

switch ($op) {
    case "operating1":
        snidup();
        redirect_header(XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/contactustable.php", 0, _MA_NEODWADMIN_SHBU);    //設定已更新
        break;

    case "operating2":
        sniddelete();
        redirect_header(XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/contactustable.php", 0, _MA_NEODWADMIN_SHBU);    //設定已更新
        break;

    case "operating3":
        updatematters();
        redirect_header(XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/contactustable.php", 0, _MS_SHARED02);

        break;

    default:
        $main = contactustable();
}

/**
 * @return string
 */
function contactustable()
{
    global $roption, $xoopsModule;

    $contactustableArr = array(); //建構陣列
    //顯示全部
    $i                              = 0;
    $contactustableArr[$i]['value'] = "contactustable.php?r=display";
    $contactustableArr[$i]['title'] = _MA_CONTACTUSTABLEPHP03;
    $contactustableArr[$i]['id']    = "display";
    $i++;
    //已讀取
    $contactustableArr[$i]['value'] = "contactustable.php?r=haveread";
    $contactustableArr[$i]['title'] = _MA_CONTACTUSTABLEPHP04;
    $contactustableArr[$i]['id']    = "haveread";
    $i++;
    //未讀取
    $contactustableArr[$i]['value'] = "contactustable.php?r=notread";
    $contactustableArr[$i]['title'] = _MA_CONTACTUSTABLEPHP05;
    $contactustableArr[$i]['id']    = "notread";

    //選擇狀態
    foreach ($contactustableArr as $key => $val) {
        $contactustablebox .= optionselect($dataid = $contactustableArr[$key]['id'], $optionname = $contactustableArr[$key]['title'], $oid = $roption, $value = $contactustableArr[$key]['value']);
    }

    //選擇操作
    $selectArr = array(); //建構陣列
    //顯示全部
    $i                      = 0;
    $selectArr[$i]['value'] = "operating1";
    $selectArr[$i]['title'] = _MA_CONTACTUSTABLEPHP23;
    $selectArr[$i]['id']    = "operating1";
    $i++;
    $selectArr[$i]['value'] = "operating2";
    $selectArr[$i]['title'] = _MA_CONTACTUSTABLEPHP24;
    $selectArr[$i]['id']    = "operating2";
    $i++;

    foreach ($selectArr as $key => $val) {
        $selectArrbox .= optionselect($dataid = $selectArr[$key]['id'], $optionname = $selectArr[$key]['title'], $oid = "", $value = $selectArr[$key]['value']);
    }

    //讀取neothemesconfig資料表
    $dbneme          = "neothemesconfig";
    $where           = "  where `nsn` = '1'";  //where數值
    $neothemesconfig = moduledb($dbneme, $where);

    //聯絡事項
    $contactmattersbox = inputtext($class = "", $name = "contactmatters", $value = "" . $neothemesconfig['contactmatters'] . "", $placeholder = "" . _MA_CONTACTUSTABLEPHP07 . "");

    //解聯絡我們資料表
    $dbneme = "neocontactusform";

    switch ($roption) {
        case "haveread":
            $where = " where `readtrue` = '1'  order by  cfid  DESC";   //where數值-修改
            break;
        case "notread":
            $where = " where `readtrue` = '0'  order by  cfid  DESC";   //where數值-修改
            break;
        case "display":
            $where = "   order by  cfid  DESC";   //where數值-修改
            break;
        default:
            $where = "  order by  cfid  DESC";   //where數值-修改

    }

    list($neocontactusformArr, $bar) = databasetablewhilebar($dbneme, $where, $onepage = "20", $allpage = 10);
    foreach ($neocontactusformArr as $key => $val) {
        //核取按鈕
        $cfid     = $neocontactusformArr[$key]['cfid'];
        $checkbox = checkbox($dataid = true, $name = "readtrue{$cfid}", $value = "1", $optionname = "", $oid = "");

        //限制字串輸出長度
        $texe_user = mb_substr($neocontactusformArr[$key]['texe_user'], 0, 40, 'utf8') . '....';
        //去除HTML
        $texe_user = phpstrip_tags($notags = $texe_user);

        //性別
        switch ($neocontactusformArr[$key]['radiog']) {
            case "male":
                $gender = _MA_CONTACTUSTABLEPHP21;
                break;
            case "female":
                $gender = _MA_CONTACTUSTABLEPHP22;
                break;
        }

        //讀取狀態
        switch ($neocontactusformArr[$key]['readtrue']) {
            case "0":
                $readtrue      = _MA_CONTACTUSTABLEPHP19;
                $readtruestyle = "id=readtruestyle";
                break;
            case "1":
                $readtrue      = _MA_CONTACTUSTABLEPHP20;
                $readtruestyle = "";
                break;
        }

        //回覆狀態

        if (!empty($neocontactusformArr[$key]['replytext'])) {
            $replytext = _MA_CONTACTUSTABLEPHP17;
        } else {
            $replytext = _MA_CONTACTUSTABLEPHP18;
        }

        //去除HTML
        $name_user = phpstrip_tags($notags = $neocontactusformArr[$key]['name_user']);

        $tdbox .= "
 <tr " . $readtruestyle . ">
        <td>" . $checkbox . "</td>
        <td>" . $neocontactusformArr[$key]['cfidtime'] . "</td>
        <td>" . $name_user . "</td>
           <td>" . $texe_user . "</td> 
                  <td>" . $gender . "</td>
      <td >" . $readtrue . "</td>
          <td >" . $replytext . "</td>
          <td ><a class='btn btn-success active'  href='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/contactuscontent.php?cfid=" . $neocontactusformArr[$key]['cfid'] . "'>" . _MA_WATCHTHECONTENT . "</a></td>
      </tr>

";
    }

    $table = "
	  <table class='table'>
    <thead>
      <tr>
        <th style='width: 1%;'>" . _MA_CONTACTUSTABLEPHP09 . "</th>
        <th style='width: 10%;'>" . _MA_CONTACTUSTABLEPHP10 . "</th>
        <th style='width: 7%;'>" . _MA_CONTACTUSTABLEPHP11 . "</th>
     <th>" . _MA_CONTACTUSTABLEPHP12 . "</th> 
      <th style='width: 5%;'>" . _MA_CONTACTUSTABLEPHP13 . "</th>
        <th style='width: 6%;'>" . _MA_CONTACTUSTABLEPHP14 . "</th> 
            <th style='width: 6%;'>" . _MA_CONTACTUSTABLEPHP16 . "</th> 
            <th>" . _MA_CONTACTUSTABLEPHP15 . "</th> 
      </tr>
    </thead>
    " . $tdbox . "
    <table>

";

    $main .= "<div class='container'>
	
   <div class='page-header'>
  <h2>" . _MA_CONTACTUSTABLEPHP01 . "<small> &nbsp;Contact Us Management</small>&nbsp;&nbsp; <a class='btn btn-warning active' target='_blank' href='" . XOOPS_URL . "/modules/system/admin.php?fct=preferences&op=show&confcat_id=6'>" . _MA_XOOPPSMAIL . "</a></h2>
</div>
	
    
     <div class='form-group col-md-12'>
     	 	<form method='post'  action='{$_SERVER['PHP_SELF']}'>	
     <div class='row'>   
  <div class='col-md-2'>
  		 	<select id='FriendLink' class='form-control' >
    <option value=''  data-id='1' >" . _MA_CONTACTUSTABLEPHP06 . "</option>
    	" . $contactustablebox . "   
  </select>	
  		     </div> 	 
     	 
 <div class='col-md-2'><h4> " . _MA_CONTACTUSTABLEPHP02 . "</h4>
 		 </div>
 <div class='col-md-5'>" . $contactmattersbox . "    <span id='helpBlock' class='help-block'>" . _MA_CONTACTUSTABLEPHP08 . "</span>   
 		 </div>
  <div class='col-md-2'> 
   <input type='hidden' name='operating' value='operating3'> 	 
 <button  type='submit' class='btn btn-primary  btn-block button'>" . _MS_SHARED15 . "</button>
 		 </div>		 
 		  		 
 		 </div>	 </form>
   	<form method='post'  action='{$_SERVER['PHP_SELF']}'>	  
     " . $table . "
     	 
     
     
     </div>
    <div class='row'>
  <div class='col-md-2'>	 	<select id='FriendLink' class='form-control' name='operating' >
    <option value=''  data-id='1' >" . _MA_CONTACTUSTABLEPHP25 . "</option>
    	" . $selectArrbox . "   
  </select>	</div>  	 
   <div class='col-md-1'><input type='submit' value='" . _MS_SHARED17 . "'>   </div>   
     <div class='col-md-2'><a class='btn btn-warning active'  href='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/contactustable.php'>" . _MS_SHARED25 . "</a></div>    		 	 
    	 </div>        	 
     	 </form>
     	   <div class='col-sm-12'>
                  <div class='text-center'>
           	<nav>
  <ul class='pagination'> {$bar} </ul>
</nav> </div>
     	 </div>
     	 
     	 
    <script type=text/javascript src='" . XOOPS_URL . "/modules/neillibrary/js/menujs/newbase.js'></script>	  	  	 
     ";
    return $main;
}

//更新聯絡事項
function updatematters()
{
    global $xoopsDB;
    $setvar = "set contactmatters='{$_POST['contactmatters']}'   where nsn='1'";
    update($dbname = "neothemesconfig", $set = $setvar);
}

function snidup()
{  //更改為已讀
    global $xoopsDB;

    $dbneme              = "neocontactusform";
    $where               = "  order by  cfid  DESC";  //where數值
    $neocontactusformArr = databasetablewhile($dbneme, $where);

    foreach ($neocontactusformArr as $key => $val) {
        $digital = readtrue . $neocontactusformArr[$key]['cfid'];
        if (!empty($_POST[$digital])) {
            $setvar = "set readtrue='{$_POST[$digital]}'   where cfid='" . $neocontactusformArr[$key]['cfid'] . "'";
            update($dbname = "neocontactusform", $set = $setvar);
        }
    }
}

function sniddelete()
{  //刪除
    global $xoopsDB;

    $dbneme              = "neocontactusform";
    $where               = "  order by  cfid  DESC";  //where數值
    $neocontactusformArr = databasetablewhile($dbneme, $where);
    foreach ($neocontactusformArr as $key => $val) {
        $digital = readtrue . $neocontactusformArr[$key]['cfid'];
        if (!empty($_POST[$digital])) {
            $where = " where `cfid` = '" . $neocontactusformArr[$key]['cfid'] . "'";
            deletefunction($where, $dbneme);
        }
    }
}

loadModuleAdminMenu(9);
echo $main;

include "footer.php"; //XOOPS檔尾
