<?php
	include "connection.php";

	$sql = "SELECT * From tblCountry LIMIT 5";
	$result = mysqli_query($link , $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}

	echo json_encode($data);
	mysqli_close($link);
	?>