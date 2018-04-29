<?php	
//$browser = $_SERVER['HTTP_USER_AGENT']; 
$browser =$httphosturl['user'];
//將瀏覽器版本的字串取出
if(strpos($browser ,"rv:11")) { 	
$browseraffirmance ="IE11"; } 
elseif(strpos($browser ,"IE 10.0")) { 	
$browseraffirmance ="IE10"; } 
elseif(strpos($browser ,"Firefox")){
$browseraffirmance ="FF";} 
elseif(strpos($browser ,"Chrome")){
$browseraffirmance ="Chrome";} 
else{$browseraffirmance ="NULL";}


//取得網址中檔名
$phpself = $httphosturl['phpself'];

//過濾字串，取出檔名加上標題
if(strpos($phpself ,"notifications.php")) { 	
$this->assign('xoops_pagetitle', _MB_TITLE_NOTIFICATIONS);
}elseif(strpos($phpself ,"search.php")) { 	
$this->assign('xoops_pagetitle', _MB_TITLE_SEARCH);
}




//=========第一判爬蟲==================*/	
$reptile = array('Googlebot','bingbot','Yahoo! Slurp'); //增加需要顯示為true的網路爬蟲
//$browser='Googlebot';
foreach ($reptile as $k){ 
if (strpos("/{$browser}/i", $k) !== false) { 	
 $webreptil=true;
} 
} 

$reptile2 = array('Googlebot-Image'); //增加需要顯示為true的網路爬蟲

foreach ($reptile2 as $k){ 
if (strpos("/{$browser}/i", $k) !== false) { 	
 $webreptil2=true;
} 
} 

$this->assign('webreptil', $webreptil); 
$this->assign('webreptil2', $webreptil2); 	
$this->assign('browser', $browseraffirmance);
?>