<?php
	include '../config/db.php';
	$username=$_POST['username'];
	$email=$_POST['email'];
	var_dump("save.php works");
	$password = $_POST["password"];
	var_dump($password);
	$password = htmlspecialchars("password");
	$password = password_hash($password, PASSWORD_DEFAULT); 
	var_dump($password);
	$ort=$_POST['ort'];
	$adresse=$_POST['adresse'];
	$salutation=$_POST['salutation'];
	$lname=$_POST['lname'];
	$fname=$_POST['fname'];
	$plz=$_POST['plz'];
	$sql = "INSERT INTO `user`( `username`, `email`, `password`, `ort`, `adresse`, `lname`, `fname`, `salutation`,`plz` ) 
	VALUES ('$username','$email','$password', '$ort', '$adresse', '$lname', '$fname',  '$salutation', '$plz')";
	if (mysqli_query($con, $sql)) {
		echo json_encode(array("statusCode"=>200));
		echo "Congratulation!";
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($con);
?>