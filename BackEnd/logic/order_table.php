<?php
	include '../config/db.php';

    if(session_status() == PHP_SESSION_NONE){
        session_start();
      }
  //Abfrage der eigene, gespeicherten Daten in der DB
  if (isset($_SESSION["userID"]) && !empty($_SESSION["userID"])) {
 	$sql = "SELECT * FROM `orders`";
    
    //use prepare function
//     $stmt = mysqli_prepare($con, $sql);

// // 
//     $stmt->execute();
$stmt=$con->query($sql);
    // $stmt ->bind_result($orderid, $sum, $date);
var_dump($stmt);
    if ($stmt->num_rows > 0) {
		while($row = $stmt->fetch_assoc()) {
    ?>	
		<tr>
			<td><?=$row['orderid'];?></td>
            
            <td><?=$row['zeit'];?></td>
			<td><button type="button" class="btn btn-success btn-sm show" 
            data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#products_in_order"
            data-orderID="<?=$row['orderid'];?>"
			data-date="<?=$row['zeit'];?>"
           
			">List of products</button></td>
            <td><?=$row['userID'];?></td>
		</tr>
<?php	
        }
	 }
    }
	// else {
	// 	echo "<tr >
	// 	<td colspan='5'>No Result found !</td>
	// 	</tr>";
	// }
	mysqli_close($con);
?>