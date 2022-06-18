<?php
	include '../config/db.php';
	$sql = "SELECT * FROM order";
	$result2 = $con->query($sql);
/ es liest nicht von DB kA warum
	if ($result2 !== false && $result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['orderid'];?></td>
            <td><?=$row['sum'];?></td>
            <td><?=$row['date'];?></td>
			<td><button type="button" class="btn btn-success btn-sm update" 
            data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#products_in_order"
            data-orderID="<?=$row['orderid'];?>"
			data-date="<?=$row['date'];?>"
            data-sum="<?=$row['sum'];?>"
			">List of products</button></td>
		</tr>
<?php	
	 }
	 }

	else {
		echo "<tr >
		<td colspan='5'>No Result found !</td>
		</tr>";
	}
	mysqli_close($con);
?>