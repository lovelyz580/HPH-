<?php

include 'mysqlDB.class.php';
include 'Response.class.php';
$id = $_POST['uid'];
$title = $_POST['title'];
$content = $_POST['content'];
$file = $_FILES['movie'];
$fname = $file['name'];
$mysqlDB = mysqlDB::getInstance([]);
if ($fname) {
    $upload_path = "public/upload/";
    $newPaht = time() . $fname . ".mp4";
    //$images = "/douban/public/upload/".$newPaht;
    if (move_uploaded_file($file['tmp_name'], $upload_path . $newPaht)) {
        //生成视频的第一帧
        $root = $_SERVER['DOCUMENT_ROOT'];
        $input = $root . "/douban/public/upload/" . $newPaht;
        $images = time() . ".jpg";
        $output = $root . "/douban/public/upload/" . $images;
        $command = "e:/phpstudy/PHPTutorial/WWW/douban/ffmpeg -i $input -y -f image2 -t 0.05 -s 220 *308 $output ";
        shell_exec($command);

        //生成数据库路径
        $moviePath = "/douban/public/upload/" . $newPaht;
        $imagesPath = "/douban/public/upload/" . $images;
        $sql = "INSERT into movie (name,performer,brief,images,typeid,movie,uid,jubao,del,status) VALUES "
                . "('$title','网络红人','$content','$imagesPath',9,'$moviePath',$id,0,0,0)";




        $res = $mysqlDB->query($sql);
        if ($res) {
            echo Response::json(200, "上传成功", []);
        } else {
            echo Response::json(300, "上传失败", []);
        }
    } else {

        echo Response::json(400, "上传失败失败失败失败", [$newPaht]);
    }
}
?>


