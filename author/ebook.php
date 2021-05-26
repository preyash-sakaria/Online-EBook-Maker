<?php
session_start();
include('../connection.php');
if(isset($_SESSION["user_type"]))
{
   include('header.php');
	$id = "";

?>
<div class="container my-5">

	<h1 class="text-center" style="color: navy">Manage Ebook</h1>
	<br />
	<div align="right">
		<button type="button" id="add_button"  class="btn text-white btn-lg" style="background-color: navy; border-color: navy;" >Add New Book</button>
		<div class="table-responsive" >
			<table id="product_data" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th data-column-id="Eid" data-type="numeric">EID</th>
						<th data-column-id="Name">Author Name</th>
						<th data-column-id="Ebname">E Book Name</th>
						<th data-column-id="status">Status</th>
						<th data-column-id="filepath">File Path</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
					</tr>
				</thead>
			</table>
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
					<h6>Are you sure you want to delete Task<mark><label name="audname" class="font-weight-bold" id="audname"></label></mark> Details?</h6>
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
		url: "ebookresponse.php",
		formatters: {
		"commands": function(column, row)
		{
		return "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.Eid+"'>Delete</button> <button type='button' class='btn btn-warning btn-xs edit' data-row-id='"+row.Eid+"'>Edit</button> <button type='button' class='btn btn-info btn-xs Finish' data-row-id='"+row.Eid+"'>Finish</button>";
		}
		}
	});
	$("#add_button").click(function(){

		window.location.href="addebook.php";
   });


	$(document).on('submit', '#product_form', function(event){
		event.preventDefault();
		var operation = $('#operation').val();
		if(operation == "Add")
		{				
			$.ajax({
			url:"ebookresponse.php",
			method:"POST",
			data:new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success:function(data)
			{
			alert(data);
			window.location.href="ebook.php";
			}
			});
		}
		else{

			$.ajax({
			url:"ebookresponse.php",
			method:"POST",
			data:new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success:function(data)
			{
			alert(data);
			window.location.href="ebook.php";
			}
			});
		}
	});
	$(document).on("loaded.rs.jquery.bootgrid", function()
	{
		productTable.find(".edit").on("click", function(event)
		{
		var cid = $(this).data("row-id");
		var edit = 0;
		window.location.href="addebook.php?eid="+cid;
		// $.ajax({
		// 	url:"ebookresponse.php",
		// 	method:"POST",
		// 	data:{cid:cid, edit:edit},
		// 	dataType:"json",
		// 	success:function(data)
		// 	{

		// 	$('#action').css("display", "initial");
        //    $('#product_modal').modal('show');
		// 	$('#edit_id').val(data.aid);
		// 	$('#fname').val(data.fname);
		// 	$('#lname').val(data.lname);
		// 	$('#email').val(data.email);
		// 	$('#mobile').val(data.mobile);
		// 	$('#address').val(data.address);

		// 	$('.modal-title').text("Edit Agent Details");
		// 	 $('#action').val("Edit");
		//  $('#operation').val("Edit");

		// 	}
		// });
		});
	});

	$(document).on("loaded.rs.jquery.bootgrid", function()
	{
		productTable.find(".Finish").on("click", function(event)
		{
		var cid = $(this).data("row-id");
		var finish = 0;
	     
		$.ajax({
			url:"ebookresponse.php",
			method:"POST",
			data:{cid:cid, finish:finish},
	     	//	dataType:"json",
			success:function(data)
			{
           alert(data);
			window.location.href="ebook.php";

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
			url:"ebookresponse.php",
			method:"POST",
			data:{cid:cid, del:del},
			 dataType:"json",
			success:function(data)
			{
			$('#delete').modal('show');
		    $('#cid1').val(data.Eid);
			$('#audname').text(data.ebookname);
			$('#action1').val("Yes");
			$('#operation1').val("Delete");
			}
		});
		});
	}); 

	$(document).on('submit', '#delete_form', function(event){
		event.preventDefault();
		$.ajax({
			url:"ebookresponse.php",
			method:"POST",
			data:new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success:function(data)
			{
			alert(data);
			window.location.href="ebook.php";
			}
			});
	});
});

$(document).ready(function(){
	$('#add_button').click(function(){
		$('#product_form')[0].reset();
		// $('#car_image').css("display", "initial");
		$('.modal-title').text("Add Task Details");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#edit_model').css("display","initial");
     	$('#action').css("display", "initial");
	});
	
	$('#edit_category').on('change', function() {
	
	var brand = 1;
	var brand_name = this.value;
	$.ajax({
			url:"ebookresponse.php",
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