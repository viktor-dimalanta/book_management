<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$title = $_POST['title'];
		$isbn = $_POST['isbn'];
		$author = $_POST['author'];
		$publisher = $_POST['publisher'];
		$year_published = $_POST['year_published'];
		$category = $_POST['category'];
		$sql = "INSERT INTO books (title, isbn, author,publisher,year_published,category) VALUES ('$title', '$isbn', '$author','$publisher','$year_published','$category')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Book added successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Book added successfully';
		// }
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: index.php');
?>