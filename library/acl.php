<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of acl
 *
 * @author IT
 */
class acl {
    //put your code here
    var $allowed;
    function __construct($url,$user_type) {
        $url_list = array(
            '',
            'home/index',
            'user/edit',
            'user/login',
            'user/signup',
            'user/logout'
            );
        if(in_array($url, $url_list) ){
            $this->allowed = true;
        }else if($user_type==1){
            $this->allowed = true;
        }else if($user_type==2){
            $this->is_staff_eec($url); 
        }else if($user_type==3){
            $this->is_staff_school($url);        
        }else if($user_type==4){
            $this->is_staff_business($url);
        }
    }
    function is_staff_eec($url){
        $url_list = array(
            'mou/list',
            'mou/edit',
            'mou/insert',
            'home/dvt_admin',
            'user/edit',
            'user/upload',
            'do_school_vg/list-do_school_vg'
            );
        $this->allowed = in_array($url, $url_list);
    }

    function is_staff_school($url){
        $url_list = array(
            'user/edit',
            'home/dvt_staff',
            'do_school_vg/list-do_school_vg',
            'mou/list',
            'mou/edit',
            'user/edit',
            'user/upload',
            'mou/insert',
            );
        $this->allowed = in_array($url, $url_list);
    }
    function is_staff_business($url){
        $url_list = array(
            'home/school_staff',
            'business/list',
            'school/list-data',
            'school/edit-data',
            'business/edit',
            "business/insert",
            'student/list',
            'student/check-data',
            'student/import-std',
            'student/import-dvt-student',
            'mou/list',
            'mou/edit',
            'mou/insert',
            'student/file-manager',
            'student/check-data',
            'user/edit',
            'user/upload',
            'do_business_vg/list-do_business_vg',
            'trainer/list',
            'trainer/insert',
            'training/insert_group',
            'trainer/edit',
            'training/list',
            'training/insert',
            'training/edit'
            );
        $this->allowed = in_array($url, $url_list);
    }    
}

?>
