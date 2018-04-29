<?php
function analyzefbid($fburl= ""){
	
	
//自動解析FB網址撈出會員ID的方法
$url=$fburl;
$urlarr=parse_url($url); //解析網址
parse_str($urlarr['query'],$parr); // 存成陣列


if(!empty($urlarr[scheme])){ //如果網址中沒有HTTPS才執行以下程式

if (strpos ($url, "-")){ //搜尋網址中有-
  $fduserid=preg_split('/-/',$urlarr[path]);  //將-切割成陣列

$endfduserid=end($fduserid);
$endfduserid=str_replace("/","",$endfduserid); //取得$fduserid陣列最後一組數值並去除/
$fburlfulfill=$endfduserid;

 
}elseif(strpos($url, "?") and !empty($parr[id])){ //搜尋網址中有?
$fburlfulfill=$parr[id]; //輸出ID數值


}elseif(empty($parr[id])){
  $fduserid=explode('/',$urlarr[path]);  //將/切割成陣列
  $endfduserid=next($fduserid);	  
   $fburlfulfill=$endfduserid;	

//die();

}
}else{
$fburlfulfill=$url;	
}


	

 	
	
 return $fburlfulfill;	
	
	
	
	
	
	
}	
		?>