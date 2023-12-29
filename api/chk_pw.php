<?php
include_once "db.php";

$res=$User->count($_POST);

if($res){
	$_SESSION['user']=$_POST['acc'];
}

echo $res;

// echo $User->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
// $_POST=[acc=>xxx, pw=>xxx]

// echo $res;

// if($res>0){
// 	echo 1; //資料重覆了
// }else{
// 	echo 0;
// }




?>