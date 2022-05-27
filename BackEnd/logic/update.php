<?php
  // if(session_status() == PHP_SESSION_NONE){
  //   session_start();
  // }

  // $emailErr=$fnameErr=$lnameErr= "";
  $ort=$adresse=$plz= $email=$fname=$lname=$username= "";
  
  //connection with DB
  include '../config/db.php';

  var_dump($_POST);
  $username=$_POST['username'];
	$fname=$_POST['fname'];	
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$ort=$_POST['ort'];
	$plz=$_POST['plz'];
  $adresse=$_POST['adresse'];

  $userID = intval($_POST["userID"]);
  $sql = "UPDATE `user` SET `username`=?,`email`=?,`plz`=?,`adresse`=?,`lname`=?,`fname`=?,`ort`=?  WHERE `userID`=? "; 

 //use prepare function
  $stmt = $con->prepare($sql);
  $stmt->bind_param("ssssssii",$username,$email, $ort, $adresse, $lname, $fname, $plz, $userID );


	$stmt->execute();
  //close the statement

  $stmt->close();
  //close the connection
  $con->close();
?>    
      