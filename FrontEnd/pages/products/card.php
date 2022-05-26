<?php
    include '../../webstructure/head.php';
  ?>

</head>
<body>
<?php
    include '../../webstructure/menuleiste.php';
  ?>



<div class= "card">
  <div class="card-title"> <h1><?= $row[1] ?></h2> </div>
  <img src="../../res/pics/<?=$row[4]?>" class="card-img-top" alt="..." height="242" width="42" > 
  <div class="card-body">
  <?= $row[2] ?> 
  <hr>
  <?= $row[3] ?> <a>€</a>
  </div>
  <div class="card-footer">
      <a href="" class="btn btn-success btn-sm">In den Warenkorb</a>
</div>    
</div>