<?php
	if(isset($_GET['borrar'])){
		$idCategoria = $_GET["id"];
		header('Location: ./controlador/controlador.php?id='.$idCategoria.'');
	}
	if(isset($_GET['modificar'])){
		$idCategoria = $_GET["id"];
		header('Location:./controlador/controlador.php?idMod='.$idCategoria.'');
	}
?>