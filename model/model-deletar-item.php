<?php
	require 'config.php';
	require 'connection.php';
	$link = DBConnect();

	$id = $_POST['id'];

	$sql = "DELETE FROM `item` WHERE Id = $id ";
	echo $sql;
	echo $id;

	$result = $link->query($sql);
	
	mysqli_close($link);
?>