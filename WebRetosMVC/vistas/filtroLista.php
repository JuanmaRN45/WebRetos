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
            <?php echo '<h2>Filtrado Reto '.$reto[1].'</h2>';?>
			<label>Id:</label>
			<?php echo '<label>'.$reto[0].'</label>';?><br><br>
			<label>Nombre:</label>
            <?php echo '<label>'.$reto[1].'</label>';?><br><br>
            <label>Dirigido:</label>
			<?php echo '<label>'.$reto[2].'</label>';?><br><br>
            <label>Descripción:</label>
			<?php echo '<label>'.$reto[3].'</label>';?><br><br>
            <label>Fecha Inicio Inscripción:</label>
			<?php echo '<label>'.$reto[4].'</label>';?><br><br>
            <label>Fecha Fin Inscripción:</label>
			<?php echo '<label>'.$reto[5].'</label>';?><br><br>
            <label>Fecha Inicio Reto:</label>
			<?php echo '<label>'.$reto[6].'</label>';?><br><br>
            <label>Fecha Fin Reto:</label>
			<?php echo '<label>'.$reto[7].'</label>';?><br><br>
            <label>Fecha Publicación:</label>
			<?php echo '<label>'.$reto[8].'</label>';?><br><br>
            <label>Profesor:</label>
			<?php echo '<label>'.$reto[10].'</label>';?><br><br>
            <label>Categoría:</label>
			<?php echo '<label>'.$reto[11].'</label>';?><br><br>
			<label>Publicado:</label>
			<?php 
				if($reto[9]==1){
					echo '<label>Si</label><br><br>';
				}
				else{
					echo '<label>No</label><br><br>';
				}
			?>
		</form>
	</body>
</html>