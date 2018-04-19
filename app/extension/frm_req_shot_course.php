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
  $school_id=$_POST["school_id"];
  $shortcourse_code=$_POST["shortcourse_code"];  
  $trainee_hour=$_POST["trainee_hour"];
  //$shortcourse_code==$_POST["shortcourse_code"];
  //echo $shortcourse_school_id."<br>";
  //echo $shortcourse_code."<br>";
  $trainee_amount=$_POST["trainee_amount"];
  $date_rang_arr=explode("-",$_POST["date_rang"]);  
  $training_start_date=$date_rang_arr[0];
  $training_end_date=$date_rang_arr[1];
  $status="request";

  $sql1="INSERT INTO `req_shortcourses` (`business_id`, `school_id`, `shortcourse_code`, `trainee_amount`, `training_hour`, `training_start_date`, `training_end_date`, `status`) VALUES ('$business_id', '$school_id', '$shortcourse_code', '$trainee_amount', '$trainee_hour', '$training_start_date', '$training_end_date', '$status');"; 
  $results1 = $db->query($sql1);

redirect('extension/main_req_shot_course');
  
}
//req_id   business_id  school_id  course_id   trainee_amount  training_hour  training_start_date  training_end_date  status 

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        สถานประกอบการสมัครเข้ารับการอบรม/เพิ่ม    
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>
<?php
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
            <!-- form start -->
            <form role="form" method="POST" action="">
              <div class="box-body">                
                <div class="form-group">
                  <label>ชื่อสถานประกอบการ <?php echo $business_id;?></label>                  
                </div>
<?php
//shortcourse_id  course_name   course_hour   course_description  PDF  school_id shortcourse_code

$sql1=("SELECT * FROM `shortcourses` order by school_id,shortcourse_code ");
$results1 = $db->query($sql1);
$count1=0;
?>
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <label>เลือกหลักสูตรที่ต้องการอบรม</label>
                  <select class="form-control select2" name="shortcourse_code">
                    <option value="">--เลือก--</option>
                   <?php
                    if($results1->num_rows > 0){                       
                      while($row1 = $results1->fetch_assoc()) {
                        $school_id = $row1["school_id"];
                        $shortcourse_code = $row1["shortcourse_code"]; 
                        $course_name = $row1["course_name"]; 
                        $course_hour = $row1["course_hour"]; 
                        $count1++;
                        
                        ?>                        
                          <option value="<?php echo $shortcourse_code;?>">
                            <?php echo $count1." ".$course_name;?></option>                          
                        <?php
                      }
                    }
                   ?>
                    
                  </select>
                </div>
          </div>

          <?php
//school_id school_name

$sql1=("SELECT * FROM `school` order by school_id ");
$results1 = $db->query($sql1);
$count2=0;
?>
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <label>ชื่อวิทยาลัยที่เปิดสอน</label>
                  <select class="form-control select2" name="school_id">
                   <option value="">--เลือก--</option>
                   <?php
                    if($results1->num_rows > 0){                       
                      while($row1 = $results1->fetch_assoc()) {
                        $school_id = $row1["school_id"];
                        $school_name = $row1["school_name"];  
						$count2++;
                        ?>                        
                          <option value="<?php echo $school_id;?>">
                            <?php echo $count2." ".$school_name;?> </option>                          
                        <?php
                      }
                    }
                   ?>
                    
                  </select>
                </div>
          </div>

         
          <div class="col-md-6 col-lg-12">     
                <div class="form-group">
                  <label>จำนวนชั่วโมงที่ต้องการอบรม</label>
                  <select class="form-control select2" name="trainee_hour">
                    <option value="">--เลือก--</option>
                    <?php 
                    for($num=1;$num <=300;$num++){
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
                  <label>จำนวนผู้เข้าอบรม</label>
                  <select class="form-control select2" name="trainee_amount">
                    <option value="">--เลือก--</option>
                    <?php 
                    for($num=1;$num <=300;$num++){
                      ?>
                        <option><?php echo $num;?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
          </div>
           <div class="col-md-6 col-lg-12">     
              <!-- Date range -->
              <div class="form-group">
                <label>วันที่เริ่ม-จบอบรม</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date_rang" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
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
      autoclose: true
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
