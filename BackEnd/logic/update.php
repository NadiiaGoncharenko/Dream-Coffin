<?php
  // if(session_status() == PHP_SESSION_NONE){
  //   session_start();
  // }

  // $emailErr=$fnameErr=$lnameErr= "";
  $ort=$adresse=$plz=$password=$email=$fname=$lname=$username= "";
  
  //connection with DB
  include '../config/db.php';

 // var_dump($_POST);
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
    // echo json_encode(array("statusCode"=>200));
     
 // var_dump($_POST);
     // $sql = "UPDATE `user` SET `username`=?,`email`=?,`ort`=?,`adresse`=?,`lname`=?,`fname`=?,`plz`=?  WHERE `userID`=? "; 

     $sql2= "UPDATE user SET username= ?,email=?,ort=?,adresse=?,lname=?,fname=?,plz=? WHERE userID=?";
//echo $username , $email, $ort, $adresse, $lname, $fname, $plz, $userID;
   //use prepare function
//$sql= "UPDATE user SET username="test",email="test",ort="test",adresse="test",lname="test",fname="test",plz=000 WHERE userID=23";

mysqli_report(MYSQLI_REPORT_ALL);

$stmt->close();
      $stmt2 = $con->prepare($sql2);
      
      $stmt2->bind_param("sssssssi", $username, $email, $ort, $adresse, $lname, $fname, $plz, $userID );


      //noch eine if ob stmt2 funktioniert

      $stmt2->execute();
      echo json_encode(array("statusCode"=>200));
            } 
     else {
        echo json_encode(array("statusCode"=>201));
 }

  
  //close the statement

  $stmt2->close();
  //close the connection
  $con->close();
?>    
      