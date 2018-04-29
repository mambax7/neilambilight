<?php
include "../../../include/cp_header.php";
include "../function.php";
include "../glyphicon.php";

include_once XOOPS_ROOT_PATH . "/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH . "/Frameworks/art/functions.admin.php";

include "../class/function.php";
include "../class/themeset.php";
include "../class/selectdb.php";

$op = (empty($_REQUEST['op'])) ? "" : $_REQUEST['op'];

switch ($op) {
    case "nenu01":
        snidup();
        redirect_header($_SERVER['PHP_SELF'], 0, _MA_NEODWADMIN_SHBU);    //設定已更新
        break;

    default:
        $main = blockmenusort();
}

/**
 * @return string
 */
function blockmenusort()
{
    $xoopsurl = XOOPS_URL;
    global $xoopsDB;
    //送入確認頁面的參數
    $urlself = 'blockmenusort.php';
    $deldb   = 'neoblockmenusort';

    //搜尋模組ID
    $sql = "select mid   from " . $xoopsDB->prefix('modules') . " where `dirname` = 'neothemesadmin'";
    $result = $xoopsDB->query($sql) or die($sql);
    list($mid) = $xoopsDB->fetchRow($result);

    $k   = '1';
    $sql = "select * from " . $xoopsDB->prefix('neoblockmenusort') . " order by  sorting  ASC";
    $result = $xoopsDB->query($sql) or die($sql);
    while (list($sortid, $sorttitle, $sortimg, $sorting, $radiogstyle) = $xoopsDB->fetchRow($result)) {
        //先建構class($target)
        $targetclass = new  targetclass;
        //將$target變數送入class中，然後取得對應的值
        $target = $targetclass->functionpublica($target);

        $glyphiconicon = glyphiconicon($sortimg);

        switch ($radiogstyle) {
            case "text":
                $icomimg = "<span class='{$glyphiconicon}' aria-hidden='true'></span>";
                break;
            case "img":
                $icomimg = '圖片按鈕';
                break;
        }

        $sorttitlea      = urlencode($sorttitle);
        $del             = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/confirmdel.php?urlself=$urlself&nsn=$sortid&deldb=$deldb&content=$sorttitlea'>" . _MA_NEODWADMIN_DELETE . "</a>";
        $modify          = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/blockmenusortform.php?sortid=$sortid'>" . _MA_NEODWADMIN_EDITOR . "</a>";
        $blockadmin      = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/blockmenu.php?sortid=$sortid'>" . _MA_NEODWADMIN_BLOCKMEUNADMIN . "</a>";
        $blocksortcenter .= "
<tr><td class='odd'><span  id='nnumber1'><input  type='text'  size='1' maxlength='255'   name='sorting{$sortid}' value='{$sorting}'></span></th>
<td class='odd'>$sorttitle</td>
<td class='even'>$icomimg</td>
<td class='odd'>{$modify}│{$del}│{$blockadmin}</td></tr>
";
        $k++;
    }

    if ($k > 1) {
        $setupbutton = "<span><a href='blockmenubuttonform.php'>【新增按鈕】</a></span>";
    }
    $blockadmin = "<span><a href='{$xoopsurl}/modules/system/admin.php?fct=blocksadmin&op=list&filter=1&selgen={$mid}&selmod=-1&selgrp=-1&selvis=-1'>【區塊管理】</a></span>";

    $divcenter = "<div><span><a href='blockmenusortform.php?sorting={$k}'>【新增區塊分類】</a></span>{$setupbutton}{$blockadmin}</div>";

    $divcenter .= "	<div id='memuadmain'><form method='post'  action='{$_SERVER['PHP_SELF']}'> 
	  <table class='outer'>
  <tr><th>ID</th><th>分類名稱</th><th>分類按鈕代表圖片</th><th>操作</th></tr>	
$blocksortcenter	  	
  </table>
  		    <input type='hidden' name='op' value='nenu01'>  
  		     
   	       <input type='submit' value='送出'>   
   	        	  
  	 </form> </div>";

    return $divcenter;
}

function snidup()
{
    global $xoopsDB;

    $selectdb = $xoopsDB->prefix('neoblockmenusort');
    $sql      = "select sortid  from  $selectdb ";
    $result   = $xoopsDB->query($sql);
    while (list($sortid) = $xoopsDB->fetchRow($result)) {
        $sortida[] = $sortid;
    }

    //儲存排序(nnumber)
    //取得bida陣列總數，帶入foreach值進行迴圈數判斷，依照迴圈數帶入$key值生成POST值，

    foreach ($sortida as $key => $val) {
        $digital  = sorting . $sortida[$key];
        $nnumberh = $_POST[$digital];
        $sql      = "update   $selectdb  set  `sorting`='$nnumberh'  where `sortid`='$sortida[$key]'";

        $xoopsDB->queryF($sql);
    }
}

//引入CSS

xoops_cp_header();
loadModuleAdminMenu(8);
include "tplthemescss.php";

echo $main;
xoops_cp_footer();
