<?php

include_once ("connection.php");
	$code = $_GET['code'];
	$sql = "SELECT course.CoName, takes.Grade FROM section INNER JOIN takes ON section._Id = takes.SECTION__Id INNER JOIN student ON takes.STUDENT__Id = student._Id INNER JOIN course ON section.COURSE_CCode = course.CCode WHERE student._Id = $code";

	$result = mysqli_query($link , $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			echo json_encode($data);
	
	mysqli_close($link);
	
?>