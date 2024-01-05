<?php

include_once "db.php";

// $_GET['type'];

$rows=$News->all(['type'=>$_GET['type'],'sh'=>1]);
foreach($rows as $row){
	echo "<a href='Javascript:getNews({$row['id']})' style='display:block'>";
	// 取得文章列表要使用id(唯一值); 原本文章列表顯示無斷行 使用display:block並排
	echo $row['title'];
	echo "</a>";
}

//如何判斷取的資料是用ajax=>去F12 network確認是否有type:xhr 並重整畫面是不會跳的

?>