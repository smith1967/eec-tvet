<?php

require_once('app/report/library.php');
noDirect();
$active = 'report';
$subactive = 'index';
$title = 'บันทึกรายงาน..';

            
print sHeader($title,$active);
	//$page_data= print_r($_POST, true);
	//$page_data.= print_r($_GET, true);
	//$page_data.= print_r($_SESSION, true);
	//$content = sRow(sBox($page_data,9,6,12));
	
	
	$url=site_url("report/detail_report&id=");
	$rawSql=$_POST['query'];
	$sql=mysqli_real_escape_string($db,$rawSql);
	$report_head=base64_encode($_POST['report_head']);
	if(isset($_GET['id'])){
		//Update
		$query='update report set title="'.$_POST['report_name'].'",report_head="'.$report_head.'",query="'.$sql.
		'"  where report_id = '.$_GET['id'];
	}else{
		//cereate
		$query='insert into report (title,report_head,query,create_date,creator_id) values ("'.$_POST['report_name'].'",
		"'.$report_head.'",
		"'.$sql.'",NOW(),"'.$_SESSION['user']['user_id'].'")';
		$content.= "<p>".$query."</p>";
	}

	if($db->query($query)===TRUE){
		$content.='สำเร็จ : ';


		$_GET['id']?$id=$_GET['id']:$id=$db->insert_id;

		$url.=$id;
		$query="CREATE OR REPLACE VIEW view_report_".$id." AS
		".$rawSql;
		$db->query($query);
		$content.=$query;
		$content.='<meta http-equiv="refresh" content="5; url='.$url.'">';
		
	}else{
		$content.='ผิดพลาด : '.$db->error;
	}

	
	print sInfoBox("บันทึกรายงาน..",sRow($content),"fa fa-database");	

print sFooter();


?>

