<?php

class mysqlDB {

    private $host;
    private $port;
    private $username;
    private $password;
    private $charset;
    private $dbname;
    private $link;

    private static $self;

 
    static function getInstance($config) {
        if (!isset(self::$self)) {
            self::$self = new mysqlDB($config);
            
        }
        return self::$self;
    }


    private function __construct($config) {
        $this->host = isset($config['host']) ? $config['host'] : '127.0.0.1';
        $this->port = isset($config['port']) ? $config['port'] : '3306';
        $this->username = isset($config['username']) ? $config['username'] : 'root';
        $this->password = isset($config['password']) ? $config['password'] : 'root';
        $this->dbname = isset($config['dbname']) ? $config['dbname'] : 'douban';
        $this->charset = isset($config['charset']) ? $config['charset'] : 'utf8';
        $this->link = $this->getConnect();
        $this->selectDb($this->dbname);
        $this->setCharset($this->charset);
    }

    function getConnect() {
        $link = mysqli_connect($this->host, $this->username, $this->password, $this->dbname, $this->port);
        return $link;
    }

    //设置字符集方法
    public function setCharset($charset) {
        mysqli_set_charset($this->link, $charset);
    }

    //选择数据库方法
    public function selectDb($dbname) {
        mysqli_select_db($this->link, $dbname);
    }

    //这个方法能够执行任何sql语句
    public function query($sql) {
        if (!$result = mysqli_query($this->link, $sql)) {
            echo "执行失败。<br>";
            echo "失败的sql语句为" . $sql . "<br>";
            echo "出错信息为：" . mysql_error() . "<br>";
            echo "错误编号为：" . mysql_errno();
            die();
        }
        return $result;
    }

    //用来获得多行数据的查询方法
    public function getAll($sql) {
        $result = $this->query($sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        return $rows;
    }
    //获得一条数据的查询方法
    //select * from XXX where id=1;
    public function getRow($sql) {
        $result = $this->query($sql);
        
        while ($r = mysqli_fetch_assoc($result)) {
            return $r;
        }
        return false;
    }
    //获得一行一列的查询
    //select count(*) as c from XXX;
    public function getone($sql){
       $result =$this->query($sql);
       $row=mysqli_fetch_row($result);
       if($result==false){
           return false;
       }
       return $row[0];
    }
}
?>