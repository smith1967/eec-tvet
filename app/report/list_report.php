<?php

require_once('app/report/library.php');
noDirect();
$active = 'report';
$subactive = 'index';
$title = 'รายงาน';

load_fun('dataTable');
print sHeader($title,$active);

            $content ="";

	  $query="select report_id,title,creator_id,create_date from report";
	  $data=$db->query($query);
	  //$content.=$query;
	  $i=0;
	  while($row=$data->fetch_assoc()){
		  $rows[$i][0]=$row['title'];
		  $rows[$i][1]=$row['creator_id'];
		  $rows[$i][2]=$row['create_date'];
		  $rows[$i][3]="<a href='".site_url('report/detail_report&id='.$row['report_id'])."'class='btn btn-lg btn-warning'><i class='glyphicon glyphicon-edit'/></a>";
		  $rows[$i][4]="<a href='#'class='btn btn-lg btn-danger' onclick=\"return confirm('Are you sure?')\"><i class='fa fa-trash-o'/></a>";
		  $i++;
	  }
	  //$content.= print_r($rows, true);
	  $content.=dataTable('listReport',array('ชื่อรายงาน','ผู้สร้าง','วันที่สร้าง','แก้ไข','ลบ'),$rows);
            
	  print sInfoBox("กำลังคนอาชีวะ",sRow($content),"fa fa-bar-chart-o");
print sFooter();
?>