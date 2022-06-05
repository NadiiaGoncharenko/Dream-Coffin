<?php
    include '../config/db.php';
	$userID = $_POST['userID'];
	
	$password = $_POST["password"];

    
    $loginErr = "";
            //check userID & password with DB
            if(!isset($password) {
                $loginErr = " Password was not set.";
            }else{
                $userID = test_input($userID);
                $password = htmlspecialchars($password);
                
                $sql = "SELECT `password`FROM `user` WHERE `userID` = ?";
    
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
                
            } 
            else {
                echo json_encode(array("statusCode"=>201));
            }
            mysqli_close($stmt);
        ?>