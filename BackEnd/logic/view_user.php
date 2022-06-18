<?php
	include '../config/db.php';

    if(session_status() == PHP_SESSION_NONE){
        session_start();
      }
  //Abfrage der eigene, gespeicherten Daten in der DB
  if (isset($_SESSION["userID"]) && !empty($_SESSION["userID"])) {
 	$sql = "SELECT * FROM user WHERE userID = ? ";

    //use prepare function
    $stmt = mysqli_prepare($con, $sql);
    //followed by the variables which will be bound to the parameters
    $stmt->bind_param("i", $_SESSION['userID']);
    
    //execute statement
    $stmt->execute();
    $stmt->bind_result( $userID,$username, $password,$email,$plz, $adresse,$salutation, $lname, $fname, $ort, $roleID, $active);
    
    $row = $stmt->fetch();

    ?>	
		<tr>
			<td><?=$username;?></td>
            <td><?=$lname;?></td>
            <td><?=$fname;?></td>
            <td><?=$adresse;?></td>
			<td><?=$email;?></td>
			<td><?=$ort;?></td>
            <td><?=$plz;?></td>
			<td><button type="button" class="btn btn-success btn-sm update" 
            data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_country"
            data-userID="<?=$userID;?>"
			data-password placeholder="Your Password"="<?=$password;?>"
			data-username= "<?=$username;?>"
            data-fname="<?=$fname;?>"
            data-lname="<?=$lname;?>"
            data-adresse="<?=$adresse;?>"
			data-email="<?=$email;?>"
			data-ort="<?=$ort;?>"
            data-plz="<?=$plz;?>"
			">Edit</button></td>
		</tr>
<?php	
	}
	mysqli_close($con);

?>