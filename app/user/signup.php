<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');
$active = 'user';
$subactive = 'signup';
$title = 'ลงทะเบียนผู้ใช้';
$token = gen_token();
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
