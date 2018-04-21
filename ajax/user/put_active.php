<?php

include_once './../../include/config.php';
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
//check_token($_REQUEST['token']);
if ($_REQUEST['action'] == 'active' && $_REQUEST['user_id'] != '') {
    $sql = "UPDATE `user` SET `status` = 'active' WHERE `user`.`user_id` = :user_id";
//    $sql = "UPDATE user SET status = 'active' WHERE user_id = :user_id";
    // $sql = "SELECT count(user_id) AS total_new FROM user WHERE status = 'disactive'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $_REQUEST['user_id'], PDO::PARAM_INT);
    $stmt->execute();
//    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($stmt) {
        $res = array(
            'message' => "ยืนยันผู้ใช้ $count แถวเรียบร้อย",
            'status' => "success"
        );
    } else {
        $res = array(
            'message' => "ไม่สามารถยืนยันข้อมูล : ". $stmt->errorInfo(),
            'status' => 'fail'
        );
    }
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
//    echo json_encode($data);
    return;
} else if ($_REQUEST['action'] == 'disactive' && $_REQUEST['user_id'] != '') {
    $sql = "UPDATE `user` SET `status` = 'disactive' WHERE `user`.`user_id` = :user_id";
//    $sql = "UPDATE user SET status = 'active' WHERE user_id = :user_id";
    // $sql = "SELECT count(user_id) AS total_new FROM user WHERE status = 'disactive'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $_REQUEST['user_id'], PDO::PARAM_INT);
    $stmt->execute();
//    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($stmt) {
        $res = array(
            'message' => "ยกเลิกผู้ใช้ $count แถวเรียบร้อย",
            'status' => "success"
        );
    } else {
        $res = array(
            'message' => "ไม่สามารถยืนยันข้อมูล : ". $stmt->errorInfo(),
            'status' => 'fail'
        );
    }
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
//    echo json_encode($data);
    return;
}
    