<?php
include "../../../include/cp_header.php";
include "../function.php";
include "../class/function.php";
include "../class/themeset.php";
include "../class/selectdb.php";
include "imguploader.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";

$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$bid=(empty($_REQUEST['bid']))?"":$_REQUEST['bid'];
$sid=(empty($_REQUEST['sortid']))?"":$_REQUEST['sortid'];
$orderid=(empty($_REQUEST['orderid']))?"":$_REQUEST['orderid'];
$radiogstyle=(empty($_REQUEST['radiogstyle']))?"":$_REQUEST['radiogstyle'];




switch ($op) {
case "insert":
insert_blocksort();
redirect_header(XOOPS_URL. '/modules/neothemesadmin/admin/blockmenu.php?sortid='.$_POST['sortid'], 0, _MA_NEODWADMIN_ADDDATA);    //資料已新增
break;
case "update":
update_blocksort();
redirect_header(XOOPS_URL. '/modules/neothemesadmin/admin/blockmenu.php?sortid='.$_POST['sortid'], 0, _MA_NEODWADMIN_UPDATE);   //資料已更新
break;
default:
$main=blockbitton($bid, $sid, $orderid, $radiogstyle);
}














function blockbitton($bid, $sid, $orderid, $radiogstyle)
{
    $xoopsurl=XOOPS_URL;
    global $xoopsDB;


      
      
      


    if (!empty($bid)) {
        $buttonimg=(empty($_REQUEST['buttonimg']))?"":$_REQUEST['buttonimg'];
    
        $sql = "select * from " . $xoopsDB->prefix('neoblockmenubutton')   . " where `bid` = '$bid'";
        $result = $xoopsDB -> query($sql) or die($sql);
        list($bid, $sortid, $buttontitle, $buttonurl, $target, $sortyn, $modulesid, $variableid, $orderid) = $xoopsDB -> fetchRow($result);
        $opvalue="update";
        $h4title="編輯區塊按鈕";
        $hiddenbuttonimg="<input type='hidden' name='buttonimg' id='buttonimg' value='{$buttonimg}' />";

        if ($target==0) {
            $targeta="selected='selected'";
        }
        if ($target==1) {
            $targetb="selected='selected'";
        }



        if ($sortyn==n) {
            $sortyna="selected='selected'";
        }
        if ($sortyn==y) {
            $sortynb="selected='selected'";
        }

        if ($sortyn==z) {
            $sortync="selected='selected'";
        }


        if (empty($sortyn) and empty($modulesid) and empty($variableid)) {
            $radiogstylenone="display:none;";
            $radiogstylebox2="checked=checked'";
        } else {
            $radiogstylebox1="checked=checked'";
        }
    



        $sql = "select sortid,sorttitle,radiogstyle from " . $xoopsDB->prefix('neoblockmenusort') ;
        $result = $xoopsDB -> query($sql) or die($sql);
        while (list($sortida, $sorttitle, $radiogstylea) = $xoopsDB -> fetchRow($result)) {
            if ($sid==$sortida) {
                $selected="selected='selected'";
            }

            $optioncenter.="<option value='{$sortida}' {$selected}>{$sorttitle}</option>";

            unset($selected);
        }
    } else {
        $opvalue="insert";
        $h4title="新增區塊按鈕";
        $radiogstylenone="display:none;";
        $sortid=(empty($_REQUEST['sortid']))?"":$_REQUEST['sortid'];
        $hiddensortid="<input type='hidden' name='sortid' id='sortid' value='{$sortid}' />";



        $newbasejs="<script type=text/javascript src='{$xoopsurl}/modules/neillibrary/js/menujs/newbase.js'></script>";

        $optioncenter.="<option  value=''>選擇按鈕分類</option>";
        $sql = "select sortid,sorttitle,radiogstyle from " . $xoopsDB->prefix('neoblockmenusort') ;
        $result = $xoopsDB -> query($sql) or die($sql);
        while (list($sortida, $sorttitle, $radiogstylea) = $xoopsDB -> fetchRow($result)) {
            if ($sid==$sortida) {
                $selected="selected='selected'";
            }

            $optioncenter.="<option {$selected}  value='blockmenubuttonform.php?sortid=$sortida&radiogstyle=$radiogstylea'>{$sorttitle}</option>";

            unset($selected);
        }
    }

    if ($radiogstyle==img) {
        //先建構class($themesetclass)
        $themesetclass   = new  themesetclass;
        $topvsplit =$themesetclass-> themespublicb($variableok, $setting);
        list($variableoka, $settinga) = $topvsplit;
        $variablesplit=preg_split('/;/', $variableoka);

      
        $buttonimgwh=$variablesplit[11];          //說明文字："圖檔大小：
    
    
        $radiogstylebox="
<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>選擇圖檔<br />{$buttonimgwh}</span>
	<span class='caption-marker'>*</span>
	</div></td><td class='even'>
<input type='file' name='upfile[]' id='upfile'></td></tr>
";
    }
    $img_date = date("H:i:s");
    $xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];

    if (!empty($buttonimg) and $radiogstyle==img) {
        $buttonimgbox="
<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>顯示上團圖檔</span>
	<span class='caption-marker'>*</span>
	</div></td><td class='even'>
<div style='width: 400px' ><img  style='width: 400px''  src='".XOOPS_URL."/uploads/$xoops_theme/{$buttonimg}.png?state={$img_date}' ></div><br /></td></tr>
";
    }

    if ($radiogstyle==text) {
        $buttonradiogstylebox="
<tr  id='radiogstylebox' valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>按鈕型態</span>
	<span class='caption-marker'>*</span>
	</div></td><td class='even'>

 <label class='radio-inline'>
  <input type='radio'  id='radiogstylebox01' {$radiogstylebox1}  name='radiogstylebox'  > 站內連結
</label>
<label class='radio-inline'>
  <input type='radio'  id='radiogstylebox02'  {$radiogstylebox2} name='radiogstylebox'  >站外連結
</label>
  </td></tr>
";
    }






    //搜尋模組ID
    $sql = "select mid,name,dirname  from " . $xoopsDB->prefix('modules')   . " where `dirname` = 'tinyd0' or `dirname` = 'tad_lunch2' or `dirname` = 'fileup'  or `dirname` = 'tad_web'  or `dirname` = 'tad_uploader'  or `dirname` = 'tad_link' or `dirname` = 'tadgallery' or `dirname` = 'tad_evaluation' or `dirname` = 'tadnews6' or `dirname` = 'neilvideosvote'  or `dirname` = 'tinyd1'  or `dirname` = 'tinyd2' or  `dirname` = 'tad_faq' or  `dirname` = 'tad_form' or  `dirname` = 'tad_honor'  or  `dirname` = 'tad_idioms' or  `dirname` = 'tad_rss' or  `dirname` = 'tad_tv' or  `dirname` = 'tad_timeline' or `dirname` = 'tadnews' or `dirname` = 'tad_sitemap' or `dirname` = 'tad_cal' or `dirname` = 'tad_player' or `dirname` = 'tad_repair' or `dirname` = 'tad_book3' or `dirname` = 'tad_meeting' or `dirname` = 'tad_discuss' or `dirname` = 'tad_assignment' or `dirname` = 'neilhonorlist' or `dirname` = 'neilcounselingrecord'";
    $result = $xoopsDB -> query($sql) or die($sql);
    while (list($mid, $name, $dirname) = $xoopsDB -> fetchRow($result)) {
        if ($modulesid==$dirname) {
            $selected="selected='selected'";
        }

        $optionmodules.="<option {$selected}  value='{$dirname}'>{$name}->{$dirname}</option>";

        unset($selected);
    }



    
    
    $form="<form name='form' id='form' method='post'  action='{$_SERVER['PHP_SELF']}' onsubmit='return xoopsFormValidate_form();' enctype='multipart/form-data'>
<table width='100%' class='outer' cellspacing='1'>
<tr><th colspan='2'><h4>{$h4title}</h4></th></tr>       



		
<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>選擇按鈕分類</span>
	<span class='caption-marker'>*</span></div></td>
	<td class='even'>
 <script type=text/javascript src='{$xoopsurl}/modules/neillibrary/js/menujs/jquery-1.4.1.min.js'></script>	
	<span class=footer-select>
  <select id=FriendLink class=footer_sel  name='sortid' >

 
   {$optioncenter}
  </select>											
	</select></td></tr>	




<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>按鈕名稱</span>
	<span class='caption-marker'>*</span>
	</div></td><td class='even'>
	<input type='text' name='buttontitle' title='按鈕名稱' id='buttontitle' size='60' maxlength='255' value='{$buttontitle}' /></td></tr>	


<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>按鈕連結</span>
	<span class='caption-marker'>*</span>
	</div></td><td class='even'>
	<input type='text' name='buttonurl' title='按鈕連結' id='buttonurl' size='60' maxlength='255' value='{$buttonurl}' /></td></tr>	
	
{$radiogstylebox}	{$buttonimgbox}
	
<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>按鈕開啟方式</span>
	<span class='caption-marker'>*</span></div></td>
	<td class='even'>
	<select size='2'  name='target' id='target' title='按鈕開啟方式' >
	<option value='0' {$targeta}>self</option>
	<option value='1' {$targetb}>blank</option>
	</select></td></tr>	

{$buttonradiogstylebox}





<tr style='{$radiogstylenone}' id='modulesid' valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>選擇可以設定焦點的模組</span>
	<span class='caption-marker'>*</span></div></td>
	<td class='even'>
	<select size='1'  name='modulesid' id='modulesidselect' title='選擇按鈕分類' >
<option value='0'>請選擇模組</option>	
{$optionmodules}												
	</select></td></tr>	

<tr style='{$radiogstylenone}' id='sortyn' valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>按鈕連結類型</span>
	<span class='caption-marker'>*</span></div></td>
	<td class='even'>
	<select size='1'  name='sortyn' id='sortynselect' title='按鈕連結是否為分類' >
	<option value='0' {$sortync}>選擇類型</option>	
	<option value='y' id='sy'  {$sortynb}>分類連結</option>
	<option value='n' id='sn' {$sortyna}>單頁連結</option>
	<option value='z' id='sz' {$sortync}>模組全部</option>
	
	</select></td></tr>	


<tr style='{$radiogstylenone}' id='variableid'  valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>輸入網址變數</span>
	<span class='caption-marker'>*</span>
	</div></td><td class='even'>
	<input type='text' name='variableid' title='輸入網址變數' id='variableid' size='20' maxlength='255' value='{$variableid}' /><span id='vid'></span></td></tr>	

		
<tr valign='top' align='left'>
	<td class='head'>
	<div class='xoops-form-element-caption'>
	<span class='caption-text'>順序</span>
	<span class='caption-marker'>*</span></div>
	</td><td class='even'><input type='text' name='orderid' title='排序' id='orderid' size='1' maxlength='255' value='{$orderid}'  />
	</td></tr>		
		
	
<tr valign='top' align='left'>
	<td class='head'></td>
	<td class='even'>
	<input type='submit' class='formButton' name=''  id='' value='送出' title='送出'  />
	</td></tr>
</table>
    <input type='hidden' name='op' id='op' value='{$opvalue}' />	
      <input type='hidden' name='bid' id='bid' value='{$bid}' />	
	   <input type='hidden' name='radiogstyle' id='radiogstyle' value='{$radiogstyle}' />	
{$hiddensortid}{$hiddenbuttonimg}
	</table>		
	</form>
	
	{$newbasejs}	
	  
	";
    
    
    
    
    
    
    
    


    return $form;
}




function insert_blocksort()
{
    global $xoopsDB;
  

    if (empty($_POST['sortid'])) {
        redirect_header($_SERVER['PHP_SELF'], 0, _MA_CHOOSECATEGORY);
    }

    //新增內容SQL語法
    $sql="insert into " . $xoopsDB->prefix('neoblockmenubutton') . "
  (`sortid`  ,`buttontitle`  ,  `buttonurl`,  `target`,  `sortyn`,  `modulesid`,  `variableid`,  `orderid`)
  values
  ('{$_POST['sortid']}'  , '{$_POST['buttontitle']}'  ,  '{$_POST['buttonurl']}',  '{$_POST['target']}' ,  '{$_POST['sortyn']}' ,  '{$_POST['modulesid']}',  '{$_POST['variableid']}',  '{$_POST['orderid']}'  )";
    $xoopsDB -> queryF($sql) ;
    $bid = $xoopsDB->getInsertId();
    $buttomimg="{$_POST['sortid']}{$bid}";
   
    $sql = "update ".$xoopsDB->prefix("neoblockmenubutton")." set   
	buttonimg  = '{$buttomimg}'
     where  bid= '{$bid}' ";
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());
   
    save_pic($img=$buttomimg, $width0=570, $height0=0);
}

function update_blocksort()
{
    global $xoopsDB;



    //新增內容SQL語法
    $sql = "update ".$xoopsDB->prefix("neoblockmenubutton")." set   
	sortid = '{$_POST['sortid']}',
	buttontitle = '{$_POST['buttontitle']}', 
	buttonurl = '{$_POST['buttonurl']}', 
	target = '{$_POST['target']}', 
	sortyn = '{$_POST['sortyn']}', 
	modulesid = '{$_POST['modulesid']}', 
	variableid = '{$_POST['variableid']}', 												
	orderid= '{$_POST['orderid']}'
     where  bid= '{$_POST['bid']}' ";
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'], 3, mysql_error());
   
    $buttomimg=$_POST['buttonimg'];

    save_pic($img=$buttomimg, $width0=570, $height0=0);
}







//引入CSS
xoops_cp_header();
loadModuleAdminMenu(6);
include "tplthemescss.php";



echo $main;
xoops_cp_footer();
