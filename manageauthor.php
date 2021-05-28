<?php
session_start();
include('connection.php');
if(isset($_SESSION["type"]))
{
   
?>

<!DOCTYPE html>
<html>
<head>
	<title> Manage Author </title>

	<style type="text/css"> 
			.back{
				  background-position: center;
				  background-attachment: fixed;
				  background-repeat: no-repeat;
				  background-size: cover;
				  background-image: url("image/banner.jpg");
				  background-blend-mode: overlay;
				  background-color: #ffffff47;
				}
		</style>

</head>
<body>
<div class="back">

	<?php include('header.php');?>

<div style="margin-top: 9%;">
<div class="container my-5" style="background-color:lightblue; box-sizing: 1px">
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