<?php
//注册
include 'mysqlDB.class.php';
include 'Response.class.php';
 $username = $_GET['username'];
 $pwd = $_GET['pwd'];
 $sql = "INSERT into users VALUES(null,$username,$pwd,null,null,'/douban/public/upload/name.jpg',2,0)";
 $sqldb = mysqlDB::getInstance([]);
 if($sqldb->query($sql)){
     echo Response::json(200,"注册成功");
 }else{
     echo Response::json(400,"注册失败");
 }
 
 
 
 
 
 ?>