<?php
	include '../config/db.php';
	$sql = "SELECT * FROM user";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['username'];?></td>
            <td><?=$row['lname'];?></td>
            <td><?=$row['fname'];?></td>
            <td><?=$row['adresse'];?></td>
			<td><?=$row['email'];?></td>
			<td><?=$row['ort'];?></td>
            <td><?=$row['plz'];?></td>
			<td><button type="button" class="btn btn-success btn-sm update" 
            data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_country"
            data-userID="<?=$row['userID'];?>"
			data-password="<?=$row['password'];?>"
			data-username="<?=$row['username'];?>"
            data-fname="<?=$row['fname'];?>"
            data-lname="<?=$row['lname'];?>"
            data-adresse="<?=$row['adresse'];?>"
			data-email="<?=$row['email'];?>"
			data-ort="<?=$row['ort'];?>"
            data-plz="<?=$row['plz'];?>"
			">Edit</button></td>
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