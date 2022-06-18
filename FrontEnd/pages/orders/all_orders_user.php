<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
    include '../../webstructure/head.php';
    include '../../webstructure/menuleiste.php';
  ?>
  
<title>My orders</title>
  
</head>
<body>
<div class="container text-center">
  <h2 id = "heading-1">My orders</h2>
  <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<table class="table table-bordered table-sm" >
    <thead style="background-color: #c2d3df;">
      <tr>
        <th>OrderID</th>
        <th>Summ</th>
        <th>Date</th>
        <th>List of products</th>
      </tr>
    </thead>
    <tbody id="tableOrder">
      
    </tbody>
  </table>
</div>


<!-- Modal Update-->
    <div class="modal fade" id="products_in_order" role="dialog">
		<div class="modal-dialog modal-sm">
		<table class="table table-bordered table-sm" >
    <thead style="background-color: #c2d3df;">
      <tr>
        <th>OrderID</th>
        <th>Summ</th>
        <th>Date</th>
        <th>List of products</th>
      </tr>
    </thead>
    <tbody id="tableList">
      
				<input type="hidden" name="userID_modal" id="userID_modal" class="form-control-sm">
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Close</button></p>
    </tbody>
  </table>
	
		  </div>
		  </div>
		</div>
	</div>
<!-- Modal End-->


<script>
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
</script>
</body>
</html>