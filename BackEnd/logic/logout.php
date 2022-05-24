<?php

    //falls sich jemand ausloggt, werden die gesetzten Userdaten aus der Session gelöscht
    if(isset($_POST['logout']) && $_POST['logout'] == 'true'){
        unset($_SESSION['userID']);
        unset($_SESSION["roleID"]);
        unset($_SESSION["username"]);
        header('Location: login.php');
        // session_destroy();
        die();
    }
?>

<//?#php -->
// $_SESSION = array();

// unset($_SESSION['userID']);
// setcookie("userID", @$_POST["userID"], time() - 3600);
// setcookie("username", @$_POST["username"], time() - 3600);
// setcookie("password", @$_POST["password"], time() - 3600);
// setcookie("logincookie", @$_POST["logincookie"], time() - 3600);
// session_destroy();
// header('Refresh: 1; URL =index.php?menu=home');
?>