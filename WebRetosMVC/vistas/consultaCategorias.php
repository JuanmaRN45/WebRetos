<?php

	class Consulta{
		function __construct(){
			$this->consultarCategorias();
		}
		public function consultarCategorias(){
			require_once('../config/config.php');
			$conectar = new mysqli($servidor, $usuario, $contrasena, $bbdd);
			$sql2 = 'SELECT id, nombre
			FROM CATEGORIAS
			ORDER BY id';
			
			$resultado2 = $conectar->query($sql2);
			echo '<h1>LISTADO</h1>';
			while($fila = $resultado2 ->fetch_array()){
					echo '<table>';
						echo '<tr>';
							echo '<td>'.$fila['id'].'</td>';
							echo '<td>'.$fila['nombre'].'</td>';
							echo '<td><a href="../controlador/controladorCategorias.php?idBor='.$fila['id'].'">'."BORRAR".'</a></td>';
							echo '<td><a href="../controlador/controladorCategorias.php?idMod='.$fila['id'].'">'."MODIFICAR".'</a></td>';
						echo '</tr>';
					echo '</table>';
			}
			echo '<a href="altaCategorias.php">Añadir Categoría</a>';
		}
	}

	$consultar=new Consulta();
?>



