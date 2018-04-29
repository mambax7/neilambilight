 $(document).ready(function(){
 
//必填欄位-姓名
 $("body").on("change", "#name_user", function (){
if($("#name_user").val()){
   $("#helpBlockname_user").hide();
   $("#helpBlockname_user").text(true);
   
}else{
  $("#helpBlockname_user").show();  
  $("#helpBlockname_user").text("必填欄位"); 
}

contactus();
		   })
    
//必填欄位-E-MAIL
$("body").on("change", "#email_user", function (){
$Emailchecking=IsEmail($("#email_user").val());

if($Emailchecking==false){
swal("請填寫正確的E-MAIL格式");
$("#email_user").blur(); //離開焦點	
  $("#helpBlockemail_user").show();
    $("#helpBlockemail_user").text("必填欄位"); 	
}else{
    $("#helpBlockemail_user").hide();
       $("#helpBlockemail_user").text(true);
} 


contactus();
			   })
			   	   
//必填欄位-手機
  $("body").on("change", "#tel_user", function (){
$Ephonechecking=Isphone($("#tel_user").val());
if($Ephonechecking==false){
swal("請填寫正確的手機格式");
$("#tel_user").blur(); //離開焦點
  $("#helpBlocktel_user").show();
    $("#helpBlocktel_user").text("必填欄位"); 	
}else{
    $("#helpBlocktel_user").hide();
       $("#helpBlocktel_user").text(true);
}
contactus();		
			    })			   	   
			   	   
			   	   
//必填欄位-說明事項
 $("body").on("change", "#texe_user", function (){
if($("#texe_user").val()){
   $("#helpBlocktexe_user").hide();
   $("#helpBlocktexe_user").text(true);
   
}else{
  $("#helpBlocktexe_user").show();  
$("#helpBlocktexe_user").text("必填欄位"); 
}	
contactus();
   })		   	  
   	    
 //我不是機器人
 $("body").on("change", ".checkboxinput", function (){

   $(".checkboxmycheck").hide();
   $(".checkboxmycheck").text(true);
   
contactus();
   }) 
 
 
function  contactus(){
var $helpBlocknameuser=$("#helpBlockname_user").text();
var $helpBlockemailuser=$("#helpBlockemail_user").text();
var $helpBlockteluser=$("#helpBlocktel_user").text();
var $helpBlocktexeuser=$("#helpBlocktexe_user").text();
var $checkbox=$(".checkboxmycheck").text();

   

if($helpBlocknameuser=='true' && $helpBlockemailuser=='true' && $helpBlockteluser=='true' && $helpBlocktexeuser=='true' && $checkbox=='true'){
$contactusresult=true;
}else{
$contactusresult=false;
}
 //alert($checkbox);

 
if($contactusresult==true){	
   $(".buttond").attr('disabled', false);   
   $(".verification").attr('disabled', false);      
   $("#help-blocktext").hide();
}else{
   $(".buttond").attr('disabled', true);  
   $(".verification").attr('disabled', true);     
     $("#help-blocktext").show();
}

//防重複提交表單
  $("body").on("click", ".buttond", function (){
   $(".buttond").hide();
  }) 




}
 
    
 
 //E-MAIL格式檢查
    	function IsEmail(email) {    	
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
            return false;
        }else{
            return true;
        }
    }
	
//手機格式檢查
    	function Isphone(phone) {    	
        var regex = /^[0-9]+$/;
        if(!regex.test(phone)) {
            return false;
        }else{
            return true;
        }
    }	
    
    
    });