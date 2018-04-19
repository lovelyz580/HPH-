<?php

include 'mysqlDB.class.php';
include 'Response.class.php';
$id = $_POST['id'];
$file = $_FILES['header'];
$fname = $file['name'];
$mysqlDB = mysqlDB::getInstance([]);
if ($fname) {
    $type = strtolower(substr($fname, strrpos($fname, ".") + 1)); //获取后缀
    $allow_type = array("jpg", "jpeg", "png", "png");
    if (!in_array($type, $allow_type)) {
        echo Response::json(300, "类型不符合要求"); //类型不符合
    } else {
        $upload_path = "./public/upload/";
        $newPaht = time() . $fname;
        $images = "/douban/public/upload/" . $newPaht;
        if (move_uploaded_file($file['tmp_name'], $upload_path . $newPaht)) {
            $sql = "update users set photo='$images' where id=$id";
            $res = $mysqlDB->query($sql);
            if ($res) {
                echo Response::json(200, "更新成功", ['path' => $images]);
            } else {
                echo Response::json(500, "更新失败");
            }
        }
        
        else {
            echo Response::json(400, "上传失败");
        }
    }
} else {
    echo Response::json(600, "头像没有上传");
}
    

