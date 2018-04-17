<?php
if (!defined('BASE_PATH'))
exit('No direct script access allowed');
$token = gen_token();
$active = 'user';
$subactive = 'edit';
$title = 'อัพโหลดภาพผู้ใช้';
// จัดการข้อมูลกับด้าน logic
$content_header = array(
    'header' => 'ภาพผู้ใช้',
    'subheader' => 'อัพโหลด',
    'breadcrumb' => 'ภาพผู้ใช้'
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
      <h4>
        <?php echo $content_header['header'] ?>
        <small><?php echo $content_header['subheader'] ?></small>
      </h4>
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
        require_once 'views/'.$ctrl_act.'.php'; 
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
<?php require_once 'js/'.$ctrl_act.'.js'; ?>
</script>