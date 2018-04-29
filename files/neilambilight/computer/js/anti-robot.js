
/*==========註冊頁面防機器人設置==============*/
/*================產生亂數==================*/
var chars = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

function generateMixed(n) {
     var res = "";
     for(var i = 0; i < n ; i ++) {
         var id = Math.ceil(Math.random()*35);
         res += chars[id];
     }
     return res;
} 
var $randomvalue=generateMixed(10);	
		
	$(window).load(function() {
		
  $('#profile-form-regform .odd .formButton').attr('disabled', true);
  $('#regform  #step').attr('disabled', true);
   $("#profile-form-regform .odd .formButton").before("<input type='checkbox'  id='notarobot' /><label>"+$notarobot+"</label><br /><br />");
      $("#profile-form-regform .odd .formButton").after("<input class='verification' type='hidden' disabled='disabled' name='verification' value='"+$randomvalue+"'>");

   
 
 	$("#notarobot").click(function(){
   $('#notarobot').attr('disabled', true);		
	$('#regform  #step').attr('disabled', false);
	$('.verification').attr('disabled', false);	
	$('#profile-form-regform .odd .formButton').attr('disabled', false); 
       
                        $.ajax({
                            url: $ajaxurl+'/ajax.php',
                            type: 'POST',
                            data: {id: '1',random: $randomvalue},   
                     
                      })
                  



		});  

 });