<?php

include_once './../../include/config.php';
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
check_token($_REQUEST['token']);
$data = $_POST;
$password = md5($data['password']);
$sql = "INSERT INTO `user`("
        . "`user_id`,"
        . " `username`,"
        . " `password`,"
        . " `fname`,"
        . " `lname`,"
        . " `e-mail`,"
        . " `telephone`,"
        . " `user_type_id`,"
        . " `status`,"
        . " `register_date`,"
        . " `last_login`,"
        . " `org_id`) "
        . "VALUES "
        . "(NULL,"
        . pq($data['username']) . ", "
        . pq($password) . ", "
        . pq($data['fname']) . ", "
        . pq($data['lname']) . ", "
        . pq($data['email']) . ", "
        . pq($data['telephone']) . ", "
        . pq($data['user_type_id']) . ","
        . pq('disactive') . ","
        . "NOW(),"
        . "NOW(),"
        . pq($data['org_id']) . ");";
mysqli_query($db, $sql);
if (mysqli_affected_rows($db) > 0) {
    $res = array(
        'message' => 'เพิ่มข้อมูลสำเร็จ',
        'business_id' => mysqli_insert_id($db)
    );
    echo json_encode($res);
} else {
    $error = "ไม่สามารถเพิ่มข้อมูลได้ : " . mysqli_error($db) . " : " . $sql;
    echo json_encode($error);
}