<?php

include_once './../../include/config.php';
//if(!is_auth()) redirect ();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
if(isset($_REQUEST['business_id'])){
    $business_id = $_REQUEST['business_id'];
    $sql = "DELETE FROM business WHERE business_id =  :business_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':business_id', $business_id, PDO::PARAM_INT);   
    $stmt->execute();
    $count = $stmt->rowCount();
    $res = "ลบข้อมูลจำนวน $count แถว";
    echo json_encode($res);
}else{
    $res = "ไม่สามารถลบข้อมูล!";
    echo json_encode($res);
}
//if (isset($_REQUEST)) {
//    $search_str = '%' . trim($_REQUEST['term']) . '%';
//echo $search_str.'<br>';
//die();
//    $query = "SELECT b.business_id,b.business_name,p.province_name,COUNT(t.trainer_id) AS trainers FROM business as b LEFT JOIN province as p ON b.province_id = p.province_code LEFT JOIN trainer AS t ON b.business_id = t.business_id GROUP BY b.business_id ORDER BY `b`.`business_id` ASC";
    
