<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
    include '../../webstructure/head.php';
    include '../../webstructure/menuleiste.php';
   
     ?>
   <script src="http://localhost/Dream-Coffin/FrontEnd/js/orders.js"></script>
<title>All orders</title>
  
</head>
<body>
<div class="container text-center">
  <h2 id = "heading-1">All orders</h2>
  <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<table class="table table-bordered table-sm" >
    <thead style="background-color: #c2d3df;">
      <tr>
        <th>OrderID</th>
        <!-- <th>Summ</th> -->
        <th>Date</th>
        <th>List of products</th>
        <th>UserID</th>
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
      
		
    </tbody>
  </table>
  <div>
			<input type="hidden" name="userID_modal" id="userID_modal" class="form-control-sm">
      
      </div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
				<p style="text-align:center;float:center;">
				<button type="submit" id="update_data" class="btn btn-default btn-sm" style="background-color: #e35f14;color:#fff;">Save</button>
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Close</button></p>
			
		  	</div>
		  </div>
		  </div>
	</div>
</div>
<!-- Modal End-->


</body>
</html>