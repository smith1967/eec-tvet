<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');
$active = 'user';
$subactive = 'login';
$title = 'เข้าระบบ';
// check post data
if (isset($_POST['submit'])) {
    $data = $_POST;
    do_login($data);
}
// จัดการข้อมูลกับด้าน logic
$content_header = array(
    'header' => 'ผู้ใช้งาน',
    'subheader' => 'Signup',
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

// functions section 
function do_login($data) {
    global $db;
    $strHash = create_password_hash(md5($data['password']), PASSWORD_DEFAULT);
    $query = "SELECT * FROM user WHERE username = " . pq($data['username']) . " AND status = 'Y'";
    $result = mysqli_query($db, $query);
    if ($result) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (verify_password_hash($row['password'], $strHash)) {
            unset($row['password']);
            $_SESSION['user'] = $row;
//            $_SESSION['user']['token'] = urlencode($strHash);
//            var_dump($strHash);
            //Generate a random string.
            $token = openssl_random_pseudo_bytes(16);

            //Convert the binary data into hexadecimal representation.
            $token = bin2hex($token);
            $_SESSION['user']['token'] = $token;
            do_insert_log($data['username'], 'Y', $token);
            set_info('ยินดีต้อนรับคุณ' . $row['fname']);
//            die();
        } else {
            do_insert_log($data['username'], 'N', '');
            set_err("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!!");
            redirect('app/user/login');
        }
    } else {
        do_insert_log($data['username'], 'N', '');
        set_err("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!!");
    }
    redirect('app/home/index');
}

function do_insert_log($username, $event, $token) {
    global $db;
    $query = "INSERT INTO `access_log` ("
            . "`id`, "
            . "`username`, "
            . "`token`, "
            . "`event`, "
            . "`ip_address`, "
            . "`user_agent` "
            . ") VALUES ("
            . "NULL, "
            . pq($username) . ", "
            . pq($token) . ", "
            . pq($event) . ","
            . pq($_SERVER['REMOTE_ADDR']) . ", "
            . pq($_SERVER['HTTP_USER_AGENT']) . ")";
//    var_dump($query);
//    die();
    $result = mysqli_query($db, $query);
    if (mysqli_error($db)) {
        set_err('ไม่สามารถบันทึกข้อมูลได้ : ' . mysqli_error($db));
    }
}
