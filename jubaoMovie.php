<?php
include 'mysqlDB.class.php';
include 'Response.class.php';
$mid = $_GET['mid'];
$sql="update movie set jubao=jubao+1 where id=$mid";
$sqldb = mysqlDB::getInstance([]);
if($sqldb->query($sql)){
    echo Response::json(200, "举报成功",['mid'=>$mid]);
}
else{
      echo Response::json(300, "举报失败");
}
            
    ?>


