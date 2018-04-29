<?php


if($selectdbphp){
$selectdb[1]=$xoopsDB->prefix('modules');   
$sql="select  dirname from  $selectdb[1]  where `dirname`='neothemesadmin'";  
$result = $xoopsDB -> query($sql) or die($sql);
list($mid) = $xoopsDB -> fetchRow($result);
}


if($neothemesconfig){
	
$sql="select line,fburl,fbfansurl,contactus from ".$xoopsDB->prefix("neothemesconfig");
$result=$xoopsDB->query($sql);  	

 if(!empty($result)){	
$selectdb[2]=$xoopsDB->prefix('neothemesconfig');   
$sql="select nsn,field,line,fburl,fbfansurl,contactus from  $selectdb[2]";  
$result = $xoopsDB -> query($sql) or die($sql);
list($nsn,$field,$line,$fburl,$fbfansurl,$contactus) = $xoopsDB -> fetchRow($result);
$fieldsplit=preg_split('/;/',$field);

 }
}




?>