<?php

require_once('app/report/library.php');
noDirect();
$active = 'report';
$subactive = 'index';
$title = 'รายงาน';

load_fun("form");

$actionPage=site_url('report/save_report');
if(isset($_GET['id'])){
    $query='select * from report where report_id='.$_GET['id'].' limit 1';

    //$content.=$query;
    $report_data=$db->query($query);
    $report=$report_data->fetch_assoc();
    //$report_data=$report_data[0];
    $actionPage.="&id=".$_GET['id'];
}

$formItem=array(
	"report_name"=>array(
		"label"=>"ชื่อรายงาน",
		"type"=>"text",
		"icon"=>"glyphicon glyphicon-pencil",
		"placeholder"=>"ระบุชื่อรายงาน",
		"value"=>$report['title'],
		),
      "query"=>array(
                "id"=>"query",
                "label"=>"คำร้อง",
                "type"=>"sourceHL",
                "value"=>$report['query'],
          "width"=>"50",
          
      ),
      "submitBT"=>array(
		"type"=>"submit",
		"value"=>"บันทึกรายงาน",
		),
	);

print sHeader($title,$active);
            $formContent=array(
                //'caption'=>'สร้างรายงาน',
                'action'=> $actionPage,
                'item'=> genInput($formItem),
            );
            $content .= sRow(sBox(genForm($formContent),9,6,12));
            
            //$content.=sBox("Create new report","สร้างรายงาน","fa fa-pencil-square-o");
            
print sInfoBox("ข้อมูลการรายงาน",sRow($content),"fa fa-book");

print sFooter();


?>

