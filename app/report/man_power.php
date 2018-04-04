<?php

require_once('app/report/library.php');
noDirect();
$active = 'report';
$subactive = 'index';
$title = 'รายงาน';


print sHeader($title,$active);

            
	  print sInfoBox("กำลังคนอาชีวะ",sRow($content),"fa fa-bar-chart-o");
print sFooter();
?>