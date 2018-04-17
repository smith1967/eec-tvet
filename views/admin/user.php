<div class="row">
    <div class="col-lg-3 col-md-3">
        <!-- small box -->
        <div class="small-box bg-primary btn-insert" >
            <div class="inner">
                <h3 id="user-total">1000</h3>
                <p>สมาชิกทั้งหมด</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-people-outline"></i>
            </div>
            <a href="<?php echo site_url('admin/index') ?>" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- /.col -->
    <!-- /.col -->
    <div class="col-lg-3 col-md-3">
        <!-- small box -->
        <div class="small-box bg-yellow btn-insert" id="boxInsert" data-toggle="modal" data-target="#formModal">
            <div class="inner">
                <h3 id="user-new">1000</h3>
                <p>สมาชิกใหม่</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-person-outline"></i>
            </div>
            <a href="<?php echo site_url('admin/new') ?>" class="small-box-footer">จัดการ <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>


</div>
<div class="row">
    <div class="box-body">
        <table id="user_list" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>ชื่อองค์กร</th>
                    <th>ดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>ชื่อองค์กร</th>
                    <th>ดำเนินการ</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="row">
    <div class="modal fade" id="userModal" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!--                        <div class="modal-header">
                                            <h5 class="modal-title" id="formModalLabel">สถานประกอบการ</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>-->
                <div class="modal-body">
                    <?php require_once 'views/admin/edit.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">ปิดฟอร์ม</button>
                    <!--<button type="button" class="btn btn-primary" onclick="showalert()">Save changes</button>-->
                </div>
            </div>
        </div>
    </div> 
</div>