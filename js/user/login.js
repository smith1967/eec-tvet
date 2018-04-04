$(function () {
    var token = '<?php echo $token ?>';
    var passwd;
    var url;
//    alert('test');
//    $.validator.addMethod("PASSWORD", function (value, element) {
//        return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/i.test(value);
//    }, "รหัสผ่านต้องเป็นตัวอักษรภาษาอังกฤษ 6-20 ตัวอักษร ต้องประกอบด้วยตัวพิมพ์เล็ก ตัวพิมพ์ใหญ่ และตัวเลข อย่างน้อยอย่างละ 1 ตัว.");
//    
//    $("#login_form").validate({
//        rules: {
//            username: {
//                required: true,
//                minlength: 4
//            },
//
//            password: {
//                PASSWORD: true
//            },
//        },
//        messages: {
//            username: {
//                minlength: "ชื่อผู้ใช้ต้องมีความยาวไม่น้อยกว่า 4 ตัวอักษร",
//            },
//        },
//
//        errorElement: "em",
//        errorPlacement: function (error, element) {
//            // Add the `help-block` class to the error element
//            error.addClass("help-block");
//
//            if (element.prop("type") === "checkbox") {
//                error.insertAfter(element.parent("label"));
//            } else {
//                error.insertAfter(element);
//            }
//        },
//        highlight: function (element, errorClass, validClass) {
//            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
//        },
//        unhighlight: function (element, errorClass, validClass) {
//            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
//        },
//        submitHandler: function (form) {
//            checkLogin();
//        }
//    });
    $("#btnLogin").click(function () {
        //            alert("xxxx");
        checkLogin();
    });
    function checkLogin() {
        url = 'ajax/user/get_user.php';
        passwd = md5($('#password').val());
        $.ajax({            
            url: url,
            dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
            data: {
                username: $('#username').val(),
                password: passwd,
                token: token
            }, //ส่งค่าตัวแปร show_province เพื่อดึงข้อมูล จังหวัด
            success: function (data) {
                if (data.status === 'success') {
                    window.location.href = "<?php echo site_url(); ?>";
                    $("#message").html(data.message).addClass("alert alert-success").show().delay(5000).fadeOut();
                } else {
                    $("#show-message").html(data.message).addClass("alert alert-danger").show().delay(5000).fadeOut();
                }
            },
            error: function (err) {
                $("#show-message").html(err).addClass("alert alert-danger").show().delay(5000).fadeOut();
            }
        });
    }
});
