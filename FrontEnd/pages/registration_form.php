<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    
    <link rel="stylesheet" href="../res/css/style.css">
	<script src="../js/ajaxFkt.js"></script>
	<script src="../js/ajaxFkt.js"></script>
	<script src="../js/fkt.js"></script>
</head>

<body>

<div w3-include-html="../webstructure/menuleiste.php"> </div> <!-- damit html wird auch gelesen/hab kaput gemacht-->



<div style="margin: auto;width: 60%;">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<form id="fupForm" name="form1" method="post">
		<div class="form-group">
			<label for="username">Name:</label>
			<input type="text" class="form-control" id="username" placeholder="Userame" name="username">
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="text" class="form-control" id="password" placeholder="password" name="password">
		</div>
		<div class="form-group">
			<label for="lname">Last Name:</label>
			<input type="text" class="form-control" id="lname" placeholder="lname" name="lname">
		</div>
		<div class="form-group">
			<label for="fname">First Name:</label>
			<input type="text" class="form-control" id="fname" placeholder="fname" name="fname">
		</div>
		<div class="form-group">
			<label for="plz">PLZ:</label>
			<input type="text" class="form-control" id="plz" placeholder="plz" name="plz">
		</div>
		<div class="form-group">
			<label for="ort">City:</label>
			<input type="text" class="form-control" id="ort" placeholder="city" name="ort">
		</div>
		<div class="form-group">
			<label for="adresse">Adress:</label>
			<input type="text" class="form-control" id="adresse" placeholder="adresse" name="adresse">
		</div>
		<div class="form-group">
			<label for="salutation">Salutation:</label>
			<input type="text" class="form-control" id="salutation" placeholder="salutation" name="salutation">
		</div>
		
		<input type="button" name="save" class="btn btn-primary" value="Save to database" id="butsave">


	</form>
</div>
</body>
<script>
includeHTML();
</script>

</html>