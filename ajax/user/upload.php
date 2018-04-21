<?php

include_once './../../include/config.php';
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');

if (isset($_FILES) && isset($_REQUEST[username]) && $_REQUEST['username'] != '') {
    $user_id = $_REQUEST['user_id'];
    $username = $_REQUEST['username'];
    $file = $_FILES['uploadImage'];

    $uploaddir = BASE_PATH . 'upload/user/image/';
    $thumbnaildir = BASE_PATH . 'upload/user/thumbnail/';
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = $username . '.' . $ext;
//    var_dump($filename);
//    die();   
    if (move_uploaded_file($file['tmp_name'], $uploaddir . $filename)) {
        $count = update_image_url($filename,$username);
        $src_dir = $uploaddir;
        $src_file = $src_dir . $filename;
        $dest_dir = $thumbnaildir;
        $dest_file = $dest_dir . $filename;
        $width = 320;
        $height = 320;
        resize_image($src_file, $dest_file, $width, $height);
        if($count){
            $res = array(
                'message' => "อัพโหลดภาพและแก้ไขข้อมูลสำเร็จ",
                'status' => "success"
            );
        }else{
            $res = array(
                'message' => "อัพโหลดภาพสำเร็จ",
                'status' => "success"
            );            
        }
    } else {
        $res = array(
            'message' => "อัพโหลดภาพไม่สำเร็จ",
            'status' => "fail"
        );
    }

    echo json_encode($res);
}
function update_image_url($image_url,$username){
    global $conn;
    $sql = "UPDATE "
            . "`user` "
            . "SET "
            . "`image_url` = :image_url"
            . " WHERE"
            . " `user`.`username` = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':image_url', $image_url, PDO::PARAM_STR);;
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count;    
}

