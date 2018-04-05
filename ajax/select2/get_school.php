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
// if (isset($_REQUEST)) {
//     $search_str = '%' . trim($_REQUEST['term']) . '%';
//echo $search_str.'<br>';
//die();

$sql = "SELECT school_id,school_name FROM school ";
// . "WHERE school_name LIKE " . pq($search_str) . " OR school_id LIKE " . pq($search_str);
//echo $query;
//ประมวณผลคำสั่ง SQL
$result = $db->query($sql);

//ตรวจสอบ จำนวนข้อมูลที่ได้ มีค่ามากกว่า  0 หรือไม่
if ($result->num_rows > 0) {

    //วนลูปนำข้อมูลที่ได้ เก็บไว้ในตัวแปร $row
    while ($row = $result->fetch_assoc()) {

        //เก็บข้อมูลที่ได้ไว้ในตัวแปร Array 
        $json_result[] = [
            'id' => $row['school_id'],
            'name' => $row['school_name'],
        ];
    }

    //ใช้ Function json_encode แปลงข้อมูลในตัวแปร $json_result ให้เป็นรูปแบบ Json
    echo json_encode($json_result);
} else {
    echo "can't query";
}
// }
//         //กำหนดให้ตัวแปร $province_id มีค่าเท่ากับ $_GET['province_id]
//         $province_code = $_GET['province_code'];

//         //คำสั่ง SQL เลือก AMPHUR_ID และ  AMPHUR_NAME ที่มี PROVINCE_ID เท่ากับ $province_id
//         $sql = "SELECT district_code,district_name FROM district WHERE province_code = ".pq($province_code);

//         //ประมวณผลคำสั่ง SQL
//         $result = $db->query($sql);

//         //ตรวจสอบ จำนวนข้อมูลที่ได้ มีค่ามากกว่า  0 หรือไม่
//         if ($result->num_rows > 0) {

//                 //วนลูปนำข้อมูลที่ได้ เก็บไว้ในตัวแปร $row
//                 while($row = $result->fetch_assoc()) {

//                         //เก็บข้อมูลที่ได้ไว้ในตัวแปร Array 
//                         $json_result[] = [
//                                 'id'=>$row['district_code'],
//                                 'name'=>$row['district_name'],
//                         ];
//                 }

//                 //ใช้ Function json_encode แปลงข้อมูลในตัวแปร $json_result ให้เป็นรูปแบบ Json
//                 echo json_encode($json_result);

//         } 