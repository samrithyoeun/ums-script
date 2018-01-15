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



			$sql = "SELECT  takes.SECTION__Id, section.RoomNo,section.DaysTime  ,course.CoName, instructor.IName FROM section INNER JOIN takes ON section._Id = takes.SECTION__Id INNER JOIN student ON takes.STUDENT__Id = student._Id INNER JOIN course ON section.COURSE_CCode = course.CCode INNER join instructor ON section.INSTRUCTOR__Id = instructor._Id WHERE student._Id = $mainkey ";
			
			$result = mysqli_query($link , $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			if(!$result)
				mysqli_error($result);
			else
				echo json_encode($data);
				
	

			
			break;

		case 'del':
			$code = $_GET['mainkey'];
			$sql = "delete from takes where STUDENT__Id = $code";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			$sql = "delete from student where _Id = $code";
			$result = mysqli_query($link , $sql);
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