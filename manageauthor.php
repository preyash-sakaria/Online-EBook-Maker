<?php
session_start();
include('connection.php');
if(isset($_SESSION["type"]))
{
   include('header.php');

?>
<div class="container my-5">
	<h1 class="text-center" style="color: navy">Manage Author Details</h1>
	<br />
	<div align="right">
	
		<div class="table-responsive" >
			<table id="product_data" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th data-column-id="Aid" data-type="numeric">ID</th>
						<th data-column-id="Name">Author Name</th>
						<th data-column-id="Amobile">Mobile</th>
						<th data-column-id="Aemail">Email</th>
					
						<th data-column-id="address">Address</th>
						<th data-column-id="status">Status</th>
						<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>



<!-- Description Modal -->
<div id="desc" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content shadow-lg p-3 mb-5 bg-white rounded text-left">
			<div class="modal-header">
				<h4 class="modal-title title" id="car_name"></h4>
			</div>
			<div class="modal-body">
				<h4 class="modal_head"><u>Description:</u></h4> <label name="sdescription" id="sdescription" class="inner_data"></label>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn bg-danger class text-white">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- The Delete Confirmation Modal -->
<div id="delete" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="delete_form">
			<div class="modal-content shadow-lg p-3 mb-5 bg-white rounded text-left">
				<div class="modal-header">
					<h4 class="modal-title">Confirmation Deletion</h4>
				</div>
				<div class="modal-body">
					<input type="text" name="cid1" id="cid1" class="form-control invisible"/>
					<h6>Are you sure you want to delete Author<mark><label name="audname" class="font-weight-bold" id="audname"></label></mark> Details?</h6>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="operation1" id="operation1" />
					<input type="submit" name="action1" id="action1" class="btn bg-success text-white" value="Yes" />
					<button type="button" data-dismiss="modal" class="btn bg-danger class text-white">No</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="Approvalpopup" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="Approve_form">
			<div class="modal-content shadow-lg p-3 mb-5 bg-white rounded text-left">
				<div class="modal-header">
					<h4 class="modal-title">Confirmation Approval</h4>
				</div>
				<div class="modal-body">
					<input type="text" name="cid2" id="cid2" class="form-control invisible"/>
					<h6>Are you sure you want to Approve Author<mark><label name="audname1" class="font-weight-bold" id="audname1"></label></mark> Details?</h6>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="operation2" id="operation2" />
					<input type="submit" name="action2" id="action2" class="btn bg-success text-white" value="Yes" />
					<button type="button" data-dismiss="modal" class="btn bg-danger class text-white">No</button>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
<?php
include('footer.php');
?>
<script>
$(document).ready(function(){
	var productTable = $('#product_data').bootgrid({
		ajax: true,
		rowSelect: true,
		post: function()
		{
		return{
		id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
		};
		},
		url: "authorresponse.php",
		formatters: {
		"commands": function(column, row)
		{
		return "<button type='button' class='btn btn-warning btn-xs approve' data-row-id='"+row.Aid+"'>Approve</button>" + 
		"&nbsp; <button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.Aid+"'>Delete</button>";
		}
		}
	});

	// $(document).on('submit', '#product_form', function(event){
	// 	event.preventDefault();
	// 	var operation = $('#operation').val();
	// 	if(operation == "Add")
	// 	{				
	// 		$.ajax({
	// 		url:"authorResponse.php",
	// 		method:"POST",
	// 		data:new FormData(this),
	// 		contentType: false,
	// 		cache: false,
	// 		processData:false,
	// 		success:function(data)
	// 		{
	// 		alert(data);
	// 		window.location.href="manageauthor.php";
	// 		}
	// 		});
	// 	}
	// 	else{

	// 		$.ajax({
	// 		url:"authorResponse.php",
	// 		method:"POST",
	// 		data:new FormData(this),
	// 		contentType: false,
	// 		cache: false,
	// 		processData:false,
	// 		success:function(data)
	// 		{
	// 		alert(data);
	// 		window.location.href="manageauthor.php";
	// 		}
	// 		});
	// 	}
	// });
	// $(document).on("loaded.rs.jquery.bootgrid", function()
	// {
	// 	productTable.find(".update").on("click", function(event)
	// 	{
	// 	var cid = $(this).data("row-id");
	// 	var edit = 0;
	// 	$.ajax({
	// 		url:"authorResponse.php",
	// 		method:"POST",
	// 		data:{cid:cid, edit:edit},
	// 		dataType:"json",
	// 		success:function(data)
	// 		{
	// 		$('#action').css("display", "initial");
		
			
	// 		$('#product_modal').modal('show');
	// 		$('#edit_id').val(data.aid);
	// 		$('#fname').val(data.fname);
	// 		$('#lname').val(data.lname);
	// 		$('#email').val(data.email);
	// 		$('#mobile').val(data.mobile);
	// 		$('#address').val(data.address);
			
			
	// 		 $('#action').val("Edit");
	// 	 $('#operation').val("Edit");
		
	// 		}
	// 	});
	// 	});
	// });

	$(document).on("loaded.rs.jquery.bootgrid", function()
	{
		productTable.find(".delete").on("click", function(event)
		{
		var cid = $(this).data("row-id");
		var del = 0;
		$.ajax({
			url:"authorResponse.php",
			method:"POST",
			data:{cid:cid, del:del},
			dataType:"json",
			success:function(data)
			{
			$('#delete').modal('show');
			$('#cid1').val(data.aid);
			$('#audname').text(data.audname);
			$('#action1').val("Yes");
			$('#operation1').val("Delete");
			}
		});
		});
	}); 
	$(document).on("loaded.rs.jquery.bootgrid", function()
	{
		productTable.find(".approve").on("click", function(event)
		{
		var cid = $(this).data("row-id");
		var approve = 0;
		$.ajax({
			url:"authorResponse.php",
			method:"POST",
			data:{cid:cid, approve:approve},
			dataType:"json",
			success:function(data)
			{
			$('#Approvalpopup').modal('show');
			$('#cid2').val(data.aid);
			$('#audname1').text(data.audname);
			$('#action2').val("Yes");
			$('#operation2').val("Approve");
			}
		});
		});
	}); 
	$(document).on('submit', '#delete_form', function(event){
		event.preventDefault();
		$.ajax({
			url:"authorResponse.php",
			method:"POST",
			data:new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success:function(data)
			{
			alert(data);
			window.location.href="manageauthor.php";
			}
			});
	});
	$(document).on('submit', '#Approve_form', function(event){
		event.preventDefault();
		$.ajax({
			url:"authorResponse.php",
			method:"POST",
			data:new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success:function(data)
			{
			alert(data);
			window.location.href="manageauthor.php";
			}
			});
	});
	//
});

// $(document).ready(function(){
// 	$('#add_button').click(function(){
// 		$('#product_form')[0].reset();
		
// 		$('.modal-title').text("Add Auditor Details");
// 		$('#action').val("Add");
// 		$('#operation').val("Add");
		
// 			$('#edit_model').css("display","initial");
// 			$('#action').css("display", "initial");
// 	});
	
// 	$('#edit_category').on('change', function() {
	
// 	var brand = 1;
// 	var brand_name = this.value;
// 	$.ajax({
// 			url:"authorResponse.php",
// 			method:"POST",
// 			data:{brand_name:brand_name, brand:brand},
// 			success:function(data)
// 			{
// 			$('#edit_model').html("");
// 				$('#edit_model').append(data);
// 				$('#action').css("display", "initial");
// 			}
// 			});
// 	});

// });


			
	</script>
</body>
</html>
<?php
}
else
{
	echo "<script>window.location.href='index.php';</script>";
}
?>