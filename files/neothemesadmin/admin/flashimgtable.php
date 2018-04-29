<?php  
include "../../../include/cp_header.php";
include "../function.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";
include "../class/function.php";
include "../class/selectdb.php";	



$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
switch ($op){
 case "marquee01":   	 
 
flasgimg_news();

redirect_header($_SERVER['PHP_SELF'],0 , _MA_NEODWADMIN_SHBU);   

break;

 case "marquee02":  	 

break;

 
 default:
list($maintable,$maintablea) = flashimg_table();
}


function flashimg_table(){	
$xoops_theme = $GLOBALS['xoopsConfig']['theme_set'];

if($xoops_theme=="neilambilight"){ //如果是neilambilight佈景themesid可以是空值
$theme="OR  `themesid`=''";
}

//呼叫DB::neothemesconfig
$neothemesconfigvsplit =neothemesconfig::publicselectdb1($nsn,$field);
list($nsn,$field,$modulesid,$mnsnid,$fnsnid,$menuid) = $neothemesconfigvsplit;

	

//送入確認頁面的參數
$urlself='flashimgtable.php';
$deldb='neothemesflash';
$img_date = date("H:i:s");

//撈取neothemesflash資料表中內容傳值於總表
 global $xoopsDB;  
 $selectdb=$xoopsDB->prefix('neothemesflash');   
 $sql="select * from $selectdb  where   `themesid`='{$xoops_theme}' {$theme}  order by  nnumber   ASC";  
 $result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MA_NEODWADMIN_DATAISNOTAVAILABLE . $xoopsDB->errno() . " : " . $xoopsDB->error());
 $all_marquee="";  
 $i=1;
    
  while(list($nsn,$nnumber,$content,$url,$target,$post_date,$imgid) = $xoopsDB -> fetchRow($result)){  	  


 //先建構class($target)
$targetclass   = new  targetclass;  
 //將$target變數送入class中，然後取得對應的值
$target=$targetclass-> functionpublica($target ); 
 

 //先建構class($ture)
$tureclass   = new  tureclass;  
 //將$target變數送入class中，然後取得對應的值
$ture=$tureclass-> functionpublicb($nsn,$fnsnid); 	

$contentutf8=urlencode($content);
$delimgid='p'.$imgid.'.jpg';

     $del="<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/confirmdel.php?urlself=$urlself&nsn=$nsn&deldb=$deldb&content=$contentutf8&imgid=$delimgid'>"._MA_NEODWADMIN_DELETE."</a>";
     $modify="<a href='" . XOOPS_URL . "/modules/neothemesadmin/admin/newflashimg.php?i=$i&nsn=$nsn'>"._MA_NEODWADMIN_EDITOR."</a>";
     $all_marquee .= "<tr>
    <td   class='odd'  id='$ture'>{$nsn}</td>      	    	
    <td   class='odd'  id='$ture'>
    <input  type='text'  size='1' maxlength='255'   name='nnumber{$nsn}' value='{$nnumber}'></td>	
    <td    class='odd'  id='$ture'><div style='width: 200px' ><img  style='width: 200px''  src='".XOOPS_URL."/uploads/$xoops_theme/p{$imgid}.jpg?state={$img_date}'></div></td>
    <td  class='even'  id='$ture'><a   target='{$target}'   href='{$url}'>{$content}</a></td>
    <td    class='odd'  id='$ture'>{$target}</td>
    <td    class='odd'  id='$ture'>{$post_date}</td>	
   <td  class='even'  id='$ture'>{$modify}|{$del}</td>
    </tr>";    
    $i++;
}  


$b=1;
 $sql="select * from $selectdb  order by  imgid  asc";  
  $result = $xoopsDB -> query($sql); 
  while(list($nsn,$nnumber,$content,$url,$target,$post_date,$imgid) = $xoopsDB -> fetchRow($result)){     
	
  $b++;  


   	 } 


    

//顯示配置總表 

$maintablea = "<div><h3><span><a href='newflashimg.php?i=$i&b=$b'>"._MA_NEODWADMIN_NEWFLASHIMAGE."</a></span></h3></div>";

$maintable = "
	<div id='flashdmain'><form method='post'  action='{$_SERVER['PHP_SELF']}'>  
	<h3><strong style='float: right; display:none;'>"._MA_NEODWADMIN_YOUCANADD5."<span>[{$y}]</span>"._MA_NEODWADMIN_ZHANGFLASIMAGE."</strong>	</h3><br />

	  <table class='outer'>
  <tr><th>ID</th><th>"._MA_NEODWADMIN_ORDER."</th><th>"._MA_NEODWADMIN_THUMBNAIL."</th><th>"._MA_NEODWADMIN_IMAGECAPTION."</th><th>"._MA_NEODWADMIN_TAPTOOPENMODE."</th><th>"._MA_NEODWADMIN_CREATIONDATE."</th><th>"._MA_NEODWADMIN_OPERATING."</th></tr>
  $all_marquee
  </table>
     <input type='hidden' name='op' value='marquee01'>
         <input type='submit' value='"._MA_NEODWADMIN_SENT."'>   		  	  
  	  </form></div>";
  	  


return array($maintable, $maintablea); 
}
function flasgimg_news(){
  global $xoopsDB; 

$k=1;
  
   $selectdb=$xoopsDB->prefix('neothemesflash');   
$sql="select nsn  from $selectdb";   
   $result=$xoopsDB->query($sql);	
   while(list($nsn) = $xoopsDB -> fetchRow($result)){  	     
   $nsna[]=$nsn;	 
   $k++;
  } 

  
//儲存排序(nnumber)
//取得nsn陣列總數，帶入$counta;值進行迴圈數判斷，依照迴圈數帶入i值生成POST值，
          
  for($i=1;  $i<=$k;  $i++){     	  
  $a=$i-1; 	  
$digital= nnumber.$nsna[$a];   
$nnumberh = $_POST[$digital];  	    
 	  
 $sql="update   $selectdb  set  `nnumber`='$nnumberh'  where `nsn`='$nsna[$a]'"; 
 
  $xoopsDB->queryF($sql);    
   }         

	}







		



xoops_cp_header();
loadModuleAdminMenu(4);
//引入CSS
include "tplthemescss.php";	

echo $urla;
echo "<div id='stylekeyword'>";





echo $maintablea;
echo $maintable;
echo "</div>";


xoops_cp_footer();	
	?>