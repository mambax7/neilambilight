<?php
include "../../../include/cp_header.php";
include "../function.php";

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
        $main = rightmenu();
}

/**
 * @return string
 */
function rightmenu()
{
    global $xoopsDB;
    //送入確認頁面的參數
    $urlself = 'rightmenu.php';
    $deldb   = 'neorightmenu';

    $k   = '1';
    $sql = "select * from " . $xoopsDB->prefix('neorightmenu') . " order by  snid ASC";
    $result = $xoopsDB->query($sql) or die($sql);
    while (list($nsn, $title, $url, $target, $snid) = $xoopsDB->fetchRow($result)) {
        //先建構class($target)
        $targetclass = new  targetclass;
        //將$target變數送入class中，然後取得對應的值
        $target = $targetclass->functionpublica($target);

        $titlea      = urlencode($title);
        $del         = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/confirmdel.php?urlself=$urlself&nsn=$nsn&deldb=$deldb&content=$titlea'>" . _MA_NEODWADMIN_DELETE . "</a>";
        $modify      = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/rightmenutable.php?nsn=$nsn&y=1'>" . _MA_NEODWADMIN_EDITOR . "</a>";
        $rightcenter .= "
<tr><td class='odd'>{$nsn}</th><td class='even'><span  id='nnumber1'><input  type='text'  size='1' maxlength='255'   name='snid{$nsn}' value='{$snid}'</td><td class='odd'><a href='{$url}'>$title</a></td><td class='even'>{$target}</td><td class='odd'>{$modify}│{$del}</td></tr>
";
        $k++;
    }

    $divcenter = "<div><a href='rightmenutable.php?y=0&number={$k}'>新增選單按鈕</a></div>";

    $divcenter .= "	<div id='memuadmain'><form method='post'  action='{$_SERVER['PHP_SELF']}'> 
	  <table class='outer'>
  <tr><th>ID</th><th>順序</th><th>按鈕名稱</th><th>點選開啟方式</th><th>操作</th></tr>	
$rightcenter	  	
  </table>
     <input type='hidden' name='op' value='nenu01'>
         <input type='submit' value='送出'>   		  	  
  	  </form></div>";

    return $divcenter;
}

function snidup()
{
    global $xoopsDB;
    $k        = 1;
    $selectdb = $xoopsDB->prefix('neorightmenu');
    $sql      = "select nsn  from $selectdb";
    $result   = $xoopsDB->query($sql);
    while (list($nsn) = $xoopsDB->fetchRow($result)) {
        $nsna[] = $nsn;
        $k++;
    }

    //儲存排序(nnumber)
    //取得nsn陣列總數，帶入$counta;值進行迴圈數判斷，依照迴圈數帶入i值生成POST值，

    for ($i = 1; $i <= $k; $i++) {
        $a        = $i - 1;
        $digital  = snid . $nsna[$a];
        $nnumberh = $_POST[$digital];

        $sql = "update   $selectdb  set  `snid`='$nnumberh'  where `nsn`='$nsna[$a]'";

        $xoopsDB->queryF($sql);
    }
}

//引入CSS

xoops_cp_header();
loadModuleAdminMenu(6);
include "tplthemescss.php";

echo $main;
xoops_cp_footer();
