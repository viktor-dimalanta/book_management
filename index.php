<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Book Management</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
	<style>
		.height10{
			height:10px;
		}
		.mtop10{
			margin-top:10px;
		}
		.modal-label{
			position:relative;
			top:7px
		}

		#myTable_wrapper > div:nth-child(1){
			display: none;
		}

		#myTable_wrapper > div:nth-child(3) > div.col-sm-5{
			display:none;
		}

		#myTable_paginate > ul > li > a{
			color: black;
			border: 0;
			background-color: unset;
		}

		body > div.container > div > div{
			margin-left:0px;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-sm-offset-2">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>
			<br><br>
			<div class="row">
				<!-- <a href="#addnew" data-toggle="modal" class="btn btn-success pull-right">Add</a>
				<a href="print_pdf.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> PDF</a> -->
				<input type="text" class="form-control col-lg-2" id="searchField" style="width:270px;"/> &nbsp;
				<button type="button" class="btn btn-info" id="search">
					Search
				</button>
				<button type="button" class="btn btn-danger" id="reset">
					Reset
				</button>
				<br><br>
				<div class="col-lg-12" style="padding: 0px;">
    		        <div class="float-left col-lg-10" style="padding: 0px;">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" id="recent-book" style="width: 175px;">
        					Recent
        				</button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" id="archive-book" style="width: 175px;">
        					Archive
        				</button>
    		        </div>
    		        <div class="float-right col-lg-2" style="float: right;margin-right: -65px;">
        				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addnew">
        					Add
        				</button>
    		        </div>
    		    </div>


			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>ID</th>
						<th>title</th>
						<th>isbn</th>
						<th>author</th>
						<th>publisher</th>
						<th>year published</th>
						<th>category</th>
						<th>archived</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
							include_once('connection.php');
							$sql = "SELECT * FROM books ";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['id']."</td>
									<td>".$row['title']."</td>
									<td>".$row['isbn']."</td>
									<td>".$row['author']."</td>
									<td>".$row['publisher']."</td>
									<td>".$row['year_published']."</td>
									<td>".$row['category']."</td>
									<td>".$row['archived']."</td>
									<td>
										<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
										<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
										<input type='submit' class='archive btn btn-warning btn-sm' data-id=".$row['id']." value='archive' />
									</td>
								</tr>";
								include('edit_delete_modal.php');
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include('add_modal.php') ?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
	//inialize datatable
    var oTable = $('#myTable').DataTable({
        "ordering": true, // false to disable sorting (or any other option)
		pagingType: 'numbers',
		pageLength: 10
    });

	oTable.columns( [7] ).visible( false );

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })

	$( "#search" ).click(function() {
		oTable.search($("#searchField").val()).draw() ;
	});

	$( "#reset" ).click(function() {
		location.reload();
	});

	$( '.archive').click(function() {
		var el = this;
		var id = $(el).data('id');
		$.ajax({
		url: "ajax_update.php",
		data: { id: id },
		context: document.body
		}).done(function() {
			alert('archive successfully!');
		});
			return false;
	});

	$( "#recent-book" ).click(function() {
		//oTable.search($("#searchField").val()).draw() ;
		oTable.column(7).search(1).draw();
	});

	$( "#archive-book" ).click(function() {	
		oTable.column(7).search(0).draw();
	});
});
</script>
</body>
</html>