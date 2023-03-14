<?php
	if(isset($_POST['enviar'])){
		require_once('../controlador/controladorCategorias.php');
		$controladorCategorias = new ControladorCategorias();
		$controladorCategorias->updateCat($_POST);
	}
	$idCategoria = $_GET["id"];
	require_once('../controlador/controladorCategorias.php');
	$controladorCategorias = new ControladorCategorias();
	$datos = $controladorCategorias->modCat($idCategoria);
	
?>
<html>
	<head>
		<title>Formulario Modificar Categorias</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
	</head>
	<body>
		<h2 class="letraazul">Modificar Categorías</h2>
		<?php echo '<form action="" method="post">';?>
			<label>Nombre:</label>
			<?php echo '<input type="text" name="nombreMod" value="'.$datos['nombre'].'" maxlength="30"/>';?><br><br>
			<?php echo '<input type="text" name="id" value="'.$datos['id'].'" maxlength="30" hidden/>';?>
			<a href="consultaCategorias.php">Ver listado</a><br><br>
			<input type="submit" name="enviar"/>
		</form>
	</body>
</html>
	
		
		
		