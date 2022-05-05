
$(document).ready(function() {
$('#butsave').on('click', function() {
$("#butsave").attr("disabled", "disabled");
var username = $('#username').val();
var email = $('#email').val();
var password = $('#password').val();
if(username!="" && email!="" && password!="" ){
	$.ajax({
		url: "../BackEnd/logic/save.php",
		type: "POST",
		data: {
			username: username,
			email: email,
			password: password		
		},
		cache: false,
		success: function(dataResult){
			console.log(dataResult);
			var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
				$("#butsave").removeAttr("disabled");
				$('#fupForm').find('input:text').val('');
				$("#success").show();
				$('#success').html('Data added successfully !'); 						
			}
			else if(dataResult.statusCode==201){
				alert("Error occured !");
			}
			
		}
	});
	}
	else{
		alert('Please fill all the field !');
	}
})
}); 
