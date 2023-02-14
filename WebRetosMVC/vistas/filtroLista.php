<?php
    $array = array(
        0 =>$_POST['nomFiltro']
    );
    require_once('../controlador/controladorRetos.php');
    $controladorRetos =new ControladorRetos();
    $reto = $controladorRetos->filtrarReto($array);
    $i=0;
?>

<html>
	<head>
		<title>Listado de Retos</title>
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
        <form action="../vistas/filtroLista.php" method="post">
            <label>Nombre</label>
            <input type="text" name="nomFiltro">
            <input type="submit" value="Filtrar" name="btnFiltro">
        </form>
        <h1>LISTADO DE RETOS</h1>
        <form action="../controlador/controladorRetos.php" method="post">
			<?php
				if(isset($reto[0])){
					echo '<h2>Filtrado Reto '.$reto[1].'</h2>';
					echo '<label>Id:</label>';
					echo '<p>'.$reto[0].'</p><br><br>';
					echo '<label>Nombre:</label>';
					echo '<p>'.$reto[1].'</p><br><br>';
					echo '<label>Dirigido:</label>';
					echo '<p>'.$reto[2].'</p><br><br>';
					echo '<label>Descripción:</label>';
					echo '<p>'.$reto[3].'</p><br><br>';
					echo '<label>Fecha Inicio Inscripción:</label>';
					echo '<p>'.$reto[4].'</p><br><br>';
					echo '<label>Fecha Fin Inscripción:</label>';
					echo '<p>'.$reto[5].'</p><br><br>';
					echo '<label>Fecha Inicio Reto:</label>';
					echo '<p>'.$reto[6].'</p><br><br>';
					echo '<label>Fecha Fin Reto:</label>';
					echo '<p>'.$reto[7].'</p><br><br>';
					echo '<label>Fecha Publicación:</label>';
					echo '<p>'.$reto[8].'</p><br><br>';
					echo '<label>Profesor:</label>';
					echo '<p>'.$reto[10].'</p><br><br>';
					echo '<label>Categoría:</label>';
					echo '<p>'.$reto[11].'</p><br><br>';
					echo '<label>Publicado:</label>';
					if($reto[9]==1){
						echo '<p>Si</p><br><br>';
					}
					else{
						echo '<p>No</p><br><br>';
					}
				}
				else{
					echo '<label>NO HAY RETOS CREADOS AÚN CON ESE NOMBRE</label>';
				}

			?>
		</form>
	</body>
</html>