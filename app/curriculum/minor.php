<?php
if (!defined('BASE_PATH'))
exit('No direct script access allowed');
$active = 'home';
$subactive = 'curriculum';
$title = 'ข้อมูลสาขาวิชา';
// จัดการข้อมูลกับด้าน logic

if (isset($_POST['submit'])) {
    $data = $_POST;
    $chk=chkMajor($data['minor_id']);
    if (isset($data['minor_id']) && !empty($data['minor_id'])&& $chk != 0) {
        do_update($data);  // ไม่มี error บันทึกข้อมูล
    } else {
        do_insert();
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    do_delete($_GET['minor_id']);
}

require_once('template/header.php');

?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        ข้อมูลสาขาวิชา <small>เพิ่ม ลบ แก้ไขข้อมูล</small>
      </h1>
    </section>
    <div class="row">
            <div class="col-md-12">
               <?php show_message() ?>                
            </div>
    </div>

    <!-- Main content -------------------------------------------------------------------------------------------------->
    <section class="content">
         <div class="row">
            <div class="box-body">
                <div class="table table-responsive">
                    <table class="table-striped table-condensed">
                        <tr>
                            <th class="text-center col-md-1">รหัสสาขางาน</th>
                            <th class="text-center col-md-7">ชื่อสาขางาน</th>
                            <th class="text-center col-md-2">ชื่อสาขาวิชา</th>
                            <th class="text-center col-md-2">ชื่อภาษาอังกฤษ</th>
                        </tr>
                        <tr>
                        <form method="post">
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="minor_id" value="">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="minor_name" value="">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="type_code" value="">
                                
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="minor_eng" value="">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="industrial" value="">
                            </td>
                            <td class="text-center">
                                <button type="submit" class="btn btn-sm btn-primary" name="submit"><i class="fa fa-plus"></i></button>
                            </td>
                        </form>
                        </tr>

                    </table>
                </div> 
                <div class="table table-responsive">
                    <table id="minor_list" class="table-striped table-condensed">
                        <thead>
                        <tr>
                            <th class="text-center col-md-1">รหัสสาขางาน</th>
                            <th class="text-center col-md-7">ชื่อสาขางาน</th>
                            <th class="text-center col-md-2">ชื่อสาขาวิชา</th>
                            <th class="text-center col-md-2">ชื่อภาษาอังกฤษ</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>    
            </div> 
        </div>
    </section>
</div><!--content-wrapper-->
<script>
    $(function () {
        $('.delete').click(function() {
//            alert('test');
            if(confirm('ต้องการลบหรือไม่?')){
                return true;
            }else{
                return false;
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.delete').click(function () {
            return confirm('ยืนยันการลบข้อมูล');
        });
        $('#minor_list').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive": true,
            "autoWidth": false,
            "pageLength": 10,
            "ajax": {
                "url": "ajax/get_minor.php",
                "type": "POST"
            },
            "columns": [
                {"data": "minor_id"},
                {"data": "minor_name"},
                {"data": "major_id"},
                {"data": "minor_eng"},
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
    });
</script>
 <?php require_once 'template/footer.php'; ?>

<?php
function get_minor(){
    global $db;
    $query = "SELECT * FROM `minor` ORDER BY minor_id ASC";
    $result = mysqli_query($db, $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
    }
    $list = array();
    while ($row = mysqli_fetch_array($result)) {
        $list[] = $row;
    }
    return $list;
}
function do_insert() {
    global $db;
    $data = &$_POST;
//    var_dump($data);
//    die();
    $sql = "INSERT INTO `minor`(`minor_id`, `minor_name`, `type_code`, `minor_eng`, `industrial`) VALUES (" 
            . pq($data['minor_id']) . ","
            . pq($data['minor_name']) . ","
            . pq($data['type_code']) . ","
            . pq($data['minor_eng']) . ","
            . pq($data['industrial'])
            . ");";
			
//    die("sql: ".$sql);
    mysqli_query($db, $sql);
    if (mysqli_affected_rows($db) > 0) {
       $_SESSION['info'][] = "บันทึกข้อมูลเรียบร้อยครับ";
    } else {
       // $_SESSION['error'] = "บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูล" . mysqli_error($db) . $sql;
        set_err('บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูล'. mysqli_error($db));
    }
    redirect('curriculum/minor');
    /* close statement and connection */
    //redirect();
}
function do_update($data) {
//    echo "update";
    global $db;
    $query = "UPDATE minor SET minor_name=".pq($data['minor_name']).","
            ."type_code=".pq($data['type_code']).","
            ."minor_eng=".pq($data['minor_eng']).","
            ."industrial=".pq($data['industrial'])
            ." WHERE minor_id =" . pq($data['minor_id']);
//    echo $query;exit();
    $result=mysqli_query($db, $query);
    if ($result) {
        set_info('ปรับปรุงข้อมูลสำเร็จ');
    }else{
        set_err('ปรับปรุงข้อมูลไม่สำเร็จ');
    }
    redirect('curriculum/minor');
}
function do_delete($minor_id) {
    global $db;
    if (empty($minor_id)) {
        set_err('ค่าพารามิเตอร์รหัสสถานศึกษาไม่ถูกต้อง');
    }
    $query = "DELETE FROM minor WHERE minor_id =" . pq($minor_id);
    mysqli_query($db, $query);
    if (mysqli_affected_rows($db)) {
        set_info('ลบข้อมูลสำเร็จ');
    }
    redirect('curriculum/minor');
}
function chkMajor($s){
    global $db;
    $query = "SELECT * FROM `minor` WHERE `minor_id`='".$s."' ";
    $result=mysqli_query($db, $query);
    $rowcount=mysqli_num_rows($result);
    return $rowcount;
}

function get_total() {
    global $db;
    $query = "SELECT * FROM minor ";
    $result = mysqli_query($db, $query);
    return mysqli_num_rows($result);
}

