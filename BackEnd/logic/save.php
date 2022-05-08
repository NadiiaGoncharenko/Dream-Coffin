<?php
	include '../config/db.php';
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql = "INSERT INTO `user`( `username`, `email`, `password`) 
	VALUES ('$username','$email','$password')";
	//echo($sql);
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>