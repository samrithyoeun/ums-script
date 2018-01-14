<?php

include_once ("connection.php");

	switch ($_GET['opt']) {
		case 'getall':
			$sql = "SELECT * From college";
			$result = mysqli_query($link , $sql);

			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

			echo json_encode($data);
			break;
		case 'getdetail': 

				$mainkey = $_GET['mainkey'];


				$sql = "SELECT * FROM college WHERE CName ='$mainkey'";
				$result = mysqli_query($link , $sql);
				$data[] = mysqli_fetch_assoc($result);
					

				$sql = "SELECT COUNT(_Id) as 'lecturer' FROM instructor WHERE college_CName ='$mainkey'";
				$result = mysqli_query($link , $sql);
				$row = mysqli_fetch_assoc($result);
					$data[]=$row;


				$sql = "SELECT * FROM dept WHERE COLLEGE_CName ='$mainkey' ";
				$result = mysqli_query($link , $sql);
				while($row = mysqli_fetch_assoc($result))
					$data[] = $row;	

				echo json_encode($data);
			break;
		
		case 'del':
			$mk = $_GET['mainkey'];
			$sql = "DELETE FROM college WHERE CName= IF(((SELECT COUNT(COLLEGE_CName) FROM dept WHERE COLLEGE_CName='$mk')>0),null,'$mk') ";
			$result = mysqli_query($link , $sql);
			echo json_encode($result);
			break;

		case 'upd':
			$mk= $_GET['mainkey'];
			$name = $_GET['name'];
			$office = $_GET['office'];
			$phone = $_GET['phone'];

			$sql = 	"UPDATE project_university.college SET CName='$name', COffice='$office', CPhone='$phone' WHERE CName='$name'";
			$result = mysqli_query($link , $sql);

			echo json_encode($result."sucess");
			break;

		case 'adds':
			$name = $_GET['name'];
			$office = $_GET['office'];
			$phone = $_GET['phone'];
			$sql = 	"INSERT INTO project_university.college (CName, COffice, CPhone) VALUES ('$name', '$office', '$phone')";
			$result = mysqli_query($link , $sql);
			echo json_encode($result+"sucess");
			break;


	}
	
	mysqli_close($link);
	
?>