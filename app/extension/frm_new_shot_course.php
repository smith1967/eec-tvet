  <?php
if (!defined('BASE_PATH'))
exit('No direct script access allowed');
$active = 'home';
$subactive = 'index';
$title = 'หน้าหลัก';
// จัดการข้อมูลกับด้าน logic

$business_id="1234";

?>
<?php
require_once('template/header.php');
$act=$_POST["act"];

if($act=="add"){
  //$business_id=$_POST["business_id"];
  $course_name=$_POST["course_name"];  
  $course_description=$_POST["course_description"];
 // echo $course_description."ชช<br>";
  //echo $shortcourse_code."<br>";
  $cd=$_POST["cd"];  
  // echo $cd."==<br>";
  $date_rang=$_POST["date_rang"];
  $course_hour=$_POST["course_hour"];
  $school_id_1=$_POST["school_id_1"];
  $school_id_2=$_POST["school_id_2"];
  $school_id_3=$_POST["school_id_3"];
  $spacial_condition=$_POST["spacial_condition"];
  
$sql1="INSERT INTO `new_shortcourses` (`business_id`, `course_name`, `course_description`, `course_start`, `course_hour`, `school_1_id`, `school_2_id`, `school_3_id`, `spacial_condition`) VALUES ('$business_id', '$course_name', '$cd', '$date_rang', '$course_hour', '$school_id_1', '$school_id_2', '$school_id_3', '$spacial_condition');";

  $results1 = $db->query($sql1);
  redirect('extension/main_new_shot_course');
}

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        สถานประกอบการต้องการเปิดการอบรมหลักสูตรใหม่/เพิ่ม    
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>
<?php
//echo $sql1;
if($act=="add"){
if($results1){
    ?>
    <div class="col-md-12">
          <div class="box box-success  box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">ผลการทำงาน</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              บันทึกข้อมูลสำเร็จ
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    <?php
  }else{
    ?>
    <div class="col-md-12">
          <div class="box box-warning  box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">ผลการทำงาน</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              บันทึกข้อมูลไม่สำเร็จ
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    <?php
  }
}
?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 col-lg-12">
          <!-- general form elements -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">กรุณากรอกข้อมูลให้ครบถ้วน</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start 
            //req_id   business_id  course_name   course_description   course_start   course_hour   school_1_id  school_2_id  school_3_id  spacial_condition

            -->
            <form role="form" method="POST" action="">
              <div class="box-body">                
                <div class="form-group">
                  <label>ชื่อสถานประกอบการ <?php echo $business_id;?></label>                  
                </div>

              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <label for="course_name">ชื่อหลักสูตรที่ต้องการจัดอบรม</label>
                  <input type="text" class="form-control" id="course_name" name="course_name" placeholder="ใส่หลักสูตร">
                </div>
              </div>
             
               <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <label>คำอธิบายรายวิชา</label>
                  <textarea class="form-control" name="cd" rows="3" placeholder="กรอกคำอธิบายรายวิชา"></textarea>
                </div>
              </div>

              <div class="col-md-6 col-lg-12">     
                <div class="form-group">
                  <label>จำนวนชั่วโมงอบรม</label>
                  <select class="form-control select2" name="course_hour">
                    <?php 
                    for($num=1;$num <=200;$num++){
                      ?>
                        <option><?php echo $num;?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-md-6 col-lg-12">                   
                <div class="form-group">
                  <label>วันที่เริ่มอบรม</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="date_rang" class="form-control pull-right" id="datepicker">
                  </div>                  
                </div>
              </div>

              


              <?php
              $sql1=("SELECT * FROM `school` order by school_id");
              $results1 = $db->query($sql1);
              $count1=0;
              ?>
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <label>วิทยาลัยที่ 1</label>
                  <select class="form-control select2" name="school_id_1">
                    <option value="">--เลือก--</option>
                   <?php
                    if($results1->num_rows > 0){                       
                      while($row1 = $results1->fetch_assoc()) {                        
                          $count1++;                          
                          $school_id=$row1["school_id"];
                          $school_name=$row1["school_name"];
                          ?>                        
                          <option value="<?php echo $school_id;?>">
                            <?php echo $count1." ".$school_name;?></option>                          
                        <?php
                      }
                    }
                   ?>
                    
                  </select>
                </div>
              </div>

              <?php
              $sql1=("SELECT * FROM `school` order by school_id");
              $results1 = $db->query($sql1);
              $count1=0;
              ?>
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <label>วิทยาลัยที่ 2</label>
                  <select class="form-control select2" name="school_id_2">
                    <option value="">--เลือก--</option>
                   <?php
                    if($results1->num_rows > 0){                       
                      while($row1 = $results1->fetch_assoc()) {                        
                          $count1++;                          
                          $school_id=$row1["school_id"];
                          $school_name=$row1["school_name"];
                          ?>                        
                          <option value="<?php echo $school_id;?>">
                            <?php echo $count1." ".$school_name;?></option>                          
                        <?php
                      }
                    }
                   ?>
                    
                  </select>
                </div>
              </div>

              <?php
              $sql1=("SELECT * FROM `school` order by school_id");
              $results1 = $db->query($sql1);
              $count1=0;
              ?>
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <label>วิทยาลัยที่ 3</label>
                  <select class="form-control select2" name="school_id_3">
                    <option value="">--เลือก--</option>
                   <?php
                    if($results1->num_rows > 0){                       
                      while($row1 = $results1->fetch_assoc()) {                        
                          $count1++;                          
                          $school_id=$row1["school_id"];
                          $school_name=$row1["school_name"];
                          ?>                        
                          <option value="<?php echo $school_id;?>">
                            <?php echo $count1." ".$school_name;?></option>                          
                        <?php
                      }
                    }
                   ?>
                    
                  </select>
                </div>
              </div>

          <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <label>รายละเอียดเพิ่มเติม</label>
                  <textarea class="form-control" name="spacial_condition" rows="3" placeholder="กรอกรายละเอียด"></textarea>
                </div>
              </div>
           
              <!-- /.form group -->  
               <div class="box-footer">
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <button type="submit" class="btn btn-default pull-right">กลับหน้าหลัก</button>
                <input type="hidden" name="act" value="add">
              </div>
            </form>
          </div>
          <!-- /.box -->


               

              <!-- /.box-footer -->
            </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  <!-- footer-section -->
<?php require_once 'template/footer.php'; ?>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker({
      locale: {
      format: 'YYYY/MM/DD'
        }
    })
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd'
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
