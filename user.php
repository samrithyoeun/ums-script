<?php

include_once ("connection.php");
switch ($_GET['opt']) {

        case 'login':
            $pass = $_GET['passwords'];
            $users = $_GET['usernames'];
            $sql = "select * from user where usernames = '$users' AND passwords = '$pass' ";
            $result = mysqli_query($link , $sql);
            
                if(mysqli_num_rows($result)>0){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }
                    echo json_encode($data);
                }
                else{
                    $data['role']="fail";
                    echo json_encode($data);
                }
    		break;

    		case 'update':{
    			$pass = $_GET['passwords'];
            	$users = $_GET['usernames'];
            	$sid = $_GET['sid'];
            	$newp = $_GET['newpass'];
				$sql = "select * from user where usernames = '$users' AND passwords = '$pass' ";
				            $result = mysqli_query($link , $sql);
				            
				                if(mysqli_num_rows($result)>0){
				                   $sql = "UPDATE user set usernames = '$users' , passwords = '$newp' where sid =$sid "; 
				                    
				                    $result = mysqli_query($link , $sql);
				                    $data['role']=$result;
                    				echo json_encode($data);
				                }
				                else{
				                    $data['role']="fail";
				                    echo json_encode($data);
				                }

    		}
    		break;
 }
	
	

	mysqli_close($link);
?>