<?php
include 'mysqlDB.class.php';
include 'Response.class.php';
$col = $_GET['col'];
$value = $_GET['value'];
$id = $_GET['id'];
$sqldb = mysqlDB::getInstance([]);
if($col=="sex"){
    $sql = "update users set $col=$value where id=$id   ";
}
else{
     $sql = "update users set $col='$value' where id=$id   ";
}
if($sqldb->query($sql)){
    echo Response::json(200,"更新成功");
}
else{
     echo Response::json(400,"更新失败");
}

?>

