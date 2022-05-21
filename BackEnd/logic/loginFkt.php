<!-- <?php
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
        //DB connection
        require_once ('../config/dbaccess.php');
        $db_obj = new mysqli($host, $user, $password, $database);
        if ($db_obj->connect_error) {
            echo "Collection failed!";
            exit();
        }
        
        //check username & password with DB
        if(!isset($_POST["username"]) || !isset($_POST["password"]) || empty($_POST["username"]) || empty($_POST["password"])){
            $loginErr = "Username or Password was not set.";
        }else{
            $username = test_input($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);
            
            $sql = "SELECT `password`, `userID`, `roleID` FROM `user` WHERE `username` = ?";

            //use prepare function
            $stmt = $db_obj->prepare($sql);
            //followed by the variables which will be bound to the parameters
            $stmt-> bind_param("s", $username);
            //execute statement
            $stmt->execute();
            
            $stmt ->bind_result($passwordDB, $userID, $roleID);
            $stmt->fetch();

            if(!empty($passwordDB) && password_verify($_POST["password"], $passwordDB)){
                $_SESSION["userID"] = $userID;
                $_SESSION["username"] = $username;
                $_SESSION["roleID"] = $userID;
                //close the statement
                $stmt->close();
            }else{
                $loginErr = "Username or Password was not correct.<br> Or your account was deactivated.";
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