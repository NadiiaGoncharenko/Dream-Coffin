<?php
	include '../config/db.php';
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$ort=$_POST['ort'];
	$adresse=$_POST['adresse'];
	$salutation=$_POST['salutation'];
	$lname=$_POST['lname'];
	$fname=$_POST['fname'];
	$plz=$_POST['plz'];
	$sql = "INSERT INTO `user`( `username`, `email`, `password`, `ort`, `adresse`, `lname`, `fname`, `salutation`,`plz` ) 
	VALUES ('$username','$email','$password', '$ort', '$adresse', '$lname', '$fname', '$plz', '$salutation')";
	//echo($sql);
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>