
//顯示全部分類內容
 $(document).ready(function(){
 $("body").on("change", ".displayall", function (){
if($('#checkbox').val()==true){
   $("#modulesort").attr('disabled', true);    
  $('#checkbox').val(false); 
}else{
   $("#modulesort").attr('disabled', false);  
    $('#checkbox').val(1);    
}   }) 

});


$(document).ready(function () {
    $('#range2').click(function () {
        $(".citynamelist").show(); 
    });
        $('#range1').click(function () {
        $(".citynamelist").hide();
    });
});





$(document).ready(function () {
    $('#sortimg').click(function () {
        if ($('#sortimg').val() == 0) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>");
        }
        if ($('#sortimg').val() == 1) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-align-justify' aria-hidden='true'></span>");
        }

        if ($('#sortimg').val() == 2) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>");
        }

        if ($('#sortimg').val() == 3) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span>");
        }

        if ($('#sortimg').val() == 4) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-hand-right' aria-hidden='true'></span>");
        }
        if ($('#sortimg').val() == 5) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-heart-empty' aria-hidden='true'></span>");
        }

        if ($('#sortimg').val() == 6) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>");
        }
        if ($('#sortimg').val() == 7) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-option-vertical' aria-hidden='true'></span>");
        }
          if ($('#sortimg').val() == 8) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-asterisk' aria-hidden='true'></span>");
        }
                if ($('#sortimg').val() == 9) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-plus' aria-hidden='true'></span>");
        }
  if ($('#sortimg').val() == 10) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>");
        }
    if ($('#sortimg').val() == 11) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-cog' aria-hidden='true'></span>");
        }   
        if ($('#sortimg').val() == 12) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-indent-left' aria-hidden='true'></span>");
        }  
           if ($('#sortimg').val() == 13) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>");
        }   
              if ($('#sortimg').val() == 14) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-play' aria-hidden='true'></span>");
        }    
                      if ($('#sortimg').val() == 15) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>");
        }      
            if ($('#sortimg').val() == 16) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-paperclip' aria-hidden='true'></span>");
        }    
               if ($('#sortimg').val() == 17) {
            $('#sortimgicon').html("<span class='glyphicon glyphicon-grain' aria-hidden='true'></span>");
        }                        
    });
});



$(document).ready(function () {

    $("#inlineRadio2").click(function () {
        $("#imgstylebox").show();
        $("#sortimgiconbox").hide();
    });


    $("#inlineRadio1").click(function () {
        $("#sortimgiconbox").show();
        $("#imgstylebox").hide();
    });



    $("#radiogstylebox02").click(function () {




        $("#modulesid,#sortyn,#variableid").hide();

    });


    $("#radiogstylebox01").click(function () {


        $("#modulesid").show();
    });



$modulesid = $('#modulesidselect').val();
$sortyn = $('#sortynselect').val();
$modulesFunction = function(){
    //預設值  

        if ($modulesid != 'tad_faq' && $modulesid != 'tad_idioms' && $modulesid != 'tad_lunch2' && $modulesid != 'tad_rss' && $modulesid != 'tad_tv' && $modulesid != 'tad_sitemap' && $modulesid != 'tad_cal' && $modulesid != 'tad_uploader' && $modulesid != 'tad_web' && $modulesid != 'tad_assignment' && $modulesid != 'neilcounselingrecord') {
            $('#sn').attr('disabled', false); //單頁
        } else {
            $('#sn').attr('disabled', true); //單頁
        }

        if ($modulesid != 'tad_form' && $modulesid != 'tad_honor' && $modulesid != 'tad_idioms' && $modulesid != 'tad_rss' && $modulesid != 'tinyd0' && $modulesid != 'tad_timeline' && $modulesid != 'tad_sitemap' && $modulesid != 'tad_meeting' && $modulesid != 'tad_web' && $modulesid != 'tad_evaluation' && $modulesid != 'tinyd1' && $modulesid != 'tinyd2' && $modulesid != 'neilcounselingrecord') {
            $('#sy').attr('disabled', false); //分類
        } else {
            $('#sy').attr('disabled', true); //分類
        }

}


$modulesswitch = function(){
        switch ($modulesid) {
        case 'tad_repair':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"unit_menu_id="例如：unit_menu_id=1')
            }
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"repair_sn="例如：repair_sn=1')
            }
            break;
        case 'tad_faq':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"fcsn="例如：fcsn=1')
            }
            break;
        case 'tad_form':
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"ofsn="例如：ofsn=1')
            }
            break;
        case 'tad_honor':
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"honor_sn="例如：honor_sn=1')
            }
            break;
	  case 'tad_lunch2':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"lunch_target="例如：lunch_target=測試')
            }
            break;	
	  case 'tad_tv':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"player="例如：player=sewise')
            }
            break;	
	  case 'tinyd0':
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"id="例如：id=1')
            }
            break;		
  	  case 'tinyd1':
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"id="例如：id=1')
            }
            break;	
   	  case 'tinyd2':
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"id="例如：id=1')
            }
            break;	
        case 'neilvideosvote':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"cat_id="例如：cat_id=1')
            }
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"item_id="例如：item_id=1')
            }
            break;	
	  case 'tad_timeline':
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"timeline_sn="例如：timeline_sn=1')
            }
            break;	
	        case 'tadnews':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"ncsn="例如：ncsn=1，可輸入的變數$ncsn,$tag_sn')
            }
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"nsn="例如：nsn=1')
            }
            break;	
			
	        case 'tadgallery':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"csn="例如：csn=1')
            }
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"sn="例如：sn=1')
            }
            break;	
	  case 'tad_cal':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"cate_sn="例如：cate_sn=1')
            }
            break;	
	  case 'tad_uploader':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"of_cat_sn="例如：of_cat_sn=1')
            }
            break;		
	        case 'tad_link':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"cate_sn="例如：cate_sn=1')
            }
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"link_sn="例如：link_sn=1')
            }
            break;	
		        case 'tad_player':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"pcsn="例如：pcsn=1')
            }
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"psn="例如：psn=1')
            }
            break;
		        case 'tad_book3':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址&後面的變數值"tbsn="例如：tbsn=1')
            }
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"tbdsn="例如：tbdsn=1')
            }
            break;		
		
	  case 'tad_meeting':
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"tad_meeting_sn="例如：tad_meeting_sn=1')
            }
            break;	
		        case 'tad_discuss':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"BoardID="例如：BoardID=1')
            }
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"DiscussID="例如：DiscussID=1')
            }
            break;			
	  case 'tad_evaluation':
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"evaluation_sn="例如：evaluation_sn=1')
            }
            break;		
		
			  case 'tad_assignment':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"assn="例如：assn=1')
            }
            break;	
		     case 'neilhonorlist':
            if ($sortyn == 'y') { //分類
                $('#vid').text('輸入網址?後面的變數值"honor_id="例如：honor_id=1')
            }
            if ($sortyn == 'n') { //單頁
                $('#vid').text('輸入網址?後面的變數值"hc_id="例如：hc_id=1')
            }
            break;																															
        default:
            $('#vid').text('')
        }


}
//預設值輸出
$modulesFunction();
$modulesswitch();
	
    $("#modulesidselect").click(function () {
        $modulesid = $('#modulesidselect').val();

        // alert($modulesid);

        if ($modulesid != 0) {
            $("#sortyn").show();
        }
        if ($modulesid == 0) {
            $("#sortyn").hide();
        }

$modulesFunction();

        $('#vid').text('')

        $('#sortynselect').val(0);
    });


    $sortyn = $('#sortynselect').val();
    if ($sortyn == 'z') {
        $("#variableid").hide();
    }




    $("#sortynselect").click(function () {

        $sortyn = $('#sortynselect').val();
        $modulesid = $('#modulesidselect').val();


		
        if ($sortyn != 0 || $sortyn != 'z') {
            $("#variableid").show();

        }
        if ($sortyn == 0 || $sortyn == 'z') {
            $("#variableid").hide();
        }



$modulesswitch();


    });


}); // JavaScript Document





/*
$(document).ready(function() {
  $(".deleteeach").each(function(index) { //刪除關鍵字
  	  var index=index+1;	
        $("#deletebotton" + index + "").click(function() {
            $ajaxsetup = $("#deletebotton" + index + "").attr("mane");
            var  $ajaxsetup_arr = $ajaxsetup.split(',');  //切割陣列
            var $id=$ajaxsetup_arr[0];  //ajax-ID
            var $dbid=$ajaxsetup_arr[1];  //db刪除欄位參數
            var $title=$ajaxsetup_arr[2]+$ajaxsetup_arr[3];  //刪除標題+說名文字  	
    	
       
            swal({
                    title: "您確定要刪除"+$title+"",                  
                    text: "這將會刪除這筆資料內容",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonText: "是的，我要刪除",
                    cancelButtonText: "取消刪除！",
                    confirmButtonColor: "#ec6c62"
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: xoopsjsurl + '/modules/neillibrary/ajax.php',
                            type: 'POST',
                            data: {
                                id: $id,
                                dbid: $dbid                             
                            },
                        }).done(function(data) {
                            swal("操作成功!", "已成功刪除資料！", "success");
                           getMyArtic();
                        }).error(function(data) {
                            swal("OMG", "刪除操作失敗了！", "error");
                        });
                    } else {
                        swal("取消！", "你的資料是安全的:)",
                            "error");
                    }

                    function getMyArtic() {

                        $(this).click(function() {
                            //	 location.reload()
                            $t = $("#deletetr" + index + "");
                            $t.remove();
                        
                        });
                    }
                });
        });
    });

});*/



