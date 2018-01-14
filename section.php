<?php

include_once ("connection.php");

	switch ($_GET['opt']) {
		case 'getall':
			$sql = "SELECT * From section as s join course as c on c.CCode = s.COURSE_CCode ";
			$result = mysqli_query($link , $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			echo json_encode($data);
			break;
		
		case 'getdetail':
			$code = $_GET['mainkey'];
			$sql = "SELECT * From section WHERE _Id = $code";
			$result = mysqli_query($link , $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			echo json_encode($data);
			break;
		
		case 'del':
			$code = $_GET['mainkey'];
			$sql = "DELETE FROM section WHERE _Id= IF(((SELECT COUNT(SECTION__Id) FROM takes WHERE SECTION__Id=$code)>0),null,$code)  ";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo $result;
			break;

		case 'upd':
			$id = $_GET['id'];
			$no = $_GET['no'];
			$se = $_GET['se'];
			$sy = $_GET['sy'];
			$ro = $_GET['ro'];
			$da = urlencode($_GET['da']);
			$cc = $_GET['cc'];
			$ii = $_GET['ii'];
			

			$sql = 	"UPDATE  project_university . section  SET  _Id =$id,  SecNo = $no,  Semester = '$se',  SYear = $sy, RoomNo = '$ro',  DaysTime = '$da' ,  INSTRUCTOR__Id = $ii,  COURSE_CCode = $cc WHERE  _Id = $id";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			break;

		case 'adds':
		$id = $_GET['id'];
			$no = $_GET['no'];
			$se = $_GET['se'];
			$sy = $_GET['sy'];
			$ro = $_GET['ro'];
			$da = urlencode($_GET['da']);
			$cc = $_GET['cc'];
			$ii = $_GET['ii'];
			
			$sql ="INSERT INTO section (_Id,INSTRUCTOR_Id,COURSE_CCode,SecNo,Semester,SYear,Bldg,RoomNo,DaysTime) value ($id,$ii,$cc,$no,'$se',$sy,'$ro','', '$da')";
			$result = mysqli_query($link , $sql);
			if(!$result){
				echo mysqli_error($link);
			}else
				echo "sucess";
			break;
		



	}
	
	mysqli_close($link);
	
?>