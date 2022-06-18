<?php
    include '../webstructure/head.php';
  ?>
    <title>something happened</title>
</head>
<body>
<?php
    include '../webstructure/menuleiste.php';
  ?>
<div style="background-image: url('./img/background.jpg'); min-height:100%;">
    <br>
    <div class="container text-center col-6 offset-3 border border-primary alert-secondary rounded"><br>
        <h1 id = "heading-1">Login failed </h1>
            <h3>Username or Password was not correct <br> Or your account was deactivated</h3>
</div>

<?php include "../webstructure/footer.php"; ?>