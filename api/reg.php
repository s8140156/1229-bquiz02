<?php

include_once "db.php";

// $_POST['acc'];
// $_POST['pw'];
// $_POST['pw2'];
// $_POST['email'];
// 以上這邊是本來就會post進來的資料 所以不用特別寫
//只有以下因資料表沒有欄位要記得unset
unset($_POST['pw2']);
//因為資料表沒有pw2欄位

$User->save($_POST);
//在寫進資料庫前 應該要先檢查資料是否正確