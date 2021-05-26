<?php
session_start();
include('connection.php');
if(isset($_SESSION["type"]))
{
   include('header.php');
	$id = "";
	$select = "SELECT agentid FROM `agents` ORDER by agentid desc LIMIT 1";
	$result1 = mysqli_query($con, $select);
	if($row1 = mysqli_fetch_array($result1))
	{
		$id = $row1["agentid"] + 1;
	}
	else
	{
		$id = 101;
	}
?>
<div class="container my-5">
	<h1 class="text-center" style="color: navy">Manage Agents Details</h1>
	<br />
	<div align="right">
		<button type="button" id="add_button" data-toggle="modal" data-target="#product_modal" class="btn text-white btn-lg" style="background-color: navy; border-color: navy;">Add Agent Details</button>
		<div class="table-responsive" >
			<table id="product_data" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th data-column-id="agentid" data-type="numeric">ID</th>
						<th data-column-id="Name">Agent Name</th>
						<th data-column-id="mobile">Mobile</th>
						<th data-column-id="email">Email</th>
						<th data-column-id="address">Address</th>
	
						<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

<!-- Add Car Modal -->
<div id="product_modal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<form method="post" id="product_form" enctype="multipart/form-data">
			<div class="modal-content shadow-lg p-3 mb-5 bg-white rounded text-left">
				<div class="modal-header">
					<h4 class="modal-title">Add Auditor Details</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<label>Id:</label>
							<input type="text" name="edit_id" id="edit_id" class="form-control" value="<?php echo $id; ?>" readonly required/>	
						</div>
						<div class="col-md-6">
						</div>
								
						<div class="col-md-6 mt-2">
							<label>Name</label>
							<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required />
						</div>
			
						<div class="col-md-6 mt-2">
							<label>Last Name</label>
							<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required />
						</div>
								
						<div class="col-md-6 mt-2">
							<label>Email</label>
							<input type="email" name="email" id="email" class="form-control" placeholder="Email" required />
						</div>
						<div class="col-md-6 mt-2">
							<label>Mobile</label>
							<input type="Number" name="mobile" id="mobile" placeholder="Mobile" class="form-control" required />
						</div>
						<div class="col-md-12 mt-2">
							<label>Address</label>
						
							<textarea name="address" id="address" class="form-control" required ></textarea>
						</div>
						
						
					
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" style="display: none;" name="action" id="action" class="btn bg-success text-white" value="Add" />
					<button type="button" data-dismiss="modal" class="btn bg-danger class text-white">Close</button>
				</div>	
			</div>
		</form>
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

<!-- The Confirmation Modal -->
<div id="delete" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="delete_form">
			<div class="modal-content shadow-lg p-3 mb-5 bg-white rounded text-left">
				<div class="modal-header">
					<h4 class="modal-title">Confirmation Deletion</h4>
				</div>
				<div class="modal-body">
					<input type="text" name="cid1" id="cid1" class="form-control invisible"/>
					<h6>Are you sure you want to delete Agent<mark><label name="audname" class="font-weight-bold" id="audname"></label></mark> Details?</h6>
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
		url: "agentResponse.php",
		formatters: {
		"commands": function(column, row)
		{
		return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.agentid+"'>Edit / View</button>" + 
		"&nbsp; <button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.agentid+"'>Delete</button>";
		}
		}
	});

	$(document).on('submit', '#product_form', function(event){
		event.preventDefault();
		var operation = $('#operation').val();
		if(operation == "Add")
		{				
			$.ajax({
			url:"agentResponse.php",
			method:"POST",
			data:new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success:function(data)
			{
			alert(data);
			window.location.href="agent.php";
			}
			});
		}
		else{

			$.ajax({
			url:"agentResponse.php",
			method:"POST",
			data:new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success:function(data)
			{
			alert(data);
			window.location.href="agent.php";
			}
			});
		}
	});
	$(document).on("loaded.rs.jquery.bootgrid", function()
	{
		productTable.find(".update").on("click", function(event)
		{
		var cid = $(this).data("row-id");
		var edit = 0;
		$.ajax({
			url:"agentResponse.php",
			method:"POST",
			data:{cid:cid, edit:edit},
			dataType:"json",
			success:function(data)
			{

			$('#action').css("display", "initial");
           $('#product_modal').modal('show');
			$('#edit_id').val(data.aid);
			$('#fname').val(data.fname);
			$('#lname').val(data.lname);
			$('#email').val(data.email);
			$('#mobile').val(data.mobile);
			$('#address').val(data.address);

			$('.modal-title').text("Edit Agent Details");
			 $('#action').val("Edit");
		 $('#operation').val("Edit");

			}
		});
		});
	});

	$(document).on("loaded.rs.jquery.bootgrid", function()
	{
		productTable.find(".delete").on("click", function(event)
		{
		var cid = $(this).data("row-id");
		var del = 0;
		$.ajax({
			url:"agentResponse.php",
			method:"POST",
			data:{cid:cid, del:del},
			dataType:"json",
			success:function(data)
			{
			$('#delete').modal('show');
			$('#cid1').val(data.agentid);
			$('#audname').text(data.audname);
			$('#action1').val("Yes");
			$('#operation1').val("Delete");
			}
		});
		});
	}); 

	$(document).on('submit', '#delete_form', function(event){
		event.preventDefault();
		$.ajax({
			url:"agentResponse.php",
			method:"POST",
			data:new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success:function(data)
			{
			alert(data);
			window.location.href="agent.php";
			}
			});
	});
});

$(document).ready(function(){
	$('#add_button').click(function(){
		$('#product_form')[0].reset();
		// $('#car_image').css("display", "initial");
		$('.modal-title').text("Add Agent Details");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#edit_model').css("display","initial");
     	$('#action').css("display", "initial");
	});
	
	$('#edit_category').on('change', function() {
	
	var brand = 1;
	var brand_name = this.value;
	$.ajax({
			url:"agentResponse.php",
			method:"POST",
			data:{brand_name:brand_name, brand:brand},
			success:function(data)
			{
			$('#edit_model').html("");
				$('#edit_model').append(data);
				$('#action').css("display", "initial");
			}
			});
	});

});


			
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