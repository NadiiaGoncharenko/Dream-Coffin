<?php
// Prepare empty message variable
$msg = '';

$servername = "localhost";
$username = "examuser";
$password = "m5912yBw864tK72W79";
$db_name = "exam24";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$sql = "SELECT *
FROM products_urn";


if ($result = $conn->query("SELECT * FROM products_urn")) {
  $row = $result->fetch_row();
  //var_dump($row);
  $result -> close();
} else {
  echo 'problem!';
}

$result = $conn->query($sql);
//var_dump($result);

?>
<?php
    include '../../webstructure/head.php';
  ?>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<title>products_urn</title>
</head>
<body>
  <?php
    include '../../webstructure/menuleiste.php';
  ?>

<header class = "jumbotron">
<div class="container">
<h1>Last Rest With Dignity</h1>
</div>
</header>  
<section class = "container" id="products_urn">
<div class="row">
  
  <?php while($row = $result->fetch_row()):?>

  <div class="col">
  <?php include 'card.php'?>
  </div>  
  
  <?php endwhile; ?>

</div>




</section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
    <?php include "../../webstructure/footer.php"; ?>

  