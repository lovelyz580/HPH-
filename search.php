<?php
//搜索
include "sqlDB.php";
$key = $_GET['key'];
$sql = "select * from movie WHERE name like '%{$key}%'";

$movies=executeQuery($sql);

$result = ["data" =>$movies];
echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>



