<?php
	require 'config.php';
	require 'connection.php';
	$link = DBConnect();

	$id = $_POST['id'];
	
	$sql = "SELECT * FROM `item` WHERE Id = '$id'";
	$item = $link->query($sql);
	$row = $item->fetch_assoc();

	if($row['Situacao'] == 1)
	{
		$update = "UPDATE `item` SET Situacao = '0' WHERE Id = '$id'";
		$alterar = $link->query($update);
	}else{
		$update = "UPDATE `item` SET Situacao = '1' WHERE Id = '$id'";
		$alterar = $link->query($update);
	}

	echo $update;

	mysqli_close($link);
?>