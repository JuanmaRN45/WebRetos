<?php
	$idCategoria = $_GET["id"];
	$nombre2 = $_GET["nombre"];
	echo	'<form action="./controlador/controlador.php?id2='.$idCategoria.'" method="post">
		<h2 class="letraazul">Modificar Categorías</h2>
		<label>Nombre:</label>
		<input type="text" name="nombreMod" value="'.$nombre2.'" maxlength="30"/><br><br>
		<a href="index.php">Ver listado</a><br><br>
		<input type="submit" name="enviar"/>
		</form>';
?>