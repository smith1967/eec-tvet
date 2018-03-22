<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');
$active = 'home';
$subactive = 'industrial';
$title = 'อุตสาหกรรม';
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
?>
<?php
require_once('template/header.php')
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ECC TVET 
            <small>Career Version 0.1.9</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
            <li class="active"></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
               <?php show_message() ?>                
            </div>

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


        <!-- Main row -->
        <div class="row">
            <div class="box-body">
                <div class="table table-responsive">
                    <table class="table-striped table-condensed">
                        <tr>
                            <th class="text-center col-md-1">รหัส</th>
                            <th class="text-center col-md-7">ชื่อกลุ่มอุตสาหกรรม</th>
                            <th class="text-center col-md-2">S-Curve</th>
                            <th class="text-center col-md-2">กระทำการ</th>
                        </tr>
                        <tr>
                            <td>
                                <form method="post"><input type="text" class="form-control input-sm" readonly="" name="industrial_gid" value="">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="industrial_gname" value="">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="industrial_s_curve" value="">
                            </td>
                            <td class="text-center">
                                <button type="submit" class="btn btn-sm btn-primary" name="submit"><i class="fa fa-plus"></i></button></form>
                            </td>
                        </tr>

                    </table>
                </div> 
                <div class="table table-responsive">
                    <table class="table-striped table-condensed">
                        <tr>
                            <th class="text-center col-md-1">รหัส</th>
                            <th class="text-center col-md-7">ชื่อกลุ่มอุตสาหกรรม</th>
                            <th class="text-center col-md-2">S-Curve</th>
                            <th class="text-center col-md-2">กระทำการ</th>
                        </tr>
                        <?php
                        $industrial_group = get_industrial_group();
                        foreach ($industrial_group as $data) :
                            $delete_url = site_url('industrial/group&action=delete&industrial_gid=' . $data['industrial_gid']);
                            ?>                     
                            <tr>
                                <td>
                                    <form method="post"><input type="text" class="form-control input-sm" readonly="" name="industrial_gid" value="<?php echo $data['industrial_gid'] ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" required="" name="industrial_gname" value="<?php echo $data['industrial_gname'] ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" required="" name="industrial_s_curve" value="<?php echo $data['industrial_s_curve'] ?>">
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-sm btn-warning" name="submit"><i class="fa fa-edit"></i></button></form>
                                    <a class="btn btn-danger btn-sm delete" href="<?php echo $delete_url; ?>" role="button"><i class="fa fa-close"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>    
            </div> 
        </div>
        <!-- /.row -->
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