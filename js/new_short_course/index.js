
$(document).ready(function() {


    $('.add-new_shot_course').click(function(){                            
        //show form
        $('#formModalAdd').modal('show');
    });

    $('#example1').DataTable()
    
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
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
        }
    })

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
        }
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
    $('#ecourse_start').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd'
    })

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd'
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

    $('.edit-new_shot_course').click(function(){   
                // get data from edit btn            

                var ereq_id = $(this).attr('ereq_id');
                var ecourse_name = $(this).attr('ecourse_name');
                var ecourse_description = $(this).attr('ecourse_description');
                var ecourse_start = $(this).attr('ecourse_start');           
                var ecourse_hour = $(this).attr('ecourse_hour');                  
                var eschool_1_id = $(this).attr('eschool_1_id');
                var eschool_2_id = $(this).attr('eschool_2_id');           
                var eschool_3_id = $(this).attr('eschool_3_id');
                var espacial_condition = $(this).attr('espacial_condition');             
                // set value to modal
                $('#ereq_id').val(ereq_id);
                $('#ecourse_name').val(ecourse_name);
                $('#ecourse_description').val(ecourse_description);
                $('#ecourse_start').val(ecourse_start);               
                $('#ecourse_hour').val(ecourse_hour);   
                $('#eschool_1_id').val(eschool_1_id);   
                $('#eschool_2_id').val(eschool_2_id);   
                $('#eschool_3_id').val(eschool_3_id); 
                $('#espacial_condition').val(espacial_condition);              
                //show form
                $('#formModalEdit').modal('show');
            });
    

});










