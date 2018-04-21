<?php

include_once './../../include/config.php';
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
//check_token($_REQUEST['token']);
if ($_REQUEST['status'] == 'disactive') {
    $sql = "SELECT count(user_id) AS total_new FROM user WHERE status = 'disactive'";
    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
//    var_dump($result);
    $res = array(
        'message' => $result['total_new'],
        'status' => 'success'
    );
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
    $sql = "SELECT count(user_id) AS total FROM user";
    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
//    var_dump($result);
    $res = array(
        'message' => $result['total'],
        'status' => 'success'
    );
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
//    echo json_encode($data);
    return;
}
    