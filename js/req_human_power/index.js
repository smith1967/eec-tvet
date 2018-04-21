
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
    $('#edate_rang').daterangepicker({
      locale: {
      format: 'YYYY/MM/DD'
        }
    })

    $('#edate_rang2').daterangepicker({
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

    $('.edit-2').click(function(){   
                // get data from edit btn                
                var ereq_id = $(this).attr('ereq_id');
                var emajor_id = $(this).attr('emajor_id');
                var elevel = $(this).attr('elevel');
                var emale = $(this).attr('emale');           
                var efemale = $(this).attr('efemale');                  
                var ecommon = $(this).attr('ecommon');
                var eorg_date = $(this).attr('eorg_date');           
                var ereq_date = $(this).attr('ereq_date');
                var echange_req = $(this).attr('echange_req');
                var ereq_start = $(this).attr('ereq_start');
                var ereq_end = $(this).attr('ereq_end');
                var eage = $(this).attr('eage');
                var espacial_condition = $(this).attr('espacial_condition');             
                // set value to modal
                $('#ereq_id').val(ereq_id);
                $('#emajor_id').val(emajor_id);
                $('#elevel').val(elevel);
                $('#emale').val(emale);               
                $('#efemale').val(efemale);   
                $('#ecommon').val(ecommon);   
                $('#eorg_date').val(eorg_date);   
                $('#ereq_date').val(ereq_date); 
                $('#echange_req').val(echange_req); 
                $('#ereq_start').val(ereq_start);
                $('#ereq_end').val(ereq_end);
                $('#eage').val(eage);
                $('#espacial_condition').val(espacial_condition);             
                //show form
                $('#formModalEdit').modal('show');
            });
    

});










