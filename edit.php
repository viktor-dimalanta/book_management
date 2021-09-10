<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$isbn = $_POST['isbn'];
		$publisher = $_POST['publisher'];
		$year_published = $_POST['year_published'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$sql = "UPDATE books SET title = '$title', isbn = '$isbn', author = '$author', publisher = '$publisher', year_published = '$year_published', category = '$category' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Book updated successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Book updated successfully';
		// }
		///////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to edit first';
	}

	header('location: index.php');

?>