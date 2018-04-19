<?php

//用来操作电影的数据
class MovieDao {

    //put your code here
    private $dao;

    function __construct() {
        $this->dao = mysqlDB::getInstance([]);
    }

    function getMovies($size, $start, $state = "") {
        if ($state=="") {
            $sql = "select m.id as mid,m.name as mname,m.date,m.performer,m.brief,m.images,m.score,m.state,m.hot,t.id as tid,t.name as tname 
        from  movie m,type t where m.typeid = t.id  limit $start,$num";

            $select_page = "select count(*) as c from movie m,type t where m.typeid = t.id ";
        } else {
            $state = $_GET['state'];
            $sql = " select m.id as mid,m.name as mname,m.date,m.performer,m.brief,m.images,m.score,m.state,m.hot,t.id as tid,t.name as tname from movie m,type t where m.typeid = t.id and m.state= $state limit $start,$num";
            $select_page = "select count(*) as c from movie m,type t where m.typeid = t.id and t.id and m.state =$state";
        }
    }

}
