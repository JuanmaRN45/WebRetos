<!-- Juan Manuel Rincón Navarro -->
<html>
	<head>
		<title>Formulario Categorias</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
	</head>
	<body>
		<form action="../controlador/controladorCategorias.php"method="post">
			<h2 class="letraazul">Añadir Categorías</h2>
			<label>Nombre:</label>
			<input type="text" name="nombre" maxlength="30"/><br><br>
			<a href="consultaCategorias.php">Ver listado</a><br><br>
			<input type="submit" name="enviar"/>
		</form>
	</body>
</html>