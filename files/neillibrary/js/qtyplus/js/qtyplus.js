//多筆
$(document).ready(function() {

    //計算
//預設值
$defaulcountt=amountofgoodsdefault();

    // alert(eval(1+2*3)); 	  
    function totalamount(currentVal, $calculate, $cartprice, $quantity, $cartamount,$cartshippingcosts) {
        $price = $($cartprice).attr("mane");
        $pricetotal = $($cartprice).text();
        var $cartamountvar = $($cartamount).attr("mane");
        var $cartamounttext = $($cartamount).text();
        var $cartamountNumber = Number($cartamounttext);
        var $quantityvar = $($quantity).val();
        var $cartshippingcostsvar = $($cartshippingcosts).attr("mane"); //運費
         var $cartshippingcostsvarNumber = Number( $cartshippingcostsvar); //轉數值
        
        	
        var  $cartshippingcoststext = $($cartshippingcosts).text();  //加總值
         var $cartshippingcostsNumber = Number($cartshippingcoststext); //轉數值
        
          
         var $footfreeshipping= $("#shippingcoststotal").text(); //運費總金額顯示值
         var $footfreeshippingNumber = Number($footfreeshipping); //轉數值
        
         
         var $shippingcostsactual= $("#shippingcoststota2").text(); //運費總金額實際值
         var $shippingcostsactualNumber = Number($shippingcostsactual); //轉數值

   
        if ($calculate == '+' && $cartamounttext != '0') {
            $priceaddup = $price * currentVal;
            $cartamountaddup = $cartamountvar - currentVal;
            //運費計算
            $cartshippingcostsaddup=$cartshippingcostsvar* currentVal;
            //總金額         
          //  $footfreeshippingaddup=eval($footfreeshippingNumber+$cartshippingcostsvarNumber);
            
            
            //實際值加總
            $footfreeshippingaddup=eval($shippingcostsactualNumber+$cartshippingcostsvarNumber); 
            
     //    alert($footfreeshippingaddup); 
            
        }

        if ($calculate == '-') {
            $priceaddup = $pricetotal - $price;
            $cartamountaddup = $cartamountNumber + 1;
            //運費計算
            $cartshippingcostsaddup=$cartshippingcostsNumber- $cartshippingcostsvar; 
           //總金額       
           $footfreeshippingaddup=eval($shippingcostsactualNumber-$cartshippingcostsvarNumber);

            
        }
  
     /*   if ($calculate == 'custom') {
            if ($quantityvar < $cartamountNumber) { //輸入未值超過商品值
                $priceaddup = $price * $quantityvar;
                $cartamountaddup = $cartamountvar - $quantityvar;
             //運費計算
             $cartshippingcostsaddup=$cartshippingcostsvar* $quantityvar;
             //總金額    
              $footfreeshippingaddup = eval($shippingcostsactualNumber - $cartshippingcostsNumber+$cartshippingcostsaddup);
         
            
            } else { //輸入值超過商品值
                $($quantity).val(0);
                $cartamountaddup = $cartamountvar;
                $priceaddup = 0;
                $cartshippingcostsaddup=$cartshippingcostsvar; 
            }
        }*/


 
        //輸出商品數量
        $($cartamount).text($cartamountaddup);
        //輸出金額
        $($cartprice).text($priceaddup);
        //輸出運費
        $($cartshippingcosts).text($cartshippingcostsaddup);
        //輸出運費加總
  
     
        var $priceArr= new Array();
	    //商品金額
	    $priceArr[0]=$price;
        //商品總金額+已計算
        $priceArr[1]=$priceaddup;
        //商品總金額+未計算
        $priceArr[2]=$pricetotal;
        //運費總金額
        $priceArr[3]=$footfreeshippingaddup;
       //實際運費總金額
        $priceArr[4]=$footfreeshippingaddup;
        //未計算運費總金額
        $priceArr[5]=$shippingcostsactualNumber
       //運費預設值
        $priceArr[6]=$footfreeshippingNumber;	
        
        return  $priceArr;
    }


    //預設值
 /*   function totalamountdefault($quantityvar, $cartamount) {
        var $cartamountvar = $($cartamount).attr("mane");
        var $cartamounttext = $($cartamount).text();
        var $cartamountNumber = Number($cartamounttext);
        $cartamountaddup = $cartamountNumber - $quantityvar;
        //輸出商品數量
        $($cartamount).text($cartamountaddup);
    }*/
    
    

//預設計算加總
function amountofgoodsdefault($amountofgoodsNumber,$shippingcosts,$amountofgoodsNumber2,$notcalculated,$cartpricedeletvar,$cartshippingcostsid,$cartpriceid) {
 var $footfreeshippingfree= $("#footfreeshipping").attr("mane");  //免運費總金額
 var $footfreeshippingfreeNumber = Number($footfreeshippingfree); //轉數值 	 

	var $amountofgoodstext3 = $('#totalamount3').text(); //結帳總金額不含運費
    var $amountofgoodsNumber3 = Number($amountofgoodstext3);

	var $amountofgoodstext4 = $('#totalamount4').text(); //加運費金額
    var $amountofgoodsNumber4 = Number($amountofgoodstext4);

	var $shippingcoststota2 = $('#shippingcoststota2').text(); //實際運費
    var $shippingcoststota2Number = Number($shippingcoststota2);
    
  	var $shippingcoststotal = $('#shippingcoststotal').text(); //總運費
    var $shippingcoststotalNumber = Number($shippingcoststotal);  


  
if($cartpricedeletvar=="delete"){

   	  
  var $cartshippingcostsvar= $($cartshippingcostsid).text(); 
  var $cartshippingcostsNumber = Number($cartshippingcostsvar); 

	  	  
 var $cartpricevar= $($cartpriceid).text(); 
  var $cartpricevarNumber = Number($cartpricevar); 
	
	//	alert($cartpricevarNumber);
	
$cartshippingcostsdelete=$cartshippingcostsNumber //運費回傳值
$cartpricedelete=$cartpricevarNumber //小記回傳值

$amountofgoodstext3=eval($amountofgoodsNumber3-$cartpricedelete); 
$amountofgoodstext4=eval($amountofgoodsNumber4-$cartpricedelete-$cartshippingcostsdelete); 
$shippingcoststota2=eval($shippingcoststota2Number-$cartshippingcostsdelete); 
$shippingcoststotal=eval($shippingcoststotalNumber-$cartshippingcostsdelete); 












}else{
$cartshippingcostsdelete=0 //運費回傳值
$cartpricedelete=0 //小記回傳值
}
$noshipping=$amountofgoodsNumber2; //輸出總金額

//alert($noshipping);

//$amountofgoodsNumber3=eval($amountofgoodsNumber3-$cartpricedelete); 

if($amountofgoodsNumber2==undefined){
$judgment=eval($amountofgoodsNumber3-$cartpricedelete); 
}else{
if($cartpricedeletvar=="delete"){
$judgment=eval($amountofgoodsNumber3-$cartpricedelete); 
}else{
$judgment=$amountofgoodsNumber2;
}


}
//alert($amountofgoodsNumber2);
//$judgment=$judgment+$test;



  var $amountoArr= new Array();


 $plusshipping=eval($amountofgoodsNumber+$shippingcosts-$notcalculated); 
//alert($amountofgoodsNumbe);
 
if($judgment >= $footfreeshippingfreeNumber){  //大於免運費額 
$amountoArr[0]=$noshipping; 
//運費歸零
$amountoArr[3]='0';
$footfreeshipping='<span class=blue>本次訂單結算金額超過'+$footfreeshippingfreeNumber+'元免收運費</span>';
      $('#totalamount,#totalamount2').text($amountofgoodstext3);  //輸出總金額
       $("#shippingcoststotal,#shippingcoststotal2").text(0); 
}else{
$footfreeshipping='本次訂單結算金額未超過'+$footfreeshippingfreeNumber+'元需收運費';	
  $amountoArr[0]=$plusshipping; 
   $amountoArr[3]=$shippingcosts;
          $('#totalamount,#totalamount2').text($amountofgoodstext4);  //輸出總金額
       	   $("#shippingcoststotal,#shippingcoststotal2").text($shippingcoststota2); 
}






//刪除輸出
/*  //總運費  */
      $("#shippingcoststota2").text($shippingcoststota2);  //實際運費 	 	  
	    $('#totalamount3').text($amountofgoodstext3);  //實際金額
	   $('#totalamount4').text($amountofgoodstext4);   //加運費金額 	   	  







//輸出說明
$("#footfreeshipping").html($footfreeshipping);

 //  alert($shippingcosts); 

  /*$amountoArr[0]=$plusshipping; 
   $amountoArr[3]=$shippingcosts;*/
   

//輸出未加運費金額
$amountoArr[1]=$amountofgoodsNumber2; 
//輸出實際運費
$amountoArr[2]=$plusshipping;




return  $amountoArr;
}

//計算



    //金額加總
    function amountofgoods($priceArr,$calculate) {
    	
    	//  alert($priceArr[0]); 
        var $amountofgoodstext = $('#totalamount4').text(); //結帳總金額+運費
        var $amountofgoodsNumber = Number($amountofgoodstext);
    
        var $amountofgoodstext2 = $('#totalamount3').text(); //結帳總金額不含運費
        var $amountofgoodsNumber2 = Number($amountofgoodstext2);
    
    
        var $priceNumber = Number($priceArr[0]);        
  
     if($calculate=='+'){
      var $amountofgoodsNumber = eval($amountofgoodsNumber + $priceNumber);
      var $amountofgoodsNumber2 = eval($amountofgoodsNumber2 + $priceNumber);
    }
    if($calculate=='-'){
          var $amountofgoodsNumber = eval($amountofgoodsNumber - $priceNumber);
          var $amountofgoodsNumber2 = eval($amountofgoodsNumber2 - $priceNumber); 
    }
        
 /*if($calculate == 'custom'){
   var $amountofgoodsNumber = eval($amountofgoodsNumber - $priceArr[2]+$priceArr[1]);
   var $amountofgoodsNumber2 = eval($amountofgoodsNumber2 - $priceArr[2]+$priceArr[1]); 
 }   */

//alert($amountofgoodsNumber2); 
$amountoArr=amountofgoodsdefault($amountofgoodsNumber,$shippingcosts=$priceArr[4],$amountofgoodsNumber2,$notcalculated=$priceArr[5]);



    $("#shippingcoststotal,#shippingcoststotal2").text($amountoArr[3]);  //總運費
           $("#shippingcoststota2").text($priceArr[4]);  //實際運費 	  
     
	       $('#totalamount3').text($amountoArr[1]);  //實際金額
	      $('#totalamount4').text($amountoArr[2]);   //加運費金額   	   
          $('#totalamount,#totalamount2').text($amountoArr[0]);  //輸出總金額
        	
        	
    }






    $(".myformeach").each(function(index) {

        var index = index + 1;
        $(function() {

            //自訂數量
        /*    $quantity = '#quantity' + index;
            $($quantity).change('input', function() {
                //計算金額
                var $calculate = 'custom';
                var $cartprice = '#cartprice' + index; //單價
                var $quantity = '#quantity' + index;
                var $cartamount = '#cartamount' + index; //商品數量
                var $cartshippingcosts = '#cartshippingcosts' + index;  //運費	
                $priceArr = totalamount(currentVal = 1, $calculate, $cartprice, $quantity, $cartamount,$cartshippingcosts);
                $totalamount = amountofgoods($priceArr,$calculate); 
            });*/

//偵測物件改變
 var container ='#cartpricedelet' + index;//被偵測的容器
 	 
  var $cartshippingcostsid="#cartshippingcosts"+index;  //商品運費單筆金額  	  	  
 /* var $cartshippingcostsvar= $($cartshippingcosts).text(); 
  var $cartshippingcostsNumber = Number($cartshippingcostsvar); */

  var $cartpriceid="#cartprice"+index;  //商品單價單筆金額  	  	  
 /* var $cartpricevar= $($cartprice).text(); 
  var $cartpricevarNumber = Number($cartpricevar); */


	
$(document)
  .on('DOMSubtreeModified', container, function (e) {
  var $cartpricedelet = '#cartpricedelet' + index;  //商品運費總計金額
 var $cartpricedeletvar = $($cartpricedelet).text();
if($cartpricedeletvar=="delete"){  

/*var $cartshippingcosts=$cartshippingcostsNumber; 
var $cartshippingcosts2=$cartpricevarNumber;  */
var $amountofgoodsNumber='';
var $shippingcosts='';
var $amountofgoodsNumber2='';
var $notcalculated='';
	 	  	

      
      amountofgoodsdefault($amountofgoodsNumber,$shippingcosts,$amountofgoodsNumber2,$notcalculated,$cartpricedeletvar,$cartshippingcostsid,$cartpriceid);

}


		

})


            $qtyplus = '.qtyplus' + index;
          //    alert($qtyplus); 
            $($qtyplus).click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('field');
                // Get its current value
                var currentVal = parseInt($('input[name=' + fieldName + ']').val());

                //計算金額+
                var $calculate = '+';
                var $cartprice = '#cartprice' + index; //單價
                var $cartamount = '#cartamount' + index;
                var $quantity = "";
                //$cartamountvar=totalamount(currentVal+1,$calculate,$cartprice,$quantityvar,$cartamount);
                var $cartamountvar = $($cartamount).attr("mane");
                var $cartshippingcosts = '#cartshippingcosts' + index;  //運費

                // If is not undefined
                if (!isNaN(currentVal) && currentVal < $cartamountvar) {
                    $priceArr = totalamount(currentVal + 1, $calculate, $cartprice, $quantity, $cartamount,$cartshippingcosts);
                    //計算金額加總
                  
                    $totalamount = amountofgoods($priceArr,$calculate);
                    // Increment
                    $('input[name=' + fieldName + ']').val(currentVal + 1);
                }
                /*else {
                     // Otherwise put a 0 there
                     $('input[name=' + fieldName + ']').val(0);
                   }*/
            });
            // This button will decrement the value till 0
            $qtyminus = '.qtyminus' + index;
           
            $($qtyminus).click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('field');
                // Get its current value
                var currentVal = parseInt($('input[name=' + fieldName + ']').val());
                //計算金額-
                var $calculate = '-';
                var $cartprice = '#cartprice' + index;
                var $cartamount = '#cartamount' + index;
                var $quantity = "";
                var $cartshippingcosts = '#cartshippingcosts' + index;  //運費
                // If it isn't undefined or its greater than 0
                if (!isNaN(currentVal) && currentVal > 0) {
                    $priceArr = totalamount(currentVal - 1, $calculate, $cartprice, $quantity, $cartamount,$cartshippingcosts);
                     //計算金額加總
                    $totalamount = amountofgoods($priceArr,$calculate);
                    // Decrement one
                    $('input[name=' + fieldName + ']').val(currentVal - 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name=' + fieldName + ']').val(0);
               
                }
            });
        });


    });
});


//扣除商品數量

function seducttheamount($calculate,currentVal,$shopwcasepageamountvar) {
        var $shopwcasepageamounttext = $('#shopwcasepageamount').text(); //結帳總金額+運費
        var $shopwcasepageamountNumber = Number($shopwcasepageamounttext);
        var $shopwcasepageamoun=$shopwcasepageamountNumber;//預設值減1


if($calculate=='+'){
$shopwcasepageamoun=eval($shopwcasepageamoun - 1); 
}	
if($calculate=='-'){
$shopwcasepageamoun=eval($shopwcasepageamoun + 1); 

}
if($calculate=='custom'){

//轉數值
var $currentValNumber = Number(currentVal);
//var $currentValNumber = Number(currentVal);
if($currentValNumber > $shopwcasepageamountvar){
$shopwcasepageamoun=$shopwcasepageamountvar; 
  currentVal= $("#quantityone").val(0); 
}else{
$shopwcasepageamoun=eval($shopwcasepageamountvar - currentVal); 
}	
	

}


//alert($shopwcasepageamoun); 	
 $("#shopwcasepageamount").text($shopwcasepageamoun);  
 
  var $amountoArrone= new Array();
$amountoArrone[0]=$shopwcasepageamoun;   
   
 return  $amountoArrone;
}
  	  
//單筆
$(function() {
	//取的商品數量

      var $shopwcasepageamountvar = $('#shopwcasepageamount').attr("mane"); //商品數量MANE值
        	
	$amountoArrone=seducttheamount();

        //自訂數量
             $("#quantityone").change('input', function() {
                //計算金額
             var $calculate = 'custom';   
             currentVal= $("#quantityone").val(); 
           	$amountoArrone=seducttheamount($calculate,currentVal,$shopwcasepageamountvar);
            });



    // This button will increment the value
    $('.qtyplusone').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If is not undefined
            var $calculate = '+';
        if (!isNaN(currentVal) && currentVal < $shopwcasepageamountvar) {
        	$amountoArrone=seducttheamount($calculate,currentVal);
            // Increment
            $('input[name=' + fieldName + ']').val(currentVal + 1);
        }/* else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }*/
    });
    	    
    // This button will decrement the value till 0
    $(".qtyminusone").click(function(e) {
    //	 alert($shopwcasepageamoun); 
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If it isn't undefined or its greater than 0
          var $calculate = '-';
      
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
       	$amountoArrone=seducttheamount($calculate,currentVal);
            $('input[name=' + fieldName + ']').val(currentVal - 1);

        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });
});