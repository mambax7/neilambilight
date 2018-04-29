//列印功能
function printHtml(html) {
var bodyHtml = document.body.innerHTML;
document.body.innerHTML = html;
window.print();
document.body.innerHTML = bodyHtml;
window.location.reload();
}
function onprint() {

//去除超連結
$('a').each(function(index) {
    $(this).replaceWith($(this).html());
});	
//隱藏列印區塊
$('#orderstatusbox').hide();

var html = $("#printArea").html();
printHtml(html);
}







//js日曆
$(document).ready(function() {
  $(".mydate").each(function(index) {	
 var index=index+1;	
 var  $mydate='#mydate'+index; 	 
 
$($mydate).datetimepicker({
"dateFormat": "yy-mm-dd",
"timeFormat": "HH:mm:ss"
});
});
    });

//CK編輯器
$(document).ready(function() {
  $(".editor").each(function(index) {
var index=index+1;	
var  editorvar='editorvar'+index;
CKEDITOR.replace(editorvar , {
skin : 'moono' ,
width : '100%' ,
height : '300' ,
language : 'zh-TW' ,
toolbar : 'my' ,
contentsCss : [xoopsjsurl+'/modules/tadtools/bootstrap3/css/bootstrap.css',xoopsjsurl+'/modules/tadtools/css/font-awesome/css/font-awesome.css'],
extraPlugins: 'syntaxhighlight,dialog,oembed,eqneditor,quicktable,imagerotate,fakeobjects,widget,lineutils,widgetbootstrap,widgettemplatemenu,pagebreak,fontawesome,prism,codesnippet,codemirror',

filebrowserBrowseUrl : xoopsjsurl+'/modules/tadtools/elFinder/elfinder.php?type=file&mod_dir='+moduleid,
filebrowserImageBrowseUrl : xoopsjsurl+'/modules/tadtools/elFinder/elfinder.php?type=image&mod_dir='+moduleid,
filebrowserFlashBrowseUrl : xoopsjsurl+'/modules/tadtools/elFinder/elfinder.php?type=flash&mod_dir='+moduleid,
filebrowserUploadUrl : xoopsjsurl+'/modules/tadtools/upload.php?type=file&mod_dir='+moduleid,
filebrowserImageUploadUrl : xoopsjsurl+'/modules/tadtools/upload.php?type=image&mod_dir='+moduleid,
filebrowserFlashUploadUrl : xoopsjsurl+'/modules/tadtools/upload.php?type=flash&mod_dir='+moduleid,
qtRows: 10, // Count of rows
qtColumns: 10, // Count of columns
qtBorder: '1', // Border of inserted table
qtWidth: '100%', // Width of inserted table
qtStyle: { 'border-collapse' : 'collapse' },
qtClass: 'table table-bordered table-hover table-condensed', // Class of table
qtCellPadding: '0', // Cell padding table
qtCellSpacing: '0', // Cell spacing table
qtPreviewBorder: '1px double black', // preview table border
qtPreviewSize: '15px', // Preview table cell size
qtPreviewBackground: '#c8def4' // preview table background (hover)
} );
CKEDITOR.dtd.$removeEmpty['span'] = false;
});
    });





//迴圈刪除
$(document).ready(function() {
  $(".deleteeach").each(function(index) { //刪除關鍵字
  	  var index=index+1;	
        $("#deletebotton" + index + "").click(function() {
            $ajaxsetup = $("#deletebotton" + index + "").attr("mane");
            var  $ajaxsetup_arr = $ajaxsetup.split(',');  //切割陣列
            var $id=$ajaxsetup_arr[0];  //ajax-ID
            var $dbid=$ajaxsetup_arr[1];  //db刪除欄位參數
            var $title=$ajaxsetup_arr[2]+$ajaxsetup_arr[3];  //刪除標題+說名文字  	
            var $uid=$ajaxsetup_arr[4];  //uid  	
       
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
                                dbid: $dbid, 
                                uid: $uid 	                            
                            },
                        }).done(function(data) {
                        if(data){
                           swal(data, "success");
                }else{
                         swal("操作成功!", "已成功刪除資料！", "success");
                }
                   
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
                            $t2 = $("#deletetr2" + index + "");
                            $t2.remove();
                        
                        });
                    }
                });
        });
    });

});


//單頁刪除
$(document).ready(function() {  	
        $("#deletebotton").click(function() {
        	
        	   
            $ajaxsetup = $("#deletebotton").attr("mane");
            var  $ajaxsetup_arr = $ajaxsetup.split(',');  //切割陣列
            var $id=$ajaxsetup_arr[0];  //ajax-ID
            var $dbid=$ajaxsetup_arr[1];  //db刪除欄位參數
            var $title=$ajaxsetup_arr[2]+$ajaxsetup_arr[3];  //刪除標題+說名文  
            var $url=$ajaxsetup_arr[4];   	//刪除後返回網址
       
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
    window.location.href = xoopsjsurl +$url;
                        
                        });
                    }
                });
        });
    });



