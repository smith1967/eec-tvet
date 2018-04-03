<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');
$active = 'home';
$subactive = 'index';
$title = 'นำเข้าข้อมูลนักเรียน กำลังศึกษา';

if (!isset($_GET['filename'])){
    redirect('app/student/file-manager');
}
//--import--
//http://localhost/eec-tvet/index.php?student/check-data&action=import&type=std&filename=2018-03-23_Std_20016201_2561_1.csv
if (isset($_GET['action']) && $_GET['action'] == 'import' && $_GET['type'] == 'std') {
    $filename = UPLOAD_DIR . $_GET['filename'];
    do_transfer_std($filename);
}


require_once('template/header.php');

?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        นำเข้าข้อมูลนักเรียน กำลังศึกษา <small>ตรวจสอบไฟล์</small>
      </h1>
      <div class="col-md-12">
        <?php show_message() ?>                
      </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php
                    //http://localhost/eec-tvet/index.php?student/check-data&action=check&filename=2018-03-23_Std_20016201_2561_1.csv
                    if (isset($_GET['action'])) {
                        if ($_GET['action'] == 'check') {
                            $filename = UPLOAD_DIR . $_GET['filename'];
                            if (validate_std_file($filename)) {
                                $importlink = site_url('student/check-data') . '&action=import&type=std&filename=' . $_GET['filename'];
                                echo '<div class="alert alert-success col-md-6">ข้อมูลแฟ้ม ' .$_GET['filename']. ' ถูกต้อง &nbsp;&nbsp;&nbsp;<a href= ' . $importlink . '>';
                                ?>
                                <button type="button" id="button1" class="btn btn-info"> โอนแฟ้มข้อมูล </button></a>
                                <?php
                            } else {
                                $uploadlink = site_url('student/file-manager');
                                echo '<div class="alert alert-warning col-md-4">ข้อมูลไม่ถูกต้องกลับไป <a href= ' . $uploadlink . '>จัดการแฟ้มข้อมูล </a></div>';
                            //die("not valid");
                            }
                        }
                    }
                    ?> 
            </div>
        </div>
    </section>
    
        
</div> <!--content-wrapper-->

<?php require_once 'template/footer.php'; ?>

<?php
function validate_std_file($filename) {
    $handle = fopen($filename, "r");
   // print_r(fgetcsv($handle));
    $col_names = fgetcsv($handle);
    $valid = TRUE;
    // -- fields บางส่วนของไฟล์ std
    $stdcol = array('years', 'semester', 'school_id', 'depart_id', 'people_id');
    //years,semester,school_id,depart_id,people_id,perfix_id,stu_fname,stu_lname,gender_id,birthday,nation_id,home_id,moo,street,tumbol_id,cripple_id,tall,weight,fat_fname,fat_lname,fat_crippl,fat_status,fat_salary,fat_occupa,mot_fname,mot_lname,mot_crippl,mot_status,mot_salary,mot_occupa,marry_stat,brother,study_brot,par_fname,par_lname,par_salary,par_occupa,start_year,level_id,schedu_id,grade_id,major_id,gpa,stu_expert,student_id,group_id,nickname,religion,b_provite,graduate,fat_tell,par_tell,std_blgr,std_edu_id,bud_edu_id,type_id,bud_typeid,major_name,minor_name,homecode,endyear,end_edu_id,end_status,work_id,job_id,job_place,j_position,job_salary,knowlageid,knowlage,job_search,typeschool,moemajors,curri_id,scoo,da_prename,ma_prename,add1,moo1,road1,tumb1,post1,post2,day_in,std_fname,std_lname
//print_r($col_names);
    foreach ($stdcol as $col) {
        if (!in_array($col, $col_names)) {
            $valid = FALSE;
             
        }
    }
    
    fclose($handle);
    return $valid;
}

function do_transfer_std($stdfile) {
    //echo "ssss";exit();
    global $db;
    /* insert data to table tmp */
    $handle = fopen($stdfile, "r");

    //ลบข้อมูล temp table
//    $sql_t = "TRUNCATE TABLE student_tmp ";
//    $res=mysqli_query($db, $sql_t);
    $num_row=0;
//    $count =0;
    $count2 =0;
//    $date_update=date("Y-m-d");
        
    while (!feof($handle)) {
        $data_str = fgetcsv($handle);
//        if (mb_check_encoding($data_str, 'UTF-8')) {
//            // yup, all UTF-8
//                echo "UTF-8";
//        }
        //print_r($data_str); exit(); //====================
        if ($data_str[0]!=''){
            $str_comma = implode(",", $data_str);  
            //print_r($str_comma);exit(); //====================
            $line = iconv("TIS-620", "UTF-8", $str_comma);
            $data = explode(",", $line);
        }
        $num_row++;
//            print_r($data); //หัวตาราง ====================
//            echo "<br><br>";
//            if($num_row==2)exit();
        if ($num_row>=2 && $data[0]!=null ){  
            // echo substr($data[4],-4)."<br>" ;
//            echo "<pre>" ;header('Content-Type: text/html; charset=utf-8') ;print_r($data);exit();     
            //ข้อมูลแถวแรก ============    
            if (substr($data[4],-4)=="E+12") {
                set_err("รูปแบบข้อมูลรหัสประจำตัวประชาชน ผิดพลาด : ".$data[4]."<br> ตรวจสอบ และส่งไฟล์ใหม่");
                redirect('student/check-data');
            }
            //$count++;
//            $name=getSerName($data[5]).$data[6]."  ".$data[7];
            $dofb=chDay1($data[9]);
            $sex=convSexId($data[8]);
            $district_id=substr($data[14],0,4);
            $province_id=substr($data[14],0,2);
            //$minor_id=getminorId($data[58]);
            $major_id=substr($data[39],0,4) ;
            $school_id=$data[2];
//            $round_year=$_SESSION['user']['round-year'];
            
            $strsql = "insert into student (`citizen_id`, `student_id`, `school_id`, `name`, 
                    `lastname`, `gender`, `address`, `district_id`, `subdistrict_id`, 
                    `province_id`, `telephone`, `major_id`, `minor_id`, `e-mail`, `GPA`, 
                    `line_id`, `status_education_id`, `dob`) values(
                    '$data[4]','$data[44]','$data[2]',
                    '$data[6]','$data[7]','$sex',    
                    '$data[11]','$district_id','$data[14]','$province_id',
                    '','$major_id','$data[39]','',
                    '$data[42]','','$data[61]','$dofb' 
                    )";
//            header('Content-Type: text/html; charset=utf-8');
//            echo $strsql;exit();
         //  set_err($strsql);exit();
            $res = mysqli_query($db,$strsql);
            //   if ($count==3)exit();
            if ($res){
                $count2++;
            }
        }
    }
    //echo "ข้อมูลจำนวน ".$count." แถว <br>";
//    set_info( "นำเข้าข้อมูลจำนวน ".$count2." แถว");
    if (mysqli_affected_rows($db)) {
        set_info('โอนข้อมูลนักเรียนทั้งหมด จำนวน ' . $count2. ' รายการ');
        $_SESSION['school_id']=$school_id;
        redirect('student/list-student');
    } else {
        set_err("การโอนข้อมูลใส่ตารางชั่วคราวผิดพลาด : " . mysqli_error($db));
        //die();
    }
//    redirect('student/list-student');
}

function getSerName($id){
	if ($id==002){
		return "นาย";
	}else if($id==003){
		return "นางสาว";
	}
}

function chDay1($s){
    if($s!=''){
	$d=explode("/",$s);
//print_r($d);
	$y=$d[2]-543;
	return $y."-".$d[1]."-".$d[0];
    }
    else{
        return $s;
    }
}
//function convSex($id){
//	if ($id==1){return "M";}
//	else{return "F";}
//}
function getmajorId($s){
    global $db;
    $sql="select * from major where major_name='$s' " ; 
    $res=mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($res);
	return $row['major_id'];
}
function getminorId($s){
    global $db;
    $sql="select * from minor where minor_name='$s' " ; 
    $res=mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($res);
	return $row['minor_id'];
}
function convSexId($s){
    if ($s==1){
        return "M";
    }
    else {
        return "F";
    }
    
}