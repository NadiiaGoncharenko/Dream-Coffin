<?php
    include '../webstructure/head.php';
  ?>
    <title>Login</title>
</head>

<body>

<!-- damit html wird auch gelesen/hab kaput gemacht -->
<!-- <div w3-include-html="../webstructure/menuleiste.php"> </div>  -->
 
<?php
    include '../webstructure/menuleiste.php';
  ?>

<div style="background-image: url('../res/img/background.jpg'); padding-bottom:1%">
<br> <?php $loginErr = ""; ?>

    <div class="container">
        <!--Das Login Formular-->
        <?php if(!isset($_SESSION["userID"])): ?>
            <h1 class=" page-header text-light">Login</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label class="text-light" for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control"><br>
                    <label class="text-light" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                    <label>
                    <input type="checkbox" name="angemeldet_bleiben" value="1"> Angemeldet bleiben</label><br>
                    
                </div>
                <!-- <span class="error"><#?php echo $loginErr;?></span> -->
                <br>
                <button type="submit" id="login" class="btn btn-primary">Login</button>
            </form>
        <!--Die Anzeige für eingeloggte User zum Ausloggen-->
        <?php else:?>
            <h2 class="text-light">Hello, <?php echo $_SESSION["username"]?>!</h2>
                <div class="text-light">
                    Push the button "Logout" to logout from your profil.
                </div><br>
            <a class="btn btn-primary" href="?logout=true">Logout</a>
        <?php endif?>
    </div>
</div>


<?php include "../webstructure/footer.php"; ?>