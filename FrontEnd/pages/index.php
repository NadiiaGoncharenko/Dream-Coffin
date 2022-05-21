<?php
    include '../webstructure/head.php';
?>
    <title>Home</title>
</head>
<body>
  <?php
    include '../webstructure/menuleiste.php';
  ?>

<!--Hintergrund Bild-->
<div style="background-image: url('../res/img/background.jpg');">
    <!--Carousell mit  Bildern-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../res/pics/coffin/Belvedere.jpg" class="d-block w-50" alt="another coffin">
            </div>
            <div class="carousel-item">
                <img src="../res/pics/coffin/Eisenstadt.jpg" class="d-block w-50" alt="coffin">
            </div>
            <div class="carousel-item">
                <img src="../res/pics/urn/Artemis.jpg" class="d-block w-50" alt="urn">
            </div>
            <div class="carousel-item">
                <img src="../res/pics/urn/Hermes.jpg" class="d-block w-50" alt="another urn">
            </div>
            <div class="carousel-item">
                <img src="../res/pics/natural.jpg" class="d-block w-50" alt="natur">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

</div>
    
    <?php include "../webstructure/footer.php"; ?>