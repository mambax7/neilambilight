<?php	
	
	
	
$neothemesconfigvsplit =neothemesconfig::publicselectdb1($nsn,$field);
list($nsn,$field) = $neothemesconfigvsplit;
$fieldsplit=preg_split('/;/',$field);   //編號到21
	
	
  global $xoopsDB;	

switch ($fieldsplit[20]){
case "2":  //自訂選單內容

 $sql = "select * from " . $xoopsDB->prefix('neorightmenu')   . " order by  snid ASC";
$result = $xoopsDB -> query($sql) or die($sql);  
 while(list($nsn,$title,$url,$target,$snid) = $xoopsDB -> fetchRow($result)){   


 //先建構class($target)
$targetclass   = new  targetclass;  
 //將$target變數送入class中，然後取得對應的值
$target=$targetclass-> functionpublica($target);  




$rmenua[$nsn]['title']=$title;
$rmenua[$nsn]['url']=$url;
$rmenua[$nsn]['target']=$target;
 }
 $this->assign("rmenua", $rmenua);
 
break;



case "3":  //主選單內容
	
 $sql = "select mid,name,dirname  from " . $xoopsDB->prefix('modules')   . " where `hasmain` = '1' and `weight` != '0'";
$result = $xoopsDB -> query($sql) or die($sql);  
 while(list($mid,$name,$dirname) = $xoopsDB -> fetchRow($result)){  
 $rmenub[$mid]['name']=$name; 
  $rmenub[$mid]['dirname']=$dirname; 
  }	
 $this->assign("rmenub", $rmenub);	
	
break;


 default:
 	  $fieldsplit[20]="1";	
}
	

 $this->assign("switching", $fieldsplit[20]);	
	
	
	
	?>