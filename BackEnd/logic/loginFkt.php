<?php
    include '../config/db.php';
	$username=$_POST['username_log'];
	var_dump("save.php works");
	$password = $_POST["password_log"];
	$password = htmlspecialchars("password");
	$password = password_hash($password, PASSWORD_DEFAULT); 


    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    $loginErr = "";

    //falls sich jemand ausloggt, werden die gesetzten Userdaten aus der Session gelöscht
    if(isset($_GET['logout']) && $_GET['logout'] == 'true'){
        unset($_SESSION['userID']);
        unset($_SESSION["roleID"]);
        unset($_SESSION["username"]);
        header('Location: login.php');
        die();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include "../config/db.php";

        //check username & password with DB
        if(!isset($_POST["username_log"]) || !isset($_POST["password_log"]) || empty($_POST["username_log"]) || empty($_POST["password_log"])){
            $loginErr = "Username or Password was not set.";
        }else{
            $username = test_input($_POST["username_log"]);
            $password = htmlspecialchars($_POST["password_log"]);
            
            $sql = "SELECT `password`, `userID`, `roleID` FROM `user` WHERE `username` = ?";

            //use prepare function
            $stmt = $db_obj->prepare($sql);
            //followed by the variables which will be bound to the parameters
            $stmt-> bind_param("s", $username);
            //execute statement
            $stmt->execute();
            
            $stmt ->bind_result($passwordDB, $userID, $roleID);
            $stmt->fetch();

            if(!empty($passwordDB) && password_verify($_POST["password_log"], $passwordDB)){
                $_SESSION["userID"] = $userID;
                $_SESSION["username"] = $username;
                $_SESSION["roleID"] = $roleID;
                //close the statement
                $stmt->close();
            }else{
                $loginErr = "Username or Password was not correct.<br>";
            }
            //close the connection
            $db_obj->close();
        }
    }
    function test_input($data){
        $data = trim($data); //unnötige leerzeichen etc entfernen
        $data = stripslashes($data); //Backlashes entfernen vom unser input
        $data = htmlspecialchars($data); //zu htmlspecialchars machen (Security reasons)
        return $data;
    }

    ?>