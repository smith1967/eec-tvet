<?php
if (!defined('BASE_PATH'))
exit('No direct script access allowed');
$active = 'business';
$subactive = 'list';
$title = 'หน้าหลัก';
// จัดการข้อมูลกับด้าน logic
$content_header = array(
    'header' => 'รหัสผ่านผู้ใช้',
    'subheader' => 'เปลี่ยน',
    'breadcrumb' => 'เปลี่ยนรหัสผ่าน'
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

function do_update() {
    global $db;
    $data = &$_POST;
//    $query = "SELECT username FROM user WHERE username = " . pq($data['username']) . " AND password = " . pq($data['password']);
//    if (mysqli_query($db, $query)) {
    $query = "UPDATE user SET password  = MD5(" . pq($data['newpass']) . ") WHERE username = " . pq($data['username']);
    $result = mysqli_query($db, $query);
    mysqli_affected_rows($db) > 0 ? set_info('แก้ไขรหัสผ่านสำเร็จ') : set_err('ไม่สามารถแก้ไขรหัสผ่าน' . mysqli_error($db));
//    }
    redirect('app/user/change-password');
}

function do_validate($data) {
    $valid = true;
    $data = &$_POST;
    $valid = validate_user();
    if (!preg_match('/[a-zA-Z0-9_@]{5,}/', $data['username'])) {
        set_err('ชื่อผู้ใช้ต้องเป็นตัวเลขหรือตัวอักษรภาษาอังกฤษ ความยาวไม่ต่ำกว่า 5 ตัวอักษร');
        $valid = false;
    }
    //if (!preg_match('/[a-zA-Z0-9_@]{6,}/', $data['newpass'])) {    
    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,}$/', $data['newpass'])) {
        set_err('รหัสผ่านต้องมีตัวเลขและตัวอักษรภาษาอังกฤษตัวพิมพ์เล็กและตัวพิมพ์ใหญ่ ความยาวไม่ต่ำกว่า 6 ตัวอักษร');
        $valid = false;
    }
    if ($data['newpass'] != $data['confpass']) {
        set_err('รหัสยืนยันไม่ตรงกับรหัสผ่าน');
        $valid = false;
    }
    return $valid;
}

function validate_user() {
    global $db;
    $data = &$_POST;
    $query = "SELECT * FROM user WHERE username=" . pq($data['username']) . " AND password = MD5(" . pq($data['password']) . ");";
    //die($query);
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 0) {
        set_err('กรุณาตรวจสอบชื่อผู้ใช้และรหัสผ่าน');
        return FALSE;
    } else {
        return TRUE;
    }
}
