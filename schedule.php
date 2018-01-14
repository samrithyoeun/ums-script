<?php

include_once ("connection.php");

		$code =$_GET['id'];
			$sql = "SELECT  section.RoomNo,section.DaysTime  ,course.CoName, instructor.IName FROM section INNER JOIN takes ON section._Id = takes.SECTION__Id INNER JOIN student ON takes.STUDENT__Id = student._Id INNER JOIN course ON section.COURSE_CCode = course.CCode INNER join instructor ON section.INSTRUCTOR__Id = instructor._Id WHERE student._Id = $code ";
			
			$result = mysqli_query($link , $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			if(!$result)
				mysqli_error($result);
			else
				echo json_encode($data);
			
		
	mysqli_close($link);
	
?>