<?php
include 'header.php'; //XOOPS檔頭
include_once XOOPS_ROOT_PATH . "/modules/neillibrary/class/bar.php";
include "../function.php";
//引入CSS
include "tplthemescss.php";

$op         = (empty($_REQUEST['op'])) ? "" : $_REQUEST['op'];
$nsn        = (empty($_REQUEST['nsn'])) ? "" : $_REQUEST['nsn'];
$process    = (empty($_REQUEST['process'])) ? "" : $_REQUEST['process'];
$moduleid   = (empty($_REQUEST['moduleid'])) ? "" : $_REQUEST['moduleid'];
$countbox   = (empty($_REQUEST['countbox'])) ? "" : $_REQUEST['countbox'];
$modulesort = (empty($_REQUEST['modulesort'])) ? "" : $_REQUEST['modulesort'];

switch ($op) {
    case "createmarquees":
        createmarquees();
        redirect_header(XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/marqueetable.php", 0, _MS_SHARED02);
        break;

    case "updated":
        updated();
        redirect_header(XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/marqueetable.php", 0, _MS_SHARED02);
        break;

    case "updatesettings":
        updatesettings();
        redirect_header(XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/marqueetable.php", 0, _MS_SHARED02);
        break;

    case "changelist":
        changelist();
        redirect_header(XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/marqueetable.php", 0, _MS_SHARED02);
        break;

    default:
        //開啟neothemesconfig資料表
        $dbneme          = "neothemesconfig";
        $where           = "  where `nsn` = '1'";  //where數值
        $neothemesconfig = moduledb($dbneme, $where);
        //切割陣列
        $fieldsplit = cuttingfunction($cutting = $neothemesconfig['field'], $sign = ";");
        $main       = $fieldsplit[14] == 0 ? custom() : modulescontent();  // 0自訂1播放模組內容
}

//左側選單內容
function leftmenusetup($config = "")
{
    global $process, $moduleid;

    $process = !empty($config['mnsnid']) ? '2' : $process; // get TRUE

    switch ($process) {
        case "1":

            //模組資料流判斷
            switch ($moduleid) {
                case "tadnews":
                    $dbneme      = "tad_news_cate";
                    $where       = " where `not_news` = '0'  order by  ncsn   DESC";
                    $modulessort = databasetablewhile($dbneme, $where);
                    //選擇狀態
                    foreach ($modulessort as $key => $val) {
                        $modulessortbox .= optionselect($dataid = $modulessort[$key]['ncsn'], $optionname = $modulessort[$key]['nc_title'], $oid = "", $value = $modulessort[$key]['ncsn']);
                    }
                    $displayall = checkbox($dataid = true, $name = "displayall", $value = true, $optionname = "" . _MA_MARQUEETABLEPHP15 . "", $oid = "", $i, $class = "displayall");

                    $setupbox = "
	   <span id='helpBlock' class='help-block'>" . _MA_MARQUEETABLEPHP14 . "</span>  	
	<select    id=modulesort class='form-control' name='modulesort[]' multiple='multiple' >
       	" . $modulessortbox . "   
  </select>	 <br />
  				   <p>" . $displayall . "</p>

";
                    break;

                case "tad_honor":

                    //無分類不用設定

                    break;

                case "neilshop":
                    $dbneme      = "neilshopsort";
                    $where       = " where `enable` = '1'  order by  sortid   DESC";
                    $modulessort = databasetablewhile($dbneme, $where);
                    //選擇狀態
                    foreach ($modulessort as $key => $val) {
                        $modulessortbox .= optionselect($dataid = $modulessort[$key]['sortid'], $optionname = $modulessort[$key]['sorttitle'], $oid = "", $value = $modulessort[$key]['sortid']);
                    }
                    $displayall = checkbox($dataid = true, $name = "displayall", $value = true, $optionname = "" . _MA_MARQUEETABLEPHP15 . "", $oid = "", $i, $class = "displayall");

                    $setupbox = "
	   <span id='helpBlock' class='help-block'>" . _MA_MARQUEETABLEPHP14 . "</span>  	
	<select    id=modulesort class='form-control' name='modulesort[]' multiple='multiple' >
       	" . $modulessortbox . "   
  </select>	 <br />
  				   <p>" . $displayall . "</p>

";

                    break;
            }

            //顯示筆數
            $countbox = inputtext($class = "", $name = "countbox", $value = "10", $placeholder = "", $id = "countbox");

            $leftmenu = "
<form method='post'  action='{$_SERVER['PHP_SELF']}'>	
	 <div class='form-group'>	
 " . $setupbox . "		 	 
<hr/>
     <div class='row'>   
  <div class='col-md-5'>" . _MA_MARQUEETABLEPHP19 . "</div>
  <div class='col-md-5'>" . $countbox . "</div>
  		 </div>			 

</div>
 <input type='hidden' name='moduleid' value='" . $moduleid . "'>	
 <input type='hidden' name='op' value='updatesettings'>	    
<button  type='submit'  class='btn btn-primary  btn-block btn-lg'>" . _MS_SHARED15 . "</button>	
	
</form>  
  ";
            break;

        case "2":
            //字串轉陣列

            $modulessetup = phpconversion($conversion = $config['mnsnid'], $type = "unserialize");

            $leftmenu = "
<form method='post'  action='{$_SERVER['PHP_SELF']}'>	
	 <div class='form-group'>	
 <span id='helpBlock' class='help-block'>" . _MA_MARQUEETABLEPHP20 . "</span> 
<p>" . sprintf(_MA_MARQUEETABLEPHP21, $modulessetup['moduleid']) . "</p>	 
<p>" . sprintf(_MA_MARQUEETABLEPHP22, $modulessetup['countbox']) . "</p>	 
</div>
 <input type='hidden' name='default' value='" . true . "'>	
 <input type='hidden' name='op' value='updatesettings'>	    
<button  type='submit'  class='btn btn-warning  btn-block btn-lg'>" . _MA_MARQUEETABLEPHP23 . "</button>	
	
</form>  	  
	  
	  ";

            break;

        default:
            //可播放的模組
            $modulesArr     = array(); //建構陣列
            $i              = 0;
            $modulesArr[$i] = "tadnews";
            $i++;
            $modulesArr[$i] = "tad_honor";
            $i++;
            $modulesArr[$i] = "neilshop";
            $i++;
            //判斷模組是否有安裝
            $dbneme    = "modules";
            $where     = " where `isactive` = '1'  order by  mid  DESC";
            $modulesDB = databasetablewhile($dbneme, $where);
            foreach ($modulesDB as $key => $val) {
                //比對陣列
                $modulesdirname = $modulesDB[$key]['dirname'];
                if (in_array("$modulesdirname", $modulesArr)) {  //單值-> 陣列
                    $modulesselect[$key]['dirname'] = $modulesDB[$key]['dirname'];
                    $modulesselect[$key]['name']    = $modulesDB[$key]['name'];
                }
            }

            //選擇狀態
            foreach ($modulesselect as $key => $val) {
                $modulesselectbox .= optionselect($dataid = $modulesselect[$key]['dirname'], $optionname = $modulesselect[$key]['name'], $oid = "", $value = $modulesselect[$key]['dirname']);
            }

            $leftmenu = "
<form method='post'  action='{$_SERVER['PHP_SELF']}'>	
	 <div class='form-group'>	
 		 	 
		 	   <span id='helpBlock' class='help-block'>" . _MA_MARQUEETABLEPHP13 . "</span>  	
	<select id=moduleid class='form-control' name='moduleid' >
    <option value=''  data-id='1' >" . _MA_MARQUEETABLEPHP13 . "</option>
    	" . $modulesselectbox . "   
  </select>	 

</div>
<button  type='submit' name='process' value='1' class='btn btn-primary  btn-block btn-lg'>" . _MS_SHARED15 . "</button>	
	
</form>
";

    }

    return $leftmenu;
}

//播放模組跑馬燈內容
function modulescontent()
{
    global $xoopsModule;

    //開啟neothemesconfig資料表
    $dbneme          = "neothemesconfig";
    $where           = "  where `nsn` = '1'";  //where數值
    $neothemesconfig = moduledb($dbneme, $where);

    //字串轉陣列
    $moduleArr = phpconversion($conversion = $neothemesconfig['mnsnid'], $type = "unserialize");

    //資料流判斷
    switch ($moduleArr['moduleid']) {
        case "tadnews":

            //字串轉陣列
            $modulesortArr = phpconversion($conversion = $moduleArr['modulesort'], $type = "unserialize");

            //解分類
            $serviceDB .= " &&";
            foreach ($modulesortArr as $key => $val) {
                $serviceDB .= "  `ncsn` = '" . $val . "' ||";
            }

            $serviceDBtrue = substr($serviceDB, 0, -2);

            $dbneme    = "tad_news";
            $where     = "  where `enable` = '1' " . $serviceDBtrue . "  order by  nsn  DESC  Limit " . $moduleArr['countbox'] . "";  //where數值
            $marqueeBD = databasetablewhile($dbneme, $where);

            //變更陣列mane
            foreach ($marqueeBD as $key => $val) {
                $marqueebox[$key]['id']    = $marqueeBD[$key]['nsn'];
                $marqueebox[$key]['title'] = $marqueeBD[$key]['news_title'];
                $marqueebox[$key]['url']   = "" . XOOPS_URL . "/modules/tadnews/index.php?nsn=" . $marqueeBD[$key]['nsn'] . "";
                $marqueebox[$key]['time']  = $marqueeBD[$key]['start_day'];
            }

            break;

        case "tad_honor":
            $dbneme    = "tad_honor";
            $where     = "   order by  honor_sn  DESC  Limit " . $moduleArr['countbox'] . "";  //where數值
            $marqueeBD = databasetablewhile($dbneme, $where);

            //變更陣列NAME
            foreach ($marqueeBD as $key => $val) {
                $marqueebox[$key]['id']    = $marqueeBD[$key]['honor_sn'];
                $marqueebox[$key]['title'] = $marqueeBD[$key]['honor_title'];
                $marqueebox[$key]['url']   = "" . XOOPS_URL . "/modules/tad_honor/index.php?honor_sn=" . $marqueeBD[$key]['honor_sn'] . "";
                $marqueebox[$key]['time']  = $marqueeBD[$key]['honor_date'];
            }

            break;

        case "neilshop":

            //字串轉陣列
            $modulesortArr = phpconversion($conversion = $moduleArr['modulesort'], $type = "unserialize");

            //解分類
            $serviceDB .= " &&";
            foreach ($modulesortArr as $key => $val) {
                $serviceDB .= "  `sortid` = '" . $val . "' ||";
            }

            $serviceDBtrue = substr($serviceDB, 0, -2);

            $dbneme    = "neilshopproductcontent";
            $where     = "  where `productstatus` != 'notshelves' and `marqueetitle` != ''  " . $serviceDBtrue . "  order by  productid  DESC  Limit " . $moduleArr['countbox'] . "";  //where數值
            $marqueeBD = databasetablewhile($dbneme, $where);

            //變更陣列mane
            foreach ($marqueeBD as $key => $val) {
                $marqueebox[$key]['id']    = $marqueeBD[$key]['productid'];
                $marqueebox[$key]['title'] = $marqueeBD[$key]['marqueetitle'];
                $marqueebox[$key]['url']   = "" . XOOPS_URL . "/modules/neilshop/shopwcase.php?productid=" . $marqueeBD[$key]['productid'] . "";
                $marqueebox[$key]['time']  = $marqueeBD[$key]['setuptime'];
            }

            break;

    }

    foreach ($marqueebox as $key => $val) {
        $modulescontent['td'] .= "<tr>
        <td>" . $marqueebox[$key]['id'] . "</td>
        <td>" . $marqueebox[$key]['time'] . "</td>
        <td><a target='_blank' href='" . $marqueebox[$key]['url'] . "'>" . $marqueebox[$key]['title'] . "</a></td>
      </tr>";
    }

    $modulescontent['table'] = "  <table class='table'>
    <thead>
      <tr>
        <th>ID</th>
        <th style='width: 18%;'>" . _MS_SHARED33 . "</th>
        <th>" . _MA_MARQUEETABLEPHP24 . "</th>
      </tr>
    </thead>
    <tbody>
    " . $modulescontent['td'] . "
     
    </tbody>
  </table>";

    //左側選單內容
    $leftmenusetup = leftmenusetup($config = $neothemesconfig);

    $main = "
	<div class='container'>
	
   <div class='page-header'>
  <h2>" . _MA_MARQUEETABLEPHP12 . "<small> &nbsp;Play module content</small> </h2>
  	   	     <span id='helpBlock' class='help-block'>" . _MA_MARQUEETABLEPHP18 . " &nbsp; &nbsp;<a target='_blank' href='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/settings.php'  class='btn btn-md btn-info  active'>" . _MA_MARQUEETABLEPHP17 . "</a>   </span>  	
  	   
</div>
   <div class='row'>   
 <div class='col-md-3'>
" . $leftmenusetup . "
		   
		   </div>   
 <div class='col-md-9'>

 		" . $modulescontent['table'] . "
 			   </div>   	   
	   
</div>	   
";

    return $main;
}

//自訂跑馬燈內容
function custom()
{
    global $xoopsModule, $nsn;

    //編輯與新增
    if (empty($nsn)) { //新增
        $custom['tltle']                = "<span>" . _MA_MARQUEETABLEPHP02 . "&nbsp;&nbsp; <button  type='submit' name='op' value='createmarquees'   class='btn btn-warning active'>" . _MS_SHARED17 . "</button></span>";
        $neothemesmarqueelist['enable'] = 1;
    } else { //編輯
        $custom['tltle'] = "<span>" . _MA_MARQUEETABLEPHP10 . "&nbsp;&nbsp;  <input type='hidden' name='nsn' value='" . $nsn . "'> <button  type='submit' name='op' value='updated'   class='btn btn-warning active'>" . _MS_SHARED17 . "</button></span>";

        //開啟跑馬燈資料表
        $dbneme               = "neothemesmarquee";
        $where                = "  where `nsn` = '" . $nsn . "'";  //where數值
        $neothemesmarqueelist = moduledb($dbneme, $where);
    }

    //跑馬燈標題
    $custom['content'] = inputtext($class = "", $name = "content", $value = "" . $neothemesmarqueelist['content'] . "", $placeholder = "" . _MD_CONTACTENTER . "" . _MA_MARQUEETABLEPHP03 . "", $id = "content");
    //跑馬燈連結
    $custom['url'] = inputtext($class = "", $name = "url", $value = "" . $neothemesmarqueelist['url'] . "", $placeholder = "" . _MD_CONTACTENTER . "" . _MA_MARQUEETABLEPHP04 . "", $id = "url");

    //連結開啟方式
    $custom['target'] = radioinline($class = "", $name = "target", $text = array(_MS_SHARED31, _MS_SHARED32), $checked = "" . $neothemesmarqueelist['target'] . "");

    //啟用關閉
    //狀態
    $custom['enable'] = radioinline($class = "", $name = "enable", $text = array(_MS_SHARED04, _MS_SHARED03), $checked = "" . $neothemesmarqueelist['enable'] . "");

    //開啟跑馬燈資料表
    $dbneme = "neothemesmarquee";
    $where  = "  order by  nnumber  ASC";
    list($neothemesmarqueeArr, $bar) = databasetablewhilebar($dbneme, $where, $onepage = "20", $allpage = 10);
    foreach ($neothemesmarqueeArr as $key => $val) {

        //排序
        $td['nnumber'] = inputtext($class = "", $name = "nnumber" . $neothemesmarqueeArr[$key]['nsn'] . "", $value = "" . $neothemesmarqueeArr[$key]['nnumber'] . "", $placeholder = "");

        //頁面開啟方式
        $td['target'] = pagemethod($types = $neothemesmarqueeArr[$key]['target']);
        //狀態
        $td['enable'] = enable($envar = $neothemesmarqueeArr[$key]['enable']);

        //擷取字串
        $content = substr($neothemesmarqueeArr[$key]['content'], 0, 20);

        $custom['td'] .= "
 <tr id='deletetr{$key}'>
        <td>" . $td['nnumber'] . "</td>
        <td><a target='_blank' href='" . $neothemesmarqueeArr[$key]['url'] . "'>" . $neothemesmarqueeArr[$key]['content'] . "</a></td>
        <td>" . $td['target']['text'] . "</td>
           <td>" . $neothemesmarqueeArr[$key]['post_date'] . "</td>
        <td>" . $td['enable'] . "</td>
        <td>    <a href='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/marqueetable.php?nsn=" . $neothemesmarqueeArr[$key]['nsn'] . "'  class='btn btn-md btn-info  active'>" . _MS_SHARED08 . "</a>   
     <a id='deletebotton{$key}' href='#NO' mane='55," . $neothemesmarqueeArr[$key]['nsn'] . "," . $content . "," . _MA_MARQUEETABLEPHP11 . "'  class='btn btn-md btn-danger  active deleteeach'>" . _MS_SHARED09 . "</a> </td>
      </tr>
";
    }

    $custom['table'] = "  <table class='table'>
    <thead>
      <tr>
        <th  style='width: 5%;'>" . _MA_MARQUEETABLEPHP07 . "</th>
        <th>" . _MA_MARQUEETABLEPHP08 . "</th>
        <th style='width: 8%;'>" . _MA_MARQUEETABLEPHP09 . "</th>
          <th>" . _MS_SHARED33 . "</th>
        <th style='width: 8%;'>" . _MS_SHARED10 . "</th>
        <th style='width: 15%;'>" . _MS_SHARED07 . "</th>
      </tr>
    </thead>
    <tbody>
    " . $custom['td'] . "
    
    </tbody>
  </table>";

    $main = "<div class='container'>
	 	   	
   <div class='page-header'>
  <h2>" . _MA_MARQUEETABLEPHP01 . "<small> &nbsp;Custom Marquee Management</small>  </h2>
  	   	     <span id='helpBlock' class='help-block'>" . _MA_MARQUEETABLEPHP16 . " &nbsp; &nbsp;<a target='_blank' href='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/settings.php'  class='btn btn-md btn-info  active'>" . _MA_MARQUEETABLEPHP17 . "</a>   </span>  	
</div>

 	<form method='post'  action='{$_SERVER['PHP_SELF']}'>	    
<div class='alert alert-info' role='alert'><h4>" . $custom['tltle'] . "&nbsp;&nbsp;" . $custom['enable'] . "</h4><hr />
  <div class='row'>
    <div class='col-md-4'>" . $custom['content'] . "</div>
    <div class='col-md-5'>" . $custom['url'] . "</div>
     <div class='col-md-3'>" . $custom['target'] . "</div>
    
    </div>
	
	</div>	
</form>	
 	<form method='post'  action='{$_SERVER['PHP_SELF']}'>			    

   <div class='page-header'>
<h2>" . _MA_MARQUEETABLEPHP05 . "<small> &nbspMarquee list</small></h2>
</div>    	 
 " . $custom['table'] . "    
     

   
   <button  type='submit' name='op' value='changelist'   class='btn btn-warning active'>" . _MS_SHARED12 . "</button>
   	   </form>	   	
   <div class='col-sm-12'>
                  <div class='text-center'>
           	<nav>
  <ul class='pagination'> {$bar} </ul>
</nav> </div>   	 
     	 
     	 </div>
     
     ";

    return $main;
}

//更新播放模組參數設定
function updatesettings()
{
    global $moduleid, $modulesort, $countbox;

    //模組id
    $mnsnidArr['moduleid'] = $moduleid;
    //模組分類
    //陣列轉字串
    $mnsnidArr['modulesort'] = phpconversion($conversion = $modulesort, $type = "serialize");
    //顯示數量
    $mnsnidArr['countbox'] = $countbox;

    if (empty($_POST['default'])) {
        $mnsnid = phpconversion($conversion = $mnsnidArr, $type = "serialize");
    } else {
        $mnsnid = "";
    }

    $setvar = "set mnsnid='" . $mnsnid . "'  where nsn='1'";
    update($dbname = "neothemesconfig", $set = $setvar);
}

//新增跑馬燈
function createmarquees()
{
    $valuesvar = "(content,url,target,post_date,enable) values('{$_POST['content']}','{$_POST['url']}','{$_POST['target']}','" . timedate($datevar = "Y-m-d H:i:s") . "','{$_POST['enable']}')";
    insert($dbname = "neothemesmarquee", $values = $valuesvar);

    //讀取最新一筆nsn
    $dbneme             = "neothemesmarquee";
    $where              = " order by  nsn  DESC";   //where數值-修改
    $neothemesmarqueeDB = moduledb($dbneme, $where);

    $setvar = "set nnumber='" . $neothemesmarqueeDB['nsn'] . "'  where nsn='" . $neothemesmarqueeDB['nsn'] . "'";
    update($dbname = "neothemesmarquee", $set = $setvar);
}

//更新跑馬燈
function updated()
{
    global $nsn;
    $setvar = "set content='{$_POST['content']}',url='{$_POST['url']}',target='{$_POST['target']}',enable='{$_POST['enable']}'  where nsn='" . $nsn . "'";
    update($dbname = "neothemesmarquee", $set = $setvar);
}

//變更排序
function changelist()
{
    $dbneme = "neothemesmarquee";
    $where  = "";
    $sort   = databasetablewhile($dbneme, $where);

    foreach ($sort as $key => $val) {
        $digital = nnumber . $sort[$key]['nsn'];
        $setvar  = "set nnumber='{$_POST[$digital]}'   where nsn='" . $sort[$key]['nsn'] . "'";
        update($dbname = "neothemesmarquee", $set = $setvar);
    }
}

loadModuleAdminMenu(3);
echo $main;

include "footer.php"; //XOOPS檔尾
