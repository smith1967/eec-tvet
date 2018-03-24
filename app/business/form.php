<?php
if (!defined('BASE_PATH'))
exit('No direct script access allowed');
$active = 'home';
$subactive = 'index';
$title = 'หน้าหลัก';
// จัดการข้อมูลกับด้าน logic
if (isset($_POST['submit'])) {
    $data = $_POST;    
//    var_dump($data);
//    die();
//    $valid = do_validate($data);  // check ความถูกต้องของข้อมูล
//    foreach ($_POST as $k => $v) {
//        $$k = $v;
//    }  //    var_dump($property);
//    $valid = TRUE;
//    if ($valid) {
        do_insert();
//    }
}
//if (isset($_GET['action']) && $_GET['action'] == 'delete') {
//    do_delete($_GET['business_id']);
//}

?>
<?php
require_once('template/header.php')
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) ---------------------------------------------------------------->
    <section class="content-header">
      <h1>
        สถานประกอบการ
        <small>เพิ่มข้อมูล</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>สถานประกอบการ</a></li>
        <!--<li><a href="#">Forms</a></li>-->
        <li class="active">เพิ่มข้อมูล</li>
      </ol>
    </section>

    <!-- Main content -------------------------------------------------------------------------------------------------->
    <section class="content">
      <div class="row">
          <div class="col-md-12">
              <p id="message"></p>                
          </div>
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">สถานประกอบการ</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="businessForm">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_name">ชื่อสถานประกอบการ</label>
                                    <input type="text" class="form-control" id="business_name" placeholder="" name="business_name" value="<?php set_var($business_name)?>">
                                </div>
                            </div>
                        </div>   

                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="address">ที่อยู่ เลขที่</label>
                                    <input type="text" class="form-control" id="address" placeholder="" name="address" value="<?php set_var($address)?>">
                                </div>
                            </div>
                        </div>    
 
                        <div class="row">
                            <div class="col-md-3">                        
                                <div class="form-group">
                                    <label for="province_code"">จังหวัด</label>
                                        <select class="form-control select2" id="province_code" name="province_code">
                                            <option id="province_code_list"> -- กรุณาเลือกจังหวัด -- </option>
                                        </select>
                                </div>
                            </div>
                        </div>         
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="district_code">อำเภอ</label>

                                    <select class="form-control select2" id="district_code" name="district_code">
                                        <option id="district_code_list"> -- กรุณาเลือกอำเภอ -- </option>
                                    </select>

                                </div>                               
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">                        
                                <div class="form-group">
                                    <label for="district_id">ตำบล</label>
                                    <select class="form-control select2" id="subdistrict_code" name="subdistrict_code">
                                        <option id="subdistrict_code_list"> -- กรุณาเลือกตำบล -- </option>
                                    </select>
                                </div>
                            </div>
                        </div>   
                        
                        <div class="row">
                            <div class="col-md-6">                        
                                <div class="form-group">
                                    <label for="industrial_estate_id">นิคมอุตสาหกรรม </label>
                                    <select class="form-control select2" name="industrial_estate_id">
                                        <?php
                                        $def = isset($industrial_estate_id) ? $industrial_estate_id : '2';
                                        $sql = "SELECT industrial_estate_id,industrial_estate_name FROM industrial_estate ORDER BY industrial_estate_id ASC";
                                        echo gen_option($sql, $def)
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>                          

                        
                        <div class="row">
                            <div class="col-md-6">                        
                                <div class="form-group">
                                    <label>กลุ่มอุตสาหกรรม</label>
                                    <select class="form-control select2" name="industrial_gid">
                                        <?php
                                        $def = isset($industrial_gid) ? $industrial_gid : '2';
                                        $sql = "SELECT industrial_gid,industrial_gname FROM industrial_group ORDER BY industrial_gid ASC";
                                        echo gen_option($sql, $def)
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>                          

                        <div class="row">
                            <div class="col-md-3">                        
                                <div class="form-group">
                                    <label>จำนวนพนักงาน</label>
                                    <select class="form-control select2" name="employee_amount_id">
                                        <?php
                                        $def = isset($employee_amount_id) ? $employee_amount_id : '1';
                                        $sql = "SELECT employee_amount_id,amount FROM employee_amount ORDER BY employee_amount_id ASC";
                                        echo gen_option($sql, $def)
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>   
                        
                        <div class="row">
                            <div class="col-md-4">                        
                                <div class="form-group">
                                    <label>หมายเลขโทรศัพท์</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" value="<?php set_var($telephone)?>">
                                </div>
                            </div>
                        </div>                         
                        
                        <div class="row">
                            <div class="col-md-4">                        
                                <div class="form-group">
                                    <label for="coordinator">ชื่อผู้ประสานงาน</label>
                                    <input type="text" class="form-control" id="coordinator" name="coordinator" value="<?php set_var($coordinator)?>">
                                </div>                            
                            </div>
                        </div>     

                        <div class="row">
                            <div class="col-md-4">                        
                                <div class="form-group">
                                    <label for="coordinator_position">ตำแหน่งผู้ประสานงาน </label>
                                    <input type="text" class="form-control" id="coordinator_position" name="coordinator_position" value="<?php set_var($coordinator_position)?>">
                                </div>                         
                            </div>
                        </div>              
                        
                        <div class="row">
                            <div class="col-md-4">                        
                                <div class="form-group">
                                    <label for="coordinator_telephone">หมายเลขโทรศัพท์ผู้ประสานงาน </label>
                                    <input type="text" class="form-control" id="coordinator_telephone" name="coordinator_telephone" value="<?php set_var($coordinator_telephone)?>">
                                </div>                        
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-md-4">                        
                                <div class="form-group">
                                    <label for="coordinator_email">E-mail ผู้ประสานงาน</label>
                                    <input type="text" class="form-control" id="coordinator_email" name="coordinator_email" value="<?php set_var($coordinator_email)?>">
                                </div>                       
                            </div>
                        </div> 
                                              
                        <div class="row">
                            <div class="col-md-4">                        
                                <div class="form-group">
                                    <label for="coordinator_line_id">LINE ID ผู้ประสานงาน</label>
                                    <input type="text" class="form-control" id="coordinator_line_id" name="coordinator_line_id" value="<?php set_var($coordinator_line_id)?>">
                                </div>                      
                            </div>
                        </div> 
                                                
                        <div class="row">
                            <div class="col-md-4">                        
                                <div class="form-group">
                                    <label for="gps">ตำแหน่งพิกัด GPS </label>
                                    <input type="text" class="form-control" id="gps" name="gps" value="<?php set_var($gps)?>">
                                </div>                    
                            </div>
                        </div>                                                     
                    </div>
                    <!--/.box-body-->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="submit">บันทึกข้อมูล</button>
                        <button type="reset" class="btn btn-danger" id="reset" name="reset">ยกเลิกข้อมูล</button>
             
                    </div>
                </form>
            </div>
            </div>    
              
          </div> <!-- /row -->
    </section>   <!-- /.content -->
  </div>  <!-- /.content-wrapper -->
   <?php require_once 'template/footer.php'; ?>
<script>
//    $.validator.setDefaults( {
//            submitHandler: function () {
////                    alert( "submitted!" );
//                form.submit();
//            }
//    } );
    $(function () {
        //  business form
        $("#reset").click(function(){
//            alert("xxxx");
            $("#message").hide();
        });

        $( "#businessForm" ).validate( {
                rules: {
//                        business_name: "required",
                        business_name: {
                                required: true,
                                minlength: 4
                        },
                        address: "required",
                        province_code: "required",
                        district_code: "required",
                        subdistrict_code: "required",
                        industrial_estate_id: "required",
                        industrial_gid: "required",
                        employee_amount_id: "required",
                        coordinator_telephone: {
                                required: true,
                                minlength: 9
                        },
                        telephone: {
                                required: true,
                                minlength: 9
                        },
                        coordinator: {
                                required: true,
                                minlength: 9
                        },
                        coordinator_position: {
                                required: true,
                                minlength: 5,
//                                equalTo: "#password"
                        },
//                        coordinator_email: {
//                                required: true,
//                                minlength: 5,
////                                equalTo: "#password"
//                        },
                        coordinator_email: {
                                required: true,
                                email: true
                        },
//                        agree: "required"
                },
                messages: {
                        business_name: "กรุณาใส่ชื่อบริษัท",
                        address: "กรุณาใส่ที่อยู่",
                        province_code: "กรุณาเลือกจังหวัด",
                        district_code: "กรุณาเลือกอำเภอ",
                        subdistrict_code: "กรุณาเลือกตำบล",
                        industrial_estate_id: "กรุณาเลือกนิคมอุตฯ",
                        industrial_gid: "กรุณาเลือกกลุ่มอุตสาหกรรม",
                        employee_amount_id: "กรุณาเลือกจำนวนลูกจ้าง",
                        telephone: "กรุณาใส่หมายเลขโทรศัพท์",
                        coordinator: "กรุณาใส่ชื่อผู้ประสานงาน",
                        coordinator_telephone: "กรุณาใส่หมายเลขโทรศัพท์",
                        coordinator_position: "กรุณาใส่ตำแหน่งผู้ประสานงาน",
//                        coordinator_email: {
//                                required: true,
//                                minlength: 5,
////                                equalTo: "#password"
//                        },
                        coordinator_email: "กรุณาใส่อีเมล์",
                },

                errorElement: "em",
                errorPlacement: function ( error, element ) {
                        // Add the `help-block` class to the error element
                        error.addClass( "help-block" );

                        if ( element.prop( "type" ) === "checkbox" ) {
                                error.insertAfter( element.parent( "label" ) );
                        } else {
                                error.insertAfter( element );
                        }
                },
                highlight: function ( element, errorClass, validClass ) {
                        $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                        $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                },
                submitHandler: function(form) {
                    insertBusiness();
                },
        } );
        function insertBusiness(){
            $.ajax({
                type: "POST",
                url: "ajax/post_business.php",
                data: $( "#businessForm" ).serialize(),
//                        {student_name:student_name,student_roll_no:student_roll_no,student_class:student_class},
                dataType: "JSON",
                success: function(data) {
                $("#message").html(data);
                    $("#message").addClass("alert alert-success").show();
                },
                error: function(err) {
                    $("#message").addClass("alert alert-danger").show();
                }
            });
        }
        //เรียกใช้งาน Select2
        $(".select2").select2();
        //ดึงข้อมูล province จากไฟล์ get_data.php
        $.ajax({
            url: "<?php echo SITE_URL ?>ajax/get_data.php",
            dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
            data: {show_province: 'show_province'}, //ส่งค่าตัวแปร show_province เพื่อดึงข้อมูล จังหวัด
            success: function (data) {

                //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data
                $.each(data, function (index, value) {
                    //แทรก Elements ใน id province  ด้วยคำสั่ง append
                    $("#province_code").append("<option value='" + value.id + "'> " + value.name + "</option>");
                });

                $("#province_code").val("<?php echo set_var($province_code) ?>");                
                $("#province_code").change();    
            }
        });


        //แสดงข้อมูล อำเภอ  โดยใช้คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่ #province
        $("#province_code").change(function () {
//            alert('district');
            //กำหนดให้ ตัวแปร province มีค่าเท่ากับ ค่าของ #province ที่กำลังถูกเลือกในขณะนั้น
            var province_code = $(this).val();

            $.ajax({
                url: "<?php echo SITE_URL ?>ajax/get_data.php",
                dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
                data: {province_code: province_code}, //ส่งค่าตัวแปร province_code เพื่อดึงข้อมูล อำเภอ ที่มี province_code เท่ากับค่าที่ส่งไป
                success: function (data) {

                    //กำหนดให้ข้อมูลใน #amphur เป็นค่าว่าง
                    $("#district_code").text("");

                    //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
                    $.each(data, function (index, value) {

                        //แทรก Elements ข้อมูลที่ได้  ใน id amphur  ด้วยคำสั่ง append
                        $("#district_code").append("<option value='" + value.id + "'> " + value.name + "</option>");
                    });
                    $("#district_code").val("<?php set_var($district_code) ?>");               
                    $("#district_code").change();
                }
            });

        });

        //แสดงข้อมูลตำบล โดยใช้คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่  #amphur
        $("#district_code").change(function () {
            //กำหนดให้ ตัวแปร district_code มีค่าเท่ากับ ค่าของ  #amphur ที่กำลังถูกเลือกในขณะนั้น
            var district_code = $(this).val();
            $.ajax({
                url: "<?php echo SITE_URL ?>ajax/get_data.php",
                dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
                data: {district_code: district_code}, //ส่งค่าตัวแปร district_code เพื่อดึงข้อมูล ตำบล ที่มี district_code เท่ากับค่าที่ส่งไป
                success: function (data) {
//                                console.log(JSON.stringify(data))
                    //กำหนดให้ข้อมูลใน #district เป็นค่าว่าง
                    $("#subdistrict_code").text("");

                    //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
                    $.each(data, function (index, value) {
                        //แทรก Elements ข้อมูลที่ได้  ใน id district  ด้วยคำสั่ง append
                        $("#subdistrict_code").append("<option value='" + value.id + "'> " + value.name + "</option>");

                    });
                    $("#subdistrict_code").val("<?php set_var($subdistrict_code) ?>"); 
                    $("#subdistrict_code").change();
                }
            });

        });

        //คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่  #district 
        $("#subdistrict_code").change(function () {
            var subdistrict_code = $(this).val();
            $.ajax({
                url: "<?php echo SITE_URL ?>ajax/get_data.php",
                dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
                data: {subdistrict_code: subdistrict_code}, //ส่งค่าตัวแปร district_code เพื่อดึงข้อมูล ตำบล ที่มี district_code เท่ากับค่าที่ส่งไป
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
            var province = $("#province_code option:selected").text();

            //นำข้อมูลรายการ อำเภอ ที่เลือก มาใส่ไว้ในตัวแปร amphur
            var district = $("#district_code option:selected").text();

            //นำข้อมูลรายการ ตำบล ที่เลือก มาใส่ไว้ในตัวแปร district
            var subdistrict = $("#subdistrict_code option:selected").text();

            //ใช้คำสั่ง alert แสดงข้อมูลที่ได้
//                alert("คุณได้เลือก :  จังหวัด : " + province + " อำเภอ : "+ amphur + "  ตำบล : " + district );
        });
    });
    

</script>

       


  
  
  
  
