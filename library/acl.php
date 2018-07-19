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
            'user/edit',
            'user/upload',
            'industrial/estate',
            'industrial/group',
            );
        $this->allowed = in_array($url, $url_list);
    }

    function is_staff_school($url){
        $url_list = array(
            'user/edit',
            'student/check-data',
            'student/file-manager',
            'student/list-student',
            );
        $this->allowed = in_array($url, $url_list);
    }
    function is_staff_business($url){
        $url_list = array(
            'business/index',
            'user/edit',
            'user/upload',
            );
        $this->allowed = in_array($url, $url_list);
    }    
}

?>
