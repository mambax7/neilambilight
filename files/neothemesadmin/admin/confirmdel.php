<?php  
include "../../../include/cp_header.php";
include "../function.php";
include "../class/selectdb.php";	
include "../class/themesset/defaultltheme.php";	
//接收其他頁面傳過來的變數
$urlself=(empty($_REQUEST['urlself']))?"":$_REQUEST['urlself'];
$nsn=(empty($_REQUEST['nsn']))?"":$_REQUEST['nsn'];
$deldb=(empty($_REQUEST['deldb']))?"":$_REQUEST['deldb'];
$content=(empty($_REQUEST['content']))?"":$_REQUEST['content'];
$manugroup=(empty($_REQUEST['manugroup']))?"":$_REQUEST['manugroup'];
$c=(empty($_REQUEST['c']))?"":$_REQUEST['c'];
$k=(empty($_REQUEST['k']))?"":$_REQUEST['k'];
$imgid=(empty($_REQUEST['imgid']))?"":$_REQUEST['imgid'];



//接收本頁POST變數
$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$delid=(empty($_REQUEST['opnsn']))?"":$_REQUEST['opnsn'];
$opurlself=(empty($_REQUEST['opurlself']))?"":$_REQUEST['opurlself'];
$opdeldb=(empty($_REQUEST['opdeldb']))?"":$_REQUEST['opdeldb'];
$nsna=(empty($_REQUEST['nsna']))?"":$_REQUEST['nsna'];
$delimgid=(empty($_REQUEST['delimgid']))?"":$_REQUEST['delimgid'];




switch ($op){	
case "opture":  
if($opdeldb=='neoblockmenusort'){
$deleteid=" where `sortid` = '$delid'";
}else if($opdeldb=='neoblockmenubutton'){
$deleteid=" where `bid` = '$delid'";
}else{
$deleteid=" where `nsn` = '$delid'";
}


/*====刪除除實體圖檔====*/
if(!empty($delimgid)){


if(file_exists(XOOPS_ROOT_PATH.'/uploads/'.$installtheme.'/'.$delimgid)){
 unlink(XOOPS_ROOT_PATH.'/uploads/'.$installtheme.'/'.$delimgid);//將檔案刪除
}
}

	
	
$sql = "delete from " . $xoopsDB->prefix($opdeldb). " {$deleteid}";
 $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MA_NEODWADMIN_UNABLETOREMOVECONTENT . $xoopsDB->errno() . " : " . $xoopsDB->error());
 redirect_header(XOOPS_URL. '/modules/neothemesadmin/admin/'.$opurlself ,0 , _MA_NEODWADMIN_THEFILEHASBEENDELETED );   
break;


case "opture1" :  

$newnsna=preg_split('/;/',$nsna);
$deletedb=$xoopsDB->prefix($opdeldb);   
for($i=0; $i<count($newnsna); $i++){
$sql="delete  from $deletedb  where `nsn`='$newnsna[$i]'";
 $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MA_NEODWADMIN_UNABLETOREMOVECONTENT . $xoopsDB->errno() . " : " . $xoopsDB->error());
}
redirect_header(XOOPS_URL. '/modules/neothemesadmin/admin/'.$opurlself ,0 , _MA_NEODWADMIN_THEFILEHASBEENDELETED);   
break;
default:
$main =  confirmdeltable($nsn,$urlself,$deldb,$content,$manugroup,$c,$k,$imgid); 	 
}


function  confirmdeltable($nsn= "",$urlself="",$deldb="",$content="",$manugroup="",$c="",$k="",$imgid=""){	
switch ($c){
case "1":  
//查詢由各頁面送入之nsn列的數值	
global $xoopsDB;  
$selectconfirmdel =confirmdel::publicselectdb6($deldb,$manugroup,$k,$nsn);
$nsna=list($k) = $selectconfirmdel;
$nsnainput="<input type='hidden' name='nsna'  value='$nsna'>"; 
 $opture="opture$c";
 $confirmtext="<span>"._MA_NEODWADMIN_YOUSURETHATYOUWANT."<strong>[{$content}]</strong>"._MA_NEODWADMIN_DELETEOPERATION."	 <br /><h4>"._MA_NEODWADMIN_NOTE."</h4></span> 
 <span><strong>"._MA_NEODWADMIN_DELETE."[{$content}]"._MA_NEODWADMIN_SUBBUTTONTODELETE."</strong></span> ";
break;



 default:
$opnan="<input type='hidden' name='opnsn'  value='$nsn'>";    
 $opture='opture';
 $confirmtext="<span>"._MA_NEODWADMIN_YOUSURETHATYOUWANT."<strong>[{$content}]</strong>"._MA_NEODWADMIN_DELETEOPERATION."</span>";
}
	
 $input = "<div class='confirmMsg'>{$confirmtext}<br />	<br />	<br />	 	 
 	   <form method='post'  action='{$_SERVER['PHP_SELF']}'> 	   	   	 
           {$nsnainput}
           {$kcounta} 	   
           {$opnan}           	        
 	   <input type='hidden' name='opurlself'  value='$urlself'>    
 	   <input type='hidden' name='opdeldb'  value='$deldb'>    
 	     	   <input type='hidden' name='delimgid'  value='$imgid'>   	   	   
 	   	    	            	  
          <input type='hidden' name='op'  value=$opture>           	     	     	          	  
    		 <input type='submit' value='"._MA_NEODWADMIN_SENT."'>     
    	  <input type='button'  name='confirm_back'  value='"._MA_NEODWADMIN_CANCELED."'  onclick=javascript:history.go(-1);  title='"._MA_NEODWADMIN_CANCELED."' />
     	   </form> </div>";  	  
 return $input;
}




xoops_cp_header();

//引入CSS
include "tplthemescss.php";	

echo $main;	
xoops_cp_footer();	
	?>