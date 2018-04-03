<div class="row">
    <!-- left column -->
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
        <?php show_message() ?>    
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">เข้าระบบ</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="">
                <div class="box-body">
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">ชื่อผู้ใช้</label>

                        <div class="col-sm-10 col-md-6">
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">รหัสผ่าน</label>

                        <div class="col-sm-10 col-md-6">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" value="<?php set_var($password) ?>">
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-md-offset-2 col-md-6">
                        <!--<button type="submit" class="btn btn-default">ยกเลิก</button>-->
                        <button type="submit" class="btn btn-info" name="submit">เข้าระบบ</button>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
    <!--/.col (right) -->
</div>
