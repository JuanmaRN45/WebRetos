<?php
	class Borrar{
		function __construct(){
			$id=$_GET['id'];
			$this->eliminarCategoria($id);
		}
		public function eliminarCategoria($id){
			$servidor = "2daw.esvirgua.com";
			$bbdd = "user2daw_BD1-14";
			$usuario = "user2daw_14";
			$contrasena = "RuolZQ4M{}Nx";
			$conectar = new mysqli($servidor, $usuario, $contrasena, $bbdd);
			$sql2 = 'DELETE FROM CATEGORIAS WHERE id='.$id.';';
			$resultado2 = $conectar->query($sql2);
			header('Location:index.php');
		}
	}

	$borrar=new Borrar();
?>