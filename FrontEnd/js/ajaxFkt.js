
$(document).ready(function() {
$('#butsave').on('click', function() {
$("#butsave").attr("disabled", "disabled");
var username = $('#username').val();
var email = $('#email').val();
var password = $('#password').val();
var plz = $('#plz').val();
var ort = $('#ort').val();
var adresse = $('#adresse').val();
var lname = $('#lname').val();
var fname = $('#fname').val();
var salutation = $('#salutation').val();
if(username!="" && email!="" && password!="" && salutation!="" ){
	$.ajax({
		url: "/BackEnd/logic/save.php",
		type: "POST",
		data: {
			username: username,
			email: email,
			password: password,
			ort: ort,
			plz: plz,
			adresse: adresse,
			salutation: salutation,
			lname: lname,
			fname: fname				
		},
		cache: false,
		success: function(dataResult){
			console.log(dataResult);
			var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
				$("#butsave").removeAttr("disabled");
				$('#fupForm').find('input:text').val('');
				$("#success").show();
				$('#success').html('welcome 2m under the earth!'); 						
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
