<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: ./vistas/inicio_sesion.php');
    }
        
?>
<html>
	<head>
		<title>App Retos</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
        <link rel="stylesheet" type="text/css" href="./css/estilo.css">
	</head>
	<body>
        <form action="./controlador/controladorGeneral.php" method="post">
            <input type="submit" value="Categorias" name="btnCategorias">
        </form>
        <form action="./controlador/controladorGeneral.php" method="post">
            <input type="submit" value="Retos"name="btnRetos">
        </form>
        <form action="./controlador/controladorGeneral.php">
            <input type="submit" value="Profesores" name="btnProfesores">
        </form>
    </body>
</html>