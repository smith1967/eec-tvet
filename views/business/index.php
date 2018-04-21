<!-- Info boxes -->
<!-- Info boxes -->
<div class="row">
    <!-- /.col -->
    <div class="col-lg-3 col-xs-3">
        <!-- small box -->
        <div class="small-box bg-primary btn-insert" id="boxInsert" data-toggle="modal" data-target="#formModal">
            <div class="inner">
                <h3 id="business-total"></h3>
                <p>สถานประกอบการ</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-plus-outline"></i>
            </div>
            <a href="#" class="small-box-footer">เพิ่มข้อมูล <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->      


<div class="row">
    <div class="box-body">
        <table id="business_list" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อสถานประกอบการ</th>
                    <th>จังหวัด</th>
                    <th>ดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อสถานประกอบการ</th>
                    <th>จังหวัด</th>
                    <th>ดำเนินการ</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="row">
    <div class="modal fade" id="formModal" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!--                        <div class="modal-header">
                                            <h5 class="modal-title" id="formModalLabel">สถานประกอบการ</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>-->
                <div class="modal-body">
                    <?php require_once 'views/business/form.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">ปิดฟอร์ม</button>
                    <!--<button type="button" class="btn btn-primary" onclick="showalert()">Save changes</button>-->
                </div>
            </div>
        </div>
    </div> 
</div>
<!-- /.row -->
<!-- /.row -->
<!-- Main row -->
<!-- /.row -->
