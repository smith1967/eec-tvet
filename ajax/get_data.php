<?php
include_once './../include/config.php';
//ตรวจสอบว่า มีค่า ตัวแปร $_GET['show_province'] เข้ามาหรือไม่  	//แสดงรายชื่อจังหวัด
//var_dump($_GET);
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
if(isset($_GET['show_province'])){

        //คำสั่ง SQL เลือก id และ  ชื่อจังหวัด
        $sql = "SELECT PROVINCE_CODE,PROVINCE_NAME FROM province";

        //ประมวณผลคำสั่ง SQL
        $result = $db->query($sql);

        //ตรวจสอบ จำนวนข้อมูลที่ได้ มีค่ามากกว่า  0 หรือไม่
        if ($result->num_rows > 0) {

                //วนลูปแสดงข้อมูลที่ได้ เก็บไว้ในตัวแปร $row
                while($row = $result->fetch_assoc()) {

                        //เก็บข้อมูลที่ได้ไว้ในตัวแปร Array 
                        $json_result[] = [
                                'id'=>$row['PROVINCE_CODE'],
                                'name'=>$row['PROVINCE_NAME'],
                        ];
                }

                //ใช้ Function json_encode แปลงข้อมูลในตัวแปร $json_result ให้เป็นรูปแบบ Json
                echo json_encode($json_result);

        } 
}


//ตรวจสอบว่า มีค่า ตัวแปร $_GET['province_id'] เข้ามาหรือไม่  //แสดงรายชืออำเภอ
if(isset($_GET['province_code'])){

        //กำหนดให้ตัวแปร $province_id มีค่าเท่ากับ $_GET['province_id]
        $province_code = $_GET['province_code'];

        //คำสั่ง SQL เลือก AMPHUR_ID และ  AMPHUR_NAME ที่มี PROVINCE_ID เท่ากับ $province_id
        $sql = "SELECT DISTRICT_CODE,DISTRICT_NAME FROM DISTRICT WHERE PROVINCE_CODE = ".pq($province_code);

        //ประมวณผลคำสั่ง SQL
        $result = $db->query($sql);

        //ตรวจสอบ จำนวนข้อมูลที่ได้ มีค่ามากกว่า  0 หรือไม่
        if ($result->num_rows > 0) {

                //วนลูปนำข้อมูลที่ได้ เก็บไว้ในตัวแปร $row
                while($row = $result->fetch_assoc()) {

                        //เก็บข้อมูลที่ได้ไว้ในตัวแปร Array 
                        $json_result[] = [
                                'id'=>$row['DISTRICT_CODE'],
                                'name'=>$row['DISTRICT_NAME'],
                        ];
                }

                //ใช้ Function json_encode แปลงข้อมูลในตัวแปร $json_result ให้เป็นรูปแบบ Json
                echo json_encode($json_result);

        } 
}


//ตรวจสอบว่า มีค่า ตัวแปร $_GET['district_code'] เข้ามาหรือไม่  
//แสดงรายชือตำบล
if(isset($_GET['district_code'])){

        //กำหนดให้ตัวแปร $amphur_id มีค่าเท่ากับ $_GET['amphur_id]
        $district_code = $_GET['district_code'];

        //คำสั่ง SQL เลือก DISTRICT_CODE และ  DISTRICT_NAME ที่มี AMPHUR_ID เท่ากับ $amphur_id
        $sql = "SELECT SUBDISTRICT_CODE,SUBDISTRICT_NAME FROM subdistrict WHERE DISTRICT_CODE = ".pq($district_code)." ";

        //ประมวณผลคำสั่ง SQL
        $result = $db->query($sql);

        //ตรวจสอบ จำนวนข้อมูลที่ได้ มีค่ามากกว่า  0 หรือไม่
        if ($result->num_rows > 0) {

                //วนลูปนำข้อมูลที่ได้ เก็บไว้ในตัวแปร $row
                while($row = $result->fetch_assoc()) {

                        //เก็บข้อมูลที่ได้ไว้ในตัวแปร Array 
                        $json_result[] = [
                                'id' => $row['SUBDISTRICT_CODE'],
                                'name'=>$row['SUBDISTRICT_NAME'],

                        ];
                }

                //ใช้ Function json_encode แปลงข้อมูลในตัวแปร $json_result ให้เป็นรูปแบบ Json
                echo json_encode($json_result);
        }         
}
// รายการ zip code
if(isset($_GET['subdistrict_code'])){

        //กำหนดให้ตัวแปร $amphur_id มีค่าเท่ากับ $_GET['amphur_id]
        $district_id = $_GET['subdistrict_code'];

        //คำสั่ง SQL เลือก DISTRICT_CODE และ  DISTRICT_NAME ที่มี AMPHUR_ID เท่ากับ $amphur_id
        $sql = "SELECT zipcode FROM zipcodes WHERE district_code = ".pq($subdistrict_code)." ";
//        echo $sql.'<br>';
        //ประมวณผลคำสั่ง SQL
        $result = $db->query($sql);

        //ตรวจสอบ จำนวนข้อมูลที่ได้ มีค่ามากกว่า  0 หรือไม่
        if ($result->num_rows > 0) {

                //วนลูปนำข้อมูลที่ได้ เก็บไว้ในตัวแปร $row
                while($row = $result->fetch_assoc()) {
                        //เก็บข้อมูลที่ได้ไว้ในตัวแปร Array 
                        $json_result[] = [
                                'id' => $row['zipcode'],
//                                'name'=>$row['DISTRICT_NAME'],
                        ];
                }

                //ใช้ Function json_encode แปลงข้อมูลในตัวแปร $json_result ให้เป็นรูปแบบ Json
                echo json_encode($json_result);
        }         
}


?>