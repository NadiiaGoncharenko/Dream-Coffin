$(document).ready(function() {
	$('#login').on('click', function() {
		console.log("control");
        var username = $('#username_log').val();
		var password = $('#password_log').val();
		if(username!="" && password!="" ){
			$.ajax({
				url: "http://localhost/Dream-Coffin/BackEnd/logic/loginFkt.php",
				type: "POST",
				data: {
					username: username,
					password: password						
				},
				cache: false,
				success: function(dataResult){
					// var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						location.href = "http://localhost/Dream-Coffin/FrontEnd/pages/index.php";						
					}
					else if(dataResult.statusCode==201){
						$("#error").show();
						$('#error').html('Invalid Username or Password !');
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});    