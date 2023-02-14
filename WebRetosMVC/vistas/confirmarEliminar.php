<?php
    $array = array(
        0 =>$_POST['retoDel'],
    );
?>
<html>
	<head>
		<title>Formulario Confirmación Borrado</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	</head>
	<body>
		<nav>
			<a href="../vistas/altaRetos.php"><button>ALTA RETOS</button></a>
			<a href="../vistas/listarRetos.php"><button>LISTAR RETOS</button></a>
			<a href="../vistas/eliminarReto.php"><button>ELIMINAR RETOS</button></a>
			<a href="../vistas/modificarRetos.php"><button>MODIFICAR RETOS</button></a>
		</nav>
		<form action="../controlador/controladorRetos.php" method="post">
            <label>Estás seguro de que quieres borrar este reto</label>
            <?php
                echo '<input id="invisible" type="text" value="'.$array[0].'" name="retoDel" hidden>'; 
            ?>
            <br><br>
            <a href="../vistas/eliminarReto.php"><button>Volver</button></a>
			<input type="submit" value="Eliminar" name="Eliminar"/>
		</form>
	</body>
</html>