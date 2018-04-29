     $(function () {
         $('#datepicker').datepicker({
             changeYear: true, // 年下拉選單
             changeMonth: true, // 月下拉選單
             showButtonPanel: true, // 顯示介面
             showMonthAfterYear: true, // 月份顯示在年後面
             dateFormat: 'yy-mm-dd',
             showButtonPanel: true,
             monthNamesShort: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"], // 月名中文   	 
             prevText: '上月', // 上月按鈕  
             nextText: '下月', // 下月按鈕
             currentText: "本月", // 本月按鈕
             closeText: "送出", // 送初選項按鈕 				 
             onClose: function (dateText, inst) {
                 var month = $("#ui-datepicker-div .ui-datepicker-month option:selected").val(); //得到選則的月份值
     
     //增加0判斷
        var parseIntok=parseInt(month) + 1;
     
          if(parseIntok < 10){
         parseIn='0'+parseIntok;
         }else{
          parseIn=parseIntok;
         }        
                 var year = $("#ui-datepicker-div .ui-datepicker-year option:selected").val(); //得到選則的年份值
                 $('#datepicker').val(year + '-' + parseIn); //给input赋值，其中要對月值加1才是實際的月份
             }
         });
     });