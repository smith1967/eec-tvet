<div class="row">
    <div class="col-lg-3 col-md-3">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3 id="user-info">1000</h3>
                <p>สมาชิกทั้งหมด</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-person-outline"></i>
            </div>
            <a href="<?php echo site_url('admin/user') ?>" class="small-box-footer">จัดการ <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- /.col -->
    <div class="col-lg-3 col-md-3">
        <!-- small box -->
        <div class="small-box bg-yellow" id="edit-user" data-toggle="modal" data-target="#userModal">
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