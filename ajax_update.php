<?php
	session_start();
	include_once('connection.php');

	
	$id = $_GET["id"];

	//$sql="UPDATE books SET archived = 1 WHERE id = '{$_GET["id"]}' ";
	$query = "UPDATE books SET archived = 1 WHERE id ='{$id}'";
	$result = mysqli_query($conn, $query);

	?>