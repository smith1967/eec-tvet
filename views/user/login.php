<div class="row">
    <!-- left column -->
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">เข้าระบบ</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="login_form" method="" action="">
                <input type="hidden" id="token" name="token" value="<?php echo $token ?>"/>
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
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="">
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group ">
                        <div class="col-md-offset-2 col-md-5">
                            <button type="button" class="btn btn-primary" id="btnLogin" name='login'>เข้าระบบ</button>
                        </div>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <div class="col-md-12">
            <p id="show-message"></p>
        </div>
    </div>
    <!--/.col (right) -->
</div>
