<?php
	if(isset($_GET['borrar'])){
		$idCategoria = $_GET["id"];
		header('Location:borrar.php?id='.$idCategoria.'');
	}
	if(isset($_GET['modificar'])){
		$idCategoria = $_GET["id"];
		header('Location:modificar.php?id='.$idCategoria.'');
	}
?>