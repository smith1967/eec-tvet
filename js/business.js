
$(function () {
    //  business form
    var province_code;
    var district_code;
    var subdistrict_code;
    var action;
    $('#btnInsert').click(function () {
        //do stuff
        action = "insert";
    });
    $('#btnEdit').click(function () {
        //do stuff
        action = "edit";
    });    
    
    $("#reset").click(function () {
        //            alert("xxxx");
        $("#message").hide();
    });
    if ($("#business_id").val() == "") {
        $("#btnEdit").hide();
    } else {
        $("#btnEdit").show();
    }

    $("#businessForm").validate({
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
            if(action==="insert"){
                insertBusiness();
            }
            if(action==="edit"){
                editBusiness();
            }
                        
        },
    });
    function insertBusiness() {
        $.ajax({
            type: "POST",
            url: "ajax/post_business.php",
            data: $("#businessForm").serialize(),
            //                        {student_name:student_name,student_roll_no:student_roll_no,student_class:student_class},
            dataType: "JSON",
            success: function (data) {
//                alert(data.message);
                $("#show-message").html(data.message).addClass("alert alert-success").show().delay(5000).fadeOut();
                $("#business_id").val(data.business_id);
                table.ajax.reload();
                $("#business-total").html(table.data().count());
            },
            error: function (err) {
                $("#show-message").html(data).addClass("alert alert-danger").show().delay(5000).fadeOut();
            }
        });
        
    }
    function editBusiness() {
        $.ajax({
            type: "POST",
            url: "ajax/put_business.php",
            data: $("#businessForm").serialize(),
            dataType: "JSON",
            success: function (data) {
//                alert(data.message);
                $("#show-message").html(data.message).addClass("alert alert-success").show().delay(5000).fadeOut();
                table.ajax.reload();
            },
            error: function (err) {
                $("#show-message").html(data).addClass("alert alert-danger").show().delay(5000).fadeOut();
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
            var provice_code = "<?php echo set_var($province_code) ?>";
            $("#province_code").val(provice_code);
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
                var d_code = "<?php set_var($district_code) ?>"
                if(d_code === ""){
                    d_code = district_code;
                }
                $("#district_code").val(d_code);
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
                var sd_code = "<?php set_var($subdistrict_code) ?>"
                if(sd_code === ""){
                    sd_code = subdistrict_code;
                }
                $("#subdistrict_code").val(sd_code);
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
                //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
                $.each(data, function (index, value) {
                    $("#postcode").val(value.id);
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

    var url = "ajax/get_business.php";
    var table = $('#business_list').DataTable({
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
            "url": url,
            "type": "POST",
            "data": function (d) {
                d.zone_id = $('#zone_id').val();
            }
        },
        "columns": [
            {"data": "business_id"},
            {"data": "business_name"},
            {"data": "province_name"},
            //                        {"data": "trainers"},               
            //        { "data": "gender" },
            //        { "data": "country" },
            //        { "data": "phone" },
            {"data": "button"},
        ],
        "language": {
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
            $("#business-total").html(info.recordsTotal);
        }
    });

    var info = table.page.info();
    setInterval( function  () {
        table.ajax.reload();
        $("#business-total").html(table.data().count());
    }, 10000);
    //    $("#business-total").html(info.recordsTotal);
       $("#boxInsert").click(function () {  
//           alert('insert')
           if($("#business_id").val() === ""){
            $("#btnInsert").show();
            $("#btnEdit").hide();               
           }else{
            $("#btnInsert").show();
            $("#btnEdit").show();                
           }

        // get data from api
        var url = './ajax/get_business.php';
        var id = $(this).parent().siblings(":first").text();
        var data = {
            business_id: id
        };
        $.getJSON(url, data, function (data, status) {
            //Do stuff with the JSON data
        $.each(data, function (key, val) {
//            console.log(key)
            $.each(val, function (k, v) {
                if(k==="province_code" || k==="district_code" ||k==="subdistrict_code"){
                    console.log(k + ":" +v);
                    if(k==="district_code"){
                        district_code = v;
                    }else if(k==="subdistrict_code"){
                       subdistrict_code = v;
                    }
                    
                    $("#"+k).val(v);
                    $("#"+k).change();                    
                }else{
                    $("#"+k).val(v);
                }
            });
        });

        });
        table.ajax.reload();
        $("#business-total").html(table.data().count());
        // fix search box in modal can't focus
        $.fn.modal.Constructor.prototype.enforceFocus = function () { };
    });

    // edit data
    $("#business_list tbody").on('click', '.btn-edit', function () {   
            $("#btnInsert").hide();
            $("#btnEdit").show();
        // get data from api
        var url = './ajax/get_business.php';
        var id = $(this).parent().siblings(":first").text();
        var data = {
            business_id: id
        };
        $.getJSON(url, data, function (data, status) {
            //Do stuff with the JSON data
        $.each(data, function (key, val) {
//            console.log(key)
            $.each(val, function (k, v) {
                if(k==="province_code" || k==="district_code" ||k==="subdistrict_code"){
                    console.log(k + ":" +v);
                    if(k==="district_code"){
                        district_code = v;
                    }else if(k==="subdistrict_code"){
                       subdistrict_code = v;
                    }
                    
                    $("#"+k).val(v);
                    $("#"+k).change();                    
                }else{
                    $("#"+k).val(v);
                }
            });
        });

        });
        table.ajax.reload();
//        $("#business-total").html(table.data().count());
        // fix search box in modal can't focus
        $.fn.modal.Constructor.prototype.enforceFocus = function () { };
    });

    // delete data
    $("#business_list").on('click', '.btn-delete', function () {
        //        alert('test');
        //        
        if ($(this).parents('tr').hasClass('active')) {
            $(this).parents('tr').removeClass('active');
            //            alert('1');
        } else {
            table.$('tr.active').removeClass('active');
            $(this).parents('tr').addClass('active');
            //            alert('2');
        }

        //        table.row().remove($(this)).parents('tr')).draw( false );
        //        table.row.remove($(this).parents('tr')).draw();


        // get data from api
        if (!confirm('ยืนยันการลบข้อมูล'))
            return;
        var url = './ajax/del_business';
        var id = $(this).parent().siblings(":first").text();
        var data = {
            business_id: id
        };
        //
        $.getJSON(url, data, function (data, status) {
            //Do stuff with the JSON data
            if (status === 'success') {
                //                console.log(data);

                table.row('.active').remove().draw(false);
                table.ajax.reload();
                $("#message").text(data).addClass("alert alert-success").show().delay(5000).fadeOut();
                // Display total Record
                $("#business-total").html(table.data().count());
            }
            //    
        });

        // set data to html element

        //                    $("#hello").text($(this).parent().siblings(":first").text());
    });

    //    $(document).on('click', '.btn-insert', function () {
    //        // get data from api
    //        $('#btnForm').addClass();
    //    });    
    // get data to datatable

});








