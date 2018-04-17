<?php

include_once './../../include/config.php';
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
check_token($_REQUEST['token']);
if ($_REQUEST['status'] == 'disactive') {
    $sql = "SELECT u.user_id,u.`username`,u.fname,u.lname,u.status,if(u.user_type_id=1,e.office_name,if(u.user_type_id=2,e.office_name,if(u.user_type_id=3,s.school_name,b.business_name))) As org_name\n"
            . "FROM `user` u \n"
            . "LEFT JOIN eec_center e ON u.org_id = e.eec_center_id \n"
            . "LEFT JOIN school s ON u.org_id = s.school_id \n"
            . "LEFT JOIN business b ON u.org_id = b.business_id \n"
            . "WHERE status='disactive'";
    //AND status = 'disactive'
    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = array(
        "recordsTotal" => $stmt->rowCount(),
    );
    if ($result) {
        foreach ($result as $row) {
            $data[] = $row;
        }
        $i = 0;
        foreach ($data as $key) {
            $data[$i]['button'] = '<button type="button" class="btn btn-danger btn-sm btn-active"><i class="fa fa-toggle-off"></i></button>';
            $i++;
        }
    }
    $output['data'] = $data;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
//    echo json_encode($data);
    return;
} else if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] !== '') {
    $user_id = $_REQUEST['user_id'];
    $sql = "SELECT * FROM user WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // data for edit form
    echo json_encode($res);
    return;
} else {
    $sql = "SELECT u.user_id,u.`username`,u.fname,u.lname,u.status,if(u.user_type_id=1,e.office_name,if(u.user_type_id=2,e.office_name,if(u.user_type_id=3,s.school_name,b.business_name))) As org_name\n"
            . "FROM `user` u \n"
            . "LEFT JOIN eec_center e ON u.org_id = e.eec_center_id \n"
            . "LEFT JOIN school s ON u.org_id = s.school_id \n"
            . "LEFT JOIN business b ON u.org_id = b.business_id";
    //AND status = 'disactive'
    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $data[] = $row;
    }
    $i = 0;
    foreach ($data as $key) {
        if ($key['status'] == 'active') {
            $data[$i]['button'] = '<button type="button" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#userModal"><i class="fa fa-edit"></i></button>'
                    . ' <button type="button" class="btn btn-success btn-sm btn-disactive"><i class="fa fa-toggle-on"></i></button>';
        } else {
            $data[$i]['button'] = '<button type="button" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#userModal"><i class="fa fa-edit"></i></button>'
                    . ' <button type="button" class="btn btn-danger btn-sm btn-active"><i class="fa fa-toggle-off"></i></button>';
        }
        $i++;
    }

    $datax = array('data' => $data);
    echo json_encode($datax, JSON_UNESCAPED_UNICODE);
//    echo json_encode($data);
    return;
}
    
//$sql = "SELECT u.`username`,if(u.user_type_id=1,e.office_name,if(u.user_id=2,s.school_name,b.business_name)) As org_name\n"
//
//    . "FROM `user` u \n"
//
//    . "LEFT JOIN eec_center e ON u.org_id = e.eec_center_id \n"
//
//    . "LEFT JOIN school s ON u.org_id = s.school_id \n"
//
//    . "LEFT JOIN business b ON u.org_id = b.business_id";

//SELECT u.`username`,u.user_type_id,if(u.user_type_id=1,e.office_name,if(u.user_type_id=2,e.office_name,if(u.user_type_id=3,s.school_name,b.business_name))) As org_name
//FROM `user` u 
//LEFT JOIN eec_center e ON u.org_id = e.eec_center_id 
//LEFT JOIN school s ON u.org_id = s.school_id 
//LEFT JOIN business b ON u.org_id = b.business_id