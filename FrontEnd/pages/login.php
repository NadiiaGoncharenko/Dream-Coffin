<?php
    include '../webstructure/head.php';
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
  ?>
    <title>Login</title>
    
</head>
<body>

<?php
    include '../webstructure/menuleiste.php';
?>

<div style="background-image: url('../res/img/background.jpg'); padding-bottom:1%">
    <br> 
    <?php $loginErr = ""; ?>
    <div class="container">
        <!--Das Login Formular-->
        <?php if(!isset($_SESSION["userID"])): ?> 
<!-- //можливо краще з юзерайди -->
            <h1 class=" page-header text-light">Login</h1>
            <!-- <form id="login_form"  method="post" > -->
                <div class="form-group">
                    <label class="text-light" for="username">Username</label>
                    <input type="text" id="username_log" name="username" class="form-control"><br>
                    <label class="text-light" for="password">Password</label>
                    <input type="password" id="password_log" name="password" class="form-control">
                    <label>
                    <input type="checkbox" name="angemeldet_bleiben" value="1" id="safe"> Angemeldet bleiben</label><br>
                    
                </div>
                <!-- <span class="error"><#?php echo $loginErr;?></span> -->
                <br>
                <!-- <button type="submit" id="login" class="btn btn-primary">Login</button> -->
                <input type="button" name="login" class="btn btn-primary" value="Login" id="login">
            <!-- </form> -->
        <!--Die Anzeige für eingeloggte User zum Ausloggen-->
        <?php else:?>
            <h2 class="text-light">Hello, <?php echo $_SESSION["username"]?>!</h2>
                <div class="text-light" >
                    Push the button "Logout" to logout from your profil.
                </div>
                <br>
                <input type="button" name="logout" class="btn btn-primary" value="Logout" id="logout">
            <!-- <a class="btn btn-primary" id="logout" href="?logout=true">Logout</a> -->
        <?php endif?>
    </div>
</div>


<?php include "../webstructure/footer.php"; ?>