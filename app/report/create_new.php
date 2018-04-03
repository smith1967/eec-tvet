﻿<?php

require_once('app/report/library.php');
noDirect();
$active = 'report';
$subactive = 'index';
$title = 'รายงาน';

load_fun("form");

$formItem=array(
	"report_name"=>array(
		"label"=>"ชื่อรายงาน",
		"type"=>"text",
		"icon"=>"glyphicon glyphicon-pencil",
		"placeholder"=>"ระบุชื่อรายงาน",
		"value"=>$_POST['report_name'],
		),
      "query"=>array(
                "id"=>"query",
                "label"=>"คำร้อง",
                "type"=>"sourceHL",
          "width"=>"50",
          
      ),
      "submitBT"=>array(
		"type"=>"submit",
		"value"=>"สร้างรายงาน",
		),
	);

print sHeader($title,$active);
            $formContent=array(
                //'caption'=>'สร้างรายงาน',
                'action'=> site_url('report/create_new'),
                'item'=> genInput($formItem),
            );
            $content = sRow(sBox(genForm($formContent),9,6,12));
            
            //$content.=sBox("Create new report","สร้างรายงาน","fa fa-pencil-square-o");
            
print sInfoBox("สร้างรายงาน",sRow($content),"fa fa-book");

print sFooter();


?>

