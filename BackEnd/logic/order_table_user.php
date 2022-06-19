<?php
	include '../config/db.php';

    if(session_status() == PHP_SESSION_NONE){
        session_start();
      }
  //Abfrage der eigene, gespeicherten Daten in der DB
  if (isset($_SESSION["userID"]) && !empty($_SESSION["userID"])) {
 	$sql = "SELECT * FROM order WHERE userID = ? ";

    //use prepare function
    $stmt = mysqli_prepare($con, $sql);
    //followed by the variables which will be bound to the parameters
    $stmt->bind_param("i", $_SESSION['userID']);
    
    //execute statement
    $stmt->execute();
    $stmt->bind_result( $userID, $orderid, $date, $sum);
    
    $row = $stmt->fetch();

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
	 
	// else {
	// 	echo "<tr >
	// 	<td colspan='5'>No Result found !</td>
	// 	</tr>";
	// }
	mysqli_close($con);
?>