<?php
if (!defined('BASE_PATH'))
exit('No direct script access allowed');
$active = 'business';
$subactive = 'list';
$title = 'หน้าหลัก';
// จัดการข้อมูลกับด้าน logic

?>
<?php
require_once('template/header.php')
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
    <!-- แก้ไขหัวข้อเรื่อง -->
      <h1>
        Admin Form
        <small>Version 2.0</small>
      </h1>
    <!-- แก้ไข breadcrumb -->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li class="active">รายชื่อ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- ใส่ข้อมูลต่างๆที่นี่ เริ่มต้นด้วย class="row" -->
      <!-- Info boxes -->
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CPU Traffic</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->      
<!--      <div class="row">
             <div class="box"> 
                <div class="form-group"> 
                    <label class="control-label col-md-3" for="zone_id">เลือกภาค</label>
                    <div class="col-md-4">
                        <select class='form-control' id="zone_id" name="zone_id">
                                    <option>กรุณาเลือกภาค</option>
                                    <option value="%">เลือกทั้งหมด</option>
                                    <?php
//                                    $def = isset($znoe_id) ? $zone_id : '';
//                                    $sql = "SELECT zone_id,zoneName FROM zone ORDER BY zone_id ASC";
//                                    echo gen_option($sql, $def)
                                    ?>
                        </select>      
                        <button type="button" class="btn btn-block btn-primary" id="check_zone_id">แสดงรายชื่อสถานประกอบการ</button>
                    </div>
                </div>     
             </div> 
        </div>-->

        <div class="row">
            <div class="box-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" >Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- /.row -->
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- footer-section -->
<?php require_once 'template/footer.php'; ?>

<!-- js function -->
<script>
    function showalert(){
        alert('test');
    }
    $(function () {
        // ตัวอย่างการใช้ datatable พร้อมส่ง parameter
//        $('#check_zone_id').click(function (){
//            if($('#zone_id').val()!=""){
//                var url;
//                if($('#zone_id').val()=='%'){
//                    url="ajax/get_business.php"
//                }else{
//                    url="ajax/get_business_zone.php"
//                }
                $(".btn").click(function(){
                    alert("click worked");
                });

                url="ajax/get_business.php"
                $('#business_list').DataTable({
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
                        "data": function ( d ) {
                            d.zone_id = $('#zone_id').val();
                        }
                    },
                    "columns": [
                        {"data": "business_id"},
                        {"data": "business_name"},
//                        {"data": "province_name"},
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
                    }
                });
//            }
//        });
    });
</script>

<?php
// 
function get_business($page = 0, $limit = 10) {
    global $db;
    $start = $page * $limit;
//    $query = "SELECT business.*,province.province_name FROM business,province WHERE business.province_id = province.province_code LIMIT " . $start . "," . $limit . "";
    $query = "SELECT b.business_id,b.business_name,p.province_name "
            . "FROM "
            . "business as b,province as p "
            . "WHERE "
            . "b.province_id = p.province_code";
    $result = mysqli_query($db, $query);
    $businesslist = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $businesslist[] = $row;
    }
    return $businesslist;
}

function get_total() {
    global $db;
//    $val = $group."%";
    $query = "SELECT * FROM business ";
    $result = mysqli_query($db, $query);
    return mysqli_num_rows($result);
}

function do_delete($business_id) {
    global $db;
    if (empty($business_id)) {
        set_err('ค่าพารามิเตอร์ไม่ถูกต้อง');
        redirect('business/list-business');
    }
    $query = "DELETE FROM business WHERE business_id =" . pq($business_id);
    mysqli_query($db, $query);
    if (mysqli_affected_rows($db)) {
        set_info('ลบข้อมูลสำเร็จ');
    }
    redirect('app/business/list');
}
?>