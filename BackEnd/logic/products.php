<?php
// Prepare empty message variable
$msg = '';

include '../config/db.php';

// $servername = "localhost";
// $username = "weben";
// $password = "weben";
// $db_name = "dreamcoffin";


// // Create connection
// $conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
//if ($conn->connect_error) {
//die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";


$category = $_POST['data'];

if ($result = $con->query("SELECT * FROM products WHERE kategorie = '" . $category . "'")) {
    $result_array = array();
    while($row = $result->fetch_row()) {
        $result_array[] = $row;
    }
    $result -> close();
    echo json_encode($result_array);
} else {
  echo json_encode(array('error' => 1));
}

?>
