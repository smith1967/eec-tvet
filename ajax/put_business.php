<?php

include_once './../include/config.php';
//if(!is_auth()) redirect ();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
if(isset($_POST['business_id'])){
    $sql = "UPDATE "
            . "`business` "
            . "SET "
            . "`business_name` = :business_name,"
            . " `address` = :address,"
            . " `subdistrict_code` = :subdistrict_code,"
            . " `district_code` = :district_code,"
            . " `province_code` = :province_code,"
            . " `industrial_estate_id` = :industrial_estate_id,"
            . " `industrial_gid` = :industrial_gid,"
            . " `employee_amount_id` = :employee_amount_id,"
            . " `telephone` = :telephone,"
            . " `coordinator` = :coordinator,"
            . " `coordinator_position` = :coordinator_position,"
            . " `coordinator_telephone` = :coordinator_telephone,"
            . " `coordinator_email` = :coordinator_email,"
            . " `coordinator_line_id` = :coordinator_line_id,"
            . " `gps` = :gps"
            . " WHERE"
            . " `business`.`business_id` = :business_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':business_name',$_POST['business_name'],PDO::PARAM_STR);
    $stmt->bindParam(':address', $_POST['address'], PDO::PARAM_INT);
    $stmt->bindParam(':subdistrict_code', $_POST['subdistrict_code'], PDO::PARAM_INT);
    $stmt->bindParam(':district_code', $_POST['district_code'], PDO::PARAM_INT);
    $stmt->bindParam(':province_code', $_POST['province_code'], PDO::PARAM_INT);
    $stmt->bindParam(':industrial_estate_id', $_POST['industrial_estate_id'], PDO::PARAM_INT);
    $stmt->bindParam(':industrial_gid', $_POST['industrial_gid'], PDO::PARAM_INT);
    $stmt->bindParam(':employee_amount_id', $_POST['employee_amount_id'], PDO::PARAM_INT);
    $stmt->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
    $stmt->bindParam(':coordinator', $_POST['coordinator'], PDO::PARAM_STR);
    $stmt->bindParam(':coordinator_position', $_POST['coordinator_position'], PDO::PARAM_STR);
    $stmt->bindParam(':coordinator_telephone', $_POST['coordinator_telephone'], PDO::PARAM_STR);
    $stmt->bindParam(':coordinator_email', $_POST['coordinator_email'], PDO::PARAM_STR);
    $stmt->bindParam(':coordinator_line_id', $_POST['coordinator_line_id'], PDO::PARAM_STR);
    $stmt->bindParam(':gps', $_POST['gps'], PDO::PARAM_STR);
    $stmt->bindParam(':business_id', $_POST['business_id'], PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->rowCount();
    $res = array(
        'message' => "แก้ไขข้อมูลจำนวน $count แถว",
    );
    echo json_encode($res);
}else{
    $res = array(
        'message' => 'ไม่มีการแก้ไขข้อมูล!',
    );
    echo json_encode($res);
}
