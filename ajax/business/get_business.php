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
check_token($_REQUEST['token']);
if (isset($_REQUEST['business_id'])) {
    $business_id = $_REQUEST['business_id'];
    $sql = "SELECT "
            . "`business_id`,"
            . " `business_name`,"
            . " `address`,"
            . " `province_code`,"
            . " `district_code`,"
            . " `subdistrict_code`,"
            . " `industrial_estate_id`,"
            . " `industrial_gid`,"
            . " `employee_amount_id`,"
            . " `telephone`,"
            . " `coordinator`,"
            . " `coordinator_position`,"
            . " `coordinator_telephone`,"
            . " `coordinator_email`,"
            . " `coordinator_line_id`,"
            . " `gps`,"
            . " `economic_zone`"
            . " FROM "
            . "business "
            . "WHERE "
            . "business_id = :business_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':business_id', $business_id, PDO::PARAM_INT);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
    return;
} else {
//    $query = "SELECT * FROM business";
    $query = "SELECT b.business_id,b.business_name,p.province_name "
            . "FROM "
            . "business as b LEFT JOIN province as p ON b.province_code = p.province_code "
            . "GROUP BY "
            . "b.business_id "
            . "ORDER BY "
            . "`b`.`business_id` "
            . "ASC";
//echo $query;
}
//if (isset($_REQUEST)) {
//    $search_str = '%' . trim($_REQUEST['term']) . '%';
//echo $search_str.'<br>';
//die();
//    $query = "SELECT b.business_id,b.business_name,p.province_name,COUNT(t.trainer_id) AS trainers FROM business as b LEFT JOIN province as p ON b.province_id = p.province_code LEFT JOIN trainer AS t ON b.business_id = t.business_id GROUP BY b.business_id ORDER BY `b`.`business_id` ASC";
//echo $query;
$result = mysqli_query($db, $query);
if ($result) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
//        $json_data = array();
//        $json_data['data'] = $data;
//        var_dump($json_data);
//        exit();
    $i = 0;
    if ($_SESSION['user']['user_type_id'] == '1') {
        foreach ($data as $key) {
            $data[$i]['button'] = '<button type="button" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#formModal"><i class="fa fa-pencil"></i></button>'
                    . ' <button type="button" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash-o"></i></button>';
            $i++;
        }
    } else {
        foreach ($data as $key) {
            $data[$i]['button'] = '<button type="button" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#formModal"><i class="fa fa-edit"></i></button>';
            $i++;
        }
    }
    $datax = array('data' => $data);
    echo json_encode($datax, JSON_UNESCAPED_UNICODE);
//        echo json_encode($json_data, JSON_UNESCAPED_UNICODE);
//        var_dump($json_data);
//        exit();
//        echo json_encode($json_data);
//    var_dump(json_encode($data));
} else {
    echo "can't query";
}
//}
//$data = array(
//    array(
//      'id'=>1,
//    'name'=>'test'  
//    ),
//        array(
//      'id'=>2,
//    'name'=>'test2'  
//    ),
//);
//echo json_encode($data);