<?php
    include '../webstructure/head.php';
  ?>
</head>

<body>
<?php $salutation=""; ?>
<!-- //<div w3-include-html="../webstructure/menuleiste.php"> </div> damit html wird auch gelesen/hab kaput gemacht -->
<?php
    include '../webstructure/menuleiste.php';
  ?>
<div style="margin: auto;width: 60%;">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<form id="fupForm" name="form1" method="post">
		<div class="form-group">
			<label for="salutation">Salutation:</label>
			<!-- <input type="text" class="form-control" id="salutation" placeholder="salutation" name="salutation"> -->
			<select id="salutation" name="salutation" class="form-control">
              <option  <?php if ($salutation=="Mrs.") {echo "selected"; }?>>Mrs.</option>
              <option  <?php if ($salutation=="Ms.") {echo "selected"; }?>>Ms.</option>
              <option  <?php if ($salutation=="Mr.") {echo "selected"; }?>>Mr.</option>
            </select>
        </div>
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
			<input type="password" class="form-control" id="password" placeholder="password" name="password">
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
			<input type="button"  name="save" class="btn btn-primary" value="Save to database" id="butsave">
		</div>

	</form>
</div>


<?php include "../webstructure/footer.php"; ?>