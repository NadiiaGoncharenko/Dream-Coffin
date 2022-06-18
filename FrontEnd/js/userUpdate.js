
$(document).ready(function() {
	$.ajax({
		url: "http://localhost/Dream-Coffin/BackEnd/logic/View_ajax.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
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
			var active = button.data('active');
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
            modal.find('#active_modal').val(active);
		});
    });
	$(document).on("click", "#update_data", function() { 
		$.ajax({
			url: "http://localhost/Dream-Coffin/BackEnd/logic/update_admin.php",
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
				password: $('#password').val(),
				active: $('#active').val()
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