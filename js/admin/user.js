$(function () {
    var token = '<?php echo $token ?>';
    var url;
    var org_id;
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
    $("#editForm").validate({
        rules: {
            //                        business_name: "required",
//            username: {
//                required: true,
//                minlength: 4,
//                remote: "ajax/check_username.php?token=" + token
//            },
            fname: {
                required: true,
                minlength: 4
            },
            lname: {
                required: true,
                minlength: 4
            },
//            password: {
//                PASSWORD: true
//            },
//            confirm_password: {
//                equalTo: "#password"
//            },
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
//            username: {
//                minlength: "ชื่อผู้ใช้ต้องมีความยาวไม่น้อยกว่า 4 ตัวอักษร",
//                remote: "มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว"
//            },
//            business_name: "กรุณาใส่ชื่อบริษัท",
            fname: "กรุณาใส่ชื่อ",
            lname: "กรุณาใส่นามสกุล",
            org_id: "กรุณาเลือกองค์กร",
            org_name: "กรุณาเลือกองค์กร",
            email: "กรุณาใส่อีเมล์",
//            confirm_password: "รหัสผ่านไม่ตรงกัน",
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
            update_user();
        },
    });
    function update_user() {
        // alert('test');
        // return;
        $.ajax({
            type: "POST",
            url: "ajax/admin/put_user.php",
            data: $("#editForm").serialize(),
            //                        {student_name:student_name,student_roll_no:student_roll_no,student_class:student_class},
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                if (data.status === 'success') {
                    // window.location.href = "<?php echo site_url('user/login'); ?>";
                    $("#show-message").removeClass();
                    $("#show-message").html(data.message).addClass("alert alert-success").show().delay(5000).fadeOut();
                    table.ajax.reload();
                } else {
                    $("#show-message").removeClass();
                    $("#show-message").html(data.message).addClass("alert alert-danger").show().delay(5000).fadeOut();
                }
            },
            error: function (err) {
                console.log(err);
                $("#show-message").html(err).addClass("alert alert-danger").show().delay(5000).fadeOut();
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
                $('#org_id').val(org_id).change();               
            }
        });

    }

    var table = $('#user_list').DataTable({
        "destroy": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10,
        "ajax": {
            "url": "ajax/user/get_user.php",
            "type": "get",
            "data": function (d) {
                d.token = "<?php echo $token ?>"
//                d.zone_id = $('#zone_id').val();
            }
        },
        "columns": [
            {"data": "user_id"},
            {"data": "fname"},
            {"data": "lname"},
            {"data": "org_name"},
            {"data": "button"},
        ],
        "language": {
            "emptyTable": "ไม่มีรายการข้อมูล",
            "lengthMenu": "แสดง _MENU_ แถวต่อหน้า",
            "zeroRecords": "ไม่มีข้อมูล",
            "info": "กำลังแสดงข้อมูล _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            "search": "ค้นหา:",
            "infoEmpty": "ไม่มีข้อมูลแสดง",
            "infoFiltered": "(ค้นหาจาก _MAX_ total records)",
            "paginate": {
                "first": "หน้าแรก",
                "last": "หน้าสุดท้าย",
                "next": "หน้าต่อไป",
                "previous": "หน้าก่อน"
            }
        },
        // Display total Record
        "initComplete": function (settings, json) {
            var info = this.api().page.info();
            $("#user-total").html(info.recordsTotal);
        }
    });

    var info = table.page.info();

    $.getJSON("ajax/user/get_info.php?status=disactive", function (data) {
        $("#user-new").html(data.message);
    });
    //  active user
    $('#user_list').on('click', '.btn-active', function () {
//        alert('test')
        var url = './ajax/user/put_active.php';
        var id = $(this).parent().siblings(":first").text();
        var data = {
            action: 'active',
            user_id: id,
            token: "<?php echo $token ?>"
        };
        //
        $.getJSON(url, data, function (data, status) {
            //Do stuff with the JSON data
            if (status === 'success') {
                table.row('.active').remove().draw(false);
                table.ajax.reload();
                $("#show-message").text(data).addClass("alert alert-success").show().delay(5000).fadeOut();
                // Display total Record
            }
            //    
        });
        $.getJSON("ajax/user/get_info.php?status=disactive", function (data) {
            $("#user-new").html(data.message);
        });
    });
    // disactive user
    $('#user_list').on('click', '.btn-disactive', function () {
//        alert('test')
        var url = './ajax/user/put_active.php';
        var id = $(this).parent().siblings(":first").text();
        var data = {
            action: 'disactive',
            user_id: id,
            token: "<?php echo $token ?>"
        };
        //
        $.getJSON(url, data, function (data, status) {
            //Do stuff with the JSON data
            if (status === 'success') {
                table.row('.active').remove().draw(false);
                table.ajax.reload();
                $("#show-message").text(data).addClass("alert alert-success").show().delay(5000).fadeOut();
                // Display total Record
            }
            //    
        });
        $.getJSON("ajax/user/get_info.php?status=disactive", function (data) {
            $("#user-new").html(data.message);
        });
    });
    $("#user_list tbody").on('click', '.btn-edit', function () {
        $("#btnInsert").hide();
        $("#btnEdit").show();
        // get data from api
        var url = './ajax/user/get_user.php';
        var id = $(this).parent().siblings(":first").text();
        var data = {
            user_id: id,
            token: "<?php echo $token ?>"
        };
        $.getJSON(url, data, function (data, status) {
//            console.log(data);
            //Do stuff with the JSON data
            $.each(data, function (key, val) {
//            console.log(key)
//            console.log(val);
                $.each(val, function (k, v) {
                    if (k === "user_type_id") {
//                        console.log(k + ":" + v);
                        $("input[name="+ k + "][value=" + v + "]").prop('checked', true).click();
                    } else if(k=='org_id'){
                        org_id = v;                     
                    }else {
                        $("#" + k).val(v);
                    }
                });                
            });
            $('#password').val('');

        });
        table.ajax.reload();
//        $("#business-total").html(table.data().count());
        // fix search box in modal can't focus
        $.fn.modal.Constructor.prototype.enforceFocus = function () { };
    });

});








