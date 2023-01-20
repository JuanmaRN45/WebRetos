<!-- Juan Manuel Rincón Navarro -->
<html>
	<head>
		<title>Formulario Categorias</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
	</head>
	<body>
		<form action="altas.php"method="post">
			<h2 class="letraazul">Añadir Categorías</h2>
			<label>Nombre:</label>
			<input type="text" name="nombre" maxlength="30"/><br><br>
			<a href="index.php">Ver listado</a><br><br>
			<input type="submit" name="enviar"/>
		</form>
	</body>
</html>
<?php
if(isset ($_POST["enviar"])){
	class Alta{
		function __construct(){
			$nombre=$_POST['nombre'];
			$this->insertarCategoria($nombre);
		}
		public function insertarCategoria($nombre){
			if(isset ($_POST["enviar"])){
				$servidor = "2daw.esvirgua.com";
				$bbdd = "user2daw_BD1-14";
				$usuario = "user2daw_14";
				$contrasena = "RuolZQ4M{}Nx";
				$conexion = new mysqli($servidor, $usuario, $contrasena, $bbdd);
				$sql = "INSERT INTO CATEGORIAS(nombre)
				VALUE('$nombre');";
				$resultado = $conexion->query($sql);
				header('Location:consulta.php');
			}
		}
	}

	$alta=new Alta();

}
?>