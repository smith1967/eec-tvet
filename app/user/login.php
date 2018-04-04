<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');
$active = 'user';
$subactive = 'login';
$title = 'เข้าระบบ';
$token = gen_token();
// จัดการข้อมูลกับด้าน logic
$content_header = array(
    'header' => 'ผู้ใช้งาน',
    'subheader' => 'เข้าระบบ',
    'breadcrumb' => 'เข้าระบบ'
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
<script type="text/javascript" src="asset/js/md5.min.js"></script>
    
<script>
<?php require_once 'js/' . $ctrl_act . '.js'; ?>
</script>
