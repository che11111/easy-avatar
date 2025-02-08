<?php
// 从URL中获取文件名参数
if (isset($_GET['s']) && isset($_GET['d'])) {
    // 提取URL中的文件名部分
    $url = $_SERVER['REQUEST_URI'];
    // 分割URL以获取文件名
    $parts = explode('/', $url);
    $filenamePart = end($parts);
    $filenamePart = explode('?', $filenamePart)[0];

    // 定义允许的图片文件扩展名
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
    $imageFound = false;

    // 遍历允许的扩展名，检查图片是否存在
    foreach ($allowedExtensions as $ext) {
        $imagePath = 'img/' . $filenamePart . '.' . $ext;
        if (file_exists($imagePath)) {
            // 图片存在，设置响应头并输出图片内容
            header('Content-Type: image/' . ($ext === 'jpg' ? 'jpeg' : $ext));
            readfile($imagePath);
            $imageFound = true;
            break;
        }
    }

    if (!$imageFound) {
        // 未找到图片，输出404错误信息
        header("HTTP/1.0 404 Not Found");
        echo 'Image not found.';
    }
} else {
    // 缺少必要参数，输出错误信息
    header("HTTP/1.0 400 Bad Request");
    echo 'Invalid request. Missing parameters.';
}
?>