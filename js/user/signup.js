/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    $("#school").show();
    $("#business").hide();
    $("#staff_business").click(function () {
        $("#school").hide();
        $("#business").show();
    });
    $("#staff_eec").click(function () {
        $("#school").show();
        $("#business").hide();
    });
    $("#staff_school").click(function () {
        $("#school").show();
        $("#business").hide();
    });
    $("#signupForm").validate({
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

    
    $("#school_id").autocomplete({
        source: "<?php echo SITE_URL ?>ajax/search_school.php",
        minLength: 1
    });
    $("#school_name").autocomplete({
        source: "<?php echo SITE_URL ?>ajax/search_school.php",
        minLength: 2,
        select: function (event, ui) {
            $("#school_name").val(ui.item.label); // display the selected text
            $("#school_id").val(ui.item.value); // save selected id to hidden input
            return false;
        },
    });
    $("#school_id").autocomplete({
        source: "<?php echo SITE_URL ?>ajax/search_school.php",
        minLength: 1
    });
    $("#school_name").autocomplete({
        source: "<?php echo SITE_URL ?>ajax/search_school.php",
        minLength: 2,
        select: function (event, ui) {
            $("#school_name").val(ui.item.label); // display the selected text
            $("#school_id").val(ui.item.value); // save selected id to hidden input
            return false;
        },
    });
});
