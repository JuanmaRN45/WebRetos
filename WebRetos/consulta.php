<?php
	$servidor = "2daw.esvirgua.com";
	$bbdd = "user2daw_BD1-14";
	$usuario = "user2daw_14";
	$contrasena = "RuolZQ4M{}Nx";
	$conectar = mysqli_connect($servidor, $usuario, $contrasena, $bbdd);
	$sql2 = 'SELECT id, nombre
	FROM CATEGORIAS
	ORDER BY id';
	
	$resultado2=mysqli_query($conectar,$sql2);
	echo '<h1>LISTADO</h1>';
	while($fila=mysqli_fetch_array($resultado2)){
			echo '<table>';
				echo '<tr>';
					echo '<td>'.$fila['id'].'</td>';
					echo '<td>'.$fila['nombre'].'</td>';
					echo '<td><a href="procesos.php?id='.$fila['id'].'&borrar="borrar"">'."BORRAR".'</a></td>';
					echo '<td><a href="procesos.php?id='.$fila['id'].'&modificar="modificar"">'."MODIFICAR".'</a></td>';
				echo '</tr>';
			echo '</table>';
	}
	echo '<a href="altas.php">Añadir Categoría</a>'
?>



