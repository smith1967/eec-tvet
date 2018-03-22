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
    <!-- Content Header (Page header) ---------------------------------------------------------------->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -------------------------------------------------------------------------------------------------->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
            <div class="box box-primary">


            
                <div class="box-header with-border">
                    <h3 class="box-title">กลุ่มอุตสาหกรรม</h3>
                    <small>เพิ่มข้อมูล</small> 
                </div>
                <!-- /.box-header -->
                
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="industrial_gname">ชื่อสถานประกอบการ</label>
                            <input type="text" class="form-control" id="industrial_gname" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="industrial_s_curve">industrial_s_curve</label>
                            <select class="form-control" name="industrial_s_curve">
                                <option value="first">first s_curve</option>
                                <option value="new">new s_curve</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                
                <div class="box-body">
              <table id="business_list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>รหัส</th>
                                    <th>ชื่อสถานประกอบการ</th>
                                    <th>industrial_s_curve</th>
                                    <th>ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //$data=getDataIndusGroup();
                                $query = "SELECT * FROM `industrial_group`";
                                $result = mysqli_query($db, $query);
                                while($row= mysqli_fetch_array($result)):
                                    ?>
                                <tr>
                                    <td><?php echo $row['industrial_gid']?></td>
                                    <td><?php echo $row['industrial_gname']?></td>
                                    <td><?php echo $row['industrial_s_curve']?></td>
                                </tr>
                                <?php    
                                endwhile;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>รหัส</th>
                                    <th>ชื่อสถานประกอบการ</th>
                                    <th>industrial_s_curve</th>
                                    <th>ดำเนินการ</th>
                                </tr>
                            </tfoot>
                        </table>
            </div>
                
                
            </div><!-- box box-primary -->    
        
        
        
               

              
        </div><!--col-md-6-->
          

         

         
       
        <!--/.col (left) -->
        <!-- right column -->
       
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php require_once 'template/footer.php'; ?>

<?php
function getDataIndusGroup(){
     global $db;
    $query = "SELECT * FROM `industrial_group`";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_array($result);
}
  