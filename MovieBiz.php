<?php
include 'MovieDao.php';
class MovieBiz {
    //put your code here
    private $dao;
    function __construct() {
        $this->dao=new MovieDao();
        
    }
    function getMovies($size,$page,$state=""){
        $num=$size;
        $state = ($page-1)*$num;
        $movies = $this->dao->getMovies($num, $start, $state);
        $count = $this->dao->getCount($state);
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
        
    }
    
}
