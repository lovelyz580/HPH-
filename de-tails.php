<?php
include "sqlDB.php";
$mid = $_GET['mid'];
//获取电影的详细信息
$sql = "select m.id as mid,m.name as mname,m.date,m.performer,m.brief,m.images,m.score,m.state,m.hot,m.movie,t.id,t.name as tname 
        from  movie m,type t where m.typeid = t.id and  m.id=$mid ";
$movie =  executeQuery($sql);
$sql = "select comment.content,users.Nname,users.photo from comment,users where comment.uid=users.id and mid=$mid order by date desc";
$comments = executeQuery($sql);
$result = array("movie" =>$movie[0],"comments" =>$comments);
echo json_encode($result, JSON_UNESCAPED_UNICODE);