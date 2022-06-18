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
					console.log("loginFkt", dataResult);
					if(dataResult == "success"){
						console.log("login_drin");
						location.href = "http://localhost/Dream-Coffin/FrontEnd/pages/index.php";						
					}
					else if(dataResult == "error"){
						location.href = "http://localhost/Dream-Coffin/FrontEnd/pages/error.php";
						}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});    