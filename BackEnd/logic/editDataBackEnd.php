<?php
  if(session_status() == PHP_SESSION_NONE){
    session_start();
  }

  $emailErr=$fnameErr=$lnameErr= "";
  $email=$salutation=$fname=$lname=$username=$usertype= "";
  
  //connection with DB
  require_once('../config/dbaccess.php');

  $db_obj = new mysqli($host, $user, $password, $database);
  if ($db_obj->connect_error) {
      echo "Collection failed!";
      exit();

  }

  //Abfrage der eigene, gespeicherten Daten in der DB
  if (isset($_GET["userID"]) && !empty(["userID"])) {
    $sql = "SELECT user.fname, user.lname, user.email, user.username, 
    user.salutation, user.active, user.roleID FROM user WHERE userID = ? ;";

    //use prepare function
    $stmt = $db_obj->prepare($sql);
    $userID = intval($_GET['userID']);
    $stmt->bind_param('i', $userID);
    
    //executes the statement
    $stmt->execute();
    $stmt->bind_result($fname, $lname, $email, $username, $salutation, $activation, $usertype);
    $stmt->fetch();
    
    //close the connection
    $stmt->close();
  }


  if($_SERVER["REQUEST_METHOD"] == "POST"){ 
      //validation ob alle Bedingungen erfüllt sind, geg. ein Error
      if(empty($_POST["email"])){
        $emailErr = "Email is required";
      }else{
        $email = test_input($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ 
            $emailErr = "Invalid email format";
        }
      }
      if(empty($_POST["fname"])){
        $fnameErr = "First name is required";
      }else{
        $fname = test_input($_POST["fname"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)){ 
          $nameErr = "Only letters and whitespace allowed";
        }
      }
      if(empty($_POST["lname"])){
        $lnameErr = "Last name is required";
      }else{
        $lname = test_input($_POST["lname"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/",$lname)){ 
          $nameErr = "Only letters and whitespace allowed";
        }
      }
      
    //update in DB
    if(!empty($_POST["userID"]) && !empty($_POST["fname"])
    && !empty($_POST["lname"]) && !empty($_POST["email"])) {
      //Usertyp umschreiben auf roleID
      if($_POST["userType"] == "Admin"){
        $usertype = 1;
      }else if($_POST["userType"] == "Normal User"){
        $usertype = 3;
      }else{
        $usertype = 2;
      }
      //Activation umschreiben auf 0 oder 1
      if($_POST["activation"] == "Activated"){
        $activation = 1;
      }else{
        $activation = 0;
      }
      $userID = intval($_POST["userID"]);
      //User in der Datenbank aktualisieren
      $sql = "UPDATE `user` SET `salutation`= ?, `email`= ?, `fname`= ?, `lname`= ?, `roleID`= ? ,`active`= ?  WHERE `userID`= ? ";    
      
      $lname = $_POST["lname"];
      $fname = $_POST["fname"];
      $salutation = $_POST["salutation"];
      $email = $_POST["email"];
      //use prepare function
      $stmt = $db_obj->prepare($sql);
      $stmt->bind_param("ssssssi", $salutation, $email, $fname, $lname, $userID );
      //executes the statement
      $stmt->execute();
      //close the statement
      $stmt->close();
      //close the connection
      $db_obj->close();
      header('Location: ?userID='. $userID);
      die();
    }
  }
  function test_input($data){
    $data = trim($data); //unnötige leerzeichen etc entfernen
    $data = stripslashes($data); //Backlashes entfernen vom unser input
    $data = htmlspecialchars($data); //zu htmlspecialchars machen (Security reasons)
    return $data;
  }

?>
