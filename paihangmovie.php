<?php

include 'sqlDB.php';
$num=12;
$page = isset($_GET['page'])?$_GET['page']:1;
$start = ($page-1)*$num;

	$typeid = isset($_GET['typeid']) ? $_GET['typeid']:1;
    $sql = "select m.id as mid,m.name as mname,m.date,m.performer,m.brief,m.images,m.score,m.state,m.hot,t.id,t.name as tname 
       from  movie m,type t where m.typeid=t.id and m.typeid = $typeid and m.del=0 and m.status=1 order by score desc  limit $start,$num	 
       ";

$select_page = "select count(*) as c from movie m,type t where  m.typeid=t.id and m.typeid = $typeid and m.del=0 and m.status=1 ";

$rows = executeQuery($select_page);
$movies=executeQuery($sql);
$count = $rows[0]['c'];
$pagecount = floor(($count-1)/$num)+1;
$pre = $page-1<1 ? 1:$page-1;
$next = $page+1>$pagecount ? $pagecount : $page+1;
$pageList = array();
if($pagecount<=5){
    for($i=1;$i<=$pagecount;$i++){
        $pageList[]=$i;
    }
}
else{
    if($page<3){
        for($i=-2;count($pageList)<5;$i++){
            if($page+$i<=$pagecount && $page+$i>=1){
                $pageList[] =$page+$i;
            }
        }
    }
    else{
        for($i=2;count($pageList)<5;$i--){
            if($page+$i<=$pagecount && $page+$i>=1){
                array_splice($pageList, 0,0,$page+$i);
            }
        }
    }
}
$result = ["page" => intval($page),"pre" =>$pre,"next" =>$next,"data" =>$movies,"pageList" =>$pageList];
echo json_encode($result,JSON_UNESCAPED_UNICODE);






?>