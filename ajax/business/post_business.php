<?php

include_once './../../include/config.php';
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
check_token($_REQUEST['token']);
if ($_POST) {
    $data = $_POST;
    $query = "INSERT INTO `business` ("
            . "`business_id`,"
            . " `business_name`,"
            . " `address`,"
            . " `subdistrict_code`,"
            . " `district_code`,"
            . " `province_code`,"
            . " `industrial_estate_id`,"
            . " `industrial_gid`,"
            . "`employee_amount_id`,"
            . " `telephone`,"
            . " `coordinator`,"
            . " `coordinator_position`,"
            . " `coordinator_telephone`,"
            . " `coordinator_email`,"
            . " `coordinator_line_id`,"
            . " `gps`"
//            . " `economic_zone`"
            . ")"
            . " VALUES"
            . " ("
            . "NULL,"
            . pq($data['business_name']) . ","
            . pq($data['address']) . ","
            . pq($data['subdistrict_code']) . ","
            . pq($data['district_code']) . ","
            . pq($data['province_code']) . ","
            . pq($data['industrial_estate_id']) . ","
            . pq($data['industrial_gid']) . ","
            . pq($data['employee_amount_id']) . ","
            . pq($data['telephone']) . ","
            . pq($data['coordinator']) . ","
            . pq($data['coordinator_position']) . ","
            . pq($data['coordinator_telephone']) . ","
            . pq($data['coordinator_email']) . ","
            . pq($data['coordinator_line_id']) . ","
            . pq($data['gps'])
//            . pq($data['economic_zone']) . ","
            . ")";

//    var_dump($query);
//    echo '<br>'.$query;
//    die();
//    $query = "INSERT INTO group_config (groupname, group_desc, upload, download) VALUES (".pq($data['groupname']).", ".pq($data['group_desc']).", ".pq($data['upload']).", ".pq($data['download']).");";
    mysqli_query($db, $query);
    if (mysqli_affected_rows($db) > 0) {
        $res = array(
            'message' => 'เพิ่มข้อมูลสำเร็จ',
            'business_id'  => mysqli_insert_id($db)
        );
        echo json_encode($res);
    } else {
        $error = "ไม่สามารถเพิ่มข้อมูลได้ : ". mysqli_error($db). " : " . $query;
        echo json_encode($error);
    }
}
