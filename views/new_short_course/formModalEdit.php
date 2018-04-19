<!-- modal start-->
<div class="row">
    <div class="modal fade" id="formModalEdit" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">                 
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">แก้ไขข้อมูล</h4> 
              </div>
              <div class="modal-body">
                  <form role="form" method="POST" action="">
                    <section class="content">
                                             
                          <!-- general form elements -->
                          <div class="box-header with-border">
                              <h3 class="box-title">กรุณากรอกข้อมูลให้ครบถ้วน</h3>
                            </div>
                                    
                            <div class="box-body">                                     
                              
                                <div class="form-group">
                                  <label for="course_name">ชื่อหลักสูตรที่ต้องการจัดอบรม</label>
                                  <input type="text"  class="form-control" id="ecourse_name" name="course_name" placeholder="ใส่หลักสูตร">
                                </div>                           
                             
                               
                                <div class="form-group">
                                  <label>คำอธิบายรายวิชา</label>
                                  <textarea class="form-control" name="cd" rows="3" placeholder="กรอกคำอธิบายรายวิชา" id="ecourse_description"></textarea>
                                </div>    
                                
                                <div class="form-group">
                                  <label>จำนวนชั่วโมงอบรม</label>
                                  <select class="form-control select2" name="course_hour"  data-width="20%" id="ecourse_hour">
                                    <?php 
                                    for($num=1;$num <=200;$num++){
                                      ?>
                                        <option><?php echo $num;?></option>
                                      <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                                                                              
                                <div class="form-group">
                                  <label>วันที่เริ่มอบรม</label>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="course_start" class="form-control pull-right" id="ecourse_start">
                                  </div>                  
                                </div>


                   

                              <?php
                              $sql1=("SELECT * FROM `school` order by school_id");
                              $results1 = $db->query($sql1);
                              $count1=0;
                              ?>                              
                                <div class="form-group">
                                  <label>วิทยาลัยที่ 1</label>                                  
                                  <select class="form-control select2" name="school_1_id"  data-width="100%"  id="eschool_1_id">
                                    <option value="">--เลือก--</option>
                                   <?php
                                    if($results1->num_rows > 0){                       
                                      while($row1 = $results1->fetch_assoc()) {                        
                                          $count1++;                          
                                          $school_id=$row1["school_id"];
                                          $school_name=$row1["school_name"];
                                          ?>                        
                                          <option value="<?php echo $school_id;?>">
                                            <?php echo $count1." ".$school_name;?></option>                          
                                        <?php
                                      }
                                    }
                                   ?>                                    
                                  </select>                                  
                                </div>
               

                              <?php
                              $sql1=("SELECT * FROM `school` order by school_id");
                              $results1 = $db->query($sql1);
                              $count1=0;
                              ?>                              
                                <div class="form-group">
                                  <label>วิทยาลัยที่ 2</label>
                                  <select class="form-control select2" name="school_2_id"  data-width="100%" id="eschool_2_id">
                                    <option value="">--เลือก--</option>
                                   <?php
                                    if($results1->num_rows > 0){                       
                                      while($row1 = $results1->fetch_assoc()) {                        
                                          $count1++;                          
                                          $school_id=$row1["school_id"];
                                          $school_name=$row1["school_name"];
                                          ?>                        
                                          <option value="<?php echo $school_id;?>">
                                            <?php echo $count1." ".$school_name;?></option>                          
                                        <?php
                                      }
                                    }
                                   ?>
                                    
                                  </select>
                                </div>
                           

                              <?php
                              $sql1=("SELECT * FROM `school` order by school_id");
                              $results1 = $db->query($sql1);
                              $count1=0;
                              ?>
                              
                                <div class="form-group">
                                  <label>วิทยาลัยที่ 3</label>
                                  <select class="form-control select2" name="school_3_id"  data-width="100%" id="eschool_3_id">
                                    <option value="">--เลือก--</option>
                                   <?php
                                    if($results1->num_rows > 0){                       
                                      while($row1 = $results1->fetch_assoc()) {                        
                                          $count1++;                          
                                          $school_id=$row1["school_id"];
                                          $school_name=$row1["school_name"];
                                          ?>                        
                                          <option value="<?php echo $school_id;?>">
                                            <?php echo $count1." ".$school_name;?></option>                          
                                        <?php
                                      }
                                    }
                                   ?>
                                    
                                  </select>
                                </div>
                             
                              
                                <div class="form-group">
                                  <label>รายละเอียดเพิ่มเติม</label>
                                  <textarea class="form-control" name="spacial_condition" rows="3" placeholder="กรอกรายละเอียด" id="espacial_condition"></textarea>
                                </div>
                             
                           
                              <!-- /.form group -->  
                              <div class="box-footer">
                                <button type="submit" class="btn btn-primary">บันทึก</button>                                
                                <input type="hidden" name="act" value="esave">
                                <input type="hidden" name="req_id"  id="ereq_id">
                              </div>            
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    </section>
                  </form> 
              </div>              
            </div>
        </div>
    </div> 
</div>
<!-- end edit-->