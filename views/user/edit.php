<div class="row">
    <!-- left column -->
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">แก้ไขผู้ใช้งาน</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="editForm" method="" enctype="multipart/form-data">
                <input type="hidden" id="token" name="token" value="<?php echo $token ?>"/>
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user']['user_id']; ?>"/>

                <div class="box-body">

                    <div class="form-group">
                        <label class="control-label col-md-3" for="username">ชื่อผู้ใช้</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="username" name="username" readonly="readonly" placeholder="ชื่อผู้ใช้ภาษาอังกฤษ" value='<?php echo isset($username) ? $username : ''; ?>'>
                        </div>
                    </div>
                    <!--                    <div class="form-group">
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
                                        </div>-->
                    <!-- radio -->
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="user_type_id" id="staff_eec" value="2" checked>
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
                    <div class="form-group">
                        <label class="control-label col-md-3" for="org_id">องค์กร</label>
                        <div class="col-md-5">
                            <select class="form-control select2" id="org_id" data-width="100%" name="org_id">
                                <option id="org_id_list"> -- กรุณาเลือกองค์กร -- </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="email">อีเมล์</label>
                        <div class="col-md-5">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="fname">ชื่อ</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="ชื่อภาษาไทย" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="lname">นามสกุล</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="นามสกุลภาษาไทย" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="telephone">โทรศัพท์</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="telephone" name="telephone" value=''>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="agree" name="agree" value="1">กรุณายืนยันข้อมูลถูกต้อง
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
        <div class="col-md-12">
            <p id="show-message"></p>
        </div>
    </div>
    <!--/.col (right) -->
</div>
