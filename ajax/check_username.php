<?php

include_once './../include/config.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
check_token($_REQUEST['token']);
if (isset($_REQUEST['username'])) {
//    $search_str = '%' . trim($_REQUEST['term']) . '%';
//echo $search_str.'<br>';
//die();

    $query = "SELECT username FROM user "
            . "WHERE username LIKE " . pq($_REQUEST['username']);
//echo $query;
    $result = mysqli_query($db, $query);
    if ($result->num_rows>0) {
        echo 'false';
//    var_dump(json_encode($data));
    } else {
        echo "true";
    }
}
