<!-- Juan Manuel Rincón Navarro -->
<html>
	<head>
		<title>Formulario Categorias</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
	</head>
	<body>
		<?php
		echo	'<form action="altas.php"method="post">
			<h2 class="letraazul">Añadir Categorías</h2>
			<label>Nombre:</label>
			<input type="text" name="nombre" maxlength="30"/><br><br>
			<a href="consulta.php">Ver listado</a><br><br>
			<input type="submit" name="enviar"/>
			</form>';
			if(isset ($_POST["enviar"])){
				$servidor = "2daw.esvirgua.com";
				$bbdd = "user2daw_BD1-14";
				$usuario = "user2daw_14";
				$contrasena = "RuolZQ4M{}Nx";
				$conectar = mysqli_connect($servidor, $usuario, $contrasena, $bbdd);
				$nombre = $_POST["nombre"];
				$sql = "INSERT INTO CATEGORIAS(nombre)
				VALUE('$nombre');";
				$resultado = mysqli_query($conectar,$sql);
			}
		?>
	</body>
</html>