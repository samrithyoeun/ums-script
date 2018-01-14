<?php
	include_once ("connection.php");

	$opt = $_GET["opt"];

	switch ($opt) {
		case 'college':
				
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

		case 'course':
			$mainkey = $_GET['mainkey'];
			$sql = "SELECT * FROM course WHERE CoName ='$mainkey'";
			$result = mysqli_query($link , $sql);
				$data[] = mysqli_fetch_assoc($result);
					

			echo json_encode($data);

			break;	
	}

	mysqli_close($link);

?>