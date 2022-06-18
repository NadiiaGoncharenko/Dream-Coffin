<?php
	include '../config/db.php';

    if(session_status() == PHP_SESSION_NONE){
        session_start();
      }
  //Abfrage der eigene, gespeicherten Daten in der DB
  if (isset($_SESSION["userID"]) && !empty($_SESSION["userID"])) {
 	$sql = "SELECT order.orderid, order.date, order.sum FROM order";
     
    //use prepare function
    $stmt = mysqli_prepare($con, $sql);
var_dump($stmt);
    $stmt->execute();
    $stmt ->bind_result($orderid, $sum, $date);

    while ($stmt->fetch()) {
    ?>	
		<tr>
			<td><?=$row['orderid'];?></td>
            <td><?=$row['sum'];?></td>
            <td><?=$row['date'];?></td>
			<td><button type="button" class="btn btn-success btn-sm show" 
            data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#products_in_order"
            data-orderID="<?=$row['orderid'];?>"
			data-date="<?=$row['date'];?>"
            data-sum="<?=$row['sum'];?>"
			">List of products</button></td>
		</tr>
<?php	
	 
	 }
    }
	// else {
	// 	echo "<tr >
	// 	<td colspan='5'>No Result found !</td>
	// 	</tr>";
	// }
	mysqli_close($con);
?>