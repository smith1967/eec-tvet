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
$req_id=$_REQUEST["req_id"];
if($act=="esave"){
  //$business_id=$_POST["business_id"];
  $course_name=$_POST["course_name"];  
  //$course_description=$_POST["course_description"];
  $cd=$_POST["cd"];  
  $course_start=$_POST["course_start"];
  $course_hour=$_POST["course_hour"];
  $school_1_id=$_POST["school_1_id"];
  $school_2_id=$_POST["school_2_id"];
  $school_3_id=$_POST["school_3_id"];
  $spacial_condition=$_POST["spacial_condition"];

  $sql1="UPDATE `new_shortcourses` SET  `course_name` = '$course_name', `course_description` = '$cd', `course_start` = '$course_start', `course_hour` = '$course_hour', `school_1_id` = '$school_1_id', `school_2_id` = '$school_2_id', `school_3_id` = '$school_3_id', `spacial_condition` = '$spacial_condition' WHERE `req_id` = '$req_id' ;";
  $results1 = $db->query($sql1);

redirect('extension/main_new_shot_course');
  
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ขอเปิดสอนหลักสูตรระยะสั้นใหม่/แก้ไข 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>
<?php
//echo $sql1;
$sql1=("SELECT * FROM `new_shortcourses` where req_id='$req_id'  ");
//echo $sql1."<br>";
$results1 = $db->query($sql1);

if($results1->num_rows > 0){                       
  while($row1 = $results1->fetch_assoc()) {
    //$req_id=$row1["req_id"];
    $course_name=$row1["course_name"];
    $course_description=$row1["course_description"];
    $course_start=$row1["course_start"];
    $course_hour=$row1["course_hour"];    
    $school_1_id=$row1["school_1_id"];
    $school_2_id=$row1["school_2_id"];
    $school_3_id=$row1["school_3_id"];
    $spacial_condition=$row1["spacial_condition"];
    $count1++;
  }
}else{
  echo "ไม่พบข้อมูลคำร้องขอ";
  return;
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
                  <label for="course_name">ชื่อหลักสูตรที่ต้องการเปิด</label>
                  <input type="text" class="form-control" id="course_name" name="course_name" placeholder="ใส่หลักสูตร" value="<?php echo $course_name;?>">
                </div>
              </div>
             
               <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <label>คำอธิบายรายวิชา</label>
                  <textarea class="form-control" name="cd" rows="3" placeholder="กรอกคำอธิบายรายวิชา"><?php echo nl2br($course_description);?></textarea>
                </div>
              </div>

              <div class="col-md-6 col-lg-12">     
                <div class="form-group">
                  <label>จำนวนชั่วโมงอบรม</label>
                  <select class="form-control select2" name="course_hour">
                    <?php 
                    for($num=1;$num <=200;$num++){
                       if($num==$course_hour)
                        {
                          $sel="selected";
                        }
                        else {
                          $sel="";
                        }
                      ?>
                        <option  <?php echo $sel;?>><?php echo $num;?></option>
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
                    <input type="text" name="course_start" class="form-control pull-right" id="datepicker"  value="<?php echo $course_start;?>">
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
                  <select class="form-control select2" name="school_1_id">
                    <option value="">--เลือก--</option>
                   <?php
                    if($results1->num_rows > 0){                       
                      while($row1 = $results1->fetch_assoc()) {                        
                          $count1++;                          
                          $school_id=$row1["school_id"];
                          $school_name=$row1["school_name"];
                          if($school_id==$school_1_id)
                          {
                            $sel="selected";
                          }
                          else {
                            $sel="";
                          }
                          ?>                        
                          <option value="<?php echo $school_id;?>" <?php echo $sel;?>>
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
                  <select class="form-control select2" name="school_2_id">
                    <option value="">--เลือก--</option>
                   <?php
                    if($results1->num_rows > 0){                       
                      while($row1 = $results1->fetch_assoc()) {                        
                          $count1++;                          
                          $school_id=$row1["school_id"];
                          $school_name=$row1["school_name"];
                          if($school_id==$school_2_id)
                          {
                            $sel="selected";
                          }
                          else {
                            $sel="";
                          }
                          ?>                        
                          <option value="<?php echo $school_id;?>" <?php echo $sel;?>>
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
                  <select class="form-control select2" name="school_3_id">
                    <option value="">--เลือก--</option>
                   <?php
                    if($results1->num_rows > 0){                       
                      while($row1 = $results1->fetch_assoc()) {                        
                          $count1++;                          
                          $school_id=$row1["school_id"];
                          $school_name=$row1["school_name"];
                          if($school_id==$school_3_id)
                          {
                            $sel="selected";
                          }
                          else {
                            $sel="";
                          }
                          ?>                        
                          <option value="<?php echo $school_id;?>" <?php echo $sel;?>>
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
                  <textarea class="form-control" name="spacial_condition" rows="3" placeholder="กรอกรายละเอียด"><?php echo nl2br($spacial_condition);?></textarea>
                </div>
              </div>
           
              <!-- /.form group -->  
               <div class="box-footer">
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <button type="submit" class="btn btn-default pull-right">กลับหน้าหลัก</button>
                <input type="hidden" name="act" value="esave">
                <input type="hidden" name="req_id" value="<?php echo $req_id;?>">
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
