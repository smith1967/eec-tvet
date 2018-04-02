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
  $req_id=$_GET["req_id"];  

  $sql1="DELETE FROM `new_shortcourses` where req_id='$req_id'"; 
  //echo $sql1;
  $results1 = $db->query($sql1);
  
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        สถานประกอบการต้องการเปิดการอบรมหลักสูตรใหม่
        <small>
          <a href="index.php?extention/frm_new_shot_course">
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
//req_id   business_id  course_name   course_description   course_start   course_hour   school_1_id  school_2_id  school_3_id  spacial_condition
            $sql1=("SELECT * FROM `new_shortcourses` where business_id='$business_id' order by course_start ");
            //echo $sql1."<br>";
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
                      <th class="text-center">ชื่อหลักสูตรใหม่</th>
                      <th class="text-center">คำอธิบายรายวิชา</th>                     
                      <th class="text-center">ชั่วโมงอบรม</th>
                      <th class="text-center">วันที่อบรม</th> 
                      <th class="text-center">ชื่อวิทยาลัยที่ต้องการให้เปิดสอน</th>  
                      <th class="text-center">รายละเอียดเพิ่มเติม</th>   
                      <th class="text-center">กระทำ</th>            
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
//req_id   business_id  course_name   course_description   course_start   course_hour   school_1_id  school_2_id  school_3_id  spacial_condition
                    if($results1->num_rows > 0){  
                      $count1=0;
                      while($row1 = $results1->fetch_assoc()) {
                        $req_id=$row1["req_id"];
                        $course_name=$row1["course_name"];
                        $course_description=$row1["course_description"];
                        $course_start=$row1["course_start"];
                        $course_hour=$row1["course_hour"];                        
                        $school_1_id=$row1["school_1_id"];
                        $school_2_id=$row1["school_2_id"];
                        $school_3_id=$row1["school_3_id"];
                        $spacial_condition=$row1["spacial_condition"];
                        $count1++;

                        $sql2=("SELECT * FROM `school` where school_id='$school_1_id' ");
                        //echo $sql2."<br>";
                        $results2 = $db->query($sql2);
                        if($results2->num_rows > 0){  
                          $row2 = $results2->fetch_assoc();
                          $school_name1=$row2["school_name"];                          
                        }else{
                          $school_name1="";
                        }

                        $sql2=("SELECT * FROM `school` where school_id='$school_2_id' ");
                        //echo $sql2."<br>";
                        $results2 = $db->query($sql2);
                        if($results2->num_rows > 0){  
                          $row2 = $results2->fetch_assoc();
                          $school_name2=$row2["school_name"];                          
                        }else{
                          $school_name2="";
                        }

                        $sql2=("SELECT * FROM `school` where school_id='$school_3_id' ");
                        //echo $sql2."<br>";
                        $results2 = $db->query($sql2);
                        if($results2->num_rows > 0){  
                          $row2 = $results2->fetch_assoc();
                          $school_name3=$row2["school_name"];                          
                        }else{
                          $school_name3="";
                        }
                                      
                        ?>
                        <tr >
                          <td><?php echo $count1;?></td>                          
                          <td><?php echo $course_name;?></td>
                          <td><?php echo $course_description;?></td>
                          <td><?php echo $course_hour;?></td> 
                          <td><?php echo $course_start;?></td>           
                          <td><?php echo $school_name1;?><br>
                          <?php echo $school_name2;?><br>
                          <?php echo $school_name3;?></td>
                          <td><?php echo $spacial_condition;?></td>  
                          <td>
                            <small>
                              <a href="index.php?extention/main_new_shot_course&act=del&req_id=<?php echo $req_id;?>" onclick="return confirm('ลบ?');">
                                <button class="btn btn-sm btn-danger">
                                  <i class="fa  fa-times"></i>
                                </button>    
                              </a>
                            </small>
                            <small>
                              <a href="index.php?extention/edit_new_shot_course&req_id=<?php echo $req_id;?>" >
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
