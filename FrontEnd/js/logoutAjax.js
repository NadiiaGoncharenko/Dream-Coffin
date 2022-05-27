$(document).ready(function() {

	$('#logout').on('click', function() {
			console.log("control logout");
				$.ajax({
					url: "http://localhost/Dream-Coffin/BackEnd/logic/loginFkt.php",
					type: "POST",
					data: {
									
					},
					cache: false,
					success: function(dataResult){
						// var dataResult = JSON.parse(dataResult);
						if(dataResult.statusCode==200){
							location.href = "http://localhost/Dream-Coffin/FrontEnd/pages/index.php";						
						}
						else if(dataResult.statusCode==201){
							$("#error").show();
						}
					}
				});
			});
});    