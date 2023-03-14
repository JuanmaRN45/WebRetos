<!-- Juan Manuel Rincón Navarro -->
<?php
	session_start();
    if(!isset($_SESSION['id'])){
        header('Location: ../vistas/inicio_sesion.php');
    }
	
    if(isset($_POST['cerrarsesion'])){
        require_once('../controlador/controladorGeneral.php');
        $controladorGeneral =new ControladorGeneral();
        $controladorGeneral->cerrarSesion();
    }
	if(isset($_POST['enviar'])){
		require_once('../controlador/controladorCategorias.php');
		$controladorCategorias = new ControladorCategorias();
		$controladorCategorias->anadirCat($_POST);
	}
	require_once('../controlador/controladorCategorias.php');
	$controladorCategorias = new ControladorCategorias();
	$array = $controladorCategorias->consultaCategorias();
?>
<html>
	<head>
		<title>Formulario Categorias</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
	</head>
	<body>
		<form action="" method="post">
			<h2 class="letraazul">Añadir Categorías</h2>
			<label>Nombre:</label>
			<input type="text" name="nombre" maxlength="30"/><br><br>
			<a href="consultaCategorias.php">Ver listado</a><br><br>
			<input type="submit" name="enviar"/>
		</form>
	</body>
</html>