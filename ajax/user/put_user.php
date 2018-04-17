<?php

include_once './../../include/config.php';
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
//check_token($_REQUEST['token']);
if ($_REQUEST['action'] == 'active') {
    $sql = "UPDATE user SET status = 'active' WHERE user_id = :user_id";
    // $sql = "SELECT count(user_id) AS total_new FROM user WHERE status = 'disactive'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($stmt) {
        $res = array(
            'message' => "ยืนยันข้อมูลเรียบร้อย",
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
} else if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] !== '') {
    $user_id = $_REQUEST['user_id'];
    $sql = "SELECT * FROM user WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
    return;
} else {
    $sql = "SELECT * FROM user";
    //AND status = 'disactive'
    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $data[] = $row;
    }
    $i = 0;
    foreach ($data as $key) {
        $data[$i]['button'] = '<button type="button" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#userModal"><i class="fa fa-edit"></i></button>'
                . ' <button type="button" class="btn btn-danger btn-sm btn-confirm"><i class="fa fa-circle"></i></button>';
        $i++;
    }

    $datax = array('data' => $data);
    echo json_encode($datax, JSON_UNESCAPED_UNICODE);
//    echo json_encode($data);
    return;
}
    