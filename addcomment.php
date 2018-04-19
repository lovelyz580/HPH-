<?php
include 'sqlDB.php';
$mid = $_POST[ "mid"];
$uid = $_POST[ "uid"];
$comment = $_POST["comment"];
$date = time();
$sql = "insert into comment VALUE (null,'$uid','$mid','$date','$comment')";
if(executeUpdate($sql)){
      $result = array("code"=>1);
   }
else{
    $result = array("code"=>0);
}
echo  json_encode($result,JSON_UNESCAPED_UNICODE);


?>
