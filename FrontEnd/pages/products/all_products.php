<?php
    include '../../webstructure/head.php';
  ?>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
<title>All products</title>
</head>
<body>

<?php
    include '../../webstructure/menuleiste.php';
  ?>


    <!--<div w3-include-html="../../webstructure/menuleiste.php"> </div>-->
    
    <header>
       <style>
        .jumbotronM {
        background-color: darkcyan;
        color: #ffffff;
        }
        </style>
        <div class="jumbotron text-center">
            <br>
            <h4 class="display-5">Categories</h4>
            
        </div>
    </header>
    <main>
        <?php
        // All PHP-Pages are included using "include"
        $width = 100;
        $height = 100;
        
        ?>

            <!--Section to output the pictures-->
            
            <!--<div class="container-fluid" >--> 
            
            <section class="container-fluid" id="kategorie">
            <div class="row">
           <div class="col">
                      
           <?php 
                echo "<a href=\"./productCoffin.php\"><img src=\"../../res/pics/coffin/coreljewel_cat.jpg\"/>";
               ?>
               <h4>COFFINs</h4>
             </div>
             <div class="col">
            
             <?php   
                echo "<br/><a href=\"./productUrn.php\"><img src=\"../../res/pics/urn/Artemis_cat.jpg\"/ >";
              ?>
              <h4>URNs</h4>
          </div>
          
            </div>
            </div>

        

    </main>
  
    <?php include "../../webstructure/footer.php"; ?>

  