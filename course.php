<?php

include_once ("connection.php");

	switch ($_GET['opt']) {
		case 'getall':
			$sql = "SELECT * From course";
			$result = mysqli_query($link , $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			echo json_encode($data);
			break;
		
		case 'getdetail': 	
			$mainkey = $_GET['mainkey'];
			$sql = "SELECT * FROM course WHERE CoName ='$mainkey'";
			$result = mysqli_query($link , $sql);
				$data[] = mysqli_fetch_assoc($result);
			echo json_encode($data);
			break;

		case 'del':
			$mk = $_GET['mainkey'];
			$sql = "DELETE FROM course WHERE CCode= IF(((SELECT COUNT(COURSE_CCode) FROM section WHERE COURSE_CCode=$mk)>0),null,$mk)  ";
			$result = mysqli_query($link , $sql);
			echo json_encode($result);
			break;

		case 'upd':
			$name = $_GET['name'];
			$desc= $_GET['desc'];
			$name = $_GET['name'];
			$credit = $_GET['credit'];
			$dcodes= $_GET['dcodes'];
			$level = $_GET['level'];
			$code = $_GET['code'];

			$sql = 	" UPDATE course SET CCode = $code, CoName = '$name', Credits = $credit, Level = $level, CDesc = '$desc', DEPT_DCode = $dcodes WHERE CCode = $code ";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			break;

		case 'adds':
			$name = $_GET['name'];
			$desc= $_GET['desc'];
			$name = $_GET['name'];
			$credit = $_GET['credit'];
			$dcodes= $_GET['dcodes'];
			$level = $_GET['level'];
			$code = $_GET['code'];

			$sql = 	"INSERT INTO project_university.course (CCode, CoName, Credits, Level, CDesc, DEPT_DCode) VALUES ($code, '$name', $credit, $level, '$desc', $dcodes)";
			$result = mysqli_query($link , $sql);

			echo json_encode($result."sucess");
			break;



	}
	
	mysqli_close($link);
	
?>