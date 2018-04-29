<?php
include_once XOOPS_ROOT_PATH . "/modules/neothemesadmin/function.php";

$keywordid=isset($_REQUEST['keyword'])?$_REQUEST['keyword']:"";


//引入neothemeskeyword資料表單一筆
//引入模組DB函數-初始化設定
$dbneme="neothemeskeyword";
$where=" where `keywordid` = '".$xoops_dirname."'";
$keyword=moduledb($dbneme,$where);




//引入當前網址
$httphosturl=httphosturl($keywordid);

if($xoops_dirname==$keyword['keywordid']){
//切割陣列
$keywordcenter=cuttingfunction($keyword['keywordcenter'],$sign=',');	
foreach($keywordcenter as $key=> $val){
if(!empty($val)){	
$keywordlabel.="<strong><a title='".$val."' class='btn btn-info btn-sm active' href='".$httphosturl['url']."".$httphosturl['querytrue']."keyword=".$val."'>".$val."</a></strong> ";
}
}	
if(!empty($keywordid)){
$keyword['title']=$keywordid;
}

$this->assign("meta_keywords", $keywordlabel);
$xoopsTpl->assign("xoops_meta_keywords", $keyword['keywordcenter']);
$xoopsTpl->assign("seotitle", $keyword['title']);
//引入關鍵字輸出函數
//$xoops_meta_description="",$image=""
keywordsfunction($keyword['wdescription']);



$keywordname=true;
}


//引入neothemeskeyword資料表全部資料
$dbneme="neothemeskeyword";
$where=" order by  nsn DESC";
$keywordwhile=databasetablewhile($dbneme,$where);
foreach($keywordwhile as $key=> $val){
if($keywordwhile[$key]['keywordid']==modules and $keywordname!=true){
	

//切割陣列
$keywordcenter=cuttingfunction($keywordwhile[$key]['keywordcenter'],$sign=',');	

foreach($keywordcenter as $key2=> $val2){
if(!empty($val2)){	
$keywordlabel.="<strong><a title='".$val2."' class='btn btn-info btn-sm active' href='".$httphosturl['url']."".$httphosturl['querytrue']."keyword=".$val2."'>".$val2."</a></strong> ";
}
}

if(!empty($keywordid)){
$keywordwhile[$key]['title']=$keywordid;
}

$this->assign("meta_keywords", $keywordlabel);
$xoopsTpl->assign("xoops_meta_keywords", $keywordwhile[$key]['keywordcenter']);
$xoopsTpl->assign("seotitle", $keywordwhile[$key]['title']);
//引入關鍵字輸出函數
//$xoops_meta_description="",$image=""
keywordsfunction($keywordwhile[$key]['wdescription']);
//引入關鍵字輸出函數

}
}






include "metahank.php";


?>