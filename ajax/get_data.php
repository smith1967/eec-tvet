<?php
include_once './../include/config.php';
//ตรวจสอบว่า มีค่า ตัวแปร $_GET['show_province'] เข้ามาหรือไม่  	//แสดงรายชื่อจังหวัด
//var_dump($_GET);
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
check_token($_REQUEST['token']);
if(isset($_GET['show_province'])){

        //คำสั่ง SQL เลือก id และ  ชื่อจังหวัด
        $sql = "SELECT province_code,province_name FROM province";

        //ประมวณผลคำสั่ง SQL
        $result = $db->query($sql);

        //ตรวจสอบ จำนวนข้อมูลที่ได้ มีค่ามากกว่า  0 หรือไม่
        if ($result->num_rows > 0) {

                //วนลูปแสดงข้อมูลที่ได้ เก็บไว้ในตัวแปร $row
                while($row = $result->fetch_assoc()) {

                        //เก็บข้อมูลที่ได้ไว้ในตัวแปร Array 
                        $json_result[] = [
                                'id'=>$row['province_code'],
                                'name'=>$row['province_name'],
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
        $sql = "SELECT district_code,district_name FROM district WHERE province_code = ".pq($province_code);

        //ประมวณผลคำสั่ง SQL
        $result = $db->query($sql);

        //ตรวจสอบ จำนวนข้อมูลที่ได้ มีค่ามากกว่า  0 หรือไม่
        if ($result->num_rows > 0) {

                //วนลูปนำข้อมูลที่ได้ เก็บไว้ในตัวแปร $row
                while($row = $result->fetch_assoc()) {

                        //เก็บข้อมูลที่ได้ไว้ในตัวแปร Array 
                        $json_result[] = [
                                'id'=>$row['district_code'],
                                'name'=>$row['district_name'],
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
        $sql = "SELECT subdistrict_code,subdistrict_name FROM subdistrict WHERE district_code = ".pq($district_code)." ";

        //ประมวณผลคำสั่ง SQL
        $result = $db->query($sql);

        //ตรวจสอบ จำนวนข้อมูลที่ได้ มีค่ามากกว่า  0 หรือไม่
        if ($result->num_rows > 0) {

                //วนลูปนำข้อมูลที่ได้ เก็บไว้ในตัวแปร $row
                while($row = $result->fetch_assoc()) {

                        //เก็บข้อมูลที่ได้ไว้ในตัวแปร Array 
                        $json_result[] = [
                                'id' => $row['subdistrict_code'],
                                'name'=>$row['subdistrict_name'],

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