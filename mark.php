<?php

include_once ("connection.php");

	$se = $_GET['se'];
	$mark = $_GET['mark'];
	$stud = $_GET['mainkey'];
	if($_GET['opt']=='adds'){
		$sql = "INSERT INTO takes (STUDENT__Id, SECTION__Id, Grade) VALUE ( $stud , $se , $mark )";

		$result = mysqli_query($link , $sql);
		echo json_encode($result);
	}
	else if($_GET['opt']=='upd'){
	$sql = "UPDATE takes set Grade = $mark WHERE STUDENT__Id = $stud AND SECTION__Id = $se ";

		$result = mysqli_query($link , $sql);
		echo json_encode($result);

	}
	mysqli_close($link);
	
?>