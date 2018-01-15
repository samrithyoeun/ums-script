<?php
	include_once("connection.php");

	$sql = "SELECT COUNT(*) AS col FROM college";
	$result = mysqli_query($link , $sql);
	while ($row = mysqli_fetch_assoc($result)) $data[] = $row;

	$sql = "SELECT COUNT(*) AS dep FROM dept ";
	$result = mysqli_query($link , $sql);
	while ($row = mysqli_fetch_assoc($result)) $data[] = $row;

	$sql = "SELECT COUNT(*) AS inst FROM instructor";
	$result = mysqli_query($link , $sql);
	while ($row = mysqli_fetch_assoc($result)) $data[] = $row;

	$sql = "SELECT COUNT(*) AS stu FROM student";
	$result = mysqli_query($link , $sql);
	while ($row = mysqli_fetch_assoc($result)) $data[] = $row;

	$sql = "SELECT COUNT(*) AS cou FROM course";
	$result = mysqli_query($link , $sql);
	while ($row = mysqli_fetch_assoc($result)) $data[] = $row;

	$sql = "SELECT COUNT(*) AS section FROM section";
	$result = mysqli_query($link , $sql);
	while ($row = mysqli_fetch_assoc($result)) $data[] = $row;

	echo json_encode($data);

	mysqli_close($link)

?>

