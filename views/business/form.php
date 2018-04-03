<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">สถานประกอบการ</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" id="businessForm">
                <div class="box-body">
                    <input type="hidden" id="business_id" name="business_id" value=""/>
                    <input type="hidden" id="token" name="token" value="<?php echo $token ?>"/>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <label for="business_name">ชื่อสถานประกอบการ</label>
                                <input type="text" class="form-control" id="business_name" placeholder="" name="business_name" value="<?php set_var($business_name) ?>">
                            </div>
                        </div>
                    </div>   


                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <label for="address">ที่อยู่ เลขที่</label>
                                <input type="text" class="form-control" id="address" placeholder="" name="address" value="<?php set_var($address) ?>">
                            </div>
                        </div>
                    </div>    

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="province_code">จังหวัด</label>
                                <select class="form-control select2" id="province_code" data-width="100%" name="province_code">
                                    <option id="province_code_list"> -- กรุณาเลือกจังหวัด -- </option>
                                </select>
                            </div>
                        </div>
                    </div>                         
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="district_code">อำเภอ</label>

                                <select class="form-control select2" id="district_code" data-width="100%" name="district_code">
                                    <option id="district_code_list"> -- กรุณาเลือกอำเภอ -- </option>
                                </select>

                            </div>                               
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">                       
                            <div class="form-group">
                                <label for="district_id">ตำบล</label>
                                <select class="form-control select2" id="subdistrict_code" data-width="100%" name="subdistrict_code">
                                    <option id="subdistrict_code_list"> -- กรุณาเลือกตำบล -- </option>
                                </select>
                            </div>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-md-6">                        
                            <div class="form-group">
                                <label for="industrial_estate_id">นิคมอุตสาหกรรม </label>
                                <select class="form-control select2" name="industrial_estate_id" data-width="100%">
                                    <?php
                                    $def = isset($industrial_estate_id) ? $industrial_estate_id : '2';
                                    $sql = "SELECT industrial_estate_id,industrial_estate_name FROM industrial_estate ORDER BY industrial_estate_id ASC";
                                    echo gen_option($sql, $def)
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>                          


                    <div class="row">
                        <div class="col-md-6">                        
                            <div class="form-group">
                                <label>กลุ่มอุตสาหกรรม</label>
                                <select class="form-control select2" name="industrial_gid" data-width="100%">
                                    <?php
                                    $def = isset($industrial_gid) ? $industrial_gid : '2';
                                    $sql = "SELECT industrial_gid,industrial_gname FROM industrial_group ORDER BY industrial_gid ASC";
                                    echo gen_option($sql, $def)
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>                          

                    <div class="row">
                        <div class="col-md-3">                        
                            <div class="form-group">
                                <label>จำนวนพนักงาน</label>
                                <select class="form-control select2" name="employee_amount_id" data-width="100%">
                                    <?php
                                    $def = isset($employee_amount_id) ? $employee_amount_id : '1';
                                    $sql = "SELECT employee_amount_id,amount FROM employee_amount ORDER BY employee_amount_id ASC";
                                    echo gen_option($sql, $def)
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-md-4">                        
                            <div class="form-group">
                                <label>หมายเลขโทรศัพท์</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="<?php set_var($telephone) ?>">
                            </div>
                        </div>
                    </div>                         

                    <div class="row">
                        <div class="col-md-4">                        
                            <div class="form-group">
                                <label for="coordinator">ชื่อผู้ประสานงาน</label>
                                <input type="text" class="form-control" id="coordinator" name="coordinator" value="<?php set_var($coordinator) ?>">
                            </div>                            
                        </div>
                    </div>     

                    <div class="row">
                        <div class="col-md-4">                        
                            <div class="form-group">
                                <label for="coordinator_position">ตำแหน่งผู้ประสานงาน </label>
                                <input type="text" class="form-control" id="coordinator_position" name="coordinator_position" value="<?php set_var($coordinator_position) ?>">
                            </div>                         
                        </div>
                    </div>              

                    <div class="row">
                        <div class="col-md-4">                        
                            <div class="form-group">
                                <label for="coordinator_telephone">หมายเลขโทรศัพท์ผู้ประสานงาน </label>
                                <input type="text" class="form-control" id="coordinator_telephone" name="coordinator_telephone" value="<?php set_var($coordinator_telephone) ?>">
                            </div>                        
                        </div>
                    </div>  

                    <div class="row">
                        <div class="col-md-4">                        
                            <div class="form-group">
                                <label for="coordinator_email">E-mail ผู้ประสานงาน</label>
                                <input type="text" class="form-control" id="coordinator_email" name="coordinator_email" value="<?php set_var($coordinator_email) ?>">
                            </div>                       
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-4">                        
                            <div class="form-group">
                                <label for="coordinator_line_id">LINE ID ผู้ประสานงาน</label>
                                <input type="text" class="form-control" id="coordinator_line_id" name="coordinator_line_id" value="<?php set_var($coordinator_line_id) ?>">
                            </div>                      
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-4">                        
                            <div class="form-group">
                                <label for="gps">ตำแหน่งพิกัด GPS </label>
                                <input type="text" class="form-control" id="gps" name="gps" value="<?php set_var($gps) ?>">
                            </div>                    
                        </div>
                    </div>                                                     
                </div>

                <!--/.box-body-->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="btnInsert" name="submit">บันทึกเพิ่มข้อมูล</button>
                    <button type="submit" class="btn btn-success" id="btnEdit" name="submit">บันทึกแก้ไขข้อมูล</button>
                    <button type="reset" class="btn btn-danger" id="btnReset" name="reset">ล้างข้อมูลในฟอร์ม</button>

                </div>
            </form>
        </div>
        <div class="col-md-12">
            <p id="show-message"></p>
        </div>
    </div>    

</div> <!-- /row -->
