<?php

	class Modificar{
		function __construct(){
			$this->modificarCategoria();
		}
		public function modificarCategoria(){
			if(isset($_GET["id"])){
				$servidor = "2daw.esvirgua.com";
				$bbdd = "user2daw_BD1-14";
				$usuario = "user2daw_14";
				$contrasena = "RuolZQ4M{}Nx";
				$conectar = new mysqli($servidor, $usuario, $contrasena, $bbdd);
				$idCategoria = $_GET["id"];
				$consulta = 'SELECT nombre
				FROM CATEGORIAS
				WHERE id='.$idCategoria.';';
				$resultado2=$conectar->query($consulta);
				while($fila=$resultado2 -> fetch_assoc()){
					$nombre2 = $fila['nombre'];
				}
				$resultado2=$conectar->query($consulta);
				echo	'<form action="modificar.php?id='.$idCategoria.'" method="post">
					<h2 class="letraazul">Modificar Categorías</h2>
					<label>Nombre:</label>
					<input type="text" name="nombre" value="'.$nombre2.'" maxlength="30"/><br><br>
					<a href="index.php">Ver listado</a><br><br>
					<input type="submit" name="enviar"/>
					</form>';
			}
			else{
				header('Location:consulta.php');
			}
			if(isset($_POST['nombre'])){
				
				$idCategoria = $_GET["id"];
				$modNom = $_POST['nombre'];
				$servidor = "2daw.esvirgua.com";
				$bbdd = "user2daw_BD1-14";
				$usuario = "user2daw_14";
				$contrasena = "RuolZQ4M{}Nx";
				$conectar = new mysqli($servidor, $usuario, $contrasena, $bbdd);
				
				$sql2 = 'UPDATE CATEGORIAS SET nombre="'.$modNom.'" WHERE id='.$idCategoria.';';
				$resultado3=$conectar->query($sql2);
				$conectar->close();
				header('Location: consulta.php');
			}
		}
	}

	$modificar=new Modificar();
?>