<?php
	$datos['id'] = $_GET['id'];
	$datos['nombre'] = $_GET['nombre'];
	while($datos['id']<=sizeof($datos['id'])){
			echo '<table>';
				echo '<tr>';
					echo '<td>'.$datos['id'].'</td>';
					echo '<td>'.$datos['nombre'].'</td>';
					echo '<td><a href="../controlador/controladorCategorias.php?idBor='.$datos['id'].'">'."BORRAR".'</a></td>';
					echo '<td><a href="../controlador/controladorCategorias.php?idMod='.$datos['id'].'">'."MODIFICAR".'</a></td>';
				echo '</tr>';
			echo '</table>';
	}
	echo '<a href="altaCategorias.php">Añadir Categoría</a>';
?>



