
   $(document).ready(function(){
    $(window).resize(function() {
    
      // var wdth=$(window).width();
       var $screenwidth = screen.width;
       
//判斷目前解析度與$screenwidth是否相符
if($screenwidth != $zoomwidth && $zoomwidth!=''){
var $exchange='exchange';
}
       
       
         $.ajax({               url: $ajaxurl+'/ajax.php',
                            type: 'POST',
                            data: {id: '2',screenwidth:$screenwidth,exchange:$exchange},  
           /*  dataType: 'json',
            async: false,
            success: function (data) {

                if (data.result == '1') {
               location.reload();
                } 
            }      */               
                      })           
                   
   
    });
});
   




$(window).load(function() {
 //取得電腦解析度寬度
   var $browserwidth =$('body').width();      
    
//網站預設寬度值(ie適用)
  var  $webwidth='1440';  
   if($browserwidth > $webwidth){ 
  var $zoomsize=$browserwidth / $webwidth;
  var $zoomsizeiegoogle=$zoomsize * 100;   
$('html,body').animate({scrollTop:$('body').offset().top},"show");
  $("body").css({"zoom":$zoomsizeiegoogle+'%',"width":"0"});  

//判斷Google瀏覽器
var $is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;    
if($is_chrome==true){
 var  $webwidth='1423';
  var $zoomsize=$browserwidth / $webwidth;
  var $zoomsizeiegoogle=$zoomsize * 100; 
   $("body").css({"zoom":$zoomsizeiegoogle+'%',"width":"0"});   
   $("#menutbl").css("left", "0");  
   
}

//判斷ff瀏覽器
if (navigator.userAgent.indexOf('Firefox') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Firefox') + 8)) >= 3.6){
 var  $webwidth='1423';
 var $firefox='Firefox';
   var $zoomsize=$browserwidth / $webwidth; 	
    $('body').css('MozTransform',"scale("+$zoomsize+")");
    $('body').css('MozTransformOrigin',"center top");
} 



//alert($screenwidth);

     $.ajax({               url: $ajaxurl+'/ajax.php',
                            type: 'POST',
                            data: {id: '2',zoomsizeiegoogle:$zoomsizeiegoogle,zoomsize:$zoomsize},  
            
                     
                      })    
}      
});


/*
$(window).load(function() {
   $.ajax({               url: $ajaxurl+'/ajax.php',
                            type: 'POST',
                            data: {id: '2'},   
            dataType: 'json',
            async: false,
            success: function (data) {

                if (data.result == '1') {
                 alert(123);
                } 
            }
            
                     
                      })    	
	
	
	});*/