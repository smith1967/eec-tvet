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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ความต้องการนักศึกษาฝึกงาน
        <small>Preview</small>
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
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">กรุณากรอกข้อมูลให้ครบถ้วน</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">รหัสความต้องการ..........</label>                  
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">ชื่อสถานประกอบการ..........</label>                  
                </div>
                
                <div class="form-group">
                  <label>ชื่อสาขาที่ต้องการ</label>
                  <select class="form-control">
                    <option>เลือก</option>
                    <option>สาขา1</option>
                    <option>สาขา2</option>
                    <option>สาขา3</option>
                    <option>สาขา4</option>
                    <option>สาขา5</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>ระดับการศึกษา</label>
                  <select class="form-control">
                    <option>เลือก</option>
                    <option>ปวช.</option>
                    <option>ปวส.</option>                    
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">เพศ</label>                 
                </div>

                 <!-- select -->
                <div class="form-group">
                  <label>ชาย จำนวน</label>
                  <select class="form-control">
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
                  <label>หญิง จำนวน</label>
                  <select class="form-control">
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
                  <label>ไม่ระบุประเภท จำนวน</label>
                  <select class="form-control">
                    <?php 
                    for($num=1;$num <=200;$num++){
                      ?>
                        <option><?php echo $num;?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>

               
              <!-- Date range -->
              <div class="form-group">
                <label>วันที่เริ่ม-จบฝึกงาน</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
  
                          
                <div class="form-group">
                  <label for="exampleInputPassword1">รายละเอียดเพิ่มเติม</label>
                  <textarea class="form-control" rows="3" placeholder="กรอกรายละเอียดเพิ่มเติม"></textarea>
                </div>

               <div class="box-footer">
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <button type="submit" class="btn btn-default pull-right">กลับหน้าหลัก</button>
                
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
    $('#reservation').daterangepicker()
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
