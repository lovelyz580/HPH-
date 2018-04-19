<?php
//登录
include 'mysqlDB.class.php';
include 'Response.class.php';
 $username = $_GET['username'];
 $pwd = $_GET['pwd'];
 $sql = "SELECT * FROM users where user='$username' and pwd='$pwd'";
 $sqldb = mysqlDB::getInstance([]);
 if($row=$sqldb->getrow($sql)){
     if($row['fh']==0){
     echo Response::json(200,"登录成功",$row);
 }else{
     echo Response::json(300,"此账户也被查封，请与管理员联系",$row);
 }
 }
 else{
      echo Response::json(400,"登录失败",$row);
 }
 
 
 
 
 
 ?>