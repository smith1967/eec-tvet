<?php

require_once('app/report/library.php');
noDirect();
$active = 'report';
$subactive = 'index';
$title = 'รายงาน';
?>

<?php

print sHeader($title,$active);
	
	$query="SELECT school.school_name as ชื่อสถานศึกษา,count(student.student_id) as จำนวนผู้เรียน from school left join student on student.school_id=school.school_id group by student.school_id order by school.school_name";

	$data=mysqli_query($db,$query);
	$content="<table id='table2excel'><tr><th>ที่</th><th>ชื่อสถานศึกษา</th><th>จำนวนผู้เรียน</th></tr>";
	$i=0;
	while($row=mysqli_fetch_array($data)){
		$i++;
		$content.="<tr>
			<td>".$i."</td>
			<td>".$row['ชื่อสถานศึกษา']."</td>
			<td align='right'>".number_format($row['จำนวนผู้เรียน'])."</td>
		</tr>";
	}
	$content.="</table><button id='export' class='btn btn-block btn-success'>Export</button>";
$systemFoot.="<script src=".site_url('app/report/excel/src/jquery.table2excel.js',true)."></script>
<script>
	$(\"#export\").click(function(){
  $(\"#table2excel\").table2excel({
    // exclude CSS class
    exclude: \".noExl\",
    name: \"Worksheet Name\",
    filename: \"Export\" //do not include extension
  });
});

</script>

	";
            
	  print sInfoBox("กำลังคนอาชีวะ",sRow(sBox($content,6,3)),"fa fa-bar-chart-o");
print sFooter();
?>