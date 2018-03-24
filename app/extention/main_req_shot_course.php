  <?php
if (!defined('BASE_PATH'))
exit('No direct script access allowed');
$active = 'home';
$subactive = 'index';
$title = 'หน้าหลัก';
// จัดการข้อมูลกับด้าน logic

$business_id="1234";
$act=$_GET["act"];

?>
<?php
require_once('template/header.php');


if($act=="del"){
  $sch_id=$_GET["sch_id"];
  $shc_id=$_GET["shc_id"];

  $sql1="DELETE FROM `req_shortcourses` where business_id='$business_id'and  school_id='$sch_id' and  shortcourse_code='$shc_id' "; 
  //echo $sql1;
  $results1 = $db->query($sql1);
  
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        สถานประกอบการสมัครเข้ารับการอบรม
        <small>
          <a href="index.php?extention/frm_req_shot_course">
            <button class="btn btn-info">
              <i class="fa fa-plus-circle"></i>
            </button>    
          </a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 col-lg-12">
          <!-- general form elements -->
          <div class="box box-warning">
            <?php
            //req_id   business_id  school_id  course_id   trainee_amount  training_hour  training_start_date  training_end_date  status 

            //INSERT INTO `req_shortcourses` (`req_id`, `business_id`, `school_id`, `course_id`, `trainee_amount`, `training_hour`, `training_start_date`, `training_end_date`, `status`) VALUES ('1', '2', '3', '4', '5', '6', '2018-03-05', '2018-03-09', 'request');

            $sql1=("SELECT * FROM `req_shortcourses` where business_id='$business_id' ");
            $results1 = $db->query($sql1);
            ?>                  
  
            <div class="box-header with-border">
              <h3 class="box-title"><? echo "พบข้อมูล ".$results1->num_rows." รายการ ";?></h3>
            </div>
            <div class="box-body">
              <div class="table">
                <table width="100%" class="table datatable  table-striped table-bordered table-hover" >
                  <thead>
                    <tr >
                      <th class="text-center">ลำดับ</th>
                      <th class="text-center">สถานศึกษา</th>
                      <th class="text-center">การอบรม</th>
                      <th class="text-center">จำนวนผู้เข้าอบรม</th>
                      <th class="text-center">ชั่วโมงอบรม</th>
                      <th class="text-center">วันที่อบรม</th> 
                      <th class="text-center">สถานะ</th>   
                      <th class="text-center">กระทำ</th>            
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
//req_id   business_id  school_id  course_id   trainee_amount  training_hour  training_start_date  training_end_date  status 
                    if($results1->num_rows > 0){  
                      $count1=0;
                      while($row1 = $results1->fetch_assoc()) {
                        $req_id=$row1["req_id"];
                        //$business_id=$row1["business_id"];
                        $school_id=$row1["school_id"];
                        $shortcourse_code=$row1["shortcourse_code"];
                        $trainee_amount=$row1["trainee_amount"];
                        $training_hour=$row1["training_hour"];
                        $training_start_date=$row1["training_start_date"];
                        $training_end_date=$row1["training_end_date"];
                        $status=$row1["status"];
                        $count1++;

                        $sql2=("SELECT * FROM `school` where school_id='$school_id' ");
                        //echo $sql2."<br>";
                        $results2 = $db->query($sql2);
                        if($results2->num_rows > 0){  
                          $row2 = $results2->fetch_assoc();
                          $school_name=$row2["school_name"];                          
                        }else{
                          $school_name="ไม่พบข้อมูลวิทยาลัย";
                        }

                        $sql3=("SELECT * FROM `shortcourses` where shortcourse_code='$shortcourse_code' ");
                        //echo $sql3."<br>";
                        $results3 = $db->query($sql3);
                        if($results3->num_rows > 0){  
                          $row3 = $results3->fetch_assoc();
                          $course_name=$row3["course_name"];                          
                        }else{
                          $course_name="ไม่พบข้อมูลการอบรม";
                        }
                                           
                        ?>
                        <tr >
                          <td><?php echo $count1;?></td>                          
                          <td><?php echo $school_name;?></td>
                          <td><?php echo $course_name;?></td>
                          <td><?php echo $trainee_amount;?></td>
                          <td><?php echo $training_hour;?></td>
                          <td><?php echo $training_start_date." ถึง ".$training_end_date;?></td>
                          <td><?php echo $status;?></td>  
                          <td>
                            <small>
                              <a href="index.php?extention/main_req_shot_course&act=del&req_id=<?php echo $req_id;?>&sch_id=<?php echo $school_id;?>&shc_id=<?php echo $shortcourse_code;?>" onclick="return confirm('ลบ?');">
                                <button class="btn btn-sm btn-danger">
                                  <i class="fa  fa-times"></i>
                                </button>    
                              </a>
                            </small>
                            <small>
                              <a href="index.php?extention/edit_req_shot_course&req_id=<?php echo $req_id;?>&sch_id=<?php echo $school_id;?>&shc_id=<?php echo $shortcourse_code;?>" >
                                <button class="btn btn-sm btn-warning">
                                  <i class="fa  fa-pencil"></i>
                                </button>    
                              </a>
                            </small>
                          </td>                                    
                        </tr>
                        <?php
                      }
                    }

                  ?>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
           
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
