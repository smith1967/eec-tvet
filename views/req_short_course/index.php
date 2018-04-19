<?php
$act=$_REQUEST["act"];
$req_id=$_REQUEST["req_id"];
if($act=="del"){
    

  $sql1="DELETE FROM `req_shortcourses` where req_id='$req_id'"; 
  //echo $sql1;
  $results1 = $db->query($sql1);
  
}
if($act=="esave"){
  //$business_id=$_POST["business_id"];
  $school_id=$_POST["school_id"];
  $shortcourse_code=$_POST["shortcourse_code"];
  $training_hour=$_POST["training_hour"];
  $trainee_amount=$_POST["trainee_amount"];
  $date_rang_arr=explode(" - ",$_POST["date_rang"]);  
  $training_start_date=$date_rang_arr[0];
  $training_end_date=$date_rang_arr[1];
  $status="request";

  $sql1="UPDATE `req_shortcourses` SET  `school_id` = '$school_id', `shortcourse_code` = '$shortcourse_code', `trainee_amount` = '$trainee_amount', `training_hour` = '$training_hour', `training_start_date` = '$training_start_date', `training_end_date` = '$training_end_date' WHERE `req_id` = '$req_id' ;";
  //echo $sql1."==<br>";
  $results1 = $db->query($sql1);
}
if($act=="add"){
  //$business_id=$_POST["business_id"];
  $school_id=$_POST["school_id"];
  $shortcourse_code=$_POST["shortcourse_code"];  
  $trainee_hour=$_POST["trainee_hour"];
  $trainee_amount=$_POST["trainee_amount"];
  $date_rang_arr=explode("-",$_POST["date_rang"]);  
  $training_start_date=$date_rang_arr[0];
  $training_end_date=$date_rang_arr[1];
  $status="request";

  $sql1="INSERT INTO `req_shortcourses` (`business_id`, `school_id`, `shortcourse_code`, `trainee_amount`, `training_hour`, `training_start_date`, `training_end_date`, `status`) VALUES ('$business_id', '$school_id', '$shortcourse_code', '$trainee_amount', '$trainee_hour', '$training_start_date', '$training_end_date', '$status');"; 
  $results1 = $db->query($sql1);
  
}

?>
<div class="row">
  <!-- /.col -->
  <div class="col-lg-3 col-xs-3">
    <!-- small box -->
    <div class="small-box bg-light-blue add-new_shot_course" id="boxInsert" data-toggle="modal" data-target="#formModal">
      <div class="inner">
        <h3 ><?php echo count_req_shortcourses($business_id) ?></h3>
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
    <div class="box box-primary">   
      
      <div class="box-body">
        <div class="table">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr >
               <th class="text-center">ลำดับ</th>
                      <th class="text-center">สถานศึกษา</th>
                      <th class="text-center">การอบรม</th>
                      <th class="text-center">ชั่วโมงอบรม</th>
                      <th class="text-center">จำนวนผู้เข้าอบรม</th>                      
                      <th class="text-center">วันที่อบรม</th>             
                      <th class="text-center">สถานะ</th>   
                      <th class="text-center">กระทำ</th>
              </tr>
            </thead>
            <form method="post"> 
            <tbody>
            <?php 
            $count2=0; 
            //req_id   business_id  school_id  shortcourse_code  trainee_amount  training_hour  training_start_date  training_end_date  status 
                $req_shortcourses = get_req_shortcourses($business_id);
                foreach ($req_shortcourses as $data) :
                    $delete_url = site_url('req_short_course/index&act=del&req_id=' . $data['req_id']);
                    $count2++;
                    ?>                                        
                    <tr>
                        <td>                            
                          <?php echo $count2 ?>
                        </td>
                        <td>                            
                          <?php echo get_school_name($data['school_id']) ?>
                        </td>
                        <td>
                            <?php echo get_shortcourse_name($data['shortcourse_code']) ?>
                        </td>
                        <td>
                            <?php echo $data['trainee_amount'] ?>
                        </td>
                         <td>                            
                            <?php echo $data['training_hour'] ?>
                        </td> 
                        <td>
                            <?php echo $data['training_start_date'] ?>
                             ถึง 
                            <?php echo $data['training_end_date'] ?>
                        </td>  
                         <td>
                            <?php echo $data['status'] ?>
                        </td>                      
                        <td class="text-center">
                            
                    <a class="edit-2"                         
                        ereq_id="<?php echo $data['req_id']; ?>" 
                        eschool_id="<?php echo $data['school_id']; ?>" 
                        eshortcourse_code="<?php echo $data['shortcourse_code']; ?>" 
                        etrainee_amount="<?php echo $data['trainee_amount']; ?>" 
                        etraining_hour="<?php echo $data['training_hour']; ?>" 
                        etraining_date="<?php echo $data['training_start_date']; ?> - <?php echo $data['training_end_date']; ?>" 
                        estatus="<?php echo $data['status']; ?>"                         
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
