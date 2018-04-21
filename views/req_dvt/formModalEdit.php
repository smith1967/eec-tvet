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
                      <div class="row">
                        <!-- left column -->
                        
                          <!-- general form elements -->                          
                            <div class="box-header with-border">
                              <h3 class="box-title">กรุณากรอกข้อมูลให้ครบถ้วน</h3>
                            </div>
                                    
                            <div class="box-body">                                       
                              
                                <?php

              $sql1=("SELECT * FROM `major` order by major_id");
              $results1 = $db->query($sql1);
              $count1=0;
              ?>
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <label>ชื่อสาขาที่ต้องการ</label>
                  <select class="form-control select2" name="major_id" id="emajor_id" data-width="100%">
                    <option value="">--เลือก--</option>
                   <?php
                    if($results1->num_rows > 0){                       
                      while($row1 = $results1->fetch_assoc()) {                        
                          $count1++;                          
                          $major_id=$row1["major_id"];
                          $major_name=$row1["major_name"];
                          $type_code=$row1["type_code"];
                          $major_eng=$row1["major_eng"];
                          $industrial=$row1["industrial"];
                          ?>                        
                          <option value="<?php echo $major_id;?>">
                            <?php echo $count1." ".$major_name;?></option>                          
                        <?php
                      }
                    }
                   ?>
                    
                  </select>
                </div>
              

             
                <div class="form-group">

                  <label>ระดับการศึกษา</label>
                  <select class="form-control  select2" name="level" data-width="30%"  id="elevel">
                    <option value="">--เลือก--</option>
                    <option>ปวช.</option>
                    <option>ปวส.</option>   
                    <option>ป.ตรี</option>                   
                  </select>
                </div>
              

             <label>เพศ(เลือกรายการเดียว)</label>
                <div class="form-group">                  
                  <label>เพศชาย จำนวน</label>
                  <select class="form-control  select2" name="male"  data-width="100%" id="emale"> 
                    <option value="">--เลือก--</option>
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
                  <label>เพศหญิง จำนวน</label>
                  <select class="form-control  select2"  name="female"  data-width="100%" id="efemale">
                    <option value="">--เลือก--</option>
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
                  <label>ไม่จำกัดเพศ จำนวน</label>                  
                  <select class="form-control select2"  name="common"  data-width="100%" id="ecommon">
                    <option value="">--เลือก--</option>
                    <?php 
                    for($num=1;$num <=200;$num++){
                      ?>
                        <option><?php echo $num;?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <?php
//req_trainee : req_id   business_id  major_id  level  amount   gender  both/male/female spacial_condition  training_start   training_end 
 ?>              
              <!-- Date range -->
             <div class="form-group">
                <label>ช่วงวันที่ที่ต้องการ</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date_rang" class="form-control pull-right" id="edate_rang2">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
  
               <div class="form-group">
                  <label>ช่วงอายุที่ต้องการ</label>  
                                
                    <select class="form-control select2"  name="age_start"  data-width="20%" id="eage_start">
                      <option value="">--เลือก--</option>
                      <?php 
                      for($num=1;$num <=100;$num++){
                        ?>
                          <option><?php echo $num;?></option>
                        <?php
                      }
                      ?>
                    </select>
                    ถึง
                    <select class="form-control select2"  name="age_end"  data-width="20%" id="eage_end">
                      <option value="">--เลือก--</option>
                      <?php 
                      for($num=1;$num <=100;$num++){
                        ?>
                          <option><?php echo $num;?></option>
                        <?php
                      }
                      ?>
                    </select>
                  
                </div>
                          
                <div class="form-group">
                  <label for="">รายละเอียดเพิ่มเติม</label>
                  <textarea class="form-control" rows="3" name="spacial_condition" id="espacial_condition"
                   placeholder="กรอกรายละเอียดเพิ่มเติม"></textarea>
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
                  <input type="hidden" name="act" value="esave">                
                  </form> 
              </div>
              
            </div>
        </div>
    </div> 
</div>
<!-- end add-->