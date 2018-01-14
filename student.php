<?php

include_once ("connection.php");

	switch ($_GET['opt']) {
		case 'getall':
			$sql = "SELECT * From student";
			$result = mysqli_query($link , $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			echo json_encode($data);
			break;
		
		case 'getdetail': 	
			$mainkey = $_GET['mainkey'];
			$sql = "SELECT * FROM student WHERE _Id ='$mainkey'";
			$result = mysqli_query($link , $sql);
				$data[] = mysqli_fetch_assoc($result);
			echo json_encode($data);

			
			break;

		case 'del':
			$code = $_GET['mainkey'];
			$sql = "DELETE FROM student WHERE _Id= IF(((SELECT COUNT(STUDENT__Id) FROM takes WHERE STUDENT__Id=$code)>0),null,$code) ";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			break;

		case 'upd':
			$ad = $_GET['ad'];
			$dc = $_GET['dc'];
			$bd = $_GET['bd'];
			$fn = $_GET['fn'];
			$ln = $_GET['ln'];
			$mj = $_GET['mj'];
			$ph = $_GET['ph'];
			$id = $_GET['id'];

			$sql = 	"UPDATE  student  SET  _Id =$id,  FName ='$fn', LName ='$ln',  DOB ='$bd',  Address ='$ad',  Phone ='$ph',  Major ='$mj',  DEPT_DCode =$dc WHERE  _Id =$id";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			break;

		case 'adds':
		$ad = $_GET['ad'];
			$dc = $_GET['dc'];
			$bd = $_GET['bd'];
			$fn = $_GET['fn'];
			$ln = $_GET['ln'];
			$mj = $_GET['mj'];
			$ph = $_GET['ph'];
			$id = $_GET['id'];
			$sql = 	"INSERT INTO student (_Id,DEPT_DCode,FName,MName,LName,DOB,Address,Phone,Major) value ($id,$dc,'$fn','','$ln','$bd','$ad','$ph','$mj')";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			break;
		



	}
	
	mysqli_close($link);
	
?>