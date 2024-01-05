<?php

include_once "db.php";

$_GET['id'];

$news=$News->find($_GET['id']);
echo nl2br($news['news']);
//使用ajax取資料 echo回去即可 這邊取欄位news(文章by該id)
//nl2br new line to break nl2br()加上斷行符號
//將字串中的換行符號（\n）轉換為 HTML 的斷行標籤（<br>）
// nl2br()函數通常用於處理由使用者輸入或從數據庫檢索的文字，將換行符號轉換為HTML斷行標籤，以便在網頁上正確顯示換行


?>