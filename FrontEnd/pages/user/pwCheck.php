
<!-- Modal Check-->
<div class="modal fade" id="pw_check" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">
			<div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
			  <h5 class="modal-title"><i class="fa fa-edit"></i> Update</h5>
			 
			</div>
			<div class="modal-body">

				<!--1-->
				<div class="row">
					<div class="col-md-3">
					    <label>Password</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="pw" id="pw" class="form-control-sm" required>
					</div>	
				</div>
			    
				<input type="hidden" name="userID_modal" id="userID_modal" class="form-control-sm">
			</div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
			<p style="text-align:center;float:center;">
			<button type="submit" id="pw_submit" class="btn btn-default btn-sm" style="background-color: #e35f14;color:#fff;">Save</button>
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Close</button></p>
			
		  </div>
		  </div>
		</div>
	</div>
<!-- Modal Check End-->



<script>
$(document).ready(function() {
	
	$(function () {
		$('#pw_submit').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); /*Button that triggered the modal*/
			var userID = button.data('userid');
            var pw = button.data('pw');
			var modal = $(this);
			modal.find('#pw').val(pw);
            modal.find('#userID_modal').val(userID);
            
		});
    });
	$(document).on("click", "#pw_submit", function() { 
		$.ajax({
			url: "http://localhost/Dream-Coffin/BackEnd/logic/pw_checking.php",
			type: "POST",
			cache: false,
			data:{
				password: $('#pw').val(),
				userID:$('#userID_modal').val(),
			},
			success: function(dataResult){
			//	var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$('#pw_check').modal().hide();
					alert('You may update Data!');
                
					location.("#update_country");					
				}
			}
		});
	}); 
});
</script>

