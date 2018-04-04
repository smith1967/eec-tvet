<?php

include_once './../../include/config.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
check_token($_REQUEST['token']);

$sql = "SELECT eec_center_id,office_name FROM eec ";

//ประมวณผลคำสั่ง SQL
$result = $db->query($sql);

//ตรวจสอบ จำนวนข้อมูลที่ได้ มีค่ามากกว่า  0 หรือไม่
if ($result->num_rows > 0) {

    //วนลูปนำข้อมูลที่ได้ เก็บไว้ในตัวแปร $row
    while ($row = $result->fetch_assoc()) {

        //เก็บข้อมูลที่ได้ไว้ในตัวแปร Array 
        $json_result[] = [
            'id' => $row['eec_center_id'],
            'name' => $row['office_name'],
        ];
    }

    //ใช้ Function json_encode แปลงข้อมูลในตัวแปร $json_result ให้เป็นรูปแบบ Json
    echo json_encode($json_result);
} else {
    echo "can't query";
}
