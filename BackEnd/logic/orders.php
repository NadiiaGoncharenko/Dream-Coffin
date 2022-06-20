<?php
// Prepare empty message variable
$msg = '';

include '../config/db.php';
if(session_status() == PHP_SESSION_NONE){
  session_start();
}

if (!isset($_SESSION['userID'])) {
  echo json_encode(array('error' => 1));
  die();
}

$userId = $_SESSION['userID'];

if ($_POST['method'] === 'buy') {
  $productId = $_POST['productId'];

  if ($result = $con->query("INSERT INTO orders (productID, userID, status) VALUES ($productId, $userId, 'korb')")) {
    if (isset($_SESSION["korb_count"])) {
      $_SESSION["korb_count"] += 1;
    } else {
      $_SESSION["korb_count"] = 1;
    }
    echo json_encode(array('data' => $_SESSION["korb_count"]));
  } else {
  
    echo json_encode(array('error' => 1));
  }
}
if ($_POST['method'] === 'delete') {
  $orderId = $_POST['orderId'];

  if ($result = $con->query("DELETE FROM orders WHERE orderid = " . $orderId)) {
    if (isset($_SESSION["korb_count"])) {
      if ($_SESSION["korb_count"] > 0) {
        $_SESSION["korb_count"] -= 1;
      }
    } 
    echo json_encode(array('data' => $_SESSION["korb_count"]));
  } else {
  
    echo json_encode(array('error' => 1));
  }
}

if ($_POST['method'] === 'list') {
  $status = $_POST['status'];
  if ($result = $con->query("SELECT *, COUNT(orders.orderid), SUM(products.preis) FROM orders JOIN products ON orders.productID = products.id WHERE userID = " . $userId . " AND status = '" . $status . "' GROUP BY productID")) {
    $result_array = array();
    while($row = $result->fetch_row()) {
        $result_array[] = $row;
    }
    $result -> close();
    echo json_encode($result_array);
} else {
  echo json_encode(array('error' => 3));
}

}

if ($_POST['method'] === 'bestell') {
  $status = $_POST['status'];
  if ($result = $con->query("SELECT * ,  COUNT(orders.groupID) FROM orders JOIN products ON orders.productID = products.id WHERE userID = " . $userId . " AND status = '" . $status . "' GROUP BY groupID")) {
    $result_array = array();
    while($row = $result->fetch_row()) {
        $result_array[] = $row;
    }
    $result -> close();
    echo json_encode($result_array);
} else {
  echo json_encode(array('error' => 3));
}

}

if ($_POST['method'] === 'send') {
  $groupId = 0;
  if ($result = $con->query("SELECT groupID FROM orders ORDER BY groupID DESC LIMIT 1")) {
    $row = $result->fetch_row();
    $groupId = $row[0];
    $groupId += 1;
  } 
  
  if ($result = $con->query("UPDATE orders SET status = \"ordered\", groupID = " . $groupId . " WHERE userID = " . $userId . " AND status = 'korb'")) {
      $_SESSION["korb_count"] = 0;
    echo json_encode(array('data' => $_SESSION["korb_count"]));
    //echo json_encode(array('data' => $result));
  } else {
  
    echo json_encode(array('error' => 1));
  }
}



?>
