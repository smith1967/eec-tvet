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
  //$shotcourse_code_arr=explode("*",$_POST["shotcourse_codex"]);
  //$shotcourse_school_id=$shotcourse_code_arr[0];
  $shotcourse_code==$_POST["shotcourse_code"];
  //echo $shotcourse_school_id."<br>";
  //echo $shotcourse_code."<br>";
  $trainee_amount=$_POST["trainee_amount"];
  $training_hour=$_POST["training_hour"];
  $date_rang_arr=explode("-",$_POST["date_rang"]);  
  $training_start_date=$date_rang_arr[0];
  $training_end_date=$date_rang_arr[1];
  $status="request";

  $sql1="INSERT INTO `req_shortcourses` (`business_id`, `school_id`, `shotcourse_code`, `trainee_amount`, `training_hour`, `training_start_date`, `training_end_date`, `status`) VALUES ('$business_id', '$school_id', '$shotcourse_code', '$trainee_amount', '$training_hour', '$training_start_date', '$training_end_date', '$status');"; 
  $results1 = $db->query($sql1);
  
}
//req_id   business_id  school_id  course_id   trainee_amount  training_hour  training_start_date  training_end_date  status 

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ขอเปิดสอนหลักสูตรระยะสั้นใหม่      
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
                  <label>ชื่อสถานประกอบการ <?php echo $business_idx;?></label>                  
                </div>
<?php
//shortcourse_id  course_name   course_hour   course_description  PDF  school_id shotcourse_code

$sql1=("SELECT * FROM `shotcourses` order by school_id,shotcourse_code ");
$results1 = $db->query($sql1);
$count1=0;
?>
                <div class="form-group">
                  <label>ชื่อสาขาวิชา</label>
                  <select class="form-control select2" name="shotcourse_code">
                   <?php
                    if($results1->num_rows > 0){                       
                      while($row1 = $results1->fetch_assoc()) {
                        $school_id = $row1["school_id"];
                        $shotcourse_code = $row1["shotcourse_code"]; 
                        $course_name = $row1["course_name"]; 
                        $count1++;
                        ?>                        
                          <option value="<?php echo $shotcourse_code;?>"><?php echo $count1." ".$course_name;?></option>                          
                        <?php
                      }
                    }
                   ?>
                    
                  </select>
                </div>
<?php
// school_id  school_name  address  subdistrict_id  district_id province_id  director_name  deputy_director_1_name  deputy_director_2_name  deputy_director_3_name  deputy_director_4_name  telephone  fax  e-mail  e-office  web_url
$sql2=("SELECT * FROM `school` order by school_id ");
$results2 = $db->query($sql2);
$count2=0;
?>
                <div class="form-group">
                  <label>ชื่อสถานศึกษาที่ต้องการให้เปิด</label>
                  <select class="form-control select2" name="school_id">
                   <?php
                    if($results2->num_rows > 0){                       
                      while($row2 = $results2->fetch_assoc()) {
                        $school_id=$row2["school_id"];
                        $school_name=$row2["school_name"];  
                        $count2++;
                        ?>                        
                          <option value="<?php echo $school_id;?>"><?php echo $count2." ".$school_name;?></option>                          
                        <?php
                      }
                    }
                   ?>
                    
                  </select>
                </div>
               
               
                <div class="form-group">
                  <label>จำนวนผู้เข้าอบรม</label>
                  <select class="form-control" name="trainee_amount">
                    <?php 
                    for($num=1;$num <=200;$num++){
                      ?>
                        <option><?php echo $num;?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>ชั่วโมงที่อบรม</label>
                  <select class="form-control"  name="training_hour">
                    <?php 
                    for($num=1;$num <=200;$num++){
                      ?>
                        <option><?php echo $num;?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <!-- req_id   business_id  school_id  course_id   trainee_amount  training_hour  training_start_date  training_end_date  status  -->

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
