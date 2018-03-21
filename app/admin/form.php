<?php
if (!defined('BASE_PATH'))
exit('No direct script access allowed');
$active = 'home';
$subactive = 'index';
$title = 'หน้าหลัก';
// จัดการข้อมูลกับด้าน logic

?>
<?php
require_once('template/header.php')
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- แก้ไขหัวข้อเรื่องและทำ breadcrumb -->
    <section class="content-header">
      <h1>
        Admin Form
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- ใส่ข้อมูลต่างๆที่นี่ เริ่มต้นด้วย class="row" -->
      <!-- Info boxes -->
      <div class="row">

      </div>
      <!-- /.row -->
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- js function   -->
<script>
</script>
<!-- footer-section -->
<?php require_once 'template/footer.php'; ?>
<!-- functions -->
fuction get_data(){

}