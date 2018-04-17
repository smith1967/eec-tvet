<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');
$active = 'home';
$subactive = 'estate';
$title = 'นิคมอุตสาหกรรม';
// จัดการข้อมูลกับด้าน logic
if (isset($_POST['submit'])) {
    $data = $_POST;
    if (isset($data['industrial_gid']) && !empty($data['industrial_gid'])) {
        do_update($data);  // ไม่มี error บันทึกข้อมูล
    } else {
        do_insert();
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    do_delete($_GET['industrial_gid']);
}
$content_header = array(
    'header' => 'อตสาหกรรม s-curve',
    'subheader' => 'กลุ่ม',
    'breadcrumb' => 'จัดการกลุ่ม'
    );

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
        <?php echo $content_header['header'] ?>
        <small><?php echo $content_header['subheader'] ?></small>
      </h1>
    <!-- แก้ไข breadcrumb -->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li class="active"><?php echo $content_header['breadcrumb'] ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- // เรียก views -->
    <?php    require_once 'views/industrial/group.php'; ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer-section -->
<?php require_once 'template/footer.php'; ?>
<!-- Page script -->
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
<?php

function get_industrial_group() {
    global $db;
//    $start = $page * $limit;
//    SELECT * FROM `industrial_group`
    $query = "SELECT * FROM industrial_group ORDER BY industrial_gid ASC";
//    LIMIT " . $start . "," . $limit . "";
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

function get_total() {
    global $db;
//    $val = $group."%";
    $query = "SELECT * FROM school_type ";
    $result = mysqli_query($db, $query);
    return mysqli_num_rows($result);
}
function do_update($data) {
//    echo "update";
    global $db;
//    if (empty($industrial_gname)) {
//        //echo "empty";
//        set_err('กรุณาใส่ชื่อสถานศึกษา');
//        redirect('school/list-school-type');
//    }
//        echo "industrial_gid=".$industrial_gid;
        $query = "UPDATE industrial_group SET industrial_gname=".pq($data['industrial_gname'])." WHERE industrial_gid =" . pq($data['industrial_gid']);
        $result=mysqli_query($db, $query);
        if ($result) {
            set_info('ปรับปรุงข้อมูลสำเร็จ');
        }else{
            set_err('ปรับปรุงข้อมูลไม่สำเร็จ');
        }
        redirect('industrial/group');
}
function do_delete($industrial_gid) {
    global $db;
    if (empty($industrial_gid)) {
        set_err('ค่าพารามิเตอร์รหัสสถานศึกษาไม่ถูกต้อง');
    }
    $query = "DELETE FROM industrial_group WHERE industrial_gid =" . pq($industrial_gid);
    mysqli_query($db, $query);
    if (mysqli_affected_rows($db)) {
        set_info('ลบข้อมูลสำเร็จ');
    }
    redirect('industrial/group');
}
function do_insert() {
    global $db;
    $data = &$_POST;
//    var_dump($data);
//    die();
    $sql = "INSERT INTO `industrial_group`(`industrial_gid`, `industrial_gname`, `industrial_s_curve`) VALUES (
			NULL," 
            . pq($data['industrial_gname']) . ","
            . pq($data['industrial_s_curve'])
            . ");";
			
//    die("sql: ".$sql);
    mysqli_query($db, $sql);
    if (mysqli_affected_rows($db) > 0) {
       $_SESSION['info'][] = "บันทึกข้อมูลเรียบร้อยครับ";
    } else {
       // $_SESSION['error'] = "บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูล" . mysqli_error($db) . $sql;
        set_err('บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูล'. mysqli_error($db));
    }
    redirect('industrial/group');
    /* close statement and connection */
    //redirect();
}