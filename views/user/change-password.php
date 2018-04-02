<div class="row">
    <!-- left column -->
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-12">
        <?php show_message() ?>    
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">เปลี่ยนรหัสผ่าน</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!-- form start -->
            <form class="form-horizontal" id="signupfrm" method="post" action="">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="username">ชื่อผู้ใช้</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="username" readonly="" name="username" placeholder="Username" value='<?php echo isset($username) ? $username : ''; ?>'>
                            <!--<p class="help-block">ชื่อผู้ใช้ต้องเป็นภาษาอังกฤษหรือตัวเลขความยาวไม่ต่ำกว่า 5 ตัวอักษร</p>-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="password">รหัสผ่านเดิม</label>
                        <div class="col-md-3">
                            <input type="password" class="form-control" id="password" name="password" value='<?php echo isset($password) ? $password : ''; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="newpass">รหัสผ่านใหม่</label>
                        <div class="col-md-3">
                            <input type="password" class="form-control" id="password" name="newpass" value='<?php echo isset($newpass) ? $newpass : ''; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="confpass">ยืนยันรหัสผ่านใหม่</label>
                        <div class="col-md-3">
                            <input type="password" class="form-control" id="confirm_password" name='confpass' value='<?php echo isset($confpass) ? $confpass : ''; ?>'>
                            <p class="help-block">รหัสผ่านต้องประกอบตัวอักษรตัวเล็ก ตัวใหญ่ และตัวเลขความยาวไม่น้อยกว่า 6 ตัวอักษร</p>
                        </div>
                    </div>     
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" class="btn btn-primary" name='submit'>บันทึกข้อมูล</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            </div>
        </div>
    </div>
    <!--/.col (right) -->
</div>
<!-- /.row -->