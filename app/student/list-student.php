<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');
$active = 'home';
$subactive = 'index';
$title = 'นำเข้าข้อมูลนักเรียน กำลังศึกษา';


$page = isset($_GET['page']) ? $_GET['page'] : 0;
$action = isset($_GET['action']) ? $_GET['action'] : "list";
$order = isset($_GET['order']) ? $_GET['order'] : '';
$limit = isset($_GET['limit']) ? $_GET['limit'] : 40;

$params = array(
    'action' => $action,
    'limit' => $limit,
);
//=================fix data==========================
//$school_id="1320016201";
$school_id=$_SESSION['school_id'];
//===================================================
$params = http_build_query($params);
$studentlist = get_student($page, $limit,$school_id);
//echo $studentlist; exit();
//    $total = get_total();
$url = site_url('student/list-student&') . $params;
//    var_dump($businesslist);
//    exit();

$total = get_total($school_id);
//if(!isset($total))redirect("/admin/index");
?>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    do_delete($_GET['std_id']);
}
require_once('template/header.php');

?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        ข้อมูลนักเรียน กำลังศึกษา <small>ตรวจสอบรายชื่อ</small>
      </h1>
      <div class="col-md-12">
        <?php show_message() ?>                
      </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">

    <?php
    echo pagination($total, $url, $page, $order, $limit) ;
    ?>
<!--    <form method="post" action="">
	<div class="form-group">
            <label class="control-label col-sm-2" for="search">search:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="search" placeholder="รหัสประจำตัวนักเรียน">
            </div>
        </div>
    </form>-->
            <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>รหัสนักเรียน</th>
                        <th>รหัสสถานศึกษา</th>
                        <!--<th>รหัสประจำตัวประชาชน</th>-->
                        <th>ชื่อนักเรียน</th>
                        <th>นามสกุล</th>
                        <th>วันเดือนปีเกิด</th>
                        <th>เพศ</th>
                        <th>สาขางาน</th>
                        <th>สาขาวิชา</th>
                        <th>สถานะภาพ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $cn=0;
//                var_dump($studentlist);
                foreach ($studentlist as $studen) :
                    $cn++;
                    ?>
                    <tr>
                        <td><?php echo $cn; ?></td>
                        <td><?php echo $studen['student_id']; ?></td>
                        <td><?php echo $studen['school_id']; ?></td>
<!--                        <td><?php // echo $studen['citizen_id']; ?></td>-->
                        <td><?php echo $studen['name']; ?></td>
                        <td><?php echo $studen['lastname']; ?></td>
                        <td><?php echo chDay3($studen['dob']); ?></td>
                        <td><?php echo convSex($studen['gender']); ?></td>
                        <td><?php echo getMinorName($studen['minor_id']); ?></td>
                        <td><?php echo getMajorName($studen['major_id']); ?></td>
                        <td><?php echo getStatusEdu($studen['status_education_id']); ?></td>
<!--                        <td>
                            <a href="<?php //echo site_url('student/edit-student') . '&action=edit&std_id=' . $studen['std_id']; ?>" >แก้ไข</a>
                        </td>
                        <td>
                            <a href="<?php //echo site_url('student/list-student') . '&action=delete&std_id=' . $studen['std_id']; ?>" class="delete">ลบ</a>
                        </td>-->
                    </tr>  
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php require_once 'template/footer.php'; ?>
<?php



function get_student($page = 0, $limit = 10,$school_id) {
    global $db;
    $start = $page * $limit;
    $query = "SELECT * FROM student where school_id='$school_id' LIMIT " . $start . "," . $limit . "";
    ///var_dump($query);
    //$query = "SELECT * FROM student  LIMIT " . $start . "," . $limit . "";
    $result = mysqli_query($db, $query);
    $studentlist = array();
    while ($row = mysqli_fetch_array($result)) {
        $studentlist[] = $row;
    }
    return $studentlist;
}

function get_total($school_id) {
    global $db;
//    $val = $group."%";
    $query = "SELECT * FROM student WHERE school_id = ".pq($school_id);
    $result = mysqli_query($db, $query);
    return mysqli_num_rows($result);
}

function do_delete($std_id) {
    global $db;
    if (empty($std_id)) {
        set_err('ค่าพารามิเตอร์ไม่ถูกต้อง');
        redirect('student/list-student');
    }
    $query = "DELETE FROM student WHERE std_id =" . pq($std_id);
    mysqli_query($db, $query);
    if (mysqli_affected_rows($db)) {
        set_info('ลบข้อมูลสำเร็จ');
    }
    redirect('student/list-student');
}
//function getMajorName($id){
//    global $db;
//    $query = "SELECT * FROM major where major_id='".$id."'";
//    //echo $query;
//    $rs = mysqli_query($db, $query);
//    $row = mysqli_fetch_array($rs);
//    return $row['major_name'];
//}
//
//function getMinorName($id){
//    global $db;
//    $query = "SELECT * FROM minor where minor_id='".$id."'";
//    //echo $query;
//    $rs = mysqli_query($db, $query);
//    $row = mysqli_fetch_array($rs);
//    return $row['minor_name'];
//}
//
////แปลง 2011-03-08 to 8 มีนาคม 2554
//function chDay3($s){
//	$d=explode("-",$s);
//	//print_r($d);
//	$arr_month=array('มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน',
//                     'กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
//	$y=$d[0]+543;
//	//$da=ins0($d[0]);
//	return del0($d[2])." ".$arr_month[$d[1]-1]." ".$y;
//}
////ตัดเลข 0 ถ้าไม่ถึง 10 // 08 >> 8
//function del0($s){
//    if ($s<10){
//        $r=substr($s,1);
//    }else{
//        $r=$s;
//    }
//    return $r;
//}
//// M=>ชาย
//function convSex($s){
//    if ($s=='m'){
//        $r='ชาย';
//    }else{
//        $r='หญิง';
//    }
//    return $r;
//}
//
//?>

