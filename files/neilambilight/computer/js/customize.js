// JavaScript Document
//佈景外框高度
//目前編號slidein1

//CSS調整
/*$(document).ready(function(){
	$(".caption div").css("font-size", "50%");   
}
*/
//圖片外框設定
$(document).ready(function(){
 $bodyhight=$(document).height();    
$("#leftframe").height($bodyhight);        
$("#righttframe").height($bodyhight);  
 $bottompage=$("#bottompage").height();    
 $("#bdtiv03").height($bottompage-1); 
 $("#bdtiv06").height($bottompage-1); 
 
});

$(document).scroll(function() {
 $bodyhight=$(document).height();    
$("#leftframe").height($bodyhight);        
$("#righttframe").height($bodyhight);   


 $bottompage=$("#bottompage").height();    
 $("#bdtiv03").height($bottompage-1); 
  $("#bdtiv06").height($bottompage-1);     
  
  
});


//標語區塊
$(document).ready(function(){
      $("#logobottom").mouseover(function(){
   $("#logotext").css({"animation-name":"slidein","opacity":"0.9","display":"block"});
  });
 $("#logobottom").mouseout(function(){
	$("#logotext").css("display", "none");
  });
      
});


//開關區塊

//目前按鈕使用ID：slowdivbotton3
//目前區塊使用ID：slowdiv3
$(document).ready(function(){
   $(".eachclass").each(function(index) { 
   	         	$("#slowdivbotton"+index+"").css("cursor", "pointer");      
  $("#slowdivbotton"+index+"").click(function() {
  	    $(".slowdiv"+index+"").toggle("slow");
               return false;
           });   
   });    
});





        
//指定按鈕對齊左邊距
/*$(window).load(function() {
	var position = $('#toplayerdiv').offset(); 
	var x = position.left; 
	$("#menutbl").css("left", x+"px");   

});*/






//內容頁面由標題開始讀取
$(window).load(function() {

if($contentstrue){
$(window).mousewheel(function(e) {
   if(e.deltaY==1){
   	$("#header").css({"visibility":"visible","height":"573px"});
   	$("#menutbl").css({"visibility":"visible","height":"87px"});
      	$(".box1 #frametopl,.box1 #frametopr").css({"visibility":"visible","height":"580px"});	
   		$("#topbox").hide();   	


   }
});
  $('#topbox').click(function(){
   	$("#header").css({"visibility":"visible","height":"573px"});
   	$("#menutbl").css({"visibility":"visible","height":"87px"});
      	$(".box1 #frametopl,.box1 #frametopr").css({"visibility":"visible","height":"580px"});	
    	$("#topbox").hide();   	
    	//	$(".box1 #marqueetop").css("visibility", "visible");  


    	
  });	
}





 });


//滑動按鈕特效
$(window).scroll(function() {
		var position = $('#toplayerdiv').offset(); 
	var x = position.left; 
	$("#menutbl").css("left", x+"px");   
	$bodyzoom=$('body').css("zoom");
	$bodytransform=$('body').css("-moz-transform");
    
 //alert($bodytransform);
	
var $scrollTopa = $(this).scrollTop(); 
	
if(($scrollTopa)>'230'){ 
	
 if(navigator.userAgent.indexOf('Firefox') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Firefox') + 8)) >= 3.6 && ($bodytransform)!='none'){
  $("#menutbl").css({"animation-name":"","position":"absolute","margin-top":"163px","left":"0px","zoom":"100%"});
}else{
 $("#menutbl").css({"animation-name":"slidein1","position":"fixed","margin-top":"-5px","zoom":$bodyzoom});
}
}else{
 $("#menutbl").css({"animation-name":"","position":"absolute","margin-top":"163px","left":"0px","zoom":"100%"});
}

});




$(document).ready(function() 			{			

$('.di01').html("<a name='neodw' title="+$di01+">"+$di01+"</a>");
$('.di02').html("<a target='_blank' href='https://creativecommons.org/licenses/by-sa/3.0/tw/legalcode' title="+$di02+">"+$di02+"</a>");

if($(".di01").length==0){
	$("#toplayerdiv").css("display", "none");   
}else if($(".di02").length==0){
	$("#toplayerdiv").css("display", "none");   
}
			
			});



$(document).ready(function(){
   	$('a[name="neodw"],#close').css("cursor", "pointer");    
   		
  $('a[name="neodw"]').click(function(){
  	$('html,body').animate({scrollTop:$('#neodwbox').offset().top},900); 
   $("#neodwboxcentents").css({"animation-name":"slidein","opacity":"0.9","display":"block"});
  });
   $('#close').click(function(){
	$("#neodwboxcentents").css("display", "none");   
  }); 
  
      $('a[name="neodw"]').mouseover(function(){
   $("#neodwtext").css({"animation-name":"slidein","opacity":"0.9","display":"block"});
  });
 $('a[name="neodw"]').mouseout(function(){
  	$("#neodwtext").css("display", "none");   
  });
  
 	$("#goTop").click(function(){
		$("html,body").animate({scrollTop:0},900);
		});
 
  
});




//下拉選單
function MM_jumpMenu(targ,selObj,restore){ //v3.0
eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
if (restore) selObj.selectedIndex=0;
}
