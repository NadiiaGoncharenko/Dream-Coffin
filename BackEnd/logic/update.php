<?php
  // if(session_status() == PHP_SESSION_NONE){
  //   session_start();
  // }

  // $emailErr=$fnameErr=$lnameErr= "";
  $ort=$adresse=$plz=$password=$email=$fname=$lname=$username= "";
  
  //connection with DB
  include '../config/db.php';

  var_dump($_POST);
  $password = $_POST['password'];
  $username=$_POST['username'];
	$fname=$_POST['fname'];	
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$ort=$_POST['ort'];
	$plz=$_POST['plz'];
  $adresse=$_POST['adresse'];

  $password = htmlspecialchars($password);
  
  $userID = intval($_POST["userID"]);
                
                $sql = "SELECT `password` FROM `user` WHERE `userID` = ?";
    
                //use prepare function
                $stmt = mysqli_prepare($con, $sql);
                //followed by the variables which will be bound to the parameters
                $stmt-> bind_param("s", $userID);
                //execute statement
                $stmt->execute();
                
                $stmt ->bind_result($passwordDB);
                $stmt->fetch();

   if(password_verify($password, $passwordDB)){
     echo json_encode(array("statusCode"=>200));
     
  var_dump($_POST);
      $sql = "UPDATE `user` SET `username`=?,`email`=?,`ort`=?,`adresse`=?,`lname`=?,`fname`=?,`plz`=?  WHERE `userID`=? "; 

    //use prepare function
      $stmt = $con->prepare($sql);
      $stmt->bind_param("sssssssi", $username, $email, $ort, $adresse, $lname, $fname, $plz, $userID );

      $stmt->execute();
            } 
     else {
        echo json_encode(array("statusCode"=>201));
 }

  
  //close the statement

  $stmt->close();
  //close the connection
  $con->close();
?>    
      