<?php

	
include "../../../include/cp_header.php";
include "../class/themeset.php";	
include "../class/selectdb.php";
include "../xoops_version.php";		
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";


$xoopsurl=XOOPS_URL."";
$xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];


 //先建構class(themesetclass)
$themesetclass   = new  themesetclass;  
$topvsplit =$themesetclass-> themespublicb($variableok,$setting); 
list($variableoka,$settinga) = $topvsplit;

$variablesplit=preg_split('/;/',$variableoka); 
$themeConfirmimg=$variablesplit[5];         


$modversion=$modversion['version'];





$main="
	<div id='indexstyle'>
<table >
  <tr>
    <td >
    <div id='l'>
    <ul>
       <li><a title="._MA_NEODWADMIN_SCENESETTING." href='settings.php'>"._MA_NEODWADMIN_SCENESETTING."</a></li>  
       <li><a title='"._MA_NEODWADMIN_KEYWORDMANAGEMENT."'  href='keywordmeta.php'>"._MA_NEODWADMIN_KEYWORDMANAGEMENT."</a></li>
       <li><a  title='"._MA_NEODWADMIN_MARQUEEMANAGEMENT."' href='marqueetable.php'>"._MA_NEODWADMIN_MARQUEEMANAGEMENT."</a></li>
       <li><a title='"._MA_NEODWADMIN_FLASHIMAGE."' href='flashimgtable.php'>"._MA_NEODWADMIN_FLASHIMAGE."</a></li>
       <li><a title='"._MA_NEODWADMIN_WEBSITEMENU."' href='menutable.php'>"._MA_NEODWADMIN_WEBSITEMENU."</a></li>
     <li><a title='"._MA_NEODWADMIN_BLOCKMENU."' href='blockmenusort.php'>"._MA_NEODWADMIN_BLOCKMENU."</a></li>
       <li  id='l1'><a target='_blank' title='"._MA_NEODWADMIN_REPORTAPROBLEM."' href='http://neodw.com/neil/modules/tad_form/index.php?op=sign&ofsn=9#A'>"._MA_NEODWADMIN_REPORTAPROBLEM."</a></li>
      
    </ul>
       <div>
    </td>
    <td style='width:80%'>
   <div id='facebookdiv' style='position: absolute; right: 100px;'>

<div id='facebook1'><script src='http://connect.facebook.net/zh_TW/all.js#xfbml=1'></script><fb:like-box href='https://www.facebook.com/neodwxoops' width='292' show_faces='false' stream='false' header='true'></fb:like-box></div> 

<div id='facebook2'><script src='http://connect.facebook.net/zh_TW/all.js#xfbml=1'></script><fb:like-box href='https://www.facebook.com/NeilHsu168' width='292' show_faces='false' stream='false' header='true'></fb:like-box></div>


</div>   
  
    <div id='r'>
      <ul>
       <li>"._MA_NEODWADMIN_DEVELOPMENTUNIT."<a  target='_blank'  title='"._MA_NEODWADMIN_NEODW."' href='http://neodw.com/'>"._MA_NEODWADMIN_NEODW."</a></li>
       <li>"._MA_NEODWADMIN_DEVELOPER."<a  target='_blank'  href='https://www.facebook.com/NeilHsu168/'>"._MA_NEODWADMIN_NEOHSU."</a></li>
      <li >Mail：<a title='"._MA_NEODWADMIN_CONTACT."' href='mailto:b168168tw@Gmail.com'>b168168tw@Gmail.com</a></li>
       <li>"._MA_NEODWADMIN_MODULENAME."</li>
       <li>"._MA_NEODWADMIN_MODULEVERSIONRC6."{$modversion}</li>
       <li>"._MA_NEODWADMIN_LICENSE."<a  target='_blank'  title='"._MA_NEODWADMIN_WEBSITEMENU."' href='https://creativecommons.org/licenses/by-sa/3.0/tw/legalcode'>"._MA_NEODWADMIN_CCLICENSE."</a></li>     
       <li  ><div  id='l2div'>"._MA_NEODWADMIN_THECURRENTSETS."{$xoops_theme}<div  id='img{$themeConfirmimg}'></div></div></li> 
    </ul>
    </div></td>
  </tr>
</table>
</div>
";






xoops_cp_header();
loadModuleAdminMenu(0);
//引入CSS
include "tplthemescss.php";	

echo $main;
xoops_cp_footer();
?>
