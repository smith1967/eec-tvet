<?php
include_once './../../include/config.php';
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
check_token($_REQUEST['token']);
$token = $_REQUEST['token'];
if (isset($_REQUEST['username']) && $_REQUEST['username'] !== '' && $_REQUEST['password'] !== '') {
    $password = $_REQUEST['password'];
    $username = $_GET['username'];
    $strHash = create_password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM user WHERE username = :username AND status = 'active'";
    //AND status = 'disactive'
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
////    var_dump($result);
//    echo $result['password'];
//    return;
   
    if (verify_password_hash($result['password'], $strHash)) {
        unset($result['password']);
        $_SESSION['user'] = $result;
        $res = array(
            'message' => 'เข้าสู่ระบบสำเร็จ',
            'status' => 'success'
        );
//        do_insert_log($data['username'], 'Y', $token);
//        set_info('ยินดีต้อนรับคุณ' . $res['fname']);
//            die();
    } else {
        $res = array(
            'message' => 'กรุณาตรวจสอบชื่อผู้ใช้งานและรหัสผ่าน',
            'status' => 'fail'
        );
    }
    echo json_encode($res);
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
    
}

