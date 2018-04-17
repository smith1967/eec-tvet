<!-- Menu Sidebar -->
<?php
//var_dump($_SESSION);
//die();
$menu = Array(
    'home' => array(
        'title' => 'หน้าหลัก',
        'url' => SITE_URL,
        'class' => 'fa fa-home',
        'cond' => true,
        'subitems'=>array()
    ),
//    'report' => array(
//        'title' => 'สรุปรายงาน',
//        'url' => "../dve/?p=ajax/login/token/login/id/".$_SESSION['user']['token'],
//        'class' => 'fa fa-book',
//        'cond' => true,
//        'subitems' => array(
//            'index' => array(
////                'title' => 'หน้าหลัก',
////                'url' => 'app/home/index',
////                'cond' => FALSE,
//            ),
////            'test' => array(
////                'title' => 'ทดสอบ',
////                'url' => 'app/home/test',
////                'cond' => true,
////            ),
//        ),
//    ),    
    'extension' => array(
        'title' => 'ความต้องการ',
        'url' => '#',
        'class' => 'fa fa-building-o',
        'cond' => true,
        'subitems' => array(
           'main_req_experience' => array(
               'title' => 'ทวิภาคี',
               'cond' => true,
               'url' => 'extension/main_req_experience',
           ),

            'main_req_human_power' => array(
                'title' => 'แรงงาน',
                'cond' => true,
                'url' => 'extension/main_req_human_power',
            ),

             'main_req_trainee' => array(
                'title' => 'นักศึกษาฝึกงาน',
                'cond' => true,
                'url' => 'extension/main_req_trainee',
            ),

             'main_req_shot_course' => array(
                'title' => 'หลักสูตรระยะสั้น',
                'cond' => true,
                'url' => 'extension/main_req_shot_course',
            ),

        ),
    ),
    'student' => array(
        'title' => 'ผู้เรียน',
        'url' => '#',
        'class' => 'fa fa-graduation-cap',
        'cond' => is_school_staff() || is_admin(),
        'subitems' => array(
            'file-manager' => array(
                'title' => 'จัดการไฟล์',
                'url' => 'app/student/file-manager',
                'cond' => is_school_staff() || is_admin(),
            ),
            'check-data' => array(
                'title' => 'ตรวจสอบข้อมูล',
                'url' => 'app/student/check-data',
                'cond' => is_school_staff() || is_admin(),
            ),
            'list' => array(
                'title' => 'รายชื่อ',
                'url' => 'app/student/list',
                'cond' => is_school_staff() ,
            ),
            'list-admin' => array(
                'title' => 'รายชื่อ',
                'url' => 'app/student/admin_list',
                'cond' => is_admin(),
            ),            
            'list-nosent' => array(
                'title' => 'สถานศึกษาที่ไม่ส่งข้อมูล',
                'url' => 'app/student/list-nosent',
                'cond' => is_dvt_staff() || is_admin() || is_dvt_admin(),
            ),
        ),
    ),
    'industrial' => array(
        'title' => 'อุตสาหกรรม',
        'url' => '#',
        'class' => 'fa fa-building-o',
        'cond' => true,
        'subitems' => array(
            'group' => array(
                'title' => 'จัดการกลุ่ม s-curve',
                'cond' => true,
                'url' => 'industrial/group',
            ),
            'estate' => array(
                'title' => 'จัดการกลุ่มนิคม',
                'cond' => true,
                'url' => 'industrial/estate',

            ),         
        ),
    ),
    'business' => array(
        'title' => 'สถานประกอบการ',
        'url' => site_url('business/index'),
        'class' => 'fa fa-building-o',
        'cond' => true,
        'subitems' => array(),
    ),
    'trainer' => array(
        'title' => 'ครูฝึก',
        'url' => '#',
        'class' => 'fa fa-building-o',
        'cond' => is_auth(),
        'subitems' => array(
            'list' => array(
                'title' => 'รายชื่อ',
                'cond' => is_auth(),
                'url' => 'app/trainer/list',
            ),
            'insert' => array(
                'title' => 'เพิ่มข้อมูล',
                'url' => 'app/trainer/insert',
                'cond' => is_auth(),
            ),
            'edit' => array(
                'title' => 'แก้ไขข้อมูล',
                'url' => 'app/trainer/edit',
                'cond' => is_auth(),
            ),
        ),
    ),
    'training' => array(
        'title' => 'การฝึกอาชีพ',
        'url' => '#',
        'class' => 'fa fa-building-o',
        'cond' => is_auth(),
        'subitems' => array(
            'list' => array(
                'title' => 'รายการ',
                'cond' => is_auth(),
                'url' => 'app/training/list',
            ),
            'insert' => array(
                'title' => 'เพิ่มข้อมูล',
                'url' => 'app/training/insert',
                'cond' => is_school_staff(),
            ),
            'insert-group' => array(
                'title' => 'เพิ่มข้อมูลแบบกลุ่ม',
                'url' => 'app/training/insert_group',
                'cond' => is_school_staff(),
            ),
            
            'edit' => array(
                'title' => 'แก้ไขข้อมูล',
                'url' => 'app/training/edit',
                'cond' => is_auth(),
            ),
        ),
    ),
    'mou' => array(
        'title' => 'MOU',
        'url' => '#',
        'class' => 'fa fa-building-o',
        'cond' => is_auth(),
        'subitems' => array(
            'list' => array(
                'title' => 'รายชื่อ',
                'cond' => is_auth(),
                'url' => 'app/mou/list',
            ),
            'insert' => array(
                'title' => 'เพิ่มข้อมูล',
                'url' => 'app/mou/insert',
                'cond' => is_auth(),
            ),
            'edit' => array(
                'title' => 'แก้ไขข้อมูล',
                'url' => 'app/mou/edit',
                'cond' => is_auth(),
            ),
        ),
    ),
//    'school_type' => array(
//        'title' => 'ประเภทสถานศึกษา',
//        'url' => '#',
//        'class' => 'fa fa-graduation-cap',
//        'cond' => is_admin(),
//        'subitems' => array(
//            'index' => array(
//                'title' => 'จัดการข้อมูล',
//                'cond' => true,
//                'url' => 'app/school_type/index',
//            ),
//        ),
//    ),
    'pages' => array(
        'title' => 'ข่าวสาร',
        'url' => '#',
        'class' => 'fa fa-book',
        'cond' => is_admin(),
        'subitems' => array(
            'list' => array(
                'title' => 'จัดการข่าวสาร',
                'cond' => true,
                'url' => 'app/pages/list',
            ),
            'insert' => array(
                'title' => 'เพิ่มข่าวสาร',
                'cond' => true,
                'url' => 'app/pages/insert',
            ),
        ),
    ),
    'admin' => array(
        'title' => 'ผู้ดูแลระบบ',
        'url' => '#',
        'class' => 'fa fa-users',
        'cond' => is_admin(),
        'subitems' => array(
            'list-user' => array(
                'title' => 'รายชื่อ',
                'cond' => is_admin(),
                'url' => 'app/admin/list-user',
            ),
//            'insert' => array(
//                'title' => 'เพิ่มข้อมูล',
//                'url' => 'app/admin/insert-user',
//                'cond' => is_auth(),
//            ),
            'edit-user' => array(
                'title' => 'แก้ไขข้อมูลผู้ใช้',
                'url' => 'app/admin/edit-user',
                'cond' => is_admin(),
            ),
            'edit-school-type' => array(
                'title' => 'แก้ไขข้อมูลประเภทสถานศึกษา',
                'cond' => true,
                'url' => 'app/school_type/edit',
            ),
        ),
    ),
    'report' => array(
        'title' => 'รายงาน',
        'url' => '#',
        'class' => 'fa fa-book',
        'cond' => true,
        'subitems' => array(
            'demand' => array(
                'title' => 'ความต้องการกำลังคน',
                'url' => 'report/req_man_power',
                'cond' => true,
            ),
            'supply' => array(
                'title' => 'กำลังคนอาชีวศึกษา',
                'url' => 'report/man_power',
                'cond' => true,
            ),
            'create' => array(
                'title' => 'สร้างรายงาน',
                'url' => 'report/index',
                'cond' => true,
            ),
        ),
    ),
    'user' => array(
        'title' => 'ผู้ใช้งาน',
        'url' => '#',
        'class' => 'fa fa-user',
        'cond' => true,
        'subitems' => array(
            'signup' => array(
                'title' => 'สมัครสมาชิก',
                'url' => 'user/signup',
                'cond' => !is_auth(),
            ),
            'edit' => array(
                'title' => 'แก้ไขข้อมูล',
                'url' => 'user/edit',
                'cond' => is_auth(),
            ),
            'login' => array(
                'title' => 'เข้าระบบ',
                'url' => 'user/login',
                'cond' => !is_auth(),
            ),
            'logout' => array(
                'title' => 'ออกระบบ',
                'url' => 'user/logout',
                'cond' => is_auth(),
            ),
        ),
    ),
);
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" data-widget="tree">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $image_url?>" class="user-image" alt="User Image">             
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['user']['fname']; ?></p>
                <?php if (is_auth()) : ?>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                <?php else: ?>
                    <a href="#"><i class="fa fa-circle text-orange"></i> Offline</a>          
                <?php endif; ?>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php

        echo gen_sidebar_menu($menu, $active, $subactive);
        ?>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
