
$(document).ready(function() {
	$.ajax({
		url: "http://localhost/Dream-Coffin/BackEnd/logic/order_table.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
			$('#tableOrder').html(dataResult); 
		}
	});
	$(function () {
		$('#products_in_order').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); /*Button that triggered the modal*/
			var userID = button.data('userid');
			var order_name = button.data('order_name');
            var price = button.data('price');
			var quantity = button.data('emaiquantityl');
            var ort = button.data('ort');
			var zeit = button.data('zeit');
            var plz = button.data('plz');
            var adresse = button.data('adresse');
			var password = button.data('password');
            var username = button.data('username');
			var modal = $(this);
			modal.find('#username_modal').val(price);
			modal.find('#fname_modal').val(order_name);
			modal.find('#email_modal').val(quantity);
            modal.find('#userID_modal').val(userID);
            
		});
    });
});

