<?php 
if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
 unset($_SESSION['userID']);
 setcookie("userID", @$_POST["userID"], time() - 3600);
 setcookie("username", @$_POST["username"], time() - 3600);
 setcookie("password", @$_POST["password"], time() - 3600);
 setcookie("logincookie", @$_POST["logincookie"], time() - 3600);
 $_SESSION["korb_count"] = 0;
 session_destroy();
die("success");
?>