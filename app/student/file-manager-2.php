<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');
$active = 'home';
$subactive = 'index';
$title = 'นำเข้าข้อมูลนักเรียน จบการศึกษา';
// จัดการข้อมูลกับด้าน logic

require_once('template/header.php');

if (isset($_POST['submit'])):
    do_upload();
endif;
//
//if (isset($_POST['submit1'])):
//    $_SESSION['round']=$_POST["round"];
//    $_SESSION['year']=$_POST["year"];
//endif;
//echo $_SESSION['user']['year'];
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'del') {
        // echo "<script>alert('dddd') </script>" ;
        $filename = UPLOAD_DIR . $_GET['filename'];
        // echo $filename ;exit();
        if (is_file($filename)){
            unlink($filename);
            set_info('ลบไฟล์ ' . $_GET['filename'].' เรียบร้อยแล้ว');
        }
        else
            set_err('ไม่สามารถลบไฟล์ ' . $filename);
    }
}

?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        ข้อมูลนักเรียน จบการศึกษา
        <small>upload ไฟล์ข้อมูล</small>
      </h1>
      <div class="col-md-12">
               <?php show_message() ?>                
      </div>
    </section>
    

<!-- Main content -------------------------------------------------------------------------------------------------->
    <section class="content">
        <div class="row">
            <div class="col-md-12"><br><hr><br>
                <form class="form-horizontal" id="upload_form" method="post" action="" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="uploadfile">เลือกไฟล์ชื่อ &nbsp;
                                <i class="text-red text-bold">end_รหัสสถานศึกษา.csv</i></label>
                            <div class="col-md-3">
                                <input type="file" class="btn btn-primary btn-file" id="uploadfile" name="uploadfile" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" class="btn btn-primary" name='submit'>อัพโหลดไฟล์</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <?php                    
               // endif;  ?>
            </div>


            <?php
            //get file list in upload folder
            //ie(UPLOAD_DIR);
           // $fstd="std_".substr($school_id,2,8);
            //echo "a=".$fstd."<br>";
        ?>
        <div class="table-responsive col-md-6">
            <table class="table" >
                <thead>
                    <th>ชื่อไฟล์</th><th>ตรวจสอบไฟล์</th><th>ลบไฟล์</th>
                </thead>
        <?php    
            
        if ($handle = opendir(UPLOAD_DIR)) :
            while (false !== ($entry = readdir($handle))) :
//                echo "Std_20016201=".substr($entry,11,12)."<br>";
//                echo "std=".strtolower(substr($entry,11,3))."<br>";
                //if ($entry != "." && $entry != ".." && strtolower(substr($entry, 11, 12)) == $fstd && substr($entry, 24, 4) == $_SESSION['user']["year"] && substr($entry, 29, 1) == $_SESSION['user']["round"]):
                
            
                if ($entry != "." && $entry != ".." && strtolower(substr($entry,11,3))== "end"){   
                    ?>
                        
                    <tr>
                        <td> <?php echo $entry . "\n"; ?></td>
                        <?php
                        $checklink = site_url('student/check-data-2') . '&action=check&filename=' . $entry;
                        $unlink = site_url('student/file-manager-2') . '&action=del&filename=' . $entry;
                        ?>
                        <td class="text-center"><a href="<?php echo $checklink ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                        <td class="text-center"><a href="<?php echo $unlink ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                <?php
                }
                
            endwhile;
            closedir($handle);
        endif;
            ?>
                    <tr><td colspan="3" align='center'>คลิกตรวจสอบไฟล์ เพื่อดำเนินการขั้นตอนต่อไป</td></tr>
            </table>
    </div>
   
        </div><!--class="row"-->
    </section>
</div><!--content-wrapper-->
<?php require_once 'template/footer.php'; ?>




<?php

function do_upload() {
    $filename = $_FILES['uploadfile']['tmp_name'];
    $stdfile = UPLOAD_DIR . date('Y-m-d') . '_' . basename($_FILES['uploadfile']['name']);
    $ext = pathinfo($stdfile, PATHINFO_EXTENSION); // die();
    $file_name_Upload= $_FILES['uploadfile']['name'];
   // echo strtolower($ext);    exit();
    if (strtolower($ext) != 'csv') {
        set_err("ชนิดของไฟล์ไม่ถูกต้อง กรุณาตรวจสอบอีกครั้งครับ");
    }else if ($_FILES["uploadfile"]["error"] > 0) {
        //echo "Error: " . $_FILES["uploadfile"]["error"] . "<br>";
        set_err("<p>Error: " . $_FILES["uploadfile"]["error"] . "<p/>");
    }else if (file_exists($stdfile)) {
        unlink($stdfile);
    }else if (!move_uploaded_file($filename, $stdfile)) {
        set_err("อัพโหลดไฟล์ข้อมูลผิดพลาด :" . $stdfile);
    }else{
        $_SESSION['upload_file']="$filename";
        $_SESSION['upload']='OK';
        set_info("อัพโหลดไฟล์ข้อมูล ".$stdfile. 
    }
    redirect('student/file-manager-2');
}


