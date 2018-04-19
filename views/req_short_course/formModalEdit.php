<!-- modal start-->
<div class="row">
  <div class="modal fade" id="formModalEdit" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">แก้ไขข้อมูล</h4>              
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="">                    
            <div class="row">                                               
              <div class="box-header with-border">
                <h3 class="box-title">กรุณากรอกข้อมูลให้ครบถ้วน</h3>
              </div>
              <div class="box-body">                 
                <div class="col-md-6 col-lg-12">

                  <?php
                  //shortcourse_id  course_name   course_hour   course_description  PDF  school_id shortcourse_code
                  $sql1=("SELECT * FROM `shortcourses` order by school_id,shortcourse_code ");
                  $results1 = $db->query($sql1);
                  $count1=0;
                  ?>
                  <div class="form-group">
                    <label>เลือกหลักสูตรที่ต้องการอบรม</label>
                    <select class="form-control select2" name="shortcourse_code" 
                    id="eshortcourse_code" data-width="100%">
                      
                      <?php
                      if($results1->num_rows > 0){                       
                        while($row1 = $results1->fetch_assoc()) {
                          $school_id = $row1["school_id"];
                          $shortcourse_code = $row1["shortcourse_code"]; 
                          $course_name = $row1["course_name"]; 
                          $course_hour = $row1["course_hour"]; 
                          $count1++;
                          
                          ?>                        
                            <option value="<?php echo $shortcourse_code;?>">
                              <?php echo $count1." ".$course_name;?></option>                          
                          <?php
                        }
                      }
                     ?>                    
                    </select>
                  </div>
                

                  <?php
                  $sql1=("SELECT * FROM `school` order by school_id ");
                  $results1 = $db->query($sql1);
                  $count2=0;
                  ?>                
                  <div class="form-group">
                    <label>ชื่อวิทยาลัยที่เปิดสอน</label>
                    <select class="form-control select2" name="school_id"                      
                    id="eschool_id" data-width="100%">
                     
                     <?php
                      if($results1->num_rows > 0){                       
                        while($row1 = $results1->fetch_assoc()) {
                          $school_id = $row1["school_id"];
                          $school_name = $row1["school_name"];  
                          $count2++;
                          ?>                        
                            <option value="<?php echo $school_id;?>">
                              <?php echo $count2." ".$school_name;?> </option>                          
                          <?php
                        }
                      }
                     ?>                    
                    </select>
                  </div>
                
                  <div class="form-group">
                    <label>วันที่เริ่ม-จบอบรม</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="date_rang" class="form-control pull-right" id="etraining_date" data-width="100%">
                    </div>
                    <!-- /.input group -->
                  </div>
    
                  <div class="form-group">
                    <label>จำนวนชั่วโมงที่ต้องการอบรม</label>
                    <select class="form-control select2" name="training_hour" id="etraining_hour" data-width="100%">
                      
                      <?php 
                      for($num=1;$num <=300;$num++){
                        ?>
                          <option><?php echo $num;?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                     
                  <div class="form-group">
                    <label>จำนวนผู้เข้าอบรม</label>
                    <select class="form-control select2" name="trainee_amount" id="etrainee_amount" data-width="100%">
                      
                      <?php 
                      for($num=1;$num <=300;$num++){
                        ?>
                          <option><?php echo $num;?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>                
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary pull-left">บันทึก
                  </button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">ปิด
                  </button>                      
                </div>
              </div>
            </div>
            <input type="hidden" name="req_id" id="ereq_id">
            <input type="hidden" name="act" value="esave">                
          </form> 
        </div>
      </div>
    </div>   
  </div>
</div>       
<!-- end add-->