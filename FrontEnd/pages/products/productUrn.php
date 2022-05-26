

<?php
    include '../../webstructure/head.php';
  ?>


    <title>URNs</title>
</head>

<body>
<?php
    include '../../webstructure/menuleiste.php';
  ?>


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

  
    <?php include "../../webstructure/footer.php"; ?>


  