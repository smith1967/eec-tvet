<?php

require_once('app/report/library.php');
noDirect();
$active = 'report';
$subactive = 'index';
$title = 'รายงาน';

load_fun('dataTable');
print sHeader($title,$active);

            $content ="";

	  $query="select title,creator_id,create_date from report";
	  $data=$db->query($query);
	  //$content.=$query;
	  while($row=$data->fetch_assoc()){
		  $rows[]=$row;
	  }
	  //$content.= print_r($rows, true);
	  $content.=dataTable('listReport',array('ชื่อรายงาน','ผู้สร้าง','วันที่สร้าง'),$rows);
            
	  print sInfoBox("กำลังคนอาชีวะ",sRow($content),"fa fa-bar-chart-o");
print sFooter();
?>