<?php
$dataTable_init=0;
function init_dataTable(){
        global $systemFoot;
        global $dataTable_init;
        if($dataTable_init==0){
            $dataTable_init=1;
        $systemFoot.='<link rel="stylesheet" href="'.
        site_url('asset/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',true).'">';
        $systemFoot.='<script src="'.
        site_url('asset/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js',true).'"></script>';
        }
    }

function dataTable($id,$head,$rows){
    init_dataTable();

    foreach($head as $h){
        $tableHead.='<th>'.$h.'</th>';
    }

    foreach($rows as $row){
        $tableBody.='<tr>';
        foreach($row as $r){
            $tableBody.='<td>'.$r.'</td>';
        }
        
        $tableBody.='</tr>';
    }

    $ret='<table id="'.$id.'" class="table table-bordered table-hover">
    <thead>
    <tr>
      '.$tableHead.'
    </tr>
    </thead>
    <tbody>
    '.$tableBody.'
    </tbody>';

    global $systemFoot;
        $systemFoot.='<script> $(function () {
            $("#'.$id.'").DataTable()
        });
        </script>
        ';

        return $ret;
    }

