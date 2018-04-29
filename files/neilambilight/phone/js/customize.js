// JavaScript Document
//佈景外框高度
//目前編號slidein1






//開關區塊

//目前按鈕使用ID：slowdivbotton5
//目前區塊使用ID：slowdiv5
$(document).ready(function(){
   $(".eachclass").each(function(index) { 
   	   	$("#slowdivbotton"+index+"").css("cursor", "pointer");      
  $("#slowdivbotton"+index+"").click(function() {
  	    $(".slowdiv"+index+"").toggle("slow");
               return false;
           });   
   });    
});





/*
 $(window).load(function() {
    $(".eachclass").each(function(index) { 	 
      	$("#slowdivbotton"+index+"").css("cursor", "pointer");      	
        });
        
         });   */
        


//內容頁面移動到ID位置
$(window).load(function() {
if($contentstrue){
$('html,body').animate({scrollTop:$('#xo-content,#sponsorshiplist').offset().top},0);
return false;}
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
  $('a[name="neodw"],#close').click(function(){
  	$('html,body').animate({scrollTop:$('#neodwboxanchored').offset().top},900); 
 	    $("#neodwbox").toggle("slow");
  });
  
 	$("#goTop").click(function(){
		$("html,body").animate({scrollTop:0},900);
		});
 
  
});

