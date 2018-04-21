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

  $sql1="DELETE FROM `req_experience` where req_id='$req_id'"; 
  //echo $sql1;
  $results1 = $db->query($sql1);
  
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ความต้องการรับนักศึกษาฝึกอาชีพ(ระบบทวิภาคี)
        <small>
          <a href="index.php?extension/frm_req_experience">
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
//req_trainee : req_id   business_id  major_id  level  amount   gender  both/male/female spacial_condition  training_start   training_end 

//major :   major_id  major_name  type_code  major_eng  industrial            
            $sql1=("SELECT * FROM `req_experience` where business_id='$business_id' order by req_id ");
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
                      <th class="text-center">ชื่อสาขาที่ต้องการ</th>
                      <th class="text-center">ระดับการศึกษา</th>                     
                      <th class="text-center">เพศ</th>
                      <th class="text-center">จำนวน</th> 
                      <th class="text-center">ช่วงเวลาฝึก</th>  
                      <th class="text-center">รายละเอียดเพิ่มเติม</th>   
                      <th class="text-center">กระทำ</th>            
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
//req_experience :   req_id  business_id  major_id  level  amount  gender  spacial_condition  training_start  training_end
                   
                    if($results1->num_rows > 0){  
                     $count2=0;
                      while($row1 = $results1->fetch_assoc()) {
                        $count2++; 
                        $req_id=$row1["req_id"];
                        $major_id=$row1["major_id"];
                        $level=$row1["level"];
                        $amount=$row1["amount"];
                        $gender=$row1["gender"];                        
                        $spacial_condition=$row1["spacial_condition"];
                        $training_start=$row1["training_start"];
                        $training_end=$row1["training_end"];
                        //echo   $count2."==<br>";                     
                                    
                        $sql2=("SELECT * FROM `major` where major_id='$major_id' ");
                        $results2 = $db->query($sql2);  
                        if($results2->num_rows > 0){                       
                          while($row2 = $results2->fetch_assoc()) { 
                              $major_id=$row2["major_id"];
                              $major_name=$row2["major_name"];
                              $type_code=$row2["type_code"];
                              $major_eng=$row2["major_eng"];
                              $industrial=$row2["industrial"];                             
                          }
                        }     
                        if($gender=="m")                  
                          $gender_text="ชาย";
                        else if($gender=="f")                  
                          $gender_text="หญิง";
                        else if($gender=="b")                  
                          $gender_text="ได้ทุกเพศ";
                        else
                          $gender_text="";

                        if($training_semes=="1")                  
                          $ts_text="เทอม1";
                        else if($training_semes=="2")                  
                          $ts_text="เทอม2";
                        else if($training_semes=="3")                  
                          $ts_text="ภาคฤดูร้อน";
                        else
                          $ts_text="ไม่ระบุ";
                        ?>
                        <tr >
                          <td><?php echo $count2;?></td>                          
                          <td><?php echo $major_name;?></td>
                          <td><?php echo $level;?></td>
                          <td><?php echo $gender_text;?></td> 
                          <td><?php echo $amount;?></td>           
                          <td><?php echo $training_start;?> ถึง 
                            <?php echo $training_end;?></td>
                          <td><?php echo $spacial_condition;?></td>  
                          <td>
                            <small>
                              <a href="index.php?extension/main_req_experience&act=del&req_id=<?php echo $req_id;?>" onclick="return confirm('ลบ?');">
                                <button class="btn btn-sm btn-danger">
                                  <i class="fa  fa-times"></i>
                                </button>    
                              </a>
                            </small>
                            <small>
                              <a href="index.php?extension/edit_req_experience&req_id=<?php echo $req_id;?>" >
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
