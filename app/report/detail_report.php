<?php

require_once('app/report/library.php');
noDirect();
$active = 'report';
$subactive = 'index';
$title = 'รายงาน';

load_fun("form");
print sHeader($title,$active);
$actionPage=site_url('report/save_report');
if(isset($_GET['id'])){
    $query='select * from report where report_id='.$_GET['id'].' limit 1';

    //$content.=$query;
    $report_data=$db->query($query);
    $report=$report_data->fetch_assoc();
    //$report_data=$report_data[0];
    $actionPage.="&id=".$_GET['id'];
}
$xcontent.='<div class="col-md-9">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#report_name" data-toggle="tab">ชื่อรายงาน</a></li>
<li><a href="#report_header" data-toggle="tab">ส่วนหัวของรายงาน</a></li>
<li><a href="#report_query" data-toggle="tab">คำร้องขอ</a></li>
</ul>
<div class="tab-content">
  <div class="active tab-pane" id="report_name">
a

  </div>
  <div class="tab-pane" id="report_header">
  b

  </div>
  <div class="tab-pane" id="report_query">
  c
  </div>
</div>
</div>
</div>';
//$systemFoot.='<script src="'.site_url("asset/AdminLTE/bower_components/fastclick/lib/fastclick.js",true).'"></script>';
$formItem=array(
"report_query"=>array(
        "id"=>"report_query",
        "label"=>"คำร้องขอรายงาน",
        "type"=>"tab-pane",
        "class"=>"active"
        ),
"query"=>array(
    "id"=>"query",
    "label"=>"คำร้อง",
    "type"=>"sourceHL",
    "value"=>$report['query'],
"width"=>"50",

),
    "report_nametab"=>array(
        "id"=>"report_nametab",
        "label"=>"ชื่อรายงาน",
        "type"=>"tab-pane"
        ),
	"report_name"=>array(
		"label"=>"ชื่อรายงาน",
		"type"=>"text",
		"icon"=>"glyphicon glyphicon-pencil",
		"placeholder"=>"ระบุชื่อรายงาน",
		"value"=>$report['title'],
        ),
    "report_header"=>array(
            "id"=>"report_header",
            "label"=>"ส่วนหัวของรายงาน",
            "type"=>"tab-pane"
            ),
    "report_head"=>array(
            "id"=>"report_head",
            "label"=>"ส่วนหัว",
            "type"=>"wysiwyg",
            "value"=>base64_decode($report['report_head']),
      "width"=>"50",
      
                ),
    "table_header"=>array(
                    "id"=>"table_header",
                    "label"=>"คำร้องส่วนหัวของตาราง",
                    "type"=>"tab-pane",
                    ),
      "table_head"=>array(
                "id"=>"table_head",
                "label"=>"หัวตาราง",
                "type"=>"sourceHL",
                "value"=>$report['table_head'],
          "width"=>"50",
          
      ),
      
      "submitBT"=>array(
		"type"=>"submit",
		"value"=>"บันทึกรายงาน",
		),
	);


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