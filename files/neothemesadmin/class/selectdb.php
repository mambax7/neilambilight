<?php  	

//查詢neothemesconfig資料表
 class  neothemesconfig{   
 function publicselectdb1($nsn,$field,$modulesid,$mnsnid,$fnsnid,$menuid){     
global $xoopsDB;  
$selectdb=$xoopsDB->prefix('neothemesconfig');   
$sql="select * from  $selectdb";  
$result = $xoopsDB -> query($sql) or die($sql);
list($nsn,$field,$modulesid,$mnsnid,$fnsnid,$menuid) = $xoopsDB -> fetchRow($result);
return array($nsn,$field,$modulesid,$mnsnid,$fnsnid,$menuid);
} 
} 


//查詢neothemeskeyword資料表	
 class  neothemeskeyword{    
public function publicselectdb2($kset,$nsn,$keywordid,$keywordcenter,$wdescription,$title,$a,$b){      
global $xoopsDB;  	
$selectdb=$xoopsDB->prefix('neothemeskeyword');  
switch ($kset){	
	
 case "0":   
$sql="select * from  $selectdb  where `nsn` = '$nsn'"; 
$result = $xoopsDB -> query($sql); 
list($nsn,$keywordid,$keywordcenter,$wdescription,$title) = $xoopsDB -> fetchRow($result); 
break;		

  case "1":   
$sql="select  keywordid   from $selectdb";   
   $result = $xoopsDB -> query($sql); 
  while(list($keywordida) = $xoopsDB -> fetchRow($result)){   
$a.= "&&  `dirname`  !='{$keywordida}'";
$b.=$keywordida;	
	}break;
  
 case "2":   	//  blocks/themesseo.php
 $sql="select keywordcenter,wdescription  from  $selectdb"; 
$result = $xoopsDB -> query($sql) or die($sql);
 while(list($keywordcenter,$wdescription) = $xoopsDB -> fetchRow($result)){     
   $a[]=$keywordcenter;        //$center[]
   $b[]=$wdescription;   //$wd[]
  } break;	
  
  case "3":  	   //  blocks/themesseo.php
 $sql="select keywordid from  $selectdb where `keywordid`='$a'";    //$xoops_dirname=$a; 	    
$result = $xoopsDB -> query($sql) or die($sql);
list($keywordid) = $xoopsDB -> fetchRow($result); 	   	  
  break;

  case "4":  	   //  blocks/themesseo.php
$sql="select keywordid  from  $selectdb where `keywordid`='modules'";  
$result = $xoopsDB -> query($sql) or die($sql);
list($keywordid) = $xoopsDB -> fetchRow($result);  	  
  break;

  
}     

return array($nsn,$keywordid,$keywordcenter,$wdescription,$title,$a,$b);
	}
     	 }


//查詢neothemesmarquee資料表	

 class neothemesmarquee{    
public function publicselectdb3($kset,$nsn,$number,$content,$url,$target,$post_date){      
global $xoopsDB;  	
   $dbnane=$xoopsDB->prefix('neothemesmarquee');         
 switch ($kset){	
 case "0":   
    $sql="select * from $dbnane  where `nsn`='$nsn'";
    $result=$xoopsDB->query($sql);	
list($nsn,$number,$content,$url,$target,$post_date) = $xoopsDB -> fetchRow($result);
break;		
  case "1":   
  $sql="select * from $dbnane order by  nsn desc";    
     $result=$xoopsDB->query($sql);	
    list($nsn,$number,$content,$url,$target,$post_date) = $xoopsDB -> fetchRow($result);
	break;
}     
return array($nsn,$number,$content,$url,$target,$post_date);    

}
}




//查詢neothemesflash資料表

 class neothemesflash{    
public function publicselectdb4($kset,$nsn,$number,$content,$url,$target,$post_date,$imgid,$flashtext){      
global $xoopsDB;  	
$dbnane=$xoopsDB->prefix('neothemesflash');      
 switch ($kset){	
 case "0":   
   $sql="select * from $dbnane  where `nsn`='$nsn'";
    $result=$xoopsDB->query($sql);	
list($nsn,$number,$content,$url,$target,$post_date,$imgid,$flashtext) = $xoopsDB -> fetchRow($result);
break;		
  case "1":   
   $sql="select * from $dbnane order by  nsn  desc";    
     $result=$xoopsDB->query($sql);	
list($nsn,$number,$content,$url,$target,$post_date,$imgid,$flashtext) = $xoopsDB -> fetchRow($result);
	break;
}    
return array($nsn,$number,$content,$url,$target,$post_date,$imgid,$flashtext);    
}
}



//查詢neothemesmenu資料表

class neothemesmenu{    	 
public function publicselectdb5($kset,$nsn,$nnumber,$master_slave,$manugroup,$content,$url,$target,$post_date,$a,$b,$menulimit,$j){      
global $xoopsDB;  	
$dbnane=$xoopsDB->prefix('neothemesmenu');  


//以第三層的snid欄位數值去撈第二層nsn變數。
if($j=="1"){
$sql="select  snid  from  $dbnane  where `nsn`='$nsn'";  
 $result=$xoopsDB->query($sql);	
list($nsnid) = $xoopsDB -> fetchRow($result);
}


   
 switch ($kset){	
 case "0":   
    $sql="select * from $dbnane  where `nsn`='$nsn'";
    $result=$xoopsDB->query($sql);	
list($nsn,$nnumber,$master_slave,$manugroup,$content,$url,$target,$post_date) = $xoopsDB -> fetchRow($result);
break;		
  
  case "1":   
    $sql="select * from $dbnane order by  nsn  desc";    
     $result=$xoopsDB->query($sql);	
list($nsn,$nnumber,$master_slave,$manugroup,$content,$url,$target,$post_date) = $xoopsDB -> fetchRow($result);
	break;
 
  case "2":   
 $k=0;
 $sql="select  manugroup,content  from  $dbnane  where `master_slave`='1'  order by  nnumber  asc limit $menulimit";  
$result = $xoopsDB -> query($sql) or die($sql);  
 while(list($manugroupa,$content) = $xoopsDB -> fetchRow($result)){ //第一層按鈕迴圈

$trueValue=($nsn!='' && $j!="1" && $manugroupa=="$manugroup")?"selected='selected'":"";  //$j為判斷是否為第三層之變數，1=是，此項判斷式主要用於編輯按鈕的焦點反向顯示用途。
$t1[$k].= "<option value={$manugroupa} {$trueValue}>{$content}</option>"; 

 
$sqla="select  nsn,content  from  $dbnane  where `master_slave`='2'  and  `manugroup`=$manugroupa  order by  nsn  asc";  
$resulta = $xoopsDB -> query($sqla) or die($sqla);  
while(list($nsna,$contenta) = $xoopsDB -> fetchRow($resulta)){  //第二層按鈕迴圈

if($nsna != $nsn){ //將所點擊編輯的按鈕給隱藏起來。
$trueValuea=($nsn!='' &&  $j=="1" && $nsna=="$nsnid")?"selected='selected'":"";  //$j為判斷是否為第三層之變數，1=是，此項判斷式主要用於編輯按鈕的焦點反向顯示用途。	
$t2[$k].= "<option value=*{$nsna}  {$trueValuea}>-->{$contenta}</option>";   
}
 } 
   $a[$k] ="
 	$t1[$k]
	$t2[$k]"; 
  $k++; 
  }	  	  
 break;	
 case"3":
 $b=1;  
//$selectdb=$xoopsDB->prefix('neothemesmenu');   
$sql="select nsn  from $dbnane";   
   $result=$xoopsDB->query($sql);	
   while(list($nsn) = $xoopsDB -> fetchRow($result)){  	   
   $a[]=$nsn;	 
   $b++;
  }
  break;	
   case "4":   
   	   $a;
    $sql="select manugroup from $dbnane  where `nsn`=$a";    
     $result=$xoopsDB->query($sql);	
list($manugroup) = $xoopsDB -> fetchRow($result);
	break;
}    
return array($nsn,$nnumber,$master_slave,$manugroup,$content,$url,$target,$post_date,$a,$b);    
}
}



//刪除確認頁面的select
 class  confirmdel{   
 function publicselectdb6($deldb,$manugroup,$k,$nsn){     
 global $xoopsDB;  
 
 $selectdb=$xoopsDB->prefix($deldb);   
 switch ($k){ 
 case "1":    	 
 $sql="select nsn from   $selectdb   where `manugroup`=$manugroup";   
 break;
 case "2":    
 $sql="select nsn from   $selectdb   where `snid`=$nsn"; 
 break;
 } 
 
 $result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MI_NEODWADMIN_DATAISNOTAVAILABLE . $xoopsDB->errno() . " : " . $xoopsDB->error());
 
  while(list($nsna) = $xoopsDB -> fetchRow($result)){    
  $b.=$nsna.';';
   	}    	
   	
   	
  
  return $k=$nsn.';'.$b;	
		}  
		
			}  
	
	

	
	?>