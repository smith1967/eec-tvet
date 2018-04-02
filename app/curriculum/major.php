<?php
if (!defined('BASE_PATH'))
exit('No direct script access allowed');
$active = 'home';
$subactive = 'curriculum';
$title = 'ข้อมูลสาขาวิชา';
// จัดการข้อมูลกับด้าน logic

if (isset($_POST['submit'])) {
    $data = $_POST;
    $chk=chkMajor($data['major_id']);
    if (isset($data['major_id']) && !empty($data['major_id'])&& $chk != 0) {
        do_update($data);  // ไม่มี error บันทึกข้อมูล
    } else {
        do_insert();
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    do_delete($_GET['major_id']);
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
                            <th class="text-center col-md-1">รหัสสาขาวิชา</th>
                            <th class="text-center col-md-7">ชื่อสาขาวิชา</th>
                            <th class="text-center col-md-2">รหัสประเภทวิชา</th>
                            <th class="text-center col-md-2">ชื่อภาษาอังกฤษ</th>
                            <th class="text-center col-md-2">กลุ่มอุตสาหกรรม</th>
                            <th class="text-center col-md-2">กระทำการ</th>
                        </tr>
                        <tr>
                        <form method="post">
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="major_id" value="">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="major_name" value="">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="type_code" value="">
                                
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="major_eng" value="">
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
                    <table class="table-striped table-condensed">
                        <tr>
                            <th class="text-center col-md-1">รหัสสาขาวิชา</th>
                            <th class="text-center col-md-7">ชื่อสาขาวิชา</th>
                            <th class="text-center col-md-2">รหัสประเภทวิชา</th>
                            <th class="text-center col-md-2">ชื่อภาษาอังกฤษ</th>
                            <th class="text-center col-md-2">กลุ่มอุตสาหกรรม</th>
                            <th class="text-center col-md-2">กระทำการ</th>
                        </tr>
                        <?php
                        $major = get_major();
                        foreach ($major as $data) :
                            //echo $data['major_id'];
                            $delete_url = site_url('curriculum/major&action=delete&major_id=' . $data['major_id']);
                            ?>                     
                            <tr>
                                <td>
                                    <form method="post"><input type="text" class="form-control input-sm"  name="major_id" value="<?php echo $data['major_id'] ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" required="" name="major_name" value="<?php echo $data['major_name'] ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" required="" name="type_code" value="<?php echo $data['type_code'] ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" required="" name="major_eng" value="<?php echo $data['major_eng'] ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" required="" name="industrial" value="<?php echo $data['industrial'] ?>">
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-sm btn-warning" name="submit"><i class="fa fa-edit"></i></button></form>
                                    <a class="btn btn-danger btn-sm delete" href="<?php echo $delete_url; ?>" role="button"><i class="fa fa-close"></i></a>
                                </td>
                            </tr>
                        <?php 
                        endforeach; ?>
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
 <?php require_once 'template/footer.php'; ?>

<?php
function get_major(){
    global $db;
    $query = "SELECT * FROM `major` ORDER BY major_id ASC";
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
    $sql = "INSERT INTO `major`(`major_id`, `major_name`, `type_code`, `major_eng`, `industrial`) VALUES (" 
            . pq($data['major_id']) . ","
            . pq($data['major_name']) . ","
            . pq($data['type_code']) . ","
            . pq($data['major_eng']) . ","
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
    redirect('curriculum/major');
    /* close statement and connection */
    //redirect();
}
function do_update($data) {
//    echo "update";
    global $db;
    $query = "UPDATE major SET major_name=".pq($data['major_name']).","
            ."type_code=".pq($data['type_code']).","
            ."major_eng=".pq($data['major_eng']).","
            ."industrial=".pq($data['industrial'])
            ." WHERE major_id =" . pq($data['major_id']);
//    echo $query;exit();
    $result=mysqli_query($db, $query);
    if ($result) {
        set_info('ปรับปรุงข้อมูลสำเร็จ');
    }else{
        set_err('ปรับปรุงข้อมูลไม่สำเร็จ');
    }
    redirect('curriculum/major');
}
function do_delete($major_id) {
    global $db;
    if (empty($major_id)) {
        set_err('ค่าพารามิเตอร์รหัสสถานศึกษาไม่ถูกต้อง');
    }
    $query = "DELETE FROM major WHERE major_id =" . pq($major_id);
    mysqli_query($db, $query);
    if (mysqli_affected_rows($db)) {
        set_info('ลบข้อมูลสำเร็จ');
    }
    redirect('curriculum/major');
}
function chkMajor($s){
    global $db;
    $query = "SELECT * FROM `major` WHERE `major_id`='".$s."' ";
    $result=mysqli_query($db, $query);
    $rowcount=mysqli_num_rows($result);
    return $rowcount;
}
