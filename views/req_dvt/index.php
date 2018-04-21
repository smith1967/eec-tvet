<?php
$act=$_REQUEST["act"];
$req_id=$_REQUEST["req_id"]; 
if($act=="del"){
   
//req_dvt : req_id     business_id    major_id    level  male     female  common    spacial_condition  training_start   training_end
  $sql1="DELETE FROM `req_dvt` where req_id='$req_id'"; 
  //echo $sql1;
  $results1 = $db->query($sql1);
  
}
if($act=="esave"){
  $major_id=$_POST["major_id"];  
  $level=$_POST["level"];
  $male=$_POST["male"]; 
  $female=$_POST["female"];
  $common=$_POST["common"]; 
  
  $spacial_condition=$_POST["spacial_condition"];
  $date_rang_arr=explode(" - ",$_POST["date_rang"]);  
  $training_start=$date_rang_arr[0];
  $training_end=$date_rang_arr[1];
  $training_start=$_POST["training_start"];
  $training_end=$_POST["training_end"];
    //req_dvt : req_id     business_id    major_id    level  male     female  common    spacial_condition  training_start   training_end
$sql1="INSERT INTO `req_dvt` ( `business_id`, `major_id`, `level`, `male`, `female`, `common`, `spacial_condition`, `training_start`, `training_end`) VALUES ('$business_id', '$major_id', '$level', '$male', '$female', '$common', '$spacial_condition', '$training_start', '$training_end');";
  $results1 = $db->query($sql1);

//echo $sql1;
}

if($act=="add"){
  $major_id=$_POST["major_id"];  
  $level=$_POST["level"];
  $amount_1=$_POST["amount_1"]; 
  $amount_2=$_POST["amount_2"];
  $amount_3=$_POST["amount_3"];  
 
  $spacial_condition=$_POST["spacial_condition"];
  $date_rang_arr=explode(" - ",$_POST["date_rang"]);  
  $training_start=$date_rang_arr[0];
  $training_end=$date_rang_arr[1];
  
    //req_dvt : req_id     business_id    major_id    level  male     female  common    spacial_condition  training_start   training_end
$sql1="INSERT INTO `req_dvt` ( `business_id`, `major_id`, `level`, `male`, `female`, `common`, `spacial_condition`, `training_start`, `training_end`) VALUES ('$business_id', '$major_id', '$level', '$amount_1', '$amount_2', '$amount_3', '$spacial_condition', '$training_start',  '$training_end');";

  $results1 = $db->query($sql1);
  echo "$sql1";

}

?>
<div class="row">
  <!-- /.col -->
  <div class="col-lg-3 col-xs-3">
    <!-- small box -->
    <div class="small-box bg-purple add-new_shot_course" id="boxInsert" data-toggle="modal" data-target="#formModal">
      <div class="inner">
        <h3 ><?php echo count_req_dvt($business_id) ?></h3>
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
                      <th class="text-center">ชื่อสาขาที่ต้องการ</th>
                      <th class="text-center">ระดับการศึกษา</th>                     
                      <th class="text-center">ชาย</th>
                      <th class="text-center">หญิง</th>
                      <th class="text-center">ไม่จำกัดเพศ</th> 
                      <th class="text-center">ช่วงเวลาที่ต้องการ</th>                          
                      <th class="text-center">รายละเอียดเพิ่มเติม</th>   
                      <th class="text-center">กระทำ</th> 
              </tr>
            </thead>
            <form method="post"> 
            <tbody>
            <?php 
            $count2=0;        
//req_id   business_id  major_id  level  male   female  common  spacial_condition  training_start   training_end
                $req_dvt = get_req_dvt($business_id);
                foreach ($req_dvt as $data) :
                    $delete_url = site_url('req_dvt/index&act=del&req_id=' . $data['req_id']);
                    $count2++;
                    ?> 
                                       
                    <tr>
                        <td>                            
                          <?php echo $count2 ?>
                        </td>
                        <td>                            
                          <?php echo get_major_name($data['major_id']) ?>
                        </td>
                        <td>
                            <?php echo $data['level'] ?>
                        </td>
                        <td>
                            <?php echo $data['male'] ?>
                        </td>
                         <td>                            
                            <?php echo $data['female'] ?>
                        </td> 
                        <td>                            
                            <?php echo $data['common'] ?>
                        </td> 
                        
                        <td>                            
                            <?php echo $data['training_start'] ?> ถึง <?php echo $data['training_end'] ?>
                        </td>                         
                        <td>
                            <?php echo $data['spacial_condition'] ?>
                        </td>                        
                        <td class="text-center">
                            
                    <a class="edit-2"                         
                        ereq_id="<?php echo $data['req_id']; ?>" 
                        emajor_id="<?php echo $data['major_id']; ?>" 
                        elevel="<?php echo $data['level']; ?>" 
                        emale="<?php echo $data['male']; ?>" 
                        efemale="<?php echo $data['female']; ?>" 
                        ecommon="<?php echo $data['common']; ?>" 
                        etraining_start="<?php echo $data['training_start']; ?>" 
                        etraining_end="<?php echo $data['training_end']; ?>"                         
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
