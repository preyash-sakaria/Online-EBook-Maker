<?php
session_start();
include('connection.php');
if(isset($_SESSION["type"]))
{

?>

<!DOCTYPE html>
<html>
<head>
	<title> Finished Ebooks</title>
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

<?php    include('header.php'); ?>

<div style="margin-top: 9%;">
<div class="container my-5" style="background-color: lightblue">
	<h1 class="text-center" style="color: navy">Manage Finish Ebook Details</h1>
	<br />
	<div align="right">
	
		<div class="table-responsive" >
			<table id="product_data" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th data-column-id="Eid" data-type="numeric">ID</th>
						<th data-column-id="Name">Author Name</th>
						<th data-column-id="Ebname">Ebook Name</th>
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
					<h4 class="modal-title">Ebook Share</h4>
				</div>
				<div class="modal-body">
					<!-- <input type="text" name="cid2" id="cid2" class="form-control invisible"/> -->
                    <div class="Row">
                    
                    <div class="col-md-12"><label style="font-size: medium;">Ebook Name </label> <input type="text" class="form-control" name="ebookname" Readonly="true" id="ebookname" Required placeholder="Ebook"><br/></div>
                    <div class="col-md-12"><label style="font-size: medium;">Email Id</label> <input type="text" class="form-control" name="emailid" id="emailid" Required  placeholder="Email ID"></div>

                    </div>
                   
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="operation2" id="operation2" />
					<input type="submit" name="action2" id="action2" class="btn bg-success text-white" Required value="Yes" />
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
		url: "finishbookresponse.php",
		formatters: {
		"commands": function(column, row)
		{
		return "<button type='button' class='btn btn-warning btn-xs process' data-row-id='"+row.Eid+"'>Process</button> <button type='button' class='btn btn-danger btn-xs view' data-row-id='"+row.Eid+"'>View</button>";
		}
		}
	});

	$(document).on("loaded.rs.jquery.bootgrid", function()
	{
		productTable.find(".process").on("click", function(event)
		{
		var cid = $(this).data("row-id");
		var process = 0;
       // alert(cid);
		$.ajax({
			url:"finishbookresponse.php",
			method:"POST",
			data:{cid:cid, process:process},
			dataType:"json",
			success:function(data)
			{
             //   alert(data.eid);
	     	$('#Approvalpopup').modal('show');
		     $('#ebookname').val(data.Ebname);
			
			$('#action2').val("Yes");
		    $('#operation2').val("process");
			}
		});
		});
	}); 
	$(document).on("loaded.rs.jquery.bootgrid", function()
	{
		productTable.find(".view").on("click", function(event)
		{
		var cid = $(this).data("row-id");
		var downloadid = 0;
		
		$.post("finishbookresponse.php",{cid:cid,downloadid:downloadid},function(data,status){

 window.open(data);

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
			url:"finishbookresponse.php",
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
			url:"finishbookresponse.php",
			method:"POST",
			data:new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success:function(data)
			{
			alert(data);
			window.location.href="managefinishbook.php";
			}
			});
	});
	$(document).on('submit', '#Approve_form', function(event){
		event.preventDefault();
		$.ajax({
			url:"finishbookresponse.php",
			method:"POST",
			data:new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success:function(data)
			{
			alert(data);
			window.location.href="managefinishbook.php";
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