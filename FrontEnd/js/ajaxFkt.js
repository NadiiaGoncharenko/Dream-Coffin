
$(document).ready(function() {
$('#butsave').on('click', function() {
$("#butsave").attr("disabled", "disabled");
var username = $('#username').val();
var email = $('#email').val();
var password = $('#password').val();
// console.log("password");
var plz = $('#plz').val();
var ort = $('#ort').val();
var adresse = $('#adresse').val();
var lname = $('#lname').val();
var fname = $('#fname').val();
var salutation = $('#salutation').val();
if(username!="" && email!="" && password!="" ){
	
	// console.log($)
	// console.log($.ajax)

	$.ajax({
		url: "http://localhost/Dream-Coffin/BackEnd/logic/save.php",
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
			if(dataResult == "success"){
				console.log("data_drin");
				location.href = "http://localhost/Dream-Coffin/FrontEnd/pages/index.php";					
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
