<?php
if (!defined('BASE_PATH'))
exit('No direct script access allowed');
$token = gen_token();
$active = 'business';
$subactive = 'list';
$title = 'หน้าหลัก';
// จัดการข้อมูลกับด้าน logic
$content_header = array(
    'header' => 'ต้องการเปิดการอบรมหลักสูตรใหม่',
    'subheader' => 'แสดง',
    'breadcrumb' => 'ต้องการเปิดการอบรมหลักสูตรใหม่'
    );

$business_id =1234;
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
        <div class="row">
            <div class="col-md-12">
                <p id="message"></p>
            </div>
        </div>
     <!-- เรียกใช้ views ตั้งชื่อ ตาม folder/finename หลัก -->
    <?php
        require_once 'views/'.$ctrl_act.'.php'; 
    ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- footer-section -->
<?php require_once 'template/footer.php'; ?>

<!-- js function -->
<!-- เรียกใช้ js ตั้งชื่อ ตาม folder/finename หลัก -->
<script>
<?php require_once 'js/'.$ctrl_act.'.js'; ?>

</script>
<?php
function get_new_shortcourses($business_id) {
    global $db;
//    $start = $page * $limit;
//    SELECT * FROM `industrial_group`
     $query = "SELECT * FROM new_shortcourses WHERE business_id=" . pq($business_id) . "";
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

function count_new_shortcourses($business_id) {
    global $db;
//    $start = $page * $limit;
//    SELECT * FROM `industrial_group`
     $query = "SELECT * FROM new_shortcourses WHERE business_id=" . pq($business_id) . "";
    $result = mysqli_query($db, $query);
    if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
    }    
    return $result->num_rows;
}

function get_school_name($school_id) {
    global $db;
    $query = "SELECT * FROM school WHERE school_id=" . pq($school_id) ."  " ;
    $result = mysqli_query($db, $query);
    if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
    }
    if($result->num_rows > 0){  
        $row = mysqli_fetch_array($result);
        $school_name = $row[school_name];
    }else{
        $school_name ="-";
    }
    return $school_name;
}
