<?php 

require 'config.php';
require 'connection.php';

$descricao = $_POST['descricao'];

var_dump ($descricao);

$link = DBConnect();

$query = "insert into item (Descricao) values ('$descricao')";
echo $query;

mysqli_query($link, $query);


mysqli_close($link);

?>