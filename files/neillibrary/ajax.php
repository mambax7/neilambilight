<?php
include_once "header.php";        //引入自訂的共同函數檔

global $xoopsDB, $xoopsModule;
$id              = (empty($_REQUEST['id'])) ? "" : $_REQUEST['id'];
$dbid            = (empty($_REQUEST['dbid'])) ? "" : $_REQUEST['dbid'];
$selectid        = (empty($_REQUEST['selectid'])) ? "" : $_REQUEST['selectid'];
$status          = (empty($_REQUEST['status'])) ? "" : $_REQUEST['status'];
$exchange        = (empty($_REQUEST['exchange'])) ? "" : $_REQUEST['exchange'];
$selectidedit    = (empty($_REQUEST['selectidedit'])) ? "" : $_REQUEST['selectidedit'];
$cartnumber      = (empty($_REQUEST['cartnumber'])) ? "" : $_REQUEST['cartnumber'];
$carttype        = (empty($_REQUEST['carttype'])) ? "0" : $_REQUEST['carttype'];
$suid            = (empty($_REQUEST['suid'])) ? "" : $_REQUEST['suid'];
$checkboxArr     = (empty($_REQUEST['checkboxArr'])) ? "" : $_REQUEST['checkboxArr'];
$prderpeopleid   = (empty($_REQUEST['prderpeopleid'])) ? "" : $_REQUEST['prderpeopleid'];
$ordernumber     = (empty($_REQUEST['ordernumber'])) ? "" : $_REQUEST['ordernumber'];
$total           = (empty($_REQUEST['total'])) ? "" : $_REQUEST['total'];
$coststotal      = (empty($_REQUEST['coststotal'])) ? "" : $_REQUEST['coststotal'];
$invoicetype     = (empty($_REQUEST['invoicetype'])) ? "" : $_REQUEST['invoicetype'];
$prderpeopletext = (empty($_REQUEST['prderpeopletext'])) ? "" : $_REQUEST['prderpeopletext'];
$receivertext    = (empty($_REQUEST['receivertext'])) ? "" : $_REQUEST['receivertext'];
$invoicetext     = (empty($_REQUEST['invoicetext'])) ? "" : $_REQUEST['invoicetext'];
$donatetext      = (empty($_REQUEST['donatetext'])) ? "" : $_REQUEST['donatetext'];
$remarks         = (empty($_REQUEST['remarks'])) ? "" : $_REQUEST['remarks'];
$payment         = (empty($_REQUEST['payment'])) ? "" : $_REQUEST['payment'];
$orderstatus     = (empty($_REQUEST['orderstatus'])) ? "" : $_REQUEST['orderstatus'];
$neilshopcartid  = (empty($_REQUEST['neilshopcartid'])) ? "" : $_REQUEST['neilshopcartid'];
$orderid         = (empty($_REQUEST['orderid'])) ? "" : $_REQUEST['orderid'];
$name            = (empty($_REQUEST['name'])) ? "" : $_REQUEST['name'];
$phone           = (empty($_REQUEST['phone'])) ? "" : $_REQUEST['phone'];
$telephone       = (empty($_REQUEST['telephone'])) ? "" : $_REQUEST['telephone'];
$addresslist     = (empty($_REQUEST['addresslist'])) ? "" : $_REQUEST['addresslist'];
$email           = (empty($_REQUEST['email'])) ? "" : $_REQUEST['email'];
$payment         = (empty($_REQUEST['payment'])) ? "" : $_REQUEST['payment'];
$returnsmane     = (empty($_REQUEST['returnsmane'])) ? "" : $_REQUEST['returnsmane'];
$shopcartid      = (empty($_REQUEST['shopcartid'])) ? "" : $_REQUEST['shopcartid'];
$blacklist       = (empty($_REQUEST['blacklist'])) ? "0" : $_REQUEST['blacklist'];
$receiverid      = (empty($_REQUEST['receiverid'])) ? "0" : $_REQUEST['receiverid'];
$receiverreturn  = (empty($_REQUEST['receiverreturn'])) ? "0" : $_REQUEST['receiverreturn'];
$listreturn      = (empty($_REQUEST['list'])) ? "0" : $_REQUEST['list'];
$invoiceid       = (empty($_REQUEST['invoiceid'])) ? "0" : $_REQUEST['invoiceid'];
$uniformnumbers  = (empty($_REQUEST['uniformnumbers'])) ? "" . _MS_SHOPPINGCART69 . "" : $_REQUEST['uniformnumbers'];
$invoicetitle    = (empty($_REQUEST['invoicetitle'])) ? "" : $_REQUEST['invoicetitle'];
$invoiceuser     = (empty($_REQUEST['invoiceuser'])) ? "" : $_REQUEST['invoiceuser'];

switch ($id) {
    case "1":
        $where  = " where `nsn` = '$dbid'";
        $DBname = "neothemeskeyword";
        !empty($isAdmin) ? deletefunction($where, $DBname) : '';
        break;

    case "2":
        $where  = " where `donateid` = '$dbid'";
        $DBname = "neilshopinvoicedonation";
        !empty($isAdmin) ? deletefunction($where, $DBname) : '';
        break;

    case "3":
        $where  = " where `logisticsid` = '$dbid'";
        $DBname = "neilshoplogistics";
        !empty($isAdmin) ? deletefunction($where, $DBname) : '';
        break;

    case "4":
        $where  = " where `sortid` = '$dbid'";
        $DBname = "neilshopsort";
        !empty($isAdmin) ? deletefunction($where, $DBname) : '';
        break;

    case "5":
        //讀取neilshopsort資料表
        $dbneme = "neilshopsort";  //資料表名稱

        if ($exchange == 'true') {
            $dbid = $dbid;
        } else {
            $dbid = $selectidedit;
        }

        if ($status == edit) {
            if ($exchange == 'true') {
                $where = " where `of_sortid` = '" . $dbid . "' order by sortidsort ASC";   //where數值-修改
            } else {
                $where      = " where `sortid` = '" . $dbid . "' order by sortidsort ASC";   //where數值-修改
                $sortselect = moduledb($dbneme, $where);
                $oid        = $sortselect['sortid'];
            }
        } else {
            $where = " where `of_sortid` = '" . $dbid . "' order by sortidsort ASC";   //where數值-新增
        }

        if (!empty($dbid)) {
            //$sort=!empty($isAdmin) ? databasetablewhile($dbneme,$where) : '';
            $sort = databasetablewhile($dbneme, $where);
        }
        $optionone .= optionbox($sortvar = $sort, $oid = $oid);

        if (!empty($optionone)) {
            $select .= "<select id=" . $selectid . " class='form-control' name='of_sortid' >
	 <option   data-id='" . $dbid . "' value=" . $dbid . "  >" . _MS_SHARED13 . "</option>
     	" . $optionone . "   
  </select>	 <br />

";
        }
        echo $select .= "
	<script>var level='1';</script>	
 <script src='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/js/ajaxjs.js'></script>
";

        break;

    case "6":
        //讀取neilshopsort資料表
        $dbneme = "neilshopsort";  //資料表名稱

        if ($exchange == 'true') {
            $dbid = $dbid;
        } else {
            $dbid = $selectidedit;
        }

        if ($status == edit) {
            if ($exchange == 'true') {
                $where = " where `of_sortid` = '" . $dbid . "' order by sortidsort ASC";   //where數值-修改
            } else {
                $where      = " where `sortid` = '" . $dbid . "' order by sortidsort ASC";   //where數值-修改
                $sortselect = moduledb($dbneme, $where);
                $oid        = $sortselect['sortid'];
            }
        } else {
            $where = " where `of_sortid` = '" . $dbid . "' order by sortidsort ASC";   //where數值-新增
        }

        if (!empty($dbid)) {
            //$sort=!empty($isAdmin) ? databasetablewhile($dbneme,$where) : '';
            $sort = databasetablewhile($dbneme, $where);
        }
        $optionone .= optionbox($sortvar = $sort, $oid = $oid);

        if (!empty($optionone)) {
            $select .= "<select id=" . $selectid . " class='form-control' name='of_sortid' >
	 <option   data-id='" . $dbid . "' value=" . $dbid . "  >" . _MS_SHARED13 . "</option>
     	" . $optionone . "   
  </select>	 <br />

";
        }

        echo $select .= "
	<script>var level='2';</script>		
 
 <script src='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/js/ajaxjs.js'></script>
";

        break;

    case "7":
        //讀取neilshopsort資料表
        $dbneme = "neilshopsort";  //資料表名稱

        if ($exchange == 'true') {
            $dbid = $dbid;
        } else {
            $dbid = $selectidedit;
        }

        if ($status == edit) {
            if ($exchange == 'true') {
                $where = " where `of_sortid` = '" . $dbid . "' order by sortidsort ASC";   //where數值-修改
            } else {
                $where      = " where `sortid` = '" . $dbid . "' order by sortidsort ASC";   //where數值-修改
                $sortselect = moduledb($dbneme, $where);
                $oid        = $sortselect['sortid'];
            }
        } else {
            $where = " where `of_sortid` = '" . $dbid . "' order by sortidsort ASC";   //where數值-新增
        }

        if (!empty($dbid)) {
            //$sort=!empty($isAdmin) ? databasetablewhile($dbneme,$where) : '';
            $sort = databasetablewhile($dbneme, $where);
        }
        $optionone .= optionbox($sortvar = $sort, $oid = $oid);

        if (!empty($optionone)) {
            echo $select .= "<select id=" . $selectid . " class='form-control' name='of_sortid' >
	 <option   data-id='" . $dbid . "' value=" . $dbid . "  >" . _MS_SHARED13 . "</option>
     	" . $optionone . "   
  </select>	 <br />

";
        }
        break;

    case "8":
        $where  = " where `deliveryid` = '$dbid'";
        $DBname = "neilshopdelivery";
        !empty($isAdmin) ? deletefunction($where, $DBname) : '';
        break;

    case "9":
        $where  = " where `giftsid` = '$dbid'";
        $DBname = "neilshopgifts";
        !empty($isAdmin) ? deletefunction($where, $DBname) : '';
        break;

    case "10":
        //讀取商品資料表
        $dbneme    = "neilshopproductcontent";  //資料表名稱
        $where     = " where `productid` = '$dbid' and  `ordernumber` = '0' ";
        $productDB = moduledb($dbneme, $where);

        !empty($isAdmin) ? deletefunction($where, $dbneme) : '';
        if (empty($productDB)) {
            $data = _MS_SHOPPINGCART45;
        }

        echo $data;
        break;

    case "11":
        //取的ip位置
        $userip = get_real_ip();
        //取得UID
        $uid = $user_uid;
        //購物車存放商品上限
        $dbneme             = "config";  //資料表名稱
        $where              = " where `conf_name` = 'numbercapped'";   //where數值-修改
        $confignumbercapped = moduledb($dbneme, $where);

        $dbneme      = "neilshopproductcontent";  //資料表名稱
        $where       = " where `productid` = '" . $dbid . "' and  `productstatus` != 'notshelves' ";   //where數值-修改
        $productLimt = moduledb($dbneme, $where);
        //取得商品金額
        /* if($productLimt['productstatus']=='promotions'){ //判斷是否為促銷商品
  $amount=$productLimt['discountprice'];
  }else{
  $amount=$productLimt['price'];
  }*/

        //贈品陣列轉字串
        if (!empty($checkboxArr)) {
            $giftsid = phpconversion($conversion = $checkboxArr, $type = "serialize");
        }

        $statusdata = true;
        //判斷商品數量為0
        if ($productLimt['amount'] == 0) {
            $data       = _MD_AJAX01;
            $statusdata = false;
        }

        if ($cartnumber > productLimt['amount']) {
            $statusdata = false;
        }

        $dbneme = "neilshopcart";  //資料表名稱
        //判斷是否訂購同樣商品
        $where      = " where `enable` = '0' and  `productid` = '" . $dbid . "'  and  `carttype` = '" . $carttype . "' and (`userip` = '" . $userip . "' or  `uid` = '" . $uid . "')";   //where數值-修改
        $cappedLimt = moduledb($dbneme, $where);
        if (!empty($cappedLimt['productid'])) {
            $data       = _MD_AJAX03;
            $statusdata = false;
        }

        //判斷訂購商品上限次數
        $where     = " where `enable` = '0' and  `carttype` = '" . $carttype . "' and  (`userip` = '" . $userip . "' or  `uid` = '" . $uid . "')";   //where數值-修改
        $cappedArr = databasetablewhile($dbneme, $where);
        $capped    = count($cappedArr);
        if ($capped > $confignumbercapped['conf_value']) {
            $data       = _MD_AJAX02;
            $statusdata = false;
        }

        //黑名單判斷
        $blacklist = blacklistfunction($suid = $uid);
        if ($blacklist == 1) {
            $data       = _MD_AJAX10;
            $statusdata = false;
        }

        if ($statusdata == true and !empty($productLimt['productid'])) {
            $valuesvar = "(userip,productid,giftsid,uid,cartnumber,carttype) values('{$userip}','{$dbid}','{$giftsid}','{$uid}','{$cartnumber}','{$carttype}')";
            insert($dbname = "neilshopcart", $values = $valuesvar);
            if ($carttype == 1) {
                $data = _MD_AJAX04;
            } else {
                $data = _MD_AJAX05;
            }
        }

        /*$data=$uid;
$data="error";*/
        echo $data;

        break;

    case "12":
        //取的ip位置
        $userip = get_real_ip();
        //取得UID
        $uid    = $user_uid;
        $dbneme = "neilshopcart";  //資料表名稱
        //判斷是否訂購同樣商品
        $where         = " where `enable` = '0' and   `carttype` = '1' and (`userip` = '" . $userip . "' or  `uid` = '" . $uid . "')";   //where數值-修改
        $cartnumberArr = databasetablewhile($dbneme, $where);
        $cartnumber    = count($cartnumberArr);
        echo $cartnumber;
        break;

    case "13":
        //確認刪除者UID相符
        $readpermission = readpermission($user_uid = $suid);

        $where  = " where `shopcartid` = '$dbid'";
        $DBname = "neilshopcart";

        if (!empty($xoopsUser) and !empty($readpermission)) {
            deletefunction($where, $DBname);
        }

        break;

    case "14":
        //訂購人資料
        //取得UID
        $uid = $user_uid;

        //讀取購買者資料
        $dbneme        = "neilshoppurchaser";
        $where         = " where `uid` = '" . $uid . "' ";   //where數值-修改
        $shoppurchaser = moduledb($dbneme, $where);

        //讀取收件人資料表
        $dbneme       = "neilshopreceiver";
        $where        = " where `uid` = '" . $uid . "' &&  `receiverid` = '" . $shoppurchaser['receiverid'] . "' ";   //where數值-修改
        $shopreceiver = moduledb($dbneme, $where);

        //切割字串(地址)
        $address = cuttingfunction($cutting = "" . $shopreceiver['address'] . "", $sign = "-");

        //姓名
        $shoppingcart['name'] = inputtext($class = "", $name = "recipientname", $value = "" . $shopreceiver['name'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART31 . "", $id = "recipientname");
        //行動電話
        $shoppingcart['phone'] = inputtext($class = "", $name = "recipientphone", $value = "" . $shopreceiver['phone'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART32 . "", $id = "recipientphone");
        //聯絡電話
        $shoppingcart['telephone'] = inputtext($class = "", $name = "recipienttelephone", $value = "" . $shopreceiver['telephone'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART33 . "", $id = "recipienttelephone");

        //地址-縣市
        $shoppingcart['county'] = inputtext($class = "", $name = "recipientcounty", $value = "" . $address[0] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART35 . "", $id = "recipientcounty");
        //地址-鄉鎮區
        $shoppingcart['townshiparea'] = inputtext($class = "", $name = "recipienttownshiparea", $value = "" . $address[1] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART36 . "", $id = "recipienttownshiparea");

        //地址
        $shoppingcart['address'] = inputtext($class = "", $name = "recipientaddress", $value = "" . $address[2] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART34 . "", $id = "recipientaddress");

        //電子信箱
        $shoppingcart['email'] = inputtext($class = "", $name = "recipientemail", $value = "" . $shopreceiver['email'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART37 . "", $id = "recipientemail");

        if (empty($shopreceiver)) {
            $prderpeoplechangestyle            = "style='display: none'";
            $shoppingcart['prderpeoplechange'] = "<input type='hidden' name='prderpeoplechange' value='1'>";
        } else {
            $shoppingcart['prderpeoplechange'] = checkbox($dataid = true, $name = "prderpeoplechange", $value = "1", $optionname = "" . _MS_SHOPPINGCART40 . "", $oid = "");
        }

        //存入收件件資料
        //$shoppingcart['prderpeoplechange']=checkbox($dataid=true,$name="prderpeoplechange",$value="1",$optionname=""._MS_SHOPPINGCART40."",$oid="");

        $receiverbox = "
<ul class='list-group'>
  <li class='list-group-item'>
     <span id='helpBlock' class='help-block'>" . _MS_SHOPPINGCART31 . "<span id='help-blockrecipientname' class='red'>(" . _MS_SHARED22 . ")</span></span>
    " . $shoppingcart['name'] . "</li>
  <li class='list-group-item'><span id='helpBlock' class='help-block'>" . _MS_SHOPPINGCART32 . "<span id='help-blockrecipientphone' class='red'>(" . _MS_SHARED22 . ")</span></span>" . $shoppingcart['phone'] . "</li>
  <li class='list-group-item'><span id='helpBlock' class='help-block'>" . _MS_SHOPPINGCART33 . "</span>" . $shoppingcart['telephone'] . "</li>
  <li class='list-group-item'> <span id='helpBlock' class='help-block'>" . _MS_SHOPPINGCART34 . "<span id='help-blockrecipientaddress' class='red'>(" . _MS_SHARED22 . ")</span></span>
      <div  class='row'>
  <div class='col-md-6 col-md-6custom'>" . $shoppingcart['county'] . "</div>
    <div class='col-md-6 col-md-6custom'>" . $shoppingcart['townshiparea'] . "</div>
     </div>
     " . $shoppingcart['address'] . "
    
    </li>
  <li class='list-group-item'><span id='helpBlock' class='help-block'>" . _MS_SHOPPINGCART37 . "<span id='help-blockrecipientemail' class='red'>(" . _MS_SHARED22 . ")</span></span>" . $shoppingcart['email'] . "</li>
 <li " . $prderpeoplechangestyle . " class='list-group-item'>" . $shoppingcart['prderpeoplechange'] . "</li>
	</ul>
 <input type='hidden' name='receiverid' value='" . $shopreceiver['receiverid'] . "'> 		
 <script src='" . XOOPS_URL . "/modules/neilshop/js/formvalidation.js'></script>		
";
        echo $receiverbox;
        break;

    case "15":

        //取得UID
        $uid = $user_uid;

        //讀取購買者資料
        $dbneme        = "neilshoppurchaser";
        $where         = " where `uid` = '" . $uid . "' ";   //where數值-修改
        $shoppurchaser = moduledb($dbneme, $where);

        //讀取發票資料表
        $dbneme          = "neilshopinvoice";
        $where           = " where `uid` = '" . $uid . "' &&  `invoiceid` = '" . $shoppurchaser['invoiceid'] . "' ";   //where數值-修改
        $neilshopinvoice = moduledb($dbneme, $where);

        //切割字串(地址)
        $invoiceaddress = cuttingfunction($cutting = "" . $neilshopinvoice['invoiceaddress'] . "", $sign = "-");

        //存入統編紀錄中
        //$shoppingcart['invoicechange']=checkbox($dataid=true,$name="invoicechange",$value="1",$optionname=""._MS_SHOPPINGCART44."",$oid="");

        //統一編號
        $shoppingcart['uniformnumbers'] = inputtext($class = "", $name = "uniformnumbers", $value = "" . $neilshopinvoice['uniformnumbers'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART39 . "", $id = "uniformnumbers");
        //發票抬頭
        $shoppingcart['invoicetitle'] = inputtext($class = "", $name = "invoicetitle", $value = "" . $neilshopinvoice['invoicetitle'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART41 . "", $id = "invoicetitle");
        //發票收件人
        $shoppingcart['invoiceuser'] = inputtext($class = "", $name = "invoiceuser", $value = "" . $neilshopinvoice['invoiceuser'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART42 . "", $id = "invoiceuser");

        //地址-縣市
        $shoppingcart['invoiceusercounty'] = inputtext($class = "", $name = "invoiceusercounty", $value = "" . $invoiceaddress[0] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART35 . "", $id = "invoiceusercounty");

        //地址-鄉鎮區
        $shoppingcart['invoiceusertownshiparea'] = inputtext($class = "", $name = "invoiceusertownshiparea", $value = "" . $invoiceaddress[1] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART36 . "", $id = "invoiceusertownshiparea");

        //地址
        $shoppingcart['invoiceuseraddress'] = inputtext($class = "", $name = "invoiceuseraddress", $value = "" . $invoiceaddress[2] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART34 . "", $id = "invoiceuseraddress");

        if (empty($neilshopinvoice)) {
            $invoiceaddresschangestyle     = "style='display: none'";
            $shoppingcart['invoicechange'] = "<input type='hidden' name='invoicechange' value='1'>";
        } else {
            $shoppingcart['invoicechange'] = checkbox($dataid = true, $name = "invoicechange", $value = "1", $optionname = "" . _MS_SHOPPINGCART44 . "", $oid = "");
        }

        $inputtypebox = "
 <span id='helpBlock' class='help-block'>" . _MS_SHOPPINGCART39 . "<span id='help-blockuniformnumbers' class='red'>(" . _MS_SHOPPINGCART50 . ")</span></span>
    " . $shoppingcart['uniformnumbers'] . "
 <span id='helpBlock' class='help-block'>" . _MS_SHOPPINGCART41 . "<span id='help-blockinvoicetitle' class='red'>(" . _MS_SHARED22 . ")</span></span>
    " . $shoppingcart['invoicetitle'] . "
 <span id='helpBlock' class='help-block'>" . _MS_SHOPPINGCART42 . "<span id='help-blockinvoiceuser' class='red'>(" . _MS_SHARED22 . ")</span></span>  
    " . $shoppingcart['invoiceuser'] . " 
    <span id='helpBlock' class='help-block'>" . _MS_SHOPPINGCART43 . "<span id='help-blockinvoiceuseraddress' class='red'>(" . _MS_SHARED22 . ")</span></span>
    <div  class='row'>
    <div class='col-md-3 col-md-6custom' >" . $shoppingcart['invoiceusercounty'] . "</div> <div class='col-md-3' >" . $shoppingcart['invoiceusertownshiparea'] . "</div> <div class='col-md-6'>" . $shoppingcart['invoiceuseraddress'] . "</div>
    </div>
    <span " . $invoiceaddresschangestyle . ">" . $shoppingcart['invoicechange'] . "</span>
    
      <br /> <br /> 
     <input type='hidden' name='invoiceid' value='" . $neilshopinvoice['invoiceid'] . "'> 	  	  
     <script src='" . XOOPS_URL . "/modules/neilshop/js/formvalidation.js'></script>	
";

        echo $inputtypebox;
        break;

    case "16":
        //寫入收件人ID
        //確認操作UID相符
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            $setvar = "set receiverid='{$dbid}'  where prderpeopleid='" . $prderpeopleid . "'";
            update($dbname = "neilshoppurchaser", $set = $setvar);
        }
        $data = 'receiver';

        echo $data;

        break;

    case "17":
        //寫入發票ID
        //確認操作UID相符
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            $setvar = "set invoiceid='{$dbid}'  where prderpeopleid='" . $prderpeopleid . "'";
            update($dbname = "neilshoppurchaser", $set = $setvar);
        }
        $data = 'invoice';

        echo $data;
        break;

    //訂單寫入
    case "18":
        //確認操作UID相符
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {

            //讀取訂單資料表
            $dbneme        = "neilshoporder";
            $where         = " where `uid` = '" . $suid . "'  order by  orderid   DESC ";   //where數值-修改
            $neilshoporder = moduledb($dbneme, $where);

            //判斷訂單是否存在
            if ($neilshoporder['ordernumber'] != $ordernumber) {
                $valuesvar = "(ordernumber,total,coststotal,invoicetype,uid,prderpeopletext,receivertext,invoicetext,donatetext,remarks,payment,orderstatus,neilshopcartid) values('{$ordernumber}','{$total}','{$coststotal}','{$invoicetype}','{$suid}','{$prderpeopletext}','{$receivertext}','{$invoicetext}','{$donatetext}','{$remarks}','{$payment}','{$orderstatus}','{$neilshopcartid}')";
                insert($dbname = "neilshoporder", $values = $valuesvar);

                //讀取訂單資料表
                $dbneme        = "neilshoporder";
                $where         = " where `uid` = '" . $suid . "'  order by  orderid   DESC ";   //where數值-修改
                $neilshoporder = moduledb($dbneme, $where);

                //寫入訂單狀態資料表
                $valuesvar = "(orderid,ordertrue) values('" . $neilshoporder['orderid'] . "','" . date("Y-m-d H:i:s") . "')";
                insert($dbname = "neilshoporderstatus", $values = $valuesvar);

                //購物車寫入enable
                $neilshopcartArr = phpconversion($conversion = $neilshopcartid, $type = "unserialize");
                foreach ($neilshopcartArr as $key => $val) {

                    //開啟購物車資料表
                    $dbneme       = "neilshopcart";
                    $where        = " where `shopcartid` = '" . $val . "' ";   //where數值-修改
                    $neilshopcart = moduledb($dbneme, $where);

                    //開啟商品資料表
                    $dbneme                 = "neilshopproductcontent";
                    $where                  = " where `productid` = '" . $neilshopcart['productid'] . "' ";   //where數值-修改
                    $neilshopproductcontent = moduledb($dbneme, $where);

                    //商品數量
                    $amount = $neilshopproductcontent['amount'] - $neilshopcart['cartnumber'];
                    //訂購次數
                    $ordernumber = $neilshopproductcontent['ordernumber'] + $neilshopcart['cartnumber'];

                    //存入商品資料表 數量
                    $setvar = "set amount='" . $amount . "', ordernumber='" . $ordernumber . "'  where productid='" . $neilshopcart['productid'] . "'";
                    update($dbname = "neilshopproductcontent", $set = $setvar);

                    $setvar = "set  enable='1'  where shopcartid='" . $val . "'";
                    update($dbname = "neilshopcart", $set = $setvar);
                }

                //需刪除的SESSION
                unset($_SESSION['remarks'][$suid]);
                unset($_SESSION['invoicetype'][$suid]);
                unset($_SESSION['inputtype'][$suid]);
                unset($_SESSION['payment'][$suid]);
            }
        }

        break;

    case "19":
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            //解訂單資料表
            $dbneme        = "neilshoporder";
            $where         = " where `orderid` = '" . $orderid . "' ";   //where數值-修改
            $neilshoporder = moduledb($dbneme, $where);
            //字串轉陣列
            $prderpeopletextArr = phpconversion($conversion = $neilshoporder['prderpeopletext'], $type = "unserialize");

            if (!empty($isAdmin)) {
                $button = "<button type='button' id='prderpeopedit' class='btn btn-default'>" . _MS_SHARED08 . "</button>";
            }

            $prderpeopletexbox = "
   <div id='prderpeopeditmane' mane='20," . $suid . "," . $orderid . "'></div>	
<ul class='list-group'>
  <li class='list-group-item'>" . _MS_SHOPPINGCART31 . "" . _MS_SHOPPINGCART46 . "" . $prderpeopletextArr[0] . "" . $button . "</li>
  <li class='list-group-item'>" . _MS_SHOPPINGCART32 . "" . _MS_SHOPPINGCART46 . "" . $prderpeopletextArr[1] . "</li>    
  <li class='list-group-item'>" . _MS_SHOPPINGCART33 . "" . _MS_SHOPPINGCART46 . "" . $prderpeopletextArr[2] . "</li>  
   <li class='list-group-item'>" . _MS_SHOPPINGCART34 . "" . _MS_SHOPPINGCART46 . "" . $prderpeopletextArr[3] . "</li> 
   <li class='list-group-item'>" . _MS_SHOPPINGCART47 . "" . _MS_SHOPPINGCART46 . "" . $prderpeopletextArr[4] . "</li>       
</ul>
     <script src='" . XOOPS_URL . "/modules/neilshop/js/shoppingcartajax.js'></script>		
	";

            echo $prderpeopletexbox;
        }

        break;

    case "20":

        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            //解訂單資料表
            $dbneme        = "neilshoporder";
            $where         = " where `orderid` = '" . $orderid . "' ";   //where數值-修改
            $neilshoporder = moduledb($dbneme, $where);
            //字串轉陣列
            $prderpeopletextArr = phpconversion($conversion = $neilshoporder['prderpeopletext'], $type = "unserialize");

            if (!empty($isAdmin)) {
                $button = "<button type='button' id='prderpeopstore' class='btn btn-warning'>" . _MS_SHOPPINGCART48 . "</button>";
            }

            //姓名
            $shoppingcart['name'] = inputtext($class = "", $name = "name", $value = "" . $prderpeopletextArr[0] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART31 . "", $id = "name");
            //行動電話
            $shoppingcart['phone'] = inputtext($class = "", $name = "phone", $value = "" . $prderpeopletextArr[1] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART32 . "", $id = "phone");
            //聯絡電話
            $shoppingcart['telephone'] = inputtext($class = "", $name = "telephone", $value = "" . $prderpeopletextArr[2] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART33 . "", $id = "telephone");

            //地址
            $shoppingcart['address'] = inputtext($class = "", $name = "addresslist", $value = "" . $prderpeopletextArr[3] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART33 . "", $id = "addresslist");
            //電子信箱
            $shoppingcart['email'] = inputtext($class = "", $name = "email", $value = "" . $prderpeopletextArr[4] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART37 . "", $id = "email");

            $prderpeopletexbox = "
   <div id='prderpeopstoremane' mane='21," . $suid . "," . $orderid . ",19'></div>	
<ul class='list-group'>
  <li class='list-group-item'>
    <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART31 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-7'>" . $shoppingcart['name'] . "</div>
    <div class='col-md-2'>" . $button . "</div>
    </div>	
    	</li>
     <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART32 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-9'>" . $shoppingcart['phone'] . "</div>
     </div>	 
    	</li>
  
      <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART33 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-9'>" . $shoppingcart['telephone'] . "</div>
     </div>	 
    	</li> 
  
      <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART34 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-9'>" . $shoppingcart['address'] . "</div>
     </div>	 
    	</li> 
        <li class='list-group-item'>	 
      <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART47 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-9'>" . $shoppingcart['email'] . "</div>
     </div>	 
    	</li>    	 
     
</ul>
     <script src='" . XOOPS_URL . "/modules/neilshop/js/shoppingcartajax.js'></script>		
	";

            echo $prderpeopletexbox;
        }
        break;

    case "21":
        //確認操作UID相符
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {

            //購買人資料
            $prderpeopletext[0] = $name;
            $prderpeopletext[1] = $phone;
            $prderpeopletext[2] = $telephone;
            $prderpeopletext[3] = $addresslist;
            $prderpeopletext[4] = $email;
            //陣列轉字串
            $prderpeopletext = phpconversion($conversion = $prderpeopletext, $type = "serialize");

            $setvar = "set  prderpeopletext='{$prderpeopletext}'  where orderid='" . $orderid . "'";
            update($dbname = "neilshoporder", $set = $setvar);
        }

        break;

    case "22":

        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            //解訂單資料表
            $dbneme        = "neilshoporder";
            $where         = " where `orderid` = '" . $orderid . "' ";   //where數值-修改
            $neilshoporder = moduledb($dbneme, $where);
            //字串轉陣列
            $receivertextArr = phpconversion($conversion = $neilshoporder['receivertext'], $type = "unserialize");

            if (!empty($isAdmin)) {
                $button = "<button type='button' id='receiveredit' class='btn btn-default'>" . _MS_SHARED08 . "</button>";
            }

            $prderpeopletexbox = "
   <div id='receivereditmane' mane='23," . $suid . "," . $orderid . "'></div>	
<ul class='list-group'>
  <li class='list-group-item'>" . _MS_SHOPPINGCART31 . "" . _MS_SHOPPINGCART46 . "" . $receivertextArr[0] . "" . $button . "</li>
  <li class='list-group-item'>" . _MS_SHOPPINGCART32 . "" . _MS_SHOPPINGCART46 . "" . $receivertextArr[1] . "</li>    
  <li class='list-group-item'>" . _MS_SHOPPINGCART33 . "" . _MS_SHOPPINGCART46 . "" . $receivertextArr[2] . "</li>  
   <li class='list-group-item'>" . _MS_SHOPPINGCART34 . "" . _MS_SHOPPINGCART46 . "" . $receivertextArr[3] . "</li> 
   <li class='list-group-item'>" . _MS_SHOPPINGCART47 . "" . _MS_SHOPPINGCART46 . "" . $receivertextArr[4] . "</li>       
</ul>
     <script src='" . XOOPS_URL . "/modules/neilshop/js/shoppingcartajax.js'></script>		
	";

            echo $prderpeopletexbox;
        }

        break;

    case "23":

        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            //解訂單資料表
            $dbneme        = "neilshoporder";
            $where         = " where `orderid` = '" . $orderid . "' ";   //where數值-修改
            $neilshoporder = moduledb($dbneme, $where);
            //字串轉陣列
            $receivertextArr = phpconversion($conversion = $neilshoporder['receivertext'], $type = "unserialize");

            if (!empty($isAdmin)) {
                $button = "<button type='button' id='receiverstore' class='btn btn-warning'>" . _MS_SHOPPINGCART48 . "</button>";
            }

            //姓名
            $shoppingcart['name'] = inputtext($class = "", $name = "name", $value = "" . $receivertextArr[0] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART31 . "", $id = "name");
            //行動電話
            $shoppingcart['phone'] = inputtext($class = "", $name = "phone", $value = "" . $receivertextArr[1] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART32 . "", $id = "phone");
            //聯絡電話
            $shoppingcart['telephone'] = inputtext($class = "", $name = "telephone", $value = "" . $receivertextArr[2] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART33 . "", $id = "telephone");

            //地址
            $shoppingcart['address'] = inputtext($class = "", $name = "addresslist", $value = "" . $receivertextArr[3] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART33 . "", $id = "addresslist");
            //電子信箱
            $shoppingcart['email'] = inputtext($class = "", $name = "email", $value = "" . $receivertextArr[4] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART37 . "", $id = "email");

            //mane='ID,".suid.",".orderid.",返回ID'
            $prderpeopletexbox = "
   <div id='receiversstore' mane='24," . $suid . "," . $orderid . ",22'></div>	
<ul class='list-group'>
  <li class='list-group-item'>
    <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART31 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-7'>" . $shoppingcart['name'] . "</div>
    <div class='col-md-2'>" . $button . "</div>
    </div>	
    	</li>
     <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART32 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-9'>" . $shoppingcart['phone'] . "</div>
     </div>	 
    	</li>
  
      <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART33 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-9'>" . $shoppingcart['telephone'] . "</div>
     </div>	 
    	</li> 
  
      <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART34 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-9'>" . $shoppingcart['address'] . "</div>
     </div>	 
    	</li> 
        <li class='list-group-item'>	 
      <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART47 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-9'>" . $shoppingcart['email'] . "</div>
     </div>	 
    	</li>    	 
     
</ul>
     <script src='" . XOOPS_URL . "/modules/neilshop/js/shoppingcartajax.js'></script>		
	";

            echo $prderpeopletexbox;
        }

        break;

    case "24":
        //確認操作UID相符
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {

            //購買人資料
            $prderpeopletext[0] = $name;
            $prderpeopletext[1] = $phone;
            $prderpeopletext[2] = $telephone;
            $prderpeopletext[3] = $addresslist;
            $prderpeopletext[4] = $email;
            //陣列轉字串
            $receivertext = phpconversion($conversion = $prderpeopletext, $type = "serialize");

            $setvar = "set  receivertext='{$receivertext}'  where orderid='" . $orderid . "'";
            update($dbname = "neilshoporder", $set = $setvar);
        }

        break;

    case "25":
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            //解訂單資料表
            $dbneme        = "neilshoporder";
            $where         = " where `orderid` = '" . $orderid . "' ";   //where數值-修改
            $neilshoporder = moduledb($dbneme, $where);
            //字串轉陣列
            $invoicetexttArr = phpconversion($conversion = $neilshoporder['invoicetext'], $type = "unserialize");

            if (!empty($isAdmin)) {
                $button = "<button type='button' id='orderinvoiceedit' class='btn btn-default readpermissionbtn'>" . _MS_SHARED08 . "</button>";
            }

            $prderpeopletexbox = "
   <div id='invoicereditmane' mane='26," . $suid . "," . $orderid . "'></div>	
<ul class='list-group'>
  <li class='list-group-item'>" . _MS_SHOPPINGCART39 . "" . _MS_SHOPPINGCART46 . "" . $invoicetexttArr[0] . "" . $button . "</li>
  <li class='list-group-item'>" . _MS_SHOPPINGCART41 . "" . _MS_SHOPPINGCART46 . "" . $invoicetexttArr[1] . "</li>    
  <li class='list-group-item'>" . _MS_SHOPPINGCART42 . "" . _MS_SHOPPINGCART46 . "" . $invoicetexttArr[2] . "</li>  
   <li class='list-group-item'>" . _MS_SHOPPINGCART43 . "" . _MS_SHOPPINGCART46 . "" . $invoicetexttArr[3] . "</li>    
</ul>
     <script src='" . XOOPS_URL . "/modules/neilshop/js/shoppingcartajax.js'></script>		
	";

            echo $prderpeopletexbox;
        }

        break;

    case "26":

        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            //解訂單資料表
            $dbneme        = "neilshoporder";
            $where         = " where `orderid` = '" . $orderid . "' ";   //where數值-修改
            $neilshoporder = moduledb($dbneme, $where);
            //字串轉陣列
            $invoicetexttArr = phpconversion($conversion = $neilshoporder['invoicetext'], $type = "unserialize");

            if (!empty($isAdmin)) {
                $button = "<button type='button' id='invoicestore' class='btn btn-warning'>" . _MS_SHOPPINGCART48 . "</button>";
            }

            //統一編號
            $shoppingcart['uniformnumbers'] = inputtext($class = "", $name = "uniformnumbers", $value = "" . $invoicetexttArr[0] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART39 . "", $id = "uniformnumbers");
            //發票抬頭
            $shoppingcart['invoicetitle'] = inputtext($class = "", $name = "invoicetitle", $value = "" . $invoicetexttArr[1] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART41 . "", $id = "invoicetitle");
            //發票收件人
            $shoppingcart['invoiceuser'] = inputtext($class = "", $name = "invoiceuser", $value = "" . $invoicetexttArr[2] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART42 . "", $id = "invoiceuser");

            //發票寄送地址
            $shoppingcart['invoiceaddress'] = inputtext($class = "", $name = "invoiceaddress", $value = "" . $invoicetexttArr[3] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART43 . "", $id = "invoiceaddress");

            //mane='ID,".suid.",".orderid.",返回ID'
            $prderpeopletexbox = "
   <div id='invoicestoremane' mane='27," . $suid . "," . $orderid . ",25'></div>	
<ul class='list-group'>
  <li class='list-group-item'>
    <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART39 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-7'>" . $shoppingcart['uniformnumbers'] . "</div>
    <div class='col-md-2'>" . $button . "</div>
    </div>	
    	</li>
     <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART41 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-9'>" . $shoppingcart['invoicetitle'] . "</div>
     </div>	 
    	</li>
  
      <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART42 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-9'>" . $shoppingcart['invoiceuser'] . "</div>
     </div>	 
    	</li> 
  
      <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-3'>" . _MS_SHOPPINGCART43 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-9'>" . $shoppingcart['invoiceaddress'] . "</div>
     </div>	 
    	</li> 
   	 
     
</ul>
     <script src='" . XOOPS_URL . "/modules/neilshop/js/shoppingcartajax.js'></script>		
	";

            echo $prderpeopletexbox;
        }

        break;

    case "27":

        //確認操作UID相符
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {

            //購買人資料
            $prderpeopletext[0] = $name;
            $prderpeopletext[1] = $phone;
            $prderpeopletext[2] = $telephone;
            $prderpeopletext[3] = $addresslist;

            //陣列轉字串
            $invoicetext = phpconversion($conversion = $prderpeopletext, $type = "serialize");

            $setvar = "set  invoicetext='{$invoicetext}'  where orderid='" . $orderid . "'";
            update($dbname = "neilshoporder", $set = $setvar);
        }

        break;

    case "28":
        //金流串接
        //開訂單資料表
        //綠界金流
        include_once XOOPS_ROOT_PATH . "/modules/neillibrary/ecpaycheck.php";

        $dbneme        = "neilshoporder";
        $where         = " where `uid` = '" . $suid . "' and  `orderid` = '" . $orderid . "'";   //where數值-修改
        $neilshoporder = moduledb($dbneme, $where);

        //廠商交易編號
        $trade_no = "" . $ordernumber . "";
        //交易金額
        $total_amt = "" . $neilshoporder['total'] . "";
        //商品名稱，如果商品名稱有多筆，需在金流付款選擇頁一行一行顯示商品名稱的話，商品名稱請以井號分隔(#)
        //去除最後一個字元
        //字串轉陣列
        $neilshopcartidArr = phpconversion($conversion = $neilshoporder['neilshopcartid'], $type = "unserialize");
        foreach ($neilshopcartidArr as $key => $val) {
            //解購物車資料表
            $dbneme      = "neilshopcart";
            $where       = " where `shopcartid` = '" . $val . "'";   //where數值-修改
            $shopcartArr = moduledb($dbneme, $where);
            //define("_MS_SHOPPINGCART82","%s-單價%s元X%s=%s元#");
            $totalamount[$key] = $shopcartArr['amount'] * $shopcartArr['cartnumber'];

            $productnamestring .= sprintf(_MS_SHOPPINGCART82, $shopcartArr['productname'], $shopcartArr['amount'], $shopcartArr['cartnumber'], $totalamount[$key]);
        }

        $item_name = substr($productnamestring, 0, -1);
        //選擇預設付款方式
        $choose_payment = "" . $payment . "";

        $ecpaycode = ecpaycode($trade_no, $total_amt, $item_name, $choose_payment, $suid = $suid, $modules = "neilshop");

        $payment = $ecpaycode['html_code'];

        echo $payment;
        break;
    case "29":

        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            $setvar = "set ordernumber='{$ordernumber}', payment='{$payment}', ordertime='" . date("Y-m-d H:i:s") . "'  where orderid='" . $orderid . "'";
            update($dbname = "neilshoporder", $set = $setvar);
        }

        break;
    case "30": //同意退款
        //讀取退貨退款資料表
        $dbneme      = "neilshopreturns";
        $where       = " where `orderid` = '" . $orderid . "' ";   //where數值-修改
        $returnsdate = moduledb($dbneme, $where);
        //手續費
        $processcontrol['remittancefee'] = inputtext($class = "", $name = "remittancefee", $value = "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART51 . "", $id = "remittancefee");
        //實退金額
        $processcontrol['refundamount'] = inputtext($class = "", $name = "refundamount", $value = "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART52 . "", $id = "refundamount");
        //匯款末五碼
        $processcontrol['lastfiveyards'] = inputtext($class = "", $name = "lastfiveyards", $value = "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART55 . "", $id = "lastfiveyards");
        //讀取時間
        $processcontrol['setuptime'] = timedate($datevar = "Y-m-d H:i:s");
        //退款時間
        $processcontrol['refundtime'] = inputtext($class = "mydate", $name = "refundtime", $value = "" . $processcontrol['setuptime'] . "", $placeholder = "" . $processcontrol['setuptime'] . "", $id = "mydate1");

        //同意退款說明
        $processcontrol['refundjob'] = inputtextarea($class = "", $name = "refundjob", $id = "refundjob", $rows = "6", $cols = "80", $value = "" . $returnsmane . "");
        //寫入設定選項
        $processcontrol['refundjobchange'] = checkbox($dataid = true, $name = "refundjobechange", $value = "1", $optionname = "" . _MS_SHOPPINGCART54 . "", $oid = "");

        $tabledate = "
<div class='row'>
  <div class='col-md-3'>" . _MS_SHOPPINGCART51 . "</div>	
  <div class='col-md-9'>" . $processcontrol['remittancefee'] . "</div>	
	</div>	<p>
<div class='row'>
  <div class='col-md-3'>" . _MS_SHOPPINGCART52 . "<span id='help-blockrefundamount' class='red'>(" . _MS_SHARED26 . ")</span></div>	
  <div class='col-md-9'>" . $processcontrol['refundamount'] . "</div>	
	</div>		<p>	
<div class='row'>
  <div class='col-md-3'>" . _MS_SHOPPINGCART55 . "</div>	
  <div class='col-md-9'>" . $processcontrol['lastfiveyards'] . "</div>	
	</div>		<p>		
	
<div class='row'>
  <div class='col-md-3'>" . _MS_SHOPPINGCART56 . "</div>	
  <div class='col-md-9'>" . $processcontrol['refundtime'] . "</div>	
	</div>		<p>	
		
<div class='row'>
  <div class='col-md-3'>" . _MS_SHOPPINGCART53 . "<span id='help-blockrefundjob' class='red'>(" . _MS_SHARED26 . ")</span></div>
  <div class='col-md-9'>" . $processcontrol['refundjob'] . "" . $processcontrol['refundjobchange'] . "</div>	
	</div>	
   	<script src='" . XOOPS_URL . "/modules/neillibrary/js/customize.js'></script> 
   	<script src='" . XOOPS_URL . "/modules/neilshop/js/formvalidation.js'></script> 		  
	  
	  ";

        echo $tabledate;
        break;
    case "31": //不同意退款

        //不同意退款說明
        $processcontrol['invalidrefundjob'] = inputtextarea($class = "", $name = "invalidrefundjob", $id = "", $rows = "6", $cols = "80", $value = "" . $returnsmane . "");

        //寫入設定選項
        $processcontrol['invalidrefundjobchange'] = checkbox($dataid = true, $name = "invalidrefundjobchange", $value = "1", $optionname = "" . _MS_SHOPPINGCART58 . "", $oid = "");
        $tabledate                                = "
<div class='row'>
  <div class='col-md-3'>" . _MS_SHOPPINGCART57 . "</div>	
  <div class='col-md-9'>" . $processcontrol['invalidrefundjob'] . "" . $processcontrol['invalidrefundjobchange'] . "</div>	
	</div>	

";

        echo $tabledate;

        break;

    case "32": //同意退貨
        //同意退貨說明
        $processcontrol['agreereturn'] = inputtextarea($class = "", $name = "agreereturn", $id = "agreereturn", $rows = "6", $cols = "80", $value = "" . $returnsmane . "");
        //寫入設定選項
        $processcontrol['agreereturnchange'] = checkbox($dataid = true, $name = "agreereturnchange", $value = "1", $optionname = "" . _MS_SHOPPINGCART60 . "", $oid = "");

        $tabledate = "<div class='row'>
  <div class='col-md-3'>" . _MS_SHOPPINGCART59 . "<span id='help-blockagreereturn' class='red'>(" . _MS_SHARED26 . ")</span></div>
  <div class='col-md-9'>" . $processcontrol['agreereturn'] . "" . $processcontrol['agreereturnchange'] . "</div>	
	</div>
   	<script src='" . XOOPS_URL . "/modules/neilshop/js/formvalidation.js'></script> 	
		";

        echo $tabledate;
        break;

    case "33": //不同意退貨
        //不同意退貨說明
        $processcontrol['donotagreereturn'] = inputtextarea($class = "", $name = "donotagreereturn", $id = "", $rows = "6", $cols = "80", $value = "" . $returnsmane . "");
        //寫入設定選項
        $processcontrol['donotagreereturnchange'] = checkbox($dataid = true, $name = "donotagreereturnchange", $value = "1", $optionname = "" . _MS_SHOPPINGCART62 . "", $oid = "");

        $tabledate = "<div class='row'>
  <div class='col-md-3' ><span style='white-space:nowrap'>" . _MS_SHOPPINGCART61 . "</span></div>	
  <div class='col-md-9'>" . $processcontrol['donotagreereturn'] . "" . $processcontrol['donotagreereturnchange'] . "</div>	
	</div>	";

        echo $tabledate;
        break;

    case "34": //追蹤商品加入購物車

        //取的ip位置
        $userip = get_real_ip();
        //取得UID
        $uid = $user_uid;
        //購物車存放商品上限
        $dbneme             = "config";  //資料表名稱
        $where              = " where `conf_name` = 'numbercapped'";   //where數值-修改
        $confignumbercapped = moduledb($dbneme, $where);
        //商品資料表
        $dbneme      = "neilshopproductcontent";  //資料表名稱
        $where       = " where `productid` = '" . $dbid . "' and  `productstatus` != 'notshelves' ";   //where數值-修改
        $productLimt = moduledb($dbneme, $where);

        $statusdata = true;
        //判斷商品數量為0
        if ($productLimt['amount'] == 0) {
            $data       = _MD_AJAX01;
            $statusdata = false;
        }

        if ($cartnumber > productLimt['amount']) {
            $statusdata = false;
        }

        $dbneme = "neilshopcart";  //資料表名稱
        //判斷是否訂購同樣商品
        $where      = " where `enable` = '0' and  `productid` = '" . $dbid . "'  and  `carttype` = '1' and (`userip` = '" . $userip . "' or  `uid` = '" . $uid . "')";   //where數值-修改
        $cappedLimt = moduledb($dbneme, $where);
        if (!empty($cappedLimt['productid'])) {
            $data       = _MD_AJAX03;
            $statusdata = false;
        }

        //判斷訂購商品上限次數
        $where     = " where `enable` = '0' and  `carttype` = '1' and (`userip` = '" . $userip . "' or  `uid` = '" . $uid . "')";   //where數值-修改
        $cappedArr = databasetablewhile($dbneme, $where);
        $capped    = count($cappedArr);
        if ($capped > $confignumbercapped['conf_value']) {
            $data       = _MD_AJAX02;
            $statusdata = false;
        }

        if ($statusdata == true and !empty($productLimt['productid'])) {
            $setvar = "set userip='{$userip}', uid='{$uid}',carttype='1'  where shopcartid='" . $shopcartid . "'";
            update($dbname = "neilshopcart", $set = $setvar);
            $data = _MD_AJAX04;
        }

        echo $data;

        break;

    case "35":
        //取的ip位置
        $userip = get_real_ip();
        //取得UID
        $uid           = $user_uid;
        $dbneme        = "neilshopcart";  //資料表名稱
        $where         = " where `enable` = '0' and   `carttype` = '0' and (`userip` = '" . $userip . "' or  `uid` = '" . $uid . "')";   //where數值-修改
        $cartnumberArr = databasetablewhile($dbneme, $where);
        $cartnumber    = count($cartnumberArr);
        echo $cartnumber;
        break;

    case "36":

        $readpermission = readpermission($user_uid = $suid);
        //開啟預購清單資料表
        $statusdata = true;
        $dbneme     = "neilshopbookorders";  //資料表名稱
        //判斷是否預購同樣商品
        $where        = " where `enable` = '0' and  `productid` = '" . $dbid . "'  and `uid` = '" . $suid . "'";   //where數值-修改
        $preorderLimt = moduledb($dbneme, $where);
        if (!empty($preorderLimt['productid'])) {
            $data       = _MD_AJAX07;
            $statusdata = false;
        }
        //取的USER-MAIL
        $useremail = $xoopsUser->email();
        //USER-帳號
        $useruname = $xoopsUser->uname();

        //黑名單判斷
        $blacklist = blacklistfunction($suid = $suid);
        if ($blacklist == 1) {
            $data       = _MD_AJAX11;
            $statusdata = false;
        }

        if (!empty($xoopsUser) and !empty($readpermission) and $statusdata != false) {
            $valuesvar = "(productid,useremail,uid,useruname) values('{$dbid}','{$useremail}','{$suid}','{$useruname}')";
            insert($dbname = "neilshopbookorders", $values = $valuesvar);
            $data = _MD_AJAX06;
        }

        echo $data;

        break;

    case "37":
        //確認刪除者UID相符
        $readpermission = readpermission($user_uid = $suid);

        $where  = " where `preorderid` = '$dbid'";
        $DBname = "neilshopbookorders";

        if (!empty($xoopsUser) and !empty($readpermission)) {
            deletefunction($where, $DBname);
        }

        break;

    case "38":

        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            $dbneme        = "neilshoppurchaser";
            $where         = " where `uid` = '" . $suid . "' ";   //where數值-修改
            $neilshoporder = moduledb($dbneme, $where);

            $button = "<button type='button' id='subscriberedit' class='btn btn-default'>" . _MS_SHARED08 . "</button>";

            if ($neilshoporder['blacklist'] == 1 and !empty($isAdmin)) {
                $blacklisttext = _MS_SHOPPINGCART63;
            }

            $prderpeopletexbox = "
   <div id='subscribereditmane' mane='39,"
                                 . $suid
                                 . "'></div>	
<ul class='list-group'>
  <li class='list-group-item'>"
                                 . _MS_SHOPPINGCART31
                                 . ""
                                 . _MS_SHOPPINGCART46
                                 . ""
                                 . $neilshoporder['name']
                                 . " &nbsp;<a class='btn btn-default btn-md' target='_blank' href='"
                                 . XOOPS_URL
                                 . "/modules/profile/userinfo.php?uid="
                                 . $neilshoporder['uid']
                                 . "'>"
                                 . _MS_SHOPPINGCART64
                                 . "</a>"
                                 . $blacklisttext
                                 . ""
                                 . $button
                                 . "</li>
  <li class='list-group-item'>"
                                 . _MS_SHOPPINGCART32
                                 . ""
                                 . _MS_SHOPPINGCART46
                                 . ""
                                 . $neilshoporder['phone']
                                 . "</li>    
  <li class='list-group-item'>"
                                 . _MS_SHOPPINGCART33
                                 . ""
                                 . _MS_SHOPPINGCART46
                                 . ""
                                 . $neilshoporder['telephone']
                                 . "</li>  
   <li class='list-group-item'>"
                                 . _MS_SHOPPINGCART34
                                 . ""
                                 . _MS_SHOPPINGCART46
                                 . ""
                                 . $neilshoporder['address']
                                 . "</li> 
   <li class='list-group-item'>"
                                 . _MS_SHOPPINGCART47
                                 . ""
                                 . _MS_SHOPPINGCART46
                                 . ""
                                 . $neilshoporder['email']
                                 . "</li>       
</ul>
     <script src='"
                                 . XOOPS_URL
                                 . "/modules/neilshop/js/shoppingcartajax.js'></script>		
	";

            echo $prderpeopletexbox;
        }

        break;

    case "39":
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            $dbneme            = "neilshoppurchaser";
            $where             = " where `uid` = '" . $suid . "' ";   //where數值-修改
            $neilshoppurchaser = moduledb($dbneme, $where);
            $button            = "<button type='button'  id='editorderpeople' class='btn btn-warning'>" . _MS_SHOPPINGCART48 . "</button>";
            //姓名
            $shoppingcart['name'] = inputtext($class = "", $name = "name", $value = "" . $neilshoppurchaser['name'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART31 . "", $id = "name");
            //行動電話
            $shoppingcart['phone'] = inputtext($class = "", $name = "phone", $value = "" . $neilshoppurchaser['phone'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART32 . "", $id = "phone");
            //聯絡電話
            $shoppingcart['telephone'] = inputtext($class = "", $name = "telephone", $value = "" . $neilshoppurchaser['telephone'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART33 . "", $id = "telephone");

            //切割字串(地址)
            $address = cuttingfunction($cutting = "" . $neilshoppurchaser['address'] . "", $sign = "-");
            //地址
            //$shoppingcart['address']=inputtext($class="",$name="addresslist",$value="".$neilshoppurchaser['address']."",$placeholder=""._MS_SHARED21.""._MS_SHOPPINGCART33."",$id="addresslist");

            //地址-縣市
            $shoppingcart['county'] = inputtext($class = "", $name = "county", $value = "" . $address[0] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART35 . "", $id = "county");
            //地址-鄉鎮區
            $shoppingcart['townshiparea'] = inputtext($class = "", $name = "townshiparea", $value = "" . $address[1] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART36 . "", $id = "townshiparea");

            //地址
            $shoppingcart['address'] = inputtext($class = "", $name = "address", $value = "" . $address[2] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART34 . "", $id = "addresscolumn");

            //電子信箱
            $shoppingcart['email'] = inputtext($class = "", $name = "email", $value = "" . $neilshoppurchaser['email'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART37 . "", $id = "email");

            //mane='ID,".suid.",".orderid.",返回ID'
            $prderpeopletexbox = "
   <div id='editorderpeoplemane' mane='40," . $suid . ",38'></div>	
<ul class='list-group'>
  <li class='list-group-item'>
    <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART31 . "" . _MS_SHOPPINGCART46 . "<span id='help-blockname' class='red'>(" . _MS_SHARED22 . ")</span></div>
    <div class='col-md-6'>" . $shoppingcart['name'] . "</div>
    <div class='col-md-2'>" . $button . "</div>
    </div>	
    	</li>
     <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART32 . "" . _MS_SHOPPINGCART46 . "<span id='help-blockphone' class='red'>(" . _MS_SHARED22 . ")</span></div>
    <div class='col-md-8'>" . $shoppingcart['phone'] . "</div>
     </div>	 
    	</li>
  
      <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART33 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-8'>" . $shoppingcart['telephone'] . "</div>
     </div>	 
    	</li> 
  
      <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART34 . "" . _MS_SHOPPINGCART46 . "<span  id='help-blockaddress' class='red'>(" . _MS_SHARED22 . ")</span></div>
    <div class='col-md-8'>
       <div  class='row rowcustom'>
      <div class='col-md-3'>" . $shoppingcart['county'] . "</div>   
            <div class='col-md-3'>" . $shoppingcart['townshiparea'] . "</div> 
               <div class='col-md-6'>" . $shoppingcart['address'] . "</div>    
         </div>	 
    	 
    	 </div>
     </div>	 
    	</li> 
        <li class='list-group-item'>	 
      <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART47 . "" . _MS_SHOPPINGCART46 . "<span id='help-blockemail' class='red'>" . _MS_SHARED22 . "</span></div>
    <div class='col-md-8'>" . $shoppingcart['email'] . "</div>
     </div>	 
    	</li>    	 
     
</ul>

     <script src='" . XOOPS_URL . "/modules/neilshop/js/formvalidation.js'></script>	
		
	";

            echo $prderpeopletexbox;
        }
        break;

    case "40":
        //確認操作UID相符
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            $setvar = "set  name='{$name}',phone='{$phone}',telephone='{$telephone}',address='{$addresslist}',email='{$email}'  where uid='" . $suid . "'";
            update($dbname = "neilshoppurchaser", $set = $setvar);
        }

        break;

    case "41":
        $readpermission = readpermission($user_uid = $suid);

        if (!empty($xoopsUser) and !empty($readpermission)) {
            $setvar = "set  blacklist='{$blacklist}' where prderpeopleid='" . $dbid . "'";
            update($dbname = "neilshoppurchaser", $set = $setvar);
            if ($blacklist == 1) {
                $data = _MD_AJAX08;
            } else {
                $data = _MD_AJAX09;
            }
        }

        echo $data;

        break;

    case "42":
        $where  = " where `prderpeopleid` = '$dbid'";
        $DBname = "neilshoppurchaser";
        !empty($isAdmin) ? deletefunction($where, $DBname) : '';
        break;

    case "43":

        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            //解收件人資料表
            $dbneme         = "neilshopreceiver";
            $where          = " where `uid` = '" . $suid . "' and  `receiverid` = '" . $receiverid . "'";   //where數值-修改
            $readpermission = moduledb($dbneme, $where);

            $button = "<button type='button' id='readpermissionedit' class='btn btn-default readpermissionbtn'>" . _MS_SHARED08 . "</button>";

            $blacklisttext = _MS_SHOPPINGCART65;
            //mane='ID,".suid.",".receiverid.",返回ID'
            $prderpeopletexbox = "
   <div id='readpermissioneditmane' mane='44," . $suid . "," . $readpermission['receiverid'] . ",43'></div>	
<ul class='list-group'>
  <li class='list-group-item'>" . _MS_SHOPPINGCART31 . "" . _MS_SHOPPINGCART46 . "" . $readpermission['name'] . "" . $blacklisttext . "" . $button . "</li>
  <li class='list-group-item'>" . _MS_SHOPPINGCART32 . "" . _MS_SHOPPINGCART46 . "" . $readpermission['phone'] . "</li>    
  <li class='list-group-item'>" . _MS_SHOPPINGCART33 . "" . _MS_SHOPPINGCART46 . "" . $readpermission['telephone'] . "</li>  
   <li class='list-group-item'>" . _MS_SHOPPINGCART34 . "" . _MS_SHOPPINGCART46 . "" . $readpermission['address'] . "</li> 
   <li class='list-group-item'>" . _MS_SHOPPINGCART47 . "" . _MS_SHOPPINGCART46 . "" . $readpermission['email'] . "</li>       
</ul>
     <script src='" . XOOPS_URL . "/modules/neilshop/js/shoppingcartajax.js'></script>		
	";

            echo $prderpeopletexbox;
        }

        break;

    case "44":

        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            $dbneme           = "neilshopreceiver";
            $where            = " where `uid` = '" . $suid . "'  and  `receiverid` = '" . $receiverid . "' ";   //where數值-修改
            $neilshopreceiver = moduledb($dbneme, $where);
            $button           = "<button type='button'  id='receiverbtn' class='btn btn-warning '>" . _MS_SHOPPINGCART48 . "</button>";
            //姓名
            $shoppingcart['name'] = inputtext($class = "", $name = "name", $value = "" . $neilshopreceiver['name'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART31 . "", $id = "name");
            //行動電話
            $shoppingcart['phone'] = inputtext($class = "", $name = "phone", $value = "" . $neilshopreceiver['phone'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART32 . "", $id = "phone");
            //聯絡電話
            $shoppingcart['telephone'] = inputtext($class = "", $name = "telephone", $value = "" . $neilshopreceiver['telephone'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART33 . "", $id = "telephone");

            //切割字串(地址)
            $address = cuttingfunction($cutting = "" . $neilshopreceiver['address'] . "", $sign = "-");
            //地址
            //$shoppingcart['address']=inputtext($class="",$name="addresslist",$value="".$neilshoppurchaser['address']."",$placeholder=""._MS_SHARED21.""._MS_SHOPPINGCART33."",$id="addresslist");

            //地址-縣市
            $shoppingcart['county'] = inputtext($class = "", $name = "county", $value = "" . $address[0] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART35 . "", $id = "county");
            //地址-鄉鎮區
            $shoppingcart['townshiparea'] = inputtext($class = "", $name = "townshiparea", $value = "" . $address[1] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART36 . "", $id = "townshiparea");

            //地址
            $shoppingcart['address'] = inputtext($class = "", $name = "address", $value = "" . $address[2] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART34 . "", $id = "addresscolumn");

            //電子信箱
            $shoppingcart['email'] = inputtext($class = "", $name = "email", $value = "" . $neilshopreceiver['email'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART37 . "", $id = "email");

            //mane='ID,".suid.",".orderid.",返回ID,列表值'
            $prderpeopletexbox = "
   <div id='receivermane' mane='45," . $suid . "," . $neilshopreceiver['receiverid'] . "," . $receiverreturn . "," . $listreturn . "' ></div>	
<ul class='list-group'  >
  <li class='list-group-item'>
    <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART31 . "" . _MS_SHOPPINGCART46 . "<span id='help-blockname' class='red'>(" . _MS_SHARED22 . ")</span></div>
    <div class='col-md-6'>" . $shoppingcart['name'] . "</div>
    <div class='col-md-2'>" . $button . "</div>
    </div>	
    	</li>
     <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART32 . "" . _MS_SHOPPINGCART46 . "<span id='help-blockphone' class='red'>(" . _MS_SHARED22 . ")</span></div>
    <div class='col-md-8'>" . $shoppingcart['phone'] . "</div>
     </div>	 
    	</li>
  
      <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART33 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-8'>" . $shoppingcart['telephone'] . "</div>
     </div>	 
    	</li> 
  
      <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART34 . "" . _MS_SHOPPINGCART46 . "<span  id='help-blockaddress' class='red'>(" . _MS_SHARED22 . ")</span></div>
    <div class='col-md-8'>
       <div  class='row rowcustom'>
      <div class='col-md-3'>" . $shoppingcart['county'] . "</div>   
            <div class='col-md-3'>" . $shoppingcart['townshiparea'] . "</div> 
               <div class='col-md-6'>" . $shoppingcart['address'] . "</div>    
         </div>	 
    	 
    	 </div>
     </div>	 
    	</li> 
        <li class='list-group-item'>	 
      <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART47 . "" . _MS_SHOPPINGCART46 . "<span id='help-blockemail' class='red'>" . _MS_SHARED22 . "</span></div>
    <div class='col-md-8'>" . $shoppingcart['email'] . "</div>
     </div>	 
    	</li>    	 
     
</ul>
     <script src='" . XOOPS_URL . "/modules/neilshop/js/shoppingcartajax.js'></script>	
     <script src='" . XOOPS_URL . "/modules/neilshop/js/formvalidation.js'></script>	
		
	";

            echo $prderpeopletexbox;
        }

        break;

    case "45":
        //確認操作UID相符
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            $setvar = "set  name='{$name}',phone='{$phone}',telephone='{$telephone}',address='{$addresslist}',email='{$email}'  where receiverid='" . $receiverid . "'";
            update($dbname = "neilshopreceiver", $set = $setvar);
        }

        break;

    case "46":

        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            //解訂購人資料表
            $dbneme            = "neilshoppurchaser";
            $where             = " where `uid` = '" . $suid . "' ";   //where數值-修改
            $neilshoppurchaser = moduledb($dbneme, $where);

            //解收件人資料表
            $dbneme              = "neilshopreceiver";
            $where               = " where `uid` = '" . $suid . "' and  `receiverid` != '" . $neilshoppurchaser['receiverid'] . "'";   //where數值-修改
            $neilshopreceiverArr = databasetablewhile($dbneme, $where);

            foreach ($neilshopreceiverArr as $key => $val) {
                $button = "
	<div  class='row  recipientlistbtn'>
	<button type='button' id='defaultbtn{$key}' class='btn btn-success'>" . _MS_SHARED27 . "</button>
    <button type='button' id='deletebotton{$key}' mane='48," . $neilshopreceiverArr[$key]['receiverid'] . "," . $neilshopreceiverArr[$key]['name'] . "," . _MS_SHOPPINGCART67 . "," . $suid . "'  class='btn btn-danger deleteeach'>" . _MS_SHARED09 . "</button>	
   <button type='button' id='readpermissionlistedit{$key}' class='btn btn-default '>" . _MS_SHARED08 . "</button></div>";
                //mane='ID,".suid.",".receiverid.",返回ID'
                $prderpeopletexbox .= "
   <div id='defaultbtnedit{$key}' mane='47," . $suid . "," . $neilshopreceiverArr[$key]['receiverid'] . "," . $neilshopreceiverArr[$key]['name'] . "," . _MS_SHOPPINGCART66 . "' ></div>		
   <div id='readpermissionlistedit{$key}' mane='44," . $suid . "," . $neilshopreceiverArr[$key]['receiverid'] . ",46,list' class='receiverlisteach'></div>	
<ul class='list-group' id='deletetr{$key}'>
  <li class='list-group-item'>" . _MS_SHOPPINGCART31 . "" . _MS_SHOPPINGCART46 . "" . $neilshopreceiverArr[$key]['name'] . "" . $button . "</li>
  <li class='list-group-item'>" . _MS_SHOPPINGCART32 . "" . _MS_SHOPPINGCART46 . "" . $neilshopreceiverArr[$key]['phone'] . "</li>    
  <li class='list-group-item'>" . _MS_SHOPPINGCART33 . "" . _MS_SHOPPINGCART46 . "" . $neilshopreceiverArr[$key]['telephone'] . "</li>  
   <li class='list-group-item'>" . _MS_SHOPPINGCART34 . "" . _MS_SHOPPINGCART46 . "" . $neilshopreceiverArr[$key]['address'] . "</li> 
   <li class='list-group-item'>" . _MS_SHOPPINGCART47 . "" . _MS_SHOPPINGCART46 . "" . $neilshopreceiverArr[$key]['email'] . "</li>       
</ul>
";
            }
            $prderpeopletexbox .= "
 <script src='" . XOOPS_URL . "/modules/neillibrary/js/customize.js'></script>		
 <script src='" . XOOPS_URL . "/modules/neilshop/js/shoppingcartajax.js'></script>		
";

            echo $prderpeopletexbox;
        }

        break;

    case "47":
        //確認操作UID相符
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            $setvar = "set  receiverid='{$dbid}'  where uid='" . $suid . "'";
            update($dbname = "neilshoppurchaser", $set = $setvar);

            $res['result']  = $suid;
            $res['result2'] = $dbid;
            echo json_encode($res);
            exit;
        }

        break;
    case "48":

        //確認刪除者UID相符
        $readpermission = readpermission($user_uid = $suid);
        $where          = " where `receiverid` = '$dbid'";
        $DBname         = "neilshopreceiver";

        if (!empty($xoopsUser) and !empty($readpermission)) {
            deletefunction($where, $DBname);
        }

        break;
    case "49":

        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            //解發票資料表
            $dbneme      = "neilshopinvoice";
            $where       = " where `uid` = '" . $suid . "' and  `invoiceid` = '" . $invoiceid . "'";   //where數值-修改
            $invoicelist = moduledb($dbneme, $where);

            $button = "<button type='button' id='invoiceedit' class='btn btn-default readpermissionbtn'>" . _MS_SHARED08 . "</button>";

            $blacklisttext = _MS_SHOPPINGCART68;
            //mane='ID,".suid.",".receiverid.",返回ID'
            $prderpeopletexbox = "
   <div id='invoiceeditmane' mane='50," . $suid . "," . $invoicelist['invoiceid'] . ",49' ></div>	
<ul class='list-group'>
  <li class='list-group-item'>" . _MS_SHOPPINGCART39 . "" . _MS_SHOPPINGCART46 . "" . $invoicelist['uniformnumbers'] . "" . $blacklisttext . "" . $button . "</li>
  <li class='list-group-item'>" . _MS_SHOPPINGCART41 . "" . _MS_SHOPPINGCART46 . "" . $invoicelist['invoicetitle'] . "</li>    
  <li class='list-group-item'>" . _MS_SHOPPINGCART42 . "" . _MS_SHOPPINGCART46 . "" . $invoicelist['invoiceuser'] . "</li>  
   <li class='list-group-item'>" . _MS_SHOPPINGCART43 . "" . _MS_SHOPPINGCART46 . "" . $invoicelist['invoiceaddress'] . "</li> 
</ul>
     <script src='" . XOOPS_URL . "/modules/neilshop/js/shoppingcartajax.js'></script>		
	";

            echo $prderpeopletexbox;
        }

        break;

    case "50":

        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            $dbneme          = "neilshopinvoice";
            $where           = " where `uid` = '" . $suid . "'  and  `invoiceid` = '" . $invoiceid . "' ";   //where數值-修改
            $neilshopinvoice = moduledb($dbneme, $where);

            $button = "<button type='button'  id='invoicebtn' class='btn btn-warning '>" . _MS_SHOPPINGCART48 . "</button>";
            //統一編號
            $shoppingcart['uniformnumbers'] = inputtext($class = "", $name = "uniformnumbers", $value = "" . $neilshopinvoice['uniformnumbers'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART39 . "", $id = "uniformnumbers");
            //發票抬頭
            $shoppingcart['invoicetitle'] = inputtext($class = "", $name = "invoicetitle", $value = "" . $neilshopinvoice['invoicetitle'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART41 . "", $id = "invoicetitle");
            //發票收件人
            $shoppingcart['invoiceuser'] = inputtext($class = "", $name = "invoiceuser", $value = "" . $neilshopinvoice['invoiceuser'] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART42 . "", $id = "invoiceuser");

            //切割字串(地址)
            $address = cuttingfunction($cutting = "" . $neilshopinvoice['invoiceaddress'] . "", $sign = "-");

            //地址-縣市
            $shoppingcart['invoiceusercounty'] = inputtext($class = "", $name = "invoiceusercounty", $value = "" . $address[0] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART35 . "", $id = "invoiceusercounty");
            //地址-鄉鎮區
            $shoppingcart['invoiceusertownshiparea'] = inputtext($class = "", $name = "invoiceusertownshiparea", $value = "" . $address[1] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART36 . "", $id = "invoiceusertownshiparea");

            //地址
            $shoppingcart['invoiceuseraddress'] = inputtext($class = "", $name = "invoiceuseraddress", $value = "" . $address[2] . "", $placeholder = "" . _MS_SHARED21 . "" . _MS_SHOPPINGCART34 . "", $id = "invoiceuseraddress");

            //mane='ID,".suid.",".orderid.",返回ID,列表值'
            $prderpeopletexbox = "
   <div id='invoicebtnmane' mane='51," . $suid . "," . $neilshopinvoice['invoiceid'] . "," . $receiverreturn . "," . $listreturn . "' ></div>	
<ul class='list-group'  >
  <li class='list-group-item'>
    <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART39 . "" . _MS_SHOPPINGCART46 . "</div>
    <div class='col-md-6'>" . $shoppingcart['uniformnumbers'] . "<span id='help-blockuniformnumbers' class='red'>(" . _MS_SHOPPINGCART50 . ")</span></div>
    <div class='col-md-2'>" . $button . "</div>
    </div>	
    	</li>
     <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART41 . "" . _MS_SHOPPINGCART46 . "<span id='help-blockinvoicetitle' class='red'>(" . _MS_SHARED22 . ")</span></div>
    <div class='col-md-8'>" . $shoppingcart['invoicetitle'] . "</div>
     </div>	 
    	</li>
  
      <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART42 . "" . _MS_SHOPPINGCART46 . "<span id='help-blockinvoiceuser' class='red'>(" . _MS_SHARED22 . ")</span></div>
    <div class='col-md-8'>" . $shoppingcart['invoiceuser'] . "</div>
     </div>	 
    	</li> 
  
      <li class='list-group-item'>

     <div  class='row'>
    <div class='col-md-4'>" . _MS_SHOPPINGCART34 . "" . _MS_SHOPPINGCART46 . "<span  id='help-blockinvoiceuseraddress' class='red'>(" . _MS_SHARED22 . ")</span></div>
    <div class='col-md-8'>
       <div  class='row rowcustom'>
      <div class='col-md-3'>" . $shoppingcart['invoiceusercounty'] . "</div>   
            <div class='col-md-3'>" . $shoppingcart['invoiceusertownshiparea'] . "</div> 
               <div class='col-md-6'>" . $shoppingcart['invoiceuseraddress'] . "</div>    
         </div>	 
    	 
    	 </div>
     </div>	 
    	</li> 
  	 
     
</ul>
     <script src='" . XOOPS_URL . "/modules/neilshop/js/shoppingcartajax.js'></script>	
     <script src='" . XOOPS_URL . "/modules/neilshop/js/formvalidation.js'></script>	
		
	";

            echo $prderpeopletexbox;
        }

        break;
    case "51":

        //確認操作UID相符
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            $setvar = "set  uniformnumbers='{$uniformnumbers}',invoicetitle='{$invoicetitle}',invoiceuser='{$invoiceuser}',invoiceaddress='{$addresslist}'  where invoiceid='" . $invoiceid . "'";
            update($dbname = "neilshopinvoice", $set = $setvar);
        }

        break;

    case "52":
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            //解訂購人資料表
            $dbneme            = "neilshoppurchaser";
            $where             = " where `uid` = '" . $suid . "' ";   //where數值-修改
            $neilshoppurchaser = moduledb($dbneme, $where);

            //解發票資料表
            $dbneme             = "neilshopinvoice";
            $where              = " where `uid` = '" . $suid . "' and  `invoiceid` != '" . $neilshoppurchaser['invoiceid'] . "'";   //where數值-修改
            $neilshopinvoiceArr = databasetablewhile($dbneme, $where);

            foreach ($neilshopinvoiceArr as $key => $val) {
                $button = "
	<div  class='row  recipientlistbtn'>
	<button type='button' id='invoicedefaultbtn{$key}' class='btn btn-success'>" . _MS_SHARED28 . "</button>
    <button type='button' id='deletebotton{$key}' mane='54," . $neilshopinvoiceArr[$key]['invoiceid'] . "," . $neilshopinvoiceArr[$key]['invoicetitle'] . "," . _MS_SHOPPINGCART71 . "," . $suid . "'  class='btn btn-danger deleteeach'>" . _MS_SHARED09 . "</button>	
   <button type='button' id='invoicelistedit{$key}' class='btn btn-default '>" . _MS_SHARED08 . "</button></div>";
                //mane='ID,".suid.",".receiverid.",返回ID'
                $prderpeopletexbox .= "
   <div id='invoicedefaultmane{$key}' mane='53," . $suid . "," . $neilshopinvoiceArr[$key]['invoiceid'] . "," . $neilshopinvoiceArr[$key]['invoicetitle'] . "," . _MS_SHOPPINGCART70 . "' ></div>		
   <div id='invoicelisteditmane{$key}' mane='50," . $suid . "," . $neilshopinvoiceArr[$key]['invoiceid'] . ",52,list' class='invoicelisteach'></div>	
<ul class='list-group' id='deletetr{$key}'>
  <li class='list-group-item'>" . _MS_SHOPPINGCART39 . "" . _MS_SHOPPINGCART46 . "" . $neilshopinvoiceArr[$key]['uniformnumbers'] . "" . $button . "</li>
  <li class='list-group-item'>" . _MS_SHOPPINGCART41 . "" . _MS_SHOPPINGCART46 . "" . $neilshopinvoiceArr[$key]['invoicetitle'] . "</li>    
  <li class='list-group-item'>" . _MS_SHOPPINGCART42 . "" . _MS_SHOPPINGCART46 . "" . $neilshopinvoiceArr[$key]['invoiceuser'] . "</li>  
   <li class='list-group-item'>" . _MS_SHOPPINGCART43 . "" . _MS_SHOPPINGCART46 . "" . $neilshopinvoiceArr[$key]['invoiceaddress'] . "</li> 
</ul>
";
            }
            $prderpeopletexbox .= "
 <script src='" . XOOPS_URL . "/modules/neillibrary/js/customize.js'></script>		
 <script src='" . XOOPS_URL . "/modules/neilshop/js/shoppingcartajax.js'></script>		
";

            echo $prderpeopletexbox;
        }

        break;

    case "53":
        //確認操作UID相符
        $readpermission = readpermission($user_uid = $suid);
        if (!empty($xoopsUser) and !empty($readpermission)) {
            $setvar = "set  invoiceid='{$dbid}'  where uid='" . $suid . "'";
            update($dbname = "neilshoppurchaser", $set = $setvar);

            $res['result']  = $suid;
            $res['result2'] = $dbid;
            echo json_encode($res);
            exit;
        }

        break;

    case "54":

        //確認刪除者UID相符
        $readpermission = readpermission($user_uid = $suid);
        $where          = " where `invoiceid` = '$dbid'";
        $DBname         = "neilshopinvoice";

        if (!empty($xoopsUser) and !empty($readpermission)) {
            deletefunction($where, $DBname);
        }

        break;

    case "55":
        $where  = " where `nsn` = '$dbid'";
        $DBname = "neothemesmarquee";
        !empty($isAdmin) ? deletefunction($where, $DBname) : '';

        break;
    default:

}

function optionbox($sort = "", $oid = "")
{
    foreach ($sort as $key => $val) {
        $value     = $sort[$key]['sortid'];
        $optionone .= optionselect($dataid = $sort[$key]['sortid'], $optionname = $sort[$key]['sorttitle'], $oid = "" . $oid . "", $value = $value);
    }
    return $optionone;
}

exit;
