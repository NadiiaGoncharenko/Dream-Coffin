<?php

  $ort=$adresse=$plz=$password=$email=$fname=$lname=$username=$active= "";
  
  //connection with DB
  include '../config/db.php';

    // $password = $_POST['password'];
    $username=$_POST['username'];
	$fname=$_POST['fname'];	
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$ort=$_POST['ort'];
	$plz=$_POST['plz'];
    $adresse=$_POST['adresse'];
    $active=$_POST['active'];

    // $password = htmlspecialchars($password);
    // $password = password_hash($password, PASSWORD_BCRYPT);
    
    $userID = intval($_POST["userID"]);
     
    //use prepare function
     $sql2= "UPDATE user SET username= ?,email=?,ort=?,adresse=?,lname=?,fname=?,plz=?, active=? WHERE userID=?";
     
      $stmt2 = $con->prepare($sql2);
      
      $stmt2->bind_param("sssssssii", $username, $email, $ort, $adresse, $lname, $fname, $plz,$active, $userID  );


          //noch eine if ob stmt2 funktioniert
    if ($stmt2->execute()){
        echo "success";
        //   echo json_encode(array("statusCode"=>200));
            
        } 
     else {
        echo json_encode(array("statusCode"=>201));
 }

  
  //close the statement

  $stmt2->close();
  //close the connection
  $con->close();
// }
?>    
      