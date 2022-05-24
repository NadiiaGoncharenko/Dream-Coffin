
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/FrontEnd/res/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>URNs</title>
</head>

<body>
    <div w3-include-html="/FrontEnd/webstructure/menuleiste.php"> </div>
    
    <header>
       <style>
        .jumbotron {
        background-color: darkcyan;
        color: #ffffff;
        }
        </style>
        <div class="jumbotron text-center">
            <br>
            <h1 class="display-5">URNs</h1>
            <?php

            $menu = @$_GET['menu'];

           
            ?>
        </div>
    </header>
    <main>
        <?php
        // All PHP-Pages are included using "include"
        
        ?>

            <!--Section to output the pictures-->
        
            <div class="container-fluid">
           <!-- <img src="http://localhost/webprojekt/Dream-Coffin/FrontEnd/res/pics/coffin/Eisenstadt.jpg" class="d-block w-100" alt="coffin"> -->
              <?php 
                echo "<a href=\"./productCoffin.php\"><img src=\"/FrontEnd/res/pics/urn/Artemis.jpg\"/>";
               ?>
               <h3>COFFINs</h3>
               <?php   
                echo "<br/><a href=\"./productUrn.php\"><img src=\"/FrontEnd/res/pics/urn/Artemis.jpg\"/ >";
              ?>
              <h3>URNs</h3>
            </div>

        

    </main>

    <?php
         include "/FrontEnd/webstructure/footer.php";
    ?>

  