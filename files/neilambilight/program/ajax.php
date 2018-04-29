<?php
include "../../../mainfile.php";
$random=(empty($_REQUEST['random']))?"":$_REQUEST['random'];	
/*===網站變大變數=====*/
$zoomsizeiegoogle=(empty($_REQUEST['zoomsizeiegoogle']))?"":$_REQUEST['zoomsizeiegoogle'];
$zoomsize=(empty($_REQUEST['zoomsize']))?"":$_REQUEST['zoomsize'];
$screenwidth=(empty($_REQUEST['screenwidth']))?"":$_REQUEST['screenwidth'];
$exchange=(empty($_REQUEST['exchange']))?"":$_REQUEST['exchange'];


$id=(empty($_REQUEST['id']))?"":$_REQUEST['id'];	
if($id==1){
$_SESSION['profile_post']["random"]=$random;
}

if($id==2){
$_SESSION['themes']['zoom']=$zoomsizeiegoogle;
$_SESSION['themes']['zoomff']=$zoomsize;
$_SESSION['themes']['screenwidth']=$screenwidth;
$_SESSION['themes']['exchange']=$exchange;

}


?>
