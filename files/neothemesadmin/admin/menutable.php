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
        menu_news();
        redirect_header($_SERVER['PHP_SELF'], 0, _MA_NEODWADMIN_SHBU);    //設定已更新
        break;

    case "nenu02":
        break;
    default:
        list($maintable, $maintablea) = menu_table();
}

/**
 * @return array
 */
function menu_table()
{


    //先建構class($themesetclass)
    $themesetclass = new  themesetclass;
    $topvsplit     = $themesetclass->themespublicb($variableok, $setting);
    list($variableoka, $settinga) = $topvsplit;

    //切割$variableok陣列內容
    $variablesplit = preg_split('/;/', $variableoka);
    $menulimit     = $variablesplit[6];          //按鈕上限

    //呼叫DB::neothemesconfig
    $neothemesconfigvsplit = neothemesconfig::publicselectdb1($nsn, $field, $modulesid, $mnsnid, $fnsnid, $menuid);
    list($nsn, $field, $modulesid, $mnsnid, $fnsnid, $menuid) = $neothemesconfigvsplit;

    global $xoopsDB;
    //送入確認頁面的參數
    $urlself = 'menutable.php';
    $deldb   = 'neothemesmenu';

    //撈取neothemesnenu資料表中內容傳值於總表

    $selectdb = $xoopsDB->prefix('neothemesmenu');
    $b        = 0;
    $sql      = "select manugroup  from $selectdb  where `master_slave`=1  order by  manugroup  asc";
    $result   = $xoopsDB->query($sql);
    while (list($manugroup) = $xoopsDB->fetchRow($result)) {
        if (($b + 1) != $manugroup) {
            break;
        }
        $b++;
    }

    $result = $xoopsDB->query($sql);
    while (list($manugroup) = $xoopsDB->fetchRow($result)) {
        $group[] = $manugroup;
        sort($group);
    }

    //取的按鈕總數
    $yest = count($group);

    //$yesta=($yest>=$menulimit)?$menulimit:$yest;

    //主迴圈
    $k = 0;

    $sql = "select * from  $selectdb  where `master_slave`=1  order by  nnumber  asc";
    $result = $xoopsDB->query($sql) or redirect_header(XOOPS_URL, 3, _MA_NEODWADMIN_DATAISNOTAVAILABLE . $xoopsDB->errno() . " : " . $xoopsDB->error());
    while (list($nsn, $nnumber, $master_slave, $manugroup, $content, $url, $target, $post_date) = $xoopsDB->fetchRow($result)) {
        $urlsplit = preg_split('/,/', $url);

        //先建構class($ture)
        $tureclass = new  tureclass;
        //將$target變數送入class中，然後取得對應的值
        $ture = $tureclass->functionpublicb($nsn, $menuid);
        //先建構class($target)
        $targetclass = new  targetclass;
        //將$target變數送入class中，然後取得對應的值
        $target = $targetclass->functionpublica($target);

        $contentb0  = urlencode($content);
        $del        = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/confirmdel.php?urlself=$urlself&nsn=$nsn&deldb=$deldb&content=$contentb0&manugroup=$manugroup&c=1&k=1'>" . _MA_NEODWADMIN_DELETE . "</a>";
        $modify     = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/newmenu.php?nsn=$nsn&c=1'>" . _MA_NEODWADMIN_EDITOR . "</a>";
        $contentok1 = "<div id='master_slave1'><a   target='{$target}'   href='{$urlsplit[0]}'>{$content}</a></div>";
        $nnumberok1 = "<span  id='nnumber1'><input  type='text'  size='1' maxlength='255'   name='nnumber{$nsn}' value='{$nnumber}'></span>";
        $menukey    = $nnumber;

        $all_nenua[$k] .= "<tr>
    <td   style='width:40px;'  class='odd'  id='$ture'>{$nsn}</td>     	
    <td  style='width:80px;' class='odd'  id='$ture'>{$nnumberok1}</td>	    	
        <td  class='even'  id='$ture'>{$contentok1}</td>        	
    
    <td    class='odd'  id='$ture'>{$target}</td>
     <td    class='odd'  id='$ture'>{$post_date}</td>	
   <td  class='even'  id='$ture'>{$modify}|{$del}</td>
    </tr>";

        /*============第二層迴圈==================*/

        $g       = "{$k}00";
        $sqla    = "select * from  $selectdb     where `master_slave`=2 and  `manugroup`=$manugroup   order by  nnumber  asc";
        $resulta = $xoopsDB->query($sqla);
        while (list($nsna, $nnumbera, $master_slavea, $manugroupa, $contenta, $urla, $target, $post_datea, $snid) = $xoopsDB->fetchRow($resulta)) {


            //先建構class($ture)
            $tureclass = new  tureclass;
            //將$target變數送入class中，然後取得對應的值
            $ture = $tureclass->functionpublicb($nsna, $menuid);

            //先建構class($target)
            $targetclass = new  targetclass;
            //將$target變數送入class中，然後取得對應的值
            $target = $targetclass->functionpublica($target);

            //傳遞變數編碼
            $contentb01 = urlencode($contenta);
            $del        = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/confirmdel.php?urlself=$urlself&nsn=$nsna&deldb=$deldb&content=$contentb01&manugroup=$manugroupa&c=1&k=2'>" . _MA_NEODWADMIN_DELETE . "</a>";
            $modify     = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/newmenu.php?nsn=$nsna&c=2'>" . _MA_NEODWADMIN_EDITOR . "</a>";
            $contentok2 = "<div id='master_slave2'><a   target='{$target}'   href='{$urla}'>{$contenta}</a></div>";
            $nnumberok2 = "<span id='nnumber2'><input  type='text'  size='1' maxlength='255'   name='nnumber{$nsna}'  value='{$nnumbera}'></span>";

            $all_nenub[$g] .= "<tr>
    <td   style='width:40px;'  class='odd'  id='$ture'>{$nsna}</td>     	
    <td  style='width:80px;' class='odd'  id='$ture'>{$nnumberok2}</td>	    	
        <td  class='even'  id='$ture'>{$contentok2}</td>        	
      <td    class='odd'  id='$ture'>{$target}</td>
     <td    class='odd'  id='$ture'>{$post_datea}</td>	
   <td  class='even'  id='$ture'>{$modify}|{$del}</td>
    </tr>";

            /*============第三層迴圈==================*/

            $sql         = "select * from  $selectdb     where `master_slave`=3  and `snid`=$nsna   order by  nnumber  asc";
            $resultb[$g] = $xoopsDB->query($sql);
            while (list($nsnb, $nnumberb, $master_slaveb, $manugroupb, $contentb, $urlb, $target, $post_dateb) = $xoopsDB->fetchRow($resultb[$g])) {

                //先建構class($ture)
                $tureclass = new  tureclass;
                //將$target變數送入class中，然後取得對應的值
                $ture = $tureclass->functionpublicb($nsnb, $menuid);

                //先建構class($target)
                $targetclass = new  targetclass;
                //將$target變數送入class中，然後取得對應的值
                $target = $targetclass->functionpublica($target);
                //傳遞變數編碼
                $contentb02 = urlencode($contentb);
                $del        = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/confirmdel.php?urlself=$urlself&nsn=$nsnb&deldb=$deldb&content=$contentb02'>" . _MA_NEODWADMIN_DELETE . "</a>";
                $modify     = "<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/newmenu.php?nsn=$nsnb&c=2&j=1'>" . _MA_NEODWADMIN_EDITOR . "</a>";
                $contentok3 = "<div id='master_slave3'><a   target='{$target}'   href='{$urla}'>{$contentb}</a></div>";
                $nnumberok3 = "<span id='nnumber3'><input  type='text'  size='1' maxlength='255'   name='nnumber{$nsnb}'  value='{$nnumberb}'></span>";

                $all_nenuc[$g] .= "<tr>
    <td   style='width:40px;'  class='odd'  id='$ture'>{$nsnb}</td>     	
    <td  style='width:80px;' class='odd'  id='$ture'>{$nnumberok3}</td>	    	
        <td  class='even'  id='$ture'>{$contentok3}</td>        	
         <td    class='odd'  id='$ture'>{$target}</td>
     <td    class='odd'  id='$ture'>{$post_dateb}</td>	
   <td  class='even'  id='$ture'>{$modify}|{$del}</td> </tr>";
            }

            $all_nenud[$k] .= "	
	$all_nenub[$g]
	$all_nenuc[$g]";
            $g++;
        }

        $all_nenu[$menukey] = "	
	$all_nenua[$k]
	$all_nenud[$k]";
        $k++;
    }

    //帶出按鈕陣列直
    foreach ($all_nenu as $y) {
        $all_nenutop .= $y;
    }

    //取的剩餘按鈕數
    $surplus = $menulimit - $yest;

    if ($surplus != 0) {
        $newba = "<span style='margin: 10px 20px 0px 5px;'><a href='newmenu.php?b=$b&c=1'>" . _MA_NEODWADMIN_ANEWMAINBUTTON . "</a></span>";  //新增主按鈕
    }

    //顯示按鈕總表
    $buttom2    = ($yest < "1") ? "" : "<span  style='margin: 10px 20px 0px 0px;'><a href='newmenu.php?c=2'>" . _MA_NEODWADMIN_NEWTIMESBUTTON . "</a></span>";
    $maintablea = "<div id='menutable'><h3>{$newba}{$buttom2}
<span>" . _MA_NEODWADMIN_THEMAINNUMBEROFBUTTONS . "<b>[{$menulimit}]</b>" . _MA_NEODWADMIN_HASBEENESTABLISHED . "<b>[{$yest}]</b>" . _MA_NEODWADMIN_ALSOTHEREMAINING . "<b>[{$surplus}]</b>" . _MA_NEODWADMIN_CANBEESTABLISHED . "</span></h3></div>";

    $maintable = "
	<div id='memuadmain'><form method='post'  action='{$_SERVER['PHP_SELF']}'>  
	  <table class='outer'>
  <tr><th>ID</th><th>" . _MA_NEODWADMIN_ORDER . "</th><th>" . _MA_NEODWADMIN_BUTTONNAME . "</th><th>" . _MA_NEODWADMIN_TAPTOOPENMODE . "</th><th>" . _MA_NEODWADMIN_CREATIONDATE . "</th><th style='width: 150px;'>" . _MA_NEODWADMIN_OPERATING . "</th></tr>	
$all_nenutop  	
  </table>
     <input type='hidden' name='op' value='nenu01'>
         <input type='submit' value='" . _MA_NEODWADMIN_SENT . "'>   		  	  
  	  </form></div>";

    return array($maintable, $maintablea);
}

function menu_news()
{
    global $xoopsDB;
    $kset = '3'; //switch條件
    //搜尋neothemesmenu資料表
    $selectneothemesmenu = neothemesmenu::publicselectdb5($kset, $nsn, $nnumber, $master_slave, $manugroup, $content, $url, $target, $post_date, $a, $b);
    list($nsn, $nnumber, $master_slave, $manugroup, $content, $url, $target, $post_date, $nsna, $k) = $selectneothemesmenu;

    //儲存排序(nnumber)
    //取得nsn陣列總數，帶入$counta;值進行迴圈數判斷，依照迴圈數帶入i值生成POST值，

    $selectdb = $xoopsDB->prefix('neothemesmenu');
    for ($i = 1; $i <= $k; $i++) {
        $a        = $i - 1;
        $digital  = nnumber . $nsna[$a];
        $nnumberh = $_POST[$digital];
        $sql      = "update   $selectdb  set  `nnumber`='$nnumberh'  where `nsn`='$nsna[$a]'";
        $xoopsDB->queryF($sql);
    }
}

xoops_cp_header();
loadModuleAdminMenu(5);
//引入CSS

include "tplthemescss.php";

echo $urla;
echo "<div id='stylekeyword'>";

echo $maintablea;
echo $maintable;
echo "</div>";

xoops_cp_footer();
