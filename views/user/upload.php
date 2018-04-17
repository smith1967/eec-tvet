

<div class="row">
    <!-- left column -->
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-12">
        <?php show_message() ?>    
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">อัพโหลดภาพโปร์ไฟล์</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form class="form-horizontal" id="uploadForm" method="" enctype="multipart/form-data">
                <input type="hidden" id="token" name="token" value="<?php echo $token ?>"/>
                <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['user']['username']; ?>"/>
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label col-md-3" for="uploadFile">รูปภาพ</label>
                        <div class="col-md-5">
                            <input type="file"  class="form-control-file form-control-lg" id="uploadImage" name="uploadImage">
                        </div>
                        <div class="col-md-5">
                            <p class="help-block">อัพโหลดรูปภาพ .jpg .png .gif เท่านั้น</p>
                        </div>
                        <div id="image-holder"> </div>
                    </div>                    

                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-5">
                            <input type="submit" class="btn btn-primary" value="อัพโหลดรูปภาพ" id="btn-submit" name="btn-submit" />
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
