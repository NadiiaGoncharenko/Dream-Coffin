<?php
if(session_status() == PHP_SESSION_NONE){
  session_start();
}
    include '../../webstructure/head.php';
    include '../../webstructure/menuleiste.php';
  ?>
  
<title>Userdata</title>
  
</head>
<body>
<div class="container text-center">
  <h2 id = "heading-1">Userdata</h2>
  <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<table class="table table-bordered table-sm" >
    <thead style="background-color: #c2d3df;">
      <tr>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Adresse</th>
        <th>Email</th>
	    <th>Ort</th>
        <th>PLZ</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="table">
      
    </tbody>
  </table>
</div>






<!-- Modal Update-->
    <div class="modal fade" id="update_country" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">
			<div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
			  <h5 class="modal-title"><i class="fa fa-edit"></i> Update</h5>
			 
			</div>
			<div class="modal-body">

				<!--1-->
				<div class="row">
					<div class="col-md-3">
					    <label>Username</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="username_modal" id="username_modal" class="form-control-sm" required>
					</div>	
				</div>
			    <!--2-->
				<div class="row">
					<div class="col-md-3">
					    <label>Email</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="email_modal" id="email_modal" class="form-control-sm" required>
					</div>	
				</div>
			    <!--3-->
				<div class="row">
					<div class="col-md-3">
					    <label>First Name</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="fname_modal" id="fname_modal" class="form-control-sm" required>
					</div>	
				</div>
                
				<!--4-->
                
				<div class="row">
					<div class="col-md-3">
					    <label>Last Name</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="lname_modal" id="lname_modal" class="form-control-sm" required>
					</div>	
				</div>
                
				<!--5-->
                <div class="row">
					<div class="col-md-3">
					    <label>Ort</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="ort_modal" id="ort_modal" class="form-control-sm" >
					</div>	
				</div>
                <!--6-->
                <div class="row">
					<div class="col-md-3">
					    <label>Adresse</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="adresse_modal" id="adresse_modal" class="form-control-sm" >
					</div>	
				</div>
				<!--7-->
                <div class="row">
					<div class="col-md-3">
					    <label>Plz</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="plz_modal" id="plz_modal" class="form-control-sm" >
					</div>	
				</div>

				<!-- password check -->
				<!--7-->
                <div class="row">

				</div>	
					<h9 class= "col-med-7"> <br>*no password = no update*</h9>
				
					<div class="col-md-3">
					    <label>Password</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="password" placeholder="***"   id="password" class="form-control-sm" >
					</div>

				<input type="hidden" name="userID_modal" id="userID_modal" class="form-control-sm">
			</div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
			<p style="text-align:center;float:center;">
			<button type="submit" id="update_data" class="btn btn-default btn-sm" style="background-color: #e35f14;color:#fff;">Save</button>
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Close</button></p>
			
		  </div>
		  </div>
		</div>
	</div>
<!-- Modal End-->


<script>
$(document).ready(function() {
  
  $.ajax({
		url: "http://localhost/Dream-Coffin/BackEnd/logic/view_user.php",
		type: "POST",
		cache: false,
    data:{
				
    },
		success: function(dataResult){
      console.log("suc");
			$('#table').html(dataResult); 
		}
	});
	$(function () {
		$('#update_country').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); /*Button that triggered the modal*/
			var userID = button.data('userid');
			var fname = button.data('fname');
            var lname = button.data('lname');
			var email = button.data('email');
            var ort = button.data('ort');
            var plz = button.data('plz');
            var adresse = button.data('adresse');
			var password = button.data('password');
            var username = button.data('username');
			var modal = $(this);
			modal.find('#username_modal').val(username);
			modal.find('#lname_modal').val(lname);
			modal.find('#fname_modal').val(fname);
			modal.find('#email_modal').val(email);
			modal.find('#plz_modal').val(plz);
			modal.find('#adresse_modal').val(adresse);
            modal.find('#ort_modal').val(ort);
			modal.find('#password').val(password);
            modal.find('#userID_modal').val(userID);
            
		});
    });
	$(document).on("click", "#update_data", function() { 
		$.ajax({
			url: "http://localhost/Dream-Coffin/BackEnd/logic/update.php",
			type: "POST",
			cache: false,
			data:{
				username: $('#username_modal').val(),
                fname: $('#fname_modal').val(),
                lname: $('#lname_modal').val(),
				email: $('#email_modal').val(),
				ort: $('#ort_modal').val(),
				plz: $('#plz_modal').val(),
				adresse: $('#adresse_modal').val(),
				userID:$('#userID_modal').val(),
				password: $('#password').val()
			},
			success: function(dataResult){
			//	var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$('#update_country').modal().hide();
					alert('Data updated successfully !');
					location.reload();					
				}
			}
		});
	}); 
});

</script>
</body>
</html>