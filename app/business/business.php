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
        <div class="col-md-12">
          <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">สถานประกอบการ</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="business_name">ชื่อสถานประกอบการ</label>
                            <input type="text" class="form-control" id="business_name" placeholder="">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                        <div class="form-group">
                            <label for="address">ที่อยู่ เลขที่</label>
                            <input type="text" class="form-control" id="address" placeholder="">
                        </div>
                            </div>
                        </div>    
 
                        <div class="row">
                            <div class="col-md-3">                        
                                <div class="form-group">
                                    <label for="province_id"">จังหวัด</label>
                                        <select class="form-control select2" id="province_id" name="province_id">
                                            <option id="province_id_list"> -- กรุณาเลือกจังหวัด -- </option>
                                        </select>
                                </div>
                            </div>
                        </div>         
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="aumphur_id">อำเภอ</label>

                                    <select class="form-control select2" id="aumphur_id" name="aumphur_id">
                                        <option id="amphur_id_list"> -- กรุณาเลือกอำเภอ -- </option>
                                    </select>

                                </div>                               
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">                        
                                <div class="form-group">
                                    <label for="district_id" class="col-md-1 control-label">ตำบล</label>
                                    <select class="form-control select2" id="district_id" name="district_id">
                                        <option id="district_id_list"> -- กรุณาเลือกตำบล -- </option>
                                    </select>
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label for="industrial_estate_id">นิคมอุตสาหกรรม </label>
                            <select class="form-control" name="industrial_estate_id">
                                <option>....</option>
                                <option>....</option>
                                <option>....</option>
                                <option>อื่นๆ</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>กลุ่มอุตสาหกรรม</label>
                            <select class="form-control" name="industrial_gid">
                                <option>....</option>
                                <option>....</option>
                                <option>....</option>
                                <option>อื่นๆ</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>จำนวนพนักงาน</label>
                            <select class="form-control" name="employee_amount_id">
                                <option>....</option>
                                <option>....</option>
                                <option>....</option>
                                <option>อื่นๆ</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>หมายเลขโทรศัพท์</label>
                            <select class="form-control" name="telephone">
                                <option>....</option>
                                <option>....</option>
                                <option>....</option>
                                <option>อื่นๆ</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="coordinator">ชื่อผู้ประสานงาน</label>
                            <input type="text" class="form-control" id="coordinator" name="coordinator">
                        </div>
                        
                        <div class="form-group">
                            <label for="coordinator_position">ตำแหน่งผู้ประสานงาน </label>
                            <input type="text" class="form-control" id="coordinator_position" name="coordinator_position">
                        </div>
                        
                        <div class="form-group">
                            <label for="coordinator_telephone">หมายเลขโทรศัพท์ผู้ประสานงาน </label>
                            <input type="text" class="form-control" id="coordinator_telephone" name="coordinator_telephone">
                        </div>
                        
                        <div class="form-group">
                            <label for="coordinator_email">E-mail ผู้ประสานงาน</label>
                            <input type="text" class="form-control" id="coordinator_email" name="coordinator_email">
                        </div>
                        
                        <div class="form-group">
                            <label for="coordinator_line_id">LINE ID ผู้ประสานงาน</label>
                            <input type="text" class="form-control" id="coordinator_line_id" name="coordinator_line_id">
                        </div>
                        
                        <div class="form-group">
                            <label for="gps">ตำแหน่งพิกัด GPS </label>
                            <input type="text" class="form-control" id="gps" name="gps">
                        </div>
                        
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            </div>    
              
          </div> <!-- /row -->
    </section>   <!-- /.content -->
  </div>  <!-- /.content-wrapper -->
   <?php require_once 'template/footer.php'; ?>
<script>
    $(function () {
        //เรียกใช้งาน Select2
        $(".select2-single").select2();
        //ดึงข้อมูล province จากไฟล์ get_data.php
        $.ajax({
            url: "<?php echo SITE_URL ?>ajax/get_data.php",
            dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
            data: {show_province: 'show_province'}, //ส่งค่าตัวแปร show_province เพื่อดึงข้อมูล จังหวัด
            success: function (data) {

                //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data
                $.each(data, function (index, value) {
                    //แทรก Elements ใน id province  ด้วยคำสั่ง append
                    $("#province_id").append("<option value='" + value.id + "'> " + value.name + "</option>");
                });
            }
        });


        //แสดงข้อมูล อำเภอ  โดยใช้คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่ #province
        $("#province_id").change(function () {

            //กำหนดให้ ตัวแปร province มีค่าเท่ากับ ค่าของ #province ที่กำลังถูกเลือกในขณะนั้น
            var province_id = $(this).val();

            $.ajax({
                url: "<?php echo SITE_URL ?>ajax/get_data.php",
                dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
                data: {province_id: province_id}, //ส่งค่าตัวแปร province_id เพื่อดึงข้อมูล อำเภอ ที่มี province_id เท่ากับค่าที่ส่งไป
                success: function (data) {

                    //กำหนดให้ข้อมูลใน #amphur เป็นค่าว่าง
                    $("#aumphur_id").text("");

                    //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
                    $.each(data, function (index, value) {

                        //แทรก Elements ข้อมูลที่ได้  ใน id amphur  ด้วยคำสั่ง append
                        $("#aumphur_id").append("<option value='" + value.id + "'> " + value.name + "</option>");
                    });
                    $("#aumphur_id").change();
                }
            });

        });

        //แสดงข้อมูลตำบล โดยใช้คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่  #amphur
        $("#aumphur_id").change(function () {
            //กำหนดให้ ตัวแปร amphur_id มีค่าเท่ากับ ค่าของ  #amphur ที่กำลังถูกเลือกในขณะนั้น
            var amphur_id = $(this).val();
            $.ajax({
                url: "<?php echo SITE_URL ?>ajax/get_data.php",
                dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
                data: {amphur_id: amphur_id}, //ส่งค่าตัวแปร amphur_id เพื่อดึงข้อมูล ตำบล ที่มี amphur_id เท่ากับค่าที่ส่งไป
                success: function (data) {
//                                console.log(JSON.stringify(data))
                    //กำหนดให้ข้อมูลใน #district เป็นค่าว่าง
                    $("#district_id").text("");

                    //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
                    $.each(data, function (index, value) {
                        //แทรก Elements ข้อมูลที่ได้  ใน id district  ด้วยคำสั่ง append
                        $("#district_id").append("<option value='" + value.id + "'> " + value.name + "</option>");

                    });
                    $("#district_id").change();
                }
            });

        });

        //คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่  #district 
        $("#district_id").change(function () {
            var district_id = $(this).val();
            $.ajax({
                url: "<?php echo SITE_URL ?>ajax/get_data.php",
                dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
                data: {district_id: district_id}, //ส่งค่าตัวแปร amphur_id เพื่อดึงข้อมูล ตำบล ที่มี amphur_id เท่ากับค่าที่ส่งไป
                success: function (data) {
//                                console.log(JSON.stringify(data))
                    //กำหนดให้ข้อมูลใน #district เป็นค่าว่าง
//                                $("#postcode").val(JSON.stringify(data));

                    //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
                    $.each(data, function (index, value) {
                        //แทรก Elements ข้อมูลที่ได้  ใน id district  ด้วยคำสั่ง append
//                                   console.log(index);
                        $("#postcode").val(value.id);
//                                $("#district_id").append("<option value='" + value.id + "'> " + value.name + "</option>");
                    });
                }
            });

            //นำข้อมูลรายการ จังหวัด ที่เลือก มาใส่ไว้ในตัวแปร province
            var province = $("#province_id option:selected").text();

            //นำข้อมูลรายการ อำเภอ ที่เลือก มาใส่ไว้ในตัวแปร amphur
            var amphur = $("#aumphur_id option:selected").text();

            //นำข้อมูลรายการ ตำบล ที่เลือก มาใส่ไว้ในตัวแปร district
            var district = $("#district_id option:selected").text();

            //ใช้คำสั่ง alert แสดงข้อมูลที่ได้
//                alert("คุณได้เลือก :  จังหวัด : " + province + " อำเภอ : "+ amphur + "  ตำบล : " + district );
        });
    });

</script>

         
       


  
  
  
  
