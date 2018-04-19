<?php
$upFile = $_FILES['file'];
function creaDir($dirPath)
{
    $curPath = dirname(__FILE__);
    $path = $curPath . '\\' . $dirPath;
    if (is_dir($path) || mkdir($path, 0777, true)) {
        return $dirPath;
    }
}
if ($upFile['error'] == 0 && !empty($upFile)) {
    $dirpath = creaDir('../public/upload');
    $filename = $_FILES['file']['name'];
    $nameCur = explode('.', $filename);
    $filename = time() . '.' . $nameCur['1'];
    $queryPath = './' . $dirpath . '/' . $filename;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $queryPath)) {
        echo './public/upload/' . $filename;
    }
}

