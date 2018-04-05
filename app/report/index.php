<?php

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
		//"value"=>$_POST['report_name'],
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

            $content ="";

	  $query="select * from industrial_group";
	  $industrial_data=mysqli_query($db,$query);
		while($row=mysqli_fetch_array($industrial_data)){
                    $showScurve=$row['industrial_s_curve']=='first'?"First S-Curve":"New S-Curve";
						
                   $content.=sBox(sIcon($row['industrial_gname'],$showScurve,"ion ion-ios-gear-outline"),9,6,12);
                    
		}
          print sInfoBox("เรียกดูรายงาน",sRow($content),"fa fa-book");
print sFooter();


?>

