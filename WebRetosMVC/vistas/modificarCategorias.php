<?php
	$idCategoria = $_GET["id"];
	$nombre2 = $_GET["nombre"];
?>
<html>
	<head>
		<title>Formulario Modificar Categorias</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
	</head>
	<body>
		<h2 class="letraazul">Modificar Categorías</h2>
		<?php echo '<form action="../controlador/controladorCategorias.php?id2='.$idCategoria.'" method="post">';?>
			<label>Nombre:</label>
			<?php echo '<input type="text" name="nombreMod" value="'.$nombre2.'" maxlength="30"/>';?><br><br>
			<a href="consultaCategorias.php">Ver listado</a><br><br>
			<input type="submit" name="enviar"/>
		</form>
	</body>
</html>
	
		
		
		