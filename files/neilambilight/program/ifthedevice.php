<?php	


if(empty($_SESSION["Themefolder"])){

check_mobile();


if(check_mobile()){
$_SESSION["Themefolder"]=phone;
$themefolder=phone;
}else{
$_SESSION["Themefolder"]=computer;
$themefolder=computer;
}
}

if(empty($_SESSION["Themefolder"])){
$this->assign('themefolder', $themefolder);
}else{
$this->assign('themefolder', $_SESSION["Themefolder"]);
}


?>