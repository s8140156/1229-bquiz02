<?php
include_once "db.php";

// $_POST['acc'];
$res=$User->count(['acc'=>$_POST['acc']]);

if($res>0){
	echo 1; //1代表資料存在 所以資料重覆了
}else{
	echo 0;
}




?>