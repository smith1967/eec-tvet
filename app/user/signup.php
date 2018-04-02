<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');
$active = 'user';
$subactive = 'signup';
$title = 'ลงทะเบียนผู้ใช้';
//
if (isset($_POST['submit'])) {
    $data = $_POST;
    $valid = do_validate($data);  // check ความถูกต้องของข้อมูล
    if (!$valid) {
        foreach ($data as $k => $v) {
            $$k = $v;  // set variable to form
        }
    } else {
        do_save();  // ไม่มี error บันทึกข้อมูล
    }
} else {
    $username = '';
    $lname = '';
    $fname = '';
    $password = '';
    $confirm_password = '';
    $email = '';
    $phone = '';
}

// จัดการข้อมูลกับด้าน logic
$content_header = array(
    'header' => 'ผู้ใช้งาน',
    'subheader' => 'ลงทะเบียน',
    'breadcrumb' => 'ลงทะเบียน'
);
?>
<?php
require_once('template/header.php')
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <!-- แก้ไขหัวข้อเรื่อง -->
        <h1>
            <?php echo $content_header['header'] ?>
            <small><?php echo $content_header['subheader'] ?></small>
        </h1>
        <!-- แก้ไข breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
            <li class="active"><?php echo $content_header['breadcrumb'] ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <p id="message"></p>
            </div>
        </div>
        <!-- เรียกใช้ views ตั้งชื่อ ตาม folder/finename หลัก -->
        <?php
        require_once 'views/' . $ctrl_act . '.php';
        ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer-section -->
<?php require_once 'template/footer.php'; ?>

<!-- js function -->
<!-- เรียกใช้ js ตั้งชื่อ ตาม folder/finename หลัก -->
<script>
<?php require_once 'js/' . $ctrl_act . '.js'; ?>
</script>
<?php

// function section

function do_save() {
    global $db;
    $data = &$_POST;
    $password = md5($data['password']);
    //var_dump($data);
    //die();
    $sql = "INSERT INTO `user` ("
            . "`user_id`, "
            . "`username`, "
            . "`password`, "
            . "`fname`, "
            . "`lname`, "
            . "`email`, "
            . "`phone`, "
            . "`school_id`, "
            . "`user_type_id`, "
            . "`register_date`, "
            . "`status`"
            . ") VALUES ("
            . "NULL, "
            . pq($data['username']) . ", "
            . pq($password) . ", "
            . pq($data['fname']) . ", "
            . pq($data['lname']) . ", "
            . pq($data['email']) . ", "
            . pq($data['phone']) . ", "
            . pq($data['school_id']) . ", "
            . pq($data['user_type_id']) . ","
            . "NOW(),"
            . "'N');";
//    die("sql: " . $sql);
    mysqli_query($db, $sql);
    if (mysqli_affected_rows($db) > 0) {
        set_info('ลงทะเบียนข้อมูลเรียบร้อย');
//        $_SESSION['info'] = "ลงทะเบียนเรียบร้อยครับ";
        redirect('app/home/index');
    } else {
        set_err("ลงทะเบียนไม่สำเร็จ กรุณาตรวจสอบข้อมูล" . mysqli_error($db));
//        $_SESSION['error'] = "ลงทะเบียนไม่สำเร็จ กรุณาตรวจสอบข้อมูล" . mysqli_error($db) . $sql;
        redirect('app/user/signup');
    }
    /* close statement and connection */
    //redirect();
}

function get_info($mem_id) {
    global $db;
    $query = "SELECT * FROM member WHERE mem_id='" . pq($mem_id + 0) . "'";
    $res = mysqli_query($db, $query);
    return $res;
}

function do_validate($data) {
//    var_dump($data);
    global $db;
    $valid = TRUE;
    if (!preg_match('/^[a-zA-Z0-9_@]{5,15}$/', $data['username'])) {
        set_err('ชื่อผู้ใช้ต้องเป็นตัวเลขหรือตัวอักษรภาษาอังกฤษ ความยาวไม่ต่ำกว่า 5 ตัวอักษร');
        $valid = FALSE;
    }
    $sql = "SELECT username FROM user WHERE username = " . pq($data['username']);
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        set_err('ชือผู้ใช้นี้ถูกใช้ไปแล้ว');
        $valid = FALSE;
    }

    if (!preg_match('/^[a-zA-Z0-9_@$!]{6,}$/', $data['password'])) {
        set_err('รหัสผ่านต้องเป็นตัวเลขหรือตัวอักษรภาษาอังกฤษ ความยาวไม่ต่ำกว่า 6 ตัวอักษร');
        $valid = FALSE;
    }
    if (!preg_match('/^[0-9]{10}$/', $data['school_id'])) {
        set_err('รหัสสถานศึกษาไม่ถูกต้อง');
        $valid = FALSE;
    }
    if ($data['password'] != $data['confirm_password']) {
        set_err('รหัสยืนยันไม่ตรงกับรหัสผ่าน');
        $valid = FALSE;
    }
    if ($data['password'] == $data['username']) {
        set_err('ชื่อผู้ใช้กับรหัสผ่านต้องไม่เหมือนกัน');
        $valid = FALSE;
    }
    if (empty($data['fname'])) {
        set_err('กรุณาใส่ชื่อ');
        $valid = FALSE;
    }
    if (empty($data['lname'])) {
        set_err('กรุณาใส่นามสกุล');
        $valid = FALSE;
    }
//    if (check_confirm_password($data['confirm_password'])) {
//        set_err('ตรวจสอบรหัสบัตรประชาชนให้ถูกต้องครับ');
//        $valid = FALSE;
//    }
    if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) == FALSE) {
        set_err('รูปแบบอีเมล์ไม่ถูกต้อง');
        $valid = FALSE;
    }
    $sql = "SELECT username FROM user WHERE email = " . pq($data['email']);
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        set_err('อีเมล์นี้ถูกใช้ไปแล้');
        $valid = FALSE;
    }
    if (!preg_match('/[0-9_-]{8,}/', $data['phone'])) {
        set_err('กรุณาใส่หมายเลขโทรศัพท์');
        $valid = FALSE;
    }
    if (empty($data['agree'])) {
        set_err('กรุณายืนยันข้อมูล');
        $valid = FALSE;
    }
    return $valid;
    /* ----End Validate ---- */
}
