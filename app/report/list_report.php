<?php
if (!defined('BASE_PATH'))
exit('No direct script access allowed');
$active = 'report';
$subactive = 'index';
$title = 'รายงาน';

require_once('app/report/library.php');

print sHeader($title,$active);

            $content ="";

	  $query="select * from industrial_group";
	  $industrial_data=mysqli_query($db,$query);
		while($row=mysqli_fetch_array($industrial_data)){
                    $showScurve=$row['industrial_s_curve']=='first'?"First S-Curve":"New S-Curve";
						
                    $content.=sBox($row['industrial_gname'],$showScurve,"ion ion-ios-gear-outline");
                    
		}
            
	  print sInfoBox("กำลังคนอาชีวะ",sRow($content),"fa fa-bar-chart-o");
print sFooter();
?>