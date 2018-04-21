<?php
if (!defined('BASE_PATH'))
exit('No direct script access allowed');
$active = 'home';
$subactive = 'index';
$title = 'หน้าหลัก';
?>
<?php
require_once('template/header.php');
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
	  <?php
	  $query="select * from industrial_group";
	  $industrial_data=mysqli_query($db,$query);
		while($row=mysqli_fetch_array($industrial_data)){
	  ?>
			<div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><?php print $row['industrial_gname']; ?></span>
                        <span class="info-box-number"><?php 
						$showScurve=$row['industrial_s_curve']=='first'?"First S-Curve":"New S-Curve";
						print $showScurve;?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
		<?php
		}
		?>
	  </div>
	</section>
</div>

<?php require_once 'template/footer.php'; ?>