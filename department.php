<?php

include_once ("connection.php");

	switch ($_GET['opt']) {
		case 'getall':
			$sql = "SELECT * From dept";
			$result = mysqli_query($link , $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			echo json_encode($data);
			break;
		
		case 'getdetail': 	
			$mainkey = $_GET['mainkey'];
			$sql = "SELECT * FROM dept WHERE DCode ='$mainkey'";
			$result = mysqli_query($link , $sql);
				$data[] = mysqli_fetch_assoc($result);


			$sql = "SELECT COUNT(*) as lecturer FROM instructor where DEPT_DCode = $mainkey";
			$result = mysqli_query($link , $sql);
				$data[] = mysqli_fetch_assoc($result);

			$sql = "SELECT COUNT(*) as 'students' from student where DEPT_Dcode = $mainkey";
			$result = mysqli_query($link , $sql);
				$data[] = mysqli_fetch_assoc($result);

			echo json_encode($data);

			
			break;

		case 'del':
			$code = $_GET['mainkey'];
			$sql = "delete from dept where DCode = if(( (select count(DEPT_DCode) from instructor where DEPT_DCode= $code)>0 or (select count(DEPT_DCode) from student where DEPT_DCode= $code)>0 or (select count(DEPT_DCode) from course where DEPT_DCode= $code)>0 ),null, $code )";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			break;

		case 'upd':
			$dcode = $_GET['code'];
			$office= $_GET['office'];
			$name = $_GET['name'];
			$phone = $_GET['phone'];
			$cname= $_GET['CName'];
			

			$sql = 	"UPDATE  dept  SET  DName ='$name',  DOffice ='$office',  DPhone ='$phone',  COLLEGE_CName ='$cname' WHERE  DCode = $dcode";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			break;

		case 'adds':
			$dcode = $_GET['code'];
			$office= $_GET['office'];
			$name = $_GET['name'];
			$phone = $_GET['phone'];
			$cname= $_GET['Cname'];
			

			$sql = 	"INSERT INTO   project_university  .  dept   (  DCode  ,   DName  ,   DOffice  ,   DPhone  ,   COLLEGE_CName  ) VALUES ($dcode, '$name', '$office', '$phone', '$cname')";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			break;
		



	}
	
	mysqli_close($link);
	
?>