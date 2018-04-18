$(function () {
    //เรียกใช้งาน Select2
    $(".select2").select2();

    var url = "ajax/user/get_user.php";
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
            "url": url,
            "type": "get",
            "data": function (d) {
                d.token = "<?php echo $token ?>",
                        d.status = 'disactive'
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
//            console.log(json);
        }
    });

    var info = table.page.info();
    $.getJSON("ajax/user/get_info.php", function (data) {
//        console.log(data.message);
        $("#user-info").html(data.message);
    });
    $.getJSON("ajax/user/get_info.php?status=disactive", function (data) {
//        console.log(data.message);
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
            if (status === 'success') {
                table.row('.active').remove().draw(false);
//                table.ajax.reload(null, false);
//                $("#user-new").html(info.recordsTotal);
                table.ajax.reload(function (json) {
                    if (json.recordsTotal == 0) {
                        window.location.href = "<?php echo site_url('user/index') ?>";
                    } else {
                        $("#user-new").html(json.recordsTotal);
                    }
                });
                $("#message").text(data.message).addClass("alert alert-success").show().delay(5000).fadeOut();
                // Display total Record
            }
//            $.getJSON("ajax/user/get_info.php?status=disactive", function (data) {
////        console.log(data.message);
//                $("#user-new").html(data.message);
//            });
            //    
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
//                table.row('.active').remove().draw(false);               
                $("#message").text(data.message).addClass("alert alert-success").show().delay(5000).fadeOut();
                table.ajax.reload();
                // Display total Record
            }
            //    
        });

    });
});








