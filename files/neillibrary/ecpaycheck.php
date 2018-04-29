<?php
//-- 引入檔案 --//
include "header.php";
include_once XOOPS_ROOT_PATH."/header.php";



//AIO建立訂單API
   //特殊字元置換
   function _replaceChar($value)
   {
       $search_list = array('%2d', '%5f', '%2e', '%21', '%2a', '%2A', '%28', '%29');
       $replace_list = array('-', '_', '.', '!', '*' , '*', '(', ')');
       $value = str_replace($search_list, $replace_list, $value);
       return $value;
   }
    //產生檢查碼
    function _getMacValue($hash_key, $hash_iv, $form_array)
    {
        $encode_str = "HashKey=" . $hash_key;
        foreach ($form_array as $key => $value) {
            $encode_str .= "&" . $key . "=" . $value;
        }
        $encode_str .= "&HashIV=" . $hash_iv;
        $encode_str = strtolower(urlencode($encode_str));
        $encode_str = _replaceChar($encode_str);
        return strtoupper(md5($encode_str));
        //return strtoupper(hash('sha256' ,$encode_str));
    }
    //仿自然排序法
    function merchantSort($a, $b)
    {
        return strcasecmp($a, $b);
    }
//------------------------------------------交易輸入參數------------------------------------------------------





//金流串接
function ecpaycode($trade_no="", $total_amt="", $item_name="", $choose_payment="", $suid="", $modules="")
{
    global $uid,$xoopsModuleConfig,$xoopsModule,$xoopsConfig;



    //模組判斷
    switch ($modules) {
case "neilshop":
//讀取金流資料表
$dbneme="neilshopecpay";
$where=" ";   //where數值-修改
$neilshopecpay=moduledb($dbneme, $where);

//返回商店按鈕
empty($uid) ? $uid=$suid : 'FALSE'; // get TRUE
$client_back_url ="".XOOPS_URL."/modules/neilshop/shoppingcart.php?op=orderadmin&suid=".$uid."";

  break;
  
/*case "open":
$text=_MS_SHOPPINGCART105;
  break;  */

}





    //套用金流格式

    //廠商交易編號
    //$trade_no = "".$shoppingcart['ordernumber']."";
    //交易金額
    //$total_amt = "".$shoppingcart['thetotalamount3']."";
    //交易描述-購物車名稱
    $trade_desc = "".$xoopsConfig['sitename']."";
    //商品名稱，如果商品名稱有多筆，需在金流付款選擇頁一行一行顯示商品名稱的話，商品名稱請以井號分隔(#)
    //去除最後一個字元
    //$item_name = substr($productnamestring,0,-1);
    //付款完成通知回傳網址
    $return_url="".XOOPS_URL."/modules/".$modules."/ecpayreturn.php";

    //選擇預設付款方式
    //$choose_payment = "".$paymentval."";

    /***************以下為測試環境資訊(若轉換為正式環境,請修改以下參數值)**********************/
    //交易網址(測試環境)
if (!empty($neilshopecpay['enable'])) { //正式網址
$gateway_url = "https://payment.ecpay.com.tw/Cashier/AioCheckOut/V5";
} else {  //測試網址
    $gateway_url = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V2";
}
    $html_code['gateway_url']=$gateway_url;

    //商店代號
    $merchant_id = "".$neilshopecpay['merchantid']."";
    //HashKey
    $hash_key = "".$neilshopecpay['hashkey']."";
    //HashIV
    $hash_iv = "".$neilshopecpay['hashiv']."";

    $form_array = array(
    "MerchantID" => $merchant_id,
    "MerchantTradeNo" => $trade_no,
    "MerchantTradeDate" => date("Y/m/d H:i:s"),
    "PaymentType" => "aio",
    "TotalAmount" => $total_amt,
    "TradeDesc" => $trade_desc,
    "ItemName" => $item_name,
    "ReturnURL" => $return_url,
    "ChoosePayment" => $choose_payment,
    "ClientBackURL" => $client_back_url,
);



    uksort($form_array, 'merchantSort');
    //取得檢查碼
    $form_array['CheckMacValue'] = _getMacValue($hash_key, $hash_iv, $form_array);
    $html_code['CheckMacValue']=$form_array['CheckMacValue'];
    foreach ($form_array as $key => $val) {
        $html_code['html_code'] .= "<input type='hidden'   name='" . $key . "' value='" . $val . "'>";
    }

    return  $html_code;
}
