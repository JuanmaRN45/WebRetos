<?php
	$servidor = "2daw.esvirgua.com";
	$bbdd = "user2daw_BD1-14";
	$usuario = "user2daw_14";
	$contrasena = "RuolZQ4M{}Nx";
	$conectar = mysqli_connect($servidor, $usuario, $contrasena, $bbdd);
	$id = $_GET["id"];
	$sql2 = 'DELETE FROM CATEGORIAS WHERE id='.$id.';';
	
	$resultado2=mysqli_query($conectar,$sql2);
	include 'consulta.php';
?>