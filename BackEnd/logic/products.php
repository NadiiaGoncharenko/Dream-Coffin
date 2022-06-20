<?php
// Prepare empty message variable
$msg = '';

if(session_status() == PHP_SESSION_NONE){
  session_start();
}

include '../config/db.php';

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
