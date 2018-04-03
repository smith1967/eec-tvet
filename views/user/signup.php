<div class="row">
    <!-- left column -->
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-12">
        <?php show_message() ?>    
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">ลงทะเบียนผู้ใช้งาน</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form class="form-horizontal" id="signupForm" method="post" action="">
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label col-md-3" for="username">ชื่อผู้ใช้</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้ภาษาอังกฤษ" value='<?php echo isset($username) ? $username : ''; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="password">รหัสผ่าน</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" id="password" name="password" value='<?php echo isset($password) ? $password : ''; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="confirm_password">ยืนยันรหัสผ่าน</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" value='<?php echo isset($confirm_password) ? $confirm_password : ''; ?>'>
                        </div>
                    </div>
                    <!-- radio -->
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="user_type_id" id="staff_ecc" value="2" checked>
                                    เจ้าหน้าที่ศูนย์ EEC
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="user_type_id" id="staff_school" value="3">
                                    เจ้าหน้าในสถานศึกษา
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="user_type_id" id="staff_business" value="4">
                                    เจ้าหน้าที่ในสถานประกอบการ
                                </label>
                            </div>

                        </div>
                    </div>                      

                    <input type="hidden" class="form-control" id="school_id"  name="school_id" value="<?php set_var($school_id) ?>">
                    <div class="form-group" id="school"> 
                        <label class="control-label col-md-3" for="school_name">ชื่อสถานศึกษา</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="school_name" placeholder="ชื่อสถานศึกษา" name="school_name" value="<?php set_var($school_name) ?>">
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="business_id"  name="business_id" value="<?php set_var($business_id) ?>">
                    <div class="form-group" id="business"> 
                        <label class="control-label col-md-3" for="school_name">ชื่อสถานประกอบการ</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="business_name" placeholder="ชื่อสถานประกอบ" name="business_name" value="<?php set_var($business_name) ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3" for="email">อีเมล์</label>
                        <div class="col-md-5">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value='<?php echo isset($email) ? $email : ''; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="fname">ชื่อ</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="ชื่อภาษาไทย" value='<?php echo isset($fname) ? $fname : ''; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="lname">นามสกุล</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="นามสกุลภาษาไทย" value='<?php echo isset($lname) ? $lname : ''; ?>'>
                        </div>
                    </div>

                    <!-- <input type="hidden" id="user_type_id" name="user_type_id" value="4" />  -->
                    <!--                    <div class="form-group"> 
                                            <label class="control-label col-md-3" for="user_type_id">ประเภทผู้ใช้</label>
                                            <div class="col-md-4">
                                                <select class='form-control input-xlarge'id="user_type_id" name="user_type_id">
                    <?php
                    $def = isset($user_type_id) ? $user_type_id : '3';
                    $sql = "SELECT user_type_id,user_type_desc FROM user_type";
                    echo gen_option($sql, $def)
                    ?>
                                                </select>              
                                            </div>
                                        </div>-->
                    <div class="form-group">
                        <label class="control-label col-md-3" for="phone">โทรศัพท์</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="phone" name="phone" value='<?php echo isset($phone) ? $phone : ''; ?>'>
                        </div>
                    </div>

                    <!--                    <div class="form-group">
                    
                                            <div class="checkbox" >
                                                <label class="control-label col-md-offset-3"><input type="checkbox" id='agree' name='agree' value='1'>ยืนยันข้อมูลถูกต้อง</label>
                                            </div>
                    
                                        </div>     -->
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="aree" name="agree" value="1">ยืนยันข้อมูลถูกต้อง
                                </label>
                            </div>
                        </div>
                    </div>                    
                    <div class="form-group ">
                        <div class="col-md-offset-3 col-md-5 box-footer">
                            <button type="submit" class="btn btn-primary" name='submit'>บันทึกข้อมูล</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!--/.col (right) -->
</div>
