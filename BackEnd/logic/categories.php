<?php
// Prepare empty message variable
$msg = '';

include '../config/db.php';

if ($result = $con->query("SELECT * FROM products GROUP BY kategorie")) {
  
  $result_array = array();
  while($row = $result->fetch_row()) {
      $result_array[] = $row;
  }
  $result -> close();
  echo json_encode($result_array);
 // var_dump($row);
} else {
  echo json_encode(array('error' => 1));
}

?>
