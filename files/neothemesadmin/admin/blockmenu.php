<?php
include "../../../include/cp_header.php";
include "../function.php";

include_once XOOPS_ROOT_PATH . "/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH . "/Frameworks/art/functions.admin.php";

include "../class/function.php";
include "../class/themeset.php";
include "../class/selectdb.php";

$op     = (empty($_REQUEST['op'])) ? "" : $_REQUEST['op'];
$sortid = (empty($_REQUEST['sortid'])) ? "" : $_REQUEST['sortid'];
//$radiogstyle=(empty($_REQUEST['radiogstyle']))?"":$_REQUEST['radiogstyle'];

switch ($op) {
    case "nenu01":
        snidup();
        redirect_header(XOOPS_URL . '/modules/neothemesadmin/admin/blockmenu.php?sortid=' . $_POST['sortid'], 0, _MA_NEODWADMIN_SHBU);    //設定已更新
        break;

    default:
        $main = blockmenutable($sortid, $radiogstyle);
}

/**
 * @param $sortid
 * @param $radiogstyle
 * @return string
 */
function blockmenutable($sortid, $radiogstyle)
{
    $xoopsurl = XOOPS_URL;
    global $xoopsDB;

    //按鈕分類
    $sql = "select sortid,sorttitle,radiogstyle from " . $xoopsDB->prefix('neoblockmenusort');
    $result = $xoopsDB->query($sql) or die($sql);
    while (list($sid, $sorttitle, $radiogstylea) = $xoopsDB->fetchRow($result)) {
        if ($sortid == $sid) {
            $selected = "selected='selected'";
        }

        $optioncenter .= "<option {$selected} value='blockmenu.php?sortid={$sid}&radiogstyle={$radiogstylea}'>{$sorttitle}</option>";

        unset($selected);
    }

    //搜尋資料表判斷圖檔還是文字
    $sql = "select radiogstyle  from " . $xoopsDB->prefix('neoblockmenusort') . " where `sortid` = '$sortid'";
    $result = $xoopsDB->query($sql) or die($sql);
    list($radiogstyle) = $xoopsDB->fetchRow($result);

    //搜尋模組ID
    $sql = "select mid   from " . $xoopsDB->prefix('modules') . " where `dirname` = 'neothemesadmin'";
    $result = $xoopsDB->query($sql) or die($sql);
    list($mid) = $xoopsDB->fetchRow($result);

    $k   = '1';
    $sql = "select bid,sortid,buttontitle,buttonurl,target,orderid,buttonimg  from " . $xoopsDB->prefix('neoblockmenubutton') . " where `sortid` = '$sortid' order by  orderid ASC";
    $result = $xoopsDB->query($sql) or die($sql);
    while (list($bid, $sortida, $buttontitle, $buttonurl, $target, $orderid, $buttonimg) = $xoopsDB->fetchRow($result)) {
        //先建構class($target)

        $targetclass = new  targetclass;
        //將$target變數送入class中，然後取得對應的值
        $target = $targetclass->functionpublica($target);
        //送入確認頁面的參數
        $urlself      = "blockmenu.php?sortid=$sortid";
        $deldb        = 'neoblockmenubutton';
        $buttontitlea = urlencode($buttontitle);

        if ($radiogstyle == img) {
            $imgth       = "<th>圖檔縮圖</th>";
            $img_date    = date("H:i:s");
            $xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];
            $imgtd       = "<td class='even'><div style='width: 60%' ><img  style='width: 60%'  src='" . XOOPS_URL . "/uploads/$xoops_theme/{$buttonimg}.png?state={$img_date}' ></div></td>";
        }

        $delimgid = $buttonimg . '.png';

        $del         = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/confirmdel.php?urlself=$urlself&nsn=$bid&deldb=$deldb&content=$buttontitlea&imgid=$delimgid'>" . _MA_NEODWADMIN_DELETE . "</a>";
        $modify      = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/blockmenubuttonform.php?bid=$bid&sortid=$sortida&radiogstyle=$radiogstyle&buttonimg=$buttonimg'>" . _MA_NEODWADMIN_EDITOR . "</a>";
        $rightcenter .= "
<tr><td class='odd'>{$bid}</td>
	<td class='even'><span  id='nnumber1'><input  type='text'  size='1' maxlength='255'   name='orderid{$bid}' value='{$orderid}'></span></td>
		<td class='odd'><a target='_blank' href='{$buttonurl}'>$buttontitle</a></td>
		{$imgtd}
			<td class='even'>{$target}</td>
				<td class='odd'>{$modify}│{$del}</td></tr>
";
        $k++;
    }

    $neoblockmenusort = "
  <script type=text/javascript src='{$xoopsurl}/modules/neillibrary/js/menujs/jquery-1.4.1.min.js'></script>	
	<span class=footer-select>
  <select id=FriendLink class=footer_sel>
    <option  value=''>選擇按鈕分類</option>
    {$optioncenter}
  </select>
</span>

  ";

    $divcenter = "<div>{$neoblockmenusort}<span><a href='blockmenusort.php'>【分類管理】</a></span><span><a href='blockmenubuttonform.php?orderid={$k}&sortid=$sortid&radiogstyle=$radiogstyle'>【新增按鈕】</a></span><span><a href='{$xoopsurl}/modules/system/admin.php?fct=blocksadmin&op=list&filter=1&selgen={$mid}&selmod=-1&selgrp=-1&selvis=-1'>【區塊管理】</a></span></div>";

    $divcenter .= "	<div id='memuadmain'><form method='post'  action='{$_SERVER['PHP_SELF']}'> 
	  <table class='outer'>
  <tr><th>ID</th><th>順序</th><th>按鈕名稱</th>{$imgth}<th>點選開啟方式</th><th>操作</th></tr>	
$rightcenter	  	
  </table>
     <input type='hidden' name='op' value='nenu01'>
         <input type='hidden' name='sortid' value='{$sortid}'> 	  
         <input type='submit' value='送出'>   		  	  
  	  </form></div>
  <script type=text/javascript src='{$xoopsurl}/modules/neillibrary/js/menujs/newbase.js'></script>	  	  
  	  ";

    return $divcenter;
}

function snidup()
{
    global $xoopsDB;

    $selectdb = $xoopsDB->prefix('neoblockmenubutton');
    $sql      = "select bid from  $selectdb " . " where `sortid` = '{$_POST['sortid']}'";
    $result   = $xoopsDB->query($sql);
    while (list($bid) = $xoopsDB->fetchRow($result)) {
        $bida[] = $bid;
    }

    //儲存排序(nnumber)
    //取得bida陣列總數，帶入foreach值進行迴圈數判斷，依照迴圈數帶入$key值生成POST值，

    foreach ($bida as $key => $val) {
        $digital  = orderid . $bida[$key];
        $nnumberh = $_POST[$digital];
        $sql      = "update   $selectdb  set  `orderid`='$nnumberh'  where `bid`='$bida[$key]'";

        $xoopsDB->queryF($sql);
    }
}

//引入CSS

xoops_cp_header();
loadModuleAdminMenu(8);
include "tplthemescss.php";

echo $main;
xoops_cp_footer();
