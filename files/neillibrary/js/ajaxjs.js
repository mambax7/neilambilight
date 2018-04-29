
if(level==1){
//ajax選單1
var  $selectid= $(this).find(':selected').data('id');   	 
var  $defaultid= $("#default").attr("mane");
var  $selectboxname= $("#selectboxname1").attr("mane");
var  $selectboxname_arr = $selectboxname.split(',');  //切割陣列
var  $selectidedit=$selectboxname_arr[0];
var  $status=$selectboxname_arr[1];	



if($defaultid!='1' &&  $selectboxname_arr[0]!=''){
ajaxcode($selectid,$status,$exchange,$selectidedit);	 
}
var  $exchange=true;


$("#default").change(function () { 
	var  $selectid= 1;
	
  ajaxcode($selectid,$status,$exchange);
});


 
//alert($selectid);
  function ajaxcode($selectid,$status,$exchange,$selectidedit) {
	 $.ajax({
    url: xoopsjsurl + '/modules/neillibrary/ajax.php',
    type: 'POST', 
    data: { id: '6',dbid: $selectid,selectid: 'default2',status: $status,exchange: $exchange,selectidedit: $selectidedit},
cache:false, 
ifModified :true,
async:false, 
        success: function(response) {
      $('#selectbox1').html(response); 
    
    }, 
    error: function() {
      console.log('ajax error!'); 
    }
 })
    
}


	  
$("#default1").change(function () { 
	 $selectid= $(this).find(':selected').data('id');

var  $selectboxname= $("#selectboxname1").attr("mane");
var  $selectboxname_arr = $selectboxname.split(',');  //切割陣列	
var  $status=$selectboxname_arr[1];	
var  $exchange=true;


  ajaxcode($selectid,$status,$exchange);
	});
}



if(level==2){
//ajax選單2
var  $selectid= $(this).find(':selected').data('id');   	 
var  $defaultid= $("#default").attr("mane");
var  $selectboxname2= $("#selectboxname2").attr("mane");
var  $selectboxname2_arr = $selectboxname2.split(',');  //切割陣列
var  $selectidedit2=$selectboxname2_arr[0];
var  $status=$selectboxname2_arr[1];	



if($defaultid!='1' &&  $selectboxname2_arr[0]!=''){
ajaxcode2($selectid,$status,$exchange2,$selectidedit2);	 
}
var  $exchange2=true;


$("#default").change(function () { 
	var  $selectid= 1;
  ajaxcode2($selectid,$status,$exchange2);
});


 
//alert($selectid);
  function ajaxcode2($selectid,$status,$exchange,$selectidedit) {
  	  
	 $.ajax({
    url: xoopsjsurl + '/modules/neillibrary/ajax.php',
    type: 'POST', 
    data: { id: '7',dbid: $selectid,selectid: 'default3',status: $status,exchange: $exchange,selectidedit: $selectidedit},
 cache:false, 
ifModified :true,
async:false,    	
        success: function(response) {
      $('#selectbox2').html(response); 
    
    }, 
    error: function() {
      console.log('ajax error!'); 
    }
 })
    
}


	  
$("#default2").change(function () { 
	 $selectid= $(this).find(':selected').data('id');

var  $selectboxname2= $("#selectboxname2").attr("mane");
var  $selectboxname2_arr = $selectboxname2.split(',');  //切割陣列	
var  $status=$selectboxname2_arr[1];	
var  $exchange2=true;


  ajaxcode2($selectid,$status,$exchange2);
	});

}


//商品選擇按鈕
/*$(document).ready(function(){	
    $(".button,.explanation").hide();   
$('.leftbox select').change(function () { 
    $(".button,.explanation").show();
	});   
    	
	});*/