<?php
    include '../config/db.php';
	$username = $_POST['username'];
	
	$password = $_POST["password"];
    var_dump($password);
// 	 $password = htmlspecialchars($password);
// 	 $password = password_hash($password, PASSWORD_DEFAULT); 
// echo $password;

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    $loginErr = "";

    // //falls sich jemand ausloggt, werden die gesetzten Userdaten aus der Session gelöscht
    // if(isset($_GET['logout']) && $_GET['logout'] == 'true'){
    //     unset($_SESSION['userID']);
    //     unset($_SESSION["roleID"]);
    //     unset($_SESSION["username"]);
    //     header('Location: login.php');
    //     // session_destroy();
    //     die();
    // }

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include "../config/db.php";

            //check username & password with DB
        if(!isset($password) || !isset($password) || empty($username) || empty($username)){
            $loginErr = "Username or Password was not set.";
        }else{
            $username = test_input($username);
            $password = htmlspecialchars($password);
            
            $sql = "SELECT `password`, `userID`, `roleID` FROM `user` WHERE `username` = ?";

            //use prepare function
            $stmt = mysqli_prepare($con, $sql);
            //followed by the variables which will be bound to the parameters
            $stmt-> bind_param("s", $username);
            //execute statement
            $stmt->execute();
            
            $stmt ->bind_result($passwordDB, $userID, $roleID);
            $stmt->fetch();

            var_dump($passwordDB);
            //проблема тут, но в чем???
            var_dump(password_verify($password, $passwordDB));
            // echo(!empty($passwordDB));
            if(!empty($passwordDB) && password_verify($password, $passwordDB)){
                $_SESSION["userID"] = $userID;
                $_SESSION["username"] = $username;
                $_SESSION["roleID"] = $roleID;


                //close the statement
                $stmt->close();
               // Check if "Stay logged in!" has been ticked
                if (@$_POST['safeit'] == '1') {
                    $logincookieduration = 31536000; //valid for 1 year
                    setcookie("userID", $_SESSION['userID'], time() + $logincookieduration);
                    setcookie("username", $_POST['username'], time() + $logincookieduration);
                    setcookie("password", $_POST['password'], time() + $logincookieduration);
                    setcookie("logincookie", $logincookieduration, time() + $logincookieduration);
                }
                

            }else{
                $loginErr = "Username or Password was not correct";
            }
            //close the connection
            $stmt->close();
        }
        if ($loginErr){
            echo $loginErr;
        } 
        else{
            echo "success";
        }
    }
    function test_input($data){
        $data = trim($data); //unnötige leerzeichen etc entfernen
        $data = stripslashes($data); //Backlashes entfernen vom unser input
        $data = htmlspecialchars($data); //zu htmlspecialchars machen (Security reasons)
        return $data;
    }

    ?>