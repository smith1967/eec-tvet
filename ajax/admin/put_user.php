<?php

include_once './../../include/config.php';
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
check_token($_REQUEST['token']);
if (isset($_POST['user_id'])) {
    $sql = "UPDATE "
            . "`user` "
            . "SET "
            . "`fname` = :fname,"
            . "`lname` = :lname,"
            . " `email` = :email,"
            . " `telephone` = :telephone,"
            . " `org_id` = :org_id"
            . " WHERE"
            . " `user`.`user_id` = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fname', $_POST['fname'], PDO::PARAM_STR);
    $stmt->bindParam(':lname', $_POST['lname'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
    $stmt->bindParam(':org_id', $_POST['org_id'], PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $_POST['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($stmt) {
        $res = array(
            'message' => "แก้ไขข้อมูลจำนวน $count แถว",
            'status' => "success"
        );
    } else {
        $res = array(
            'message' => "ไม่สามารถบันทึกข้อมูล : " . $stmt->errorInfo(),
            'status' => 'fail'
        );
    }
    echo json_encode($res);
} else {
    $res = array(
        'message' => "ไม่สามารถบันทึกข้อมูล",
        'status' => 'fail'
    );
    echo json_encode($res);
}
