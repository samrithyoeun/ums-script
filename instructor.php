<?php

include_once ("connection.php");

	switch ($_GET['opt']) {
		case 'getall':
			$sql = "SELECT * From instructor";
			$result = mysqli_query($link , $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			echo json_encode($data);
			break;
		
		case 'getdetail': 	
			$mainkey = $_GET['mainkey'];
			$sql = "SELECT * FROM instructor WHERE _Id ='$mainkey'";
			$result = mysqli_query($link , $sql);
				$data[] = mysqli_fetch_assoc($result);
			
				$dcod = $data[0]["DEPT_DCode"];


			$sql = "SELECT DName FROM Dept where DCode = $dcod";
			$result = mysqli_query($link , $sql);
				$data[] = mysqli_fetch_assoc($result);

			echo json_encode($data);

			
			break;

		case 'del':
			$code = $_GET['mainkey'];
			$sql = "DELETE FROM instructor WHERE _Id= IF(((SELECT COUNT(INSTRUCTOR__Id) FROM section WHERE INSTRUCTOR__Id=$code)>0),null,$code)  ;";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			break;

		case 'upd':
			$code = $_GET['code'];
			$dcode = $_GET['DCode'];
			$office= $_GET['office'];
			$name = urldecode($_GET['name']);
			$phone = $_GET['phone'];
			$cname= $_GET['Cname'];
			$rank = urlencode($_GET['rank']);
			$dates = $_GET['dates'];
			
			

			$sql = 	"UPDATE  instructor  SET  _Id =$code, DEPT_DCode = $dcode,college_CName = '$cname' , IName = '$name',  IOffice = '$office',  IRank = '$rank',  IPhone = '$phone',  CStart_date = '$dates' WHERE  _Id = $code ";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			break;

		case 'adds':
		$code = $_GET['code'];
			$dcode = $_GET['DCode'];
			$office= $_GET['office'];
			$name = urldecode($_GET['name']);
			$phone = $_GET['phone'];
			$cname= $_GET['Cname'];
			$rank = urlencode($_GET['rank']);
			$dates = $_GET['dates'];
			
			
			$sql = 	"INSERT INTO   instructor   (  _Id  ,   college_CName  ,   DEPT_DCode  ,   IName  ,   IOffice  ,   IRank  ,   IPhone  ,   CStart_date  ) VALUES ($code, '$cname', $dcode, '$name', '$office', '$rank', '$phone', '$dates');";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			break;
		



	}
	
	mysqli_close($link);
	
?>