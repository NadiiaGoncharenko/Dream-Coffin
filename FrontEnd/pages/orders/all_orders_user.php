<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
    include '../../webstructure/head.php';
    include '../../webstructure/menuleiste.php';
   
     ?>
   <script src="http://localhost/Dream-Coffin/FrontEnd/js/orders.js"></script>
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


</body>
</html>