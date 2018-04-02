<!-- Info boxes -->
<div class="row">
    <div class="col-md-12">
        <?php show_message() ?>                
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


<!-- Main row -->
<div class="row">
    <div class="box-body">
        <div class="table table-responsive">
            <table class="table-striped table-condensed">
                <tr>
                    <th class="text-center col-md-1">รหัส</th>
                    <th class="text-center col-md-7">ชื่อกลุ่มอุตสาหกรรม</th>
                    <th class="text-center col-md-2">S-Curve</th>
                    <th class="text-center col-md-2">กระทำการ</th>
                </tr>
                <tr>
                    <td>
                        <form method="post"><input type="text" class="form-control input-sm" readonly="" name="industrial_gid" value="">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="industrial_gname" value="">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" required="" name="industrial_s_curve" value="">
                            </td>
                            <td class="text-center">
                                <button type="submit" class="btn btn-sm btn-primary" name="submit"><i class="fa fa-plus"></i></button></form>
                    </td>
                </tr>

            </table>
        </div> 
        <div class="table table-responsive">
            <table class="table-striped table-condensed">
                <tr>
                    <th class="text-center col-md-1">รหัส</th>
                    <th class="text-center col-md-7">ชื่อกลุ่มอุตสาหกรรม</th>
                    <th class="text-center col-md-2">S-Curve</th>
                    <th class="text-center col-md-2">กระทำการ</th>
                </tr>
                <?php
                $industrial_group = get_industrial_group();
                foreach ($industrial_group as $data) :
                    $delete_url = site_url('industrial/group&action=delete&industrial_gid=' . $data['industrial_gid']);
                    ?>                     
                    <tr>
                        <td>
                            <form method="post"><input type="text" class="form-control input-sm" readonly="" name="industrial_gid" value="<?php echo $data['industrial_gid'] ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" required="" name="industrial_gname" value="<?php echo $data['industrial_gname'] ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control input-sm" required="" name="industrial_s_curve" value="<?php echo $data['industrial_s_curve'] ?>">
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-sm btn-warning" name="submit"><i class="fa fa-edit"></i></button></form>
                            <a class="btn btn-danger btn-sm delete" href="<?php echo $delete_url; ?>" role="button"><i class="fa fa-close"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>    
    </div> 
</div>
<!-- /.row -->