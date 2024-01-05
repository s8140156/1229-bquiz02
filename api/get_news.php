<?php

include_once "db.php";

$_GET['id'];

$news=$News->find($_GET['id']);
echo $news['news'];
//使用ajax取資料 echo回去即可 這邊取欄位news(文章by該id)


?>