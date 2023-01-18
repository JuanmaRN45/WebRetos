<?php

	class Consulta{
		function __construct(){
			$this->consultarCategorias();
		}
		public function consultarCategorias(){
			$servidor = "2daw.esvirgua.com";
			$bbdd = "user2daw_BD1-14";
			$usuario = "user2daw_14";
			$contrasena = "RuolZQ4M{}Nx";
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
							echo '<td><a href="procesos.php?id='.$fila['id'].'&borrar="borrar"">'."BORRAR".'</a></td>';
							echo '<td><a href="procesos.php?id='.$fila['id'].'&modificar="modificar"">'."MODIFICAR".'</a></td>';
						echo '</tr>';
					echo '</table>';
			}
			echo '<a href="altas.php">Añadir Categoría</a>';
		}
	}

	$consultar=new Consulta();
?>



