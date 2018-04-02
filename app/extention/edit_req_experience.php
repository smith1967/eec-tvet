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
  $major_id=$_POST["major_id"];
  $level=$_POST["level"];  
  $gender=$_POST["gender"];
  $amount_1=$_POST["amount_1"]; 
  $amount_2=$_POST["amount_2"];
  $amount_3=$_POST["amount_3"]; 
  if(!empty($amount_3)){
    $amount=$amount_3;
    $gender="b";
  }else if(!empty($amount_1)){
    $amount=$amount_1;
    $gender="m";
  }else if(!empty($amount_2)){
    $amount=$amount_2;
    $gender="f";
  }else{
    $amount=0;
    $gender="";
  }
  $spacial_condition=$_POST["spacial_condition"];
  $date_rang_arr=explode("-",$_POST["date_rang"]);  
  $training_start_date=$date_rang_arr[0];
  $training_end_date=$date_rang_arr[1];
  
//req_experience :   req_id  business_id  major_id  level  amount  gender  spacial_condition  training_start  training_end
  $sql1="UPDATE `req_experience` SET  `major_id` = '$major_id', `level` = '$level', `amount` = '$amount', `gender` = '$gender', `spacial_condition` = '$spacial_condition', `training_start` = '$training_start_date' , `training_end` = '$training_end_date' WHERE `req_id` = '$req_id' ;";
  $results1 = $db->query($sql1);

redirect('extention/main_req_experience');
  
}

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ต้องการนักศึกษาฝึกประสบการณ์/แก้ไข      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>
<?php
//echo $sql1."<br>";

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

$sql1=("SELECT * FROM `req_experience` where $business_id='$business_id' and  req_id='$req_id'  ");
//echo $sql1."<br>";
$results1 = $db->query($sql1);

if($results1->num_rows > 0){                       
  while($row1 = $results1->fetch_assoc()) {
    //$business_id = $row1["business_id"];
    $major_idx = $row1["major_id"];
    $levelx = $row1["level"];
    $amountx = $row1["amount"];
    $genderx = $row1["gender"];
    $spacial_conditionx = $row1["spacial_condition"];
    $training_startx=$row1["training_start"];
    $training_endx=$row1["training_end"];
  }
}else{
  echo "ไม่พบข้อมูลคำร้องขอ";
  return;
}

//req_trainee : req_id   business_id  major_id  level  amount   gender  both/male/female spacial_condition  training_semes  
              $sql1=("SELECT * FROM `major` order by major_id");
              $results1 = $db->query($sql1);
              $count1=0;
              ?>
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <label>ชื่อสาขาที่ต้องการ</label>
                  <select class="form-control select2" name="major_id">
                    <option value="">--เลือก--</option>
                   <?php
                    if($results1->num_rows > 0){                       
                      while($row1 = $results1->fetch_assoc()) {                        
                          $count1++;                          
                          $major_id=$row1["major_id"];
                          $major_name=$row1["major_name"];
                          $type_code=$row1["type_code"];
                          $major_eng=$row1["major_eng"];
                          $industrial=$row1["industrial"];

                          if($major_id==$major_idx)
                          {
                            $sel="selected";
                          }
                          else {
                            $sel="";
                          }
                          ?>                        
                          <option value="<?php echo $major_id;?>" <?php echo $sel;?>>
                            <?php echo $count1." ".$major_name;?></option>                          
                        <?php
                      }
                    }
                   ?>
                    
                  </select>
                </div>
              

             
                <div class="form-group">

                  <label>ระดับการศึกษา</label>
                  <select class="form-control select2" name="level">
                    <option value="">--เลือก--</option>
                    <option 
                    <?php 
                    if($levelx=="ปวช.")
                      echo " selected";
                    ?>
                    >ปวช.</option>
                    <option
                     <?php 
                    if($levelx=="ปวส.")
                      echo " selected";
                    ?>
                    >ปวส.</option>   
                    <option
                     <?php 
                    if($levelx=="ป.ตรี")
                      echo " selected";
                    ?>
                    >ป.ตรี</option>                   
                  </select>
                </div>
              
            <?php
             if($genderx=="m"){
                $sel1="selected";
              }else if($genderx=="f"){
                $sel2="selected";
              }else if($genderx=="b"){
                $sel3="selected";
              }
            ?>
             <label>เพศ(เลือกรายการเดียว)</label>
                <div class="form-group">                  
                  <label>เพศชาย จำนวน</label>
                  <select class="form-control select2" name="amount_1"> 
                    <option value="">--เลือก--</option>
                    <?php 
                    for($num=1;$num <=200;$num++){
                       if($num==$amountx)
                          {
                            $sel=$sel1;
                          }
                          else {
                            $sel="";
                          }
                      ?>
                        <option <?php echo $sel;?>><?php echo $num;?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>เพศหญิง จำนวน</label>
                  <select class="form-control select2"  name="amount_2">
                    <option value="">--เลือก--</option>
                    <?php 
                    for($num=1;$num <=200;$num++){
                      if($num==$amountx)
                          {
                            $sel=$sel2;
                          }
                          else {
                            $sel="";
                          }
                      ?>
                        <option <?php echo $sel;?>><?php echo $num;?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>

                 <div class="form-group">
                  <label>ไม่ระบุเพศ จำนวน</label>                  
                  <select class="form-control select2"  name="amount_3">
                    <option value="">--เลือก--</option>
                    <?php 
                    for($num=1;$num <=200;$num++){
                      if($num==$amountx)
                          {
                            $sel=$sel3;
                          }
                          else {
                            $sel="";
                          }
                      ?>
                        <option <?php echo $sel;?>><?php echo $num;?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <?php
//req_trainee : req_id   business_id  major_id  level  amount   gender  both/male/female spacial_condition  training_start   training_end 

                if($training_semesx=="1"){
                $sel1="selected";
              }else if($training_semesx=="2"){
                $sel2="selected";
              }else if($training_semesx=="3"){
                $sel3="selected";
              }else{
                $sel1="";
                $sel2="";
                $sel3="";
              }
 ?>              
              <!-- Date range -->
              <div class="form-group">
                <label>วันที่เริ่ม-จบอบรม</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date_rang" class="form-control pull-right" id="reservation"
                   >
                </div>
              <!-- /.form group -->
  
                          
                <div class="form-group">
                  <label for="">รายละเอียดเพิ่มเติม</label>
                  <textarea class="form-control" rows="3" name="spacial_condition"
                   placeholder="กรอกรายละเอียดเพิ่มเติม">
                     <?php echo $spacial_conditionx;?>
                   </textarea>
                </div>

               <div class="box-footer">
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <a href="index.php?extention/main_req_trainee">
                <button  class="btn btn-default pull-right">กลับหน้าหลัก</button>
              </a>
                <input type="hidden" name="act" value="esave">
                <input type="hidden" name="req_id" value="<?php echo $req_id;?>">
              </div>
            </div>

            </form>
          </div>
          <!-- /.box -->
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
        },
        startDate: '<?php echo $training_startx;?>',
        endDate: '<?php echo $training_endx;?>'
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
