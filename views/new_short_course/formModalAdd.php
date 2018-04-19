<!-- modal start-->
<div class="row">
    <div class="modal fade" id="formModalAdd" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">เพิ่มข้อมูล</h4>              
              </div>
              <div class="modal-body">
                  <form role="form" method="POST" action="">                    
                      <div class="row">
                        <!-- left column -->
                        
                          <!-- general form elements -->                          
                            <div class="box-header with-border">
                              <h3 class="box-title">กรุณากรอกข้อมูลให้ครบถ้วน</h3>
                            </div>
                                    
                            <div class="box-body">                                       
                              
                                <div class="form-group">
                                  <label for="course_name">ชื่อหลักสูตรที่ต้องการจัดอบรม</label>
                                  <input type="text"  class="form-control" id="course_name" name="course_name" placeholder="ใส่หลักสูตร" required>
                                </div>
                             
                             
                               
                                <div class="form-group">
                                  <label>คำอธิบายรายวิชา</label>
                                  <textarea class="form-control" name="cd" rows="3" placeholder="กรอกคำอธิบายรายวิชา" required></textarea>
                                </div>
                              

                                
                                <div class="form-group">
                                  <label>จำนวนชั่วโมงอบรม</label>
                                  <select class="form-control select2" name="course_hour"  data-width="20%">
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
                                    <input type="text" name="course_start" class="form-control pull-right" id="datepicker">
                                  </div>                  
                                </div>


                   

                              <?php
                              $sql1=("SELECT * FROM `school` order by school_id");
                              $results1 = $db->query($sql1);
                              $count1=0;
                              ?>                              
                                <div class="form-group">
                                  <label>วิทยาลัยที่ 1</label>                                  
                                  <select class="form-control select2" name="school_id_1"  data-width="100%" >
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
                                  <select class="form-control select2" name="school_id_2"  data-width="100%" >
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
                                  <select class="form-control select2" name="school_id_3"  data-width="100%" >
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
                                  <textarea class="form-control" name="spacial_condition" rows="3" placeholder="กรอกรายละเอียด"></textarea>
                                </div>
                             
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary pull-left">บันทึก
                                  </button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">ปิด
                                  </button>                      
                                </div>
                              <!-- /.form group -->  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>   
                  <input type="hidden" name="act" value="add">                
                  </form> 
              </div>
              
            </div>
        </div>
    </div> 
</div>
<!-- end add-->