<?php
$act=$_REQUEST["act"];
if($act=="del"){
  $req_id=$_GET["req_id"];  

  $sql1="DELETE FROM `new_shortcourses` where req_id='$req_id'"; 
  //echo $sql1;
  $results1 = $db->query($sql1);
  
}
if($act=="esave"){
  $req_id=$_POST["req_id"];
  $course_name=$_POST["course_name"];  
  $cd=$_POST["cd"];  
  $course_start=$_POST["course_start"];
  $course_hour=$_POST["course_hour"];
  $school_1_id=$_POST["school_1_id"];
  $school_2_id=$_POST["school_2_id"];
  $school_3_id=$_POST["school_3_id"];
  $spacial_condition=$_POST["spacial_condition"];

  $sql1="UPDATE `new_shortcourses` SET  `course_name` = '$course_name', `course_description` = '$cd', `course_start` = '$course_start', `course_hour` = '$course_hour', `school_1_id` = '$school_1_id', `school_2_id` = '$school_2_id', `school_3_id` = '$school_3_id', `spacial_condition` = '$spacial_condition' WHERE `req_id` = '$req_id' ;";
  //echo $sql1."==<br>";
  $results1 = $db->query($sql1);  
}
if($act=="add"){
  //$business_id=$_POST["business_id"];
  $course_name=$_POST["course_name"];  
  $course_description=$_POST["course_description"];
 // echo $course_description."ชช<br>";
  //echo $shortcourse_code."<br>";
  $cd=$_POST["cd"];  
  // echo $cd."==<br>";
  $course_start=$_POST["course_start"];
  $course_hour=$_POST["course_hour"];
  $school_id_1=$_POST["school_id_1"];
  $school_id_2=$_POST["school_id_2"];
  $school_id_3=$_POST["school_id_3"];
  $spacial_condition=$_POST["spacial_condition"];
  
$sql1="INSERT INTO `new_shortcourses` (`business_id`, `course_name`, `course_description`, `course_start`, `course_hour`, `school_1_id`, `school_2_id`, `school_3_id`, `spacial_condition`) VALUES ('$business_id', '$course_name', '$cd', '$course_start', '$course_hour', '$school_id_1', '$school_id_2', '$school_id_3', '$spacial_condition');";

  $results1 = $db->query($sql1);  
}

?>
<div class="row">
  <!-- /.col -->
  <div class="col-lg-3 col-xs-3">
    <!-- small box -->
    <div class="small-box bg-red add-new_shot_course" id="boxInsert" data-toggle="modal" data-target="#formModal">
      <div class="inner">
        <h3 ><?php echo count_new_shortcourses($business_id) ?></h3>
        <p>ความต้องการ</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-plus-outline"></i>
      </div>
      <a href="#" class="small-box-footer">เพิ่มข้อมูล <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <!-- /.col -->
</div>

<div class="row">
<!-- left column -->
  <div class="col-md-6 col-lg-12">
  <!-- general form elements -->
    <div class="box box-warning">   
      
      <div class="box-body">
        <div class="table">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr >
                <th class="text-center">ลำดับ</th>
                <th class="text-center">ชื่อหลักสูตรใหม่</th>
                <th class="text-center">คำอธิบายรายวิชา</th>
                <th class="text-center">ชั่วโมงอบรม</th>
                <th class="text-center">วันที่อบรม</th>
                <th class="text-center">ชื่อวิทยาลัยที่ต้องการให้เปิดสอน</th>
                <th class="text-center">รายละเอียดเพิ่มเติม</th>
                <th class="text-center">กระทำ</th>
              </tr>
            </thead>
            <form method="post"> 
            <tbody>
            <?php 
            $count2=0;        
            //req_id   business_id  course_name   course_description   course_start   course_hour   school_1_id  school_2_id  school_3_id  spacial_condition
                $new_shortcourses = get_new_shortcourses($business_id);
                foreach ($new_shortcourses as $data) :
                    $delete_url = site_url('new_short_course/index&act=del&req_id=' . $data['req_id']);
                    $count2++;
                    ?> 
                                       
                    <tr>
                        <td>                            
                          <?php echo $count2 ?>
                        </td>
                        <td>                            
                          <?php echo $data['course_name'] ?>
                        </td>
                        <td>
                            <?php echo $data['course_description'] ?>
                        </td>
                        <td>
                            <?php echo $data['course_hour'] ?>
                        </td>
                         <td>                            
                            <?php echo $data['course_start'] ?>
                        </td>                         
                         <td>
                            1.<?php echo get_school_name($data['school_1_id']) ?><br>
                            2.<?php echo get_school_name($data['school_2_id']) ?><br>
                            3.<?php echo get_school_name($data['school_3_id']) ?>
                        </td>
                        <td>
                            <?php echo $data['spacial_condition'] ?>
                        </td>                        
                        <td class="text-center">
                            
                    <a class="edit-new_shot_course"                         
                        ereq_id="<?php echo $data['req_id']; ?>" 
                        ecourse_name="<?php echo $data['course_name']; ?>" 
                        ecourse_description="<?php echo $data['course_description']; ?>" 
                        ecourse_start="<?php echo $data['course_start']; ?>" 
                        ecourse_hour="<?php echo $data['course_hour']; ?>" 
                        eschool_1_id="<?php echo $data['school_1_id']; ?>" 
                        eschool_2_id="<?php echo $data['school_2_id']; ?>" 
                        eschool_3_id="<?php echo $data['school_3_id']; ?>" 
                        espacial_condition="<?php echo $data['spacial_condition']; ?>"
                         >
                         <button type="submit" class="btn btn-sm btn-warning" name="submit"><i class="fa fa-edit"></i></button>
                       </a>
                    <a class="btn btn-danger btn-sm " href="<?php echo $delete_url; ?>"  onclick="return confirm('ต้องการลบ?');"><i class="fa fa-close"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>  
        </tbody> 
        </form>         
          </table>
        </div>
      </div>
    </div>   
  </div> 
</div>
<!-- content end -->
<?php include("formModalAdd.php");?>
<?php include("formModalEdit.php");?>
