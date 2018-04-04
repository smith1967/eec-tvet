/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    var token = '<?php echo $token ?>';
    var url;
    if ($("#staff_eec").is(":checked")) {
        url = "ajax/select2/get_eec.php";
        init_select2();
    }
    if ($("#staff_school").is(":checked")) {
        url = "ajax/select2/get_school.php";
        init_select2();
    }
    if ($("#staff_business").is(":checked")) {
        url = "ajax/select2/get_business.php";
        init_select2();
    }
    $("#staff_eec").on('click', function () {
        $("#org_id").empty();
        url = "ajax/select2/get_eec.php";
        init_select2();
//        console.log(url);
    });
    $("#staff_school").on('click', function () {
        $("#org_id").empty();
        url = "ajax/select2/get_school.php";
        init_select2();
//        console.log(url);
    });
    $("#staff_business").on('click', function () {
        $("#org_id").empty();
        url = "ajax/select2/get_business.php";
        init_select2();
//        console.log(url);
    });


    $.validator.addMethod("PASSWORD", function (value, element) {
        return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/i.test(value);
    }, "รหัสผ่านต้องเป็นตัวอักษรภาษาอังกฤษ 6-20 ตัวอักษร ต้องประกอบด้วยตัวพิมพ์เล็ก ตัวพิมพ์ใหญ่ และตัวเลข อย่างน้อยอย่างละ 1 ตัว.");
    $("#signupForm").validate({
        rules: {
            //                        business_name: "required",
            username: {
                required: true,
                minlength: 4,
                remote: "ajax/check_username.php?token=" + token
            },
            fname: {
                required: true,
                minlength: 4
            },
            lname: {
                required: true,
                minlength: 4
            },
            password: {
                PASSWORD: true
            },
            confirm_password: {
                equalTo: "#password"
            },
            telephone: {
                required: true,
                minlength: 9
            },
            org_id: "required",
            org_name: "required",
            email: {
                required: true,
                email: true
            },
            agree: "required"
        },
        messages: {
            username: {
                minlength: "ชื่อผู้ใช้ต้องมีความยาวไม่น้อยกว่า 4 ตัวอักษร",
                remote: "มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว"
            },
            business_name: "กรุณาใส่ชื่อบริษัท",
            fname: "กรุณาใส่ชื่อ",
            lname: "กรุณาใส่นามสกุล",
            org_id: "กรุณาเลือกองค์กร",
            org_name: "กรุณาเลือกองค์กร",
            email: "กรุณาใส่อีเมล์",
            confirm_password: "รหัสผ่านไม่ตรงกัน",
            agree: "กรุณายืนยันข้อมูล",
            telephone: "กรุณาใส่หมายเลขโทรศัพท์"
        },

        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
        },
        submitHandler: function (form) {
            insertBusiness();
        },
    });
    function insertBusiness() {
        $.ajax({
            type: "POST",
            url: "ajax/user/post_user.php",
            data: $("#signupForm").serialize(),
            //                        {student_name:student_name,student_roll_no:student_roll_no,student_class:student_class},
            dataType: "JSON",
            success: function (data) {
//                alert(data.message);
                $("#show-message").html(data.message).addClass("alert alert-success").show().delay(5000).fadeOut();
//                $("#business_id").val(data.business_id);
//                table.ajax.reload();
//                $("#business-total").html(table.data().count());
            },
            error: function (err) {
                $("#show-message").html(data).addClass("alert alert-danger").show().delay(5000).fadeOut();
            }
        });
        
    }    
    //เรียกใช้งาน Select2
    $(".select2").select2();
    function init_select2() {
        //ดึงข้อมูล province จากไฟล์ get_data.php
        $.ajax({
            url: url,
            dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
            data: {
//                show_province: 'show_province',
                token: '<?php echo $token ?>'
            }, //ส่งค่าตัวแปร show_province เพื่อดึงข้อมูล จังหวัด
            success: function (data) {

                //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data
                $.each(data, function (index, value) {
                    //แทรก Elements ใน id province  ด้วยคำสั่ง append
                    $("#org_id").append("<option value='" + value.id + "'> " + value.name + "</option>");
                });
            }
        });

    }

});
