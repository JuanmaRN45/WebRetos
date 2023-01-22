<?php
    require_once('../controlador/controlador.php');
    /**
     * Clase para la gestión de objetos de tipo Categorias
     */
    class Categorias{
        /**
         * Constructor para el instanciamiento de objetos de tipo Categorias
         */
        function __construct(){
        }

        public function insertarCategoria($nombre){
            $servidor = "2daw.esvirgua.com";
            $bbdd = "user2daw_BD1-14";
            $usuario = "user2daw_14";
            $contrasena = "RuolZQ4M{}Nx";
            $conexion = new mysqli($servidor, $usuario, $contrasena, $bbdd);
            $sql = "INSERT INTO CATEGORIAS(nombre)
            VALUE('$nombre');";
            $resultado = $conexion->query($sql);
            header('Location:../index.php');
        }
        public function eliminarCategoria($id){
            $servidor = "2daw.esvirgua.com";
			$bbdd = "user2daw_BD1-14";
			$usuario = "user2daw_14";
			$contrasena = "RuolZQ4M{}Nx";
			$conectar = new mysqli($servidor, $usuario, $contrasena, $bbdd);
			$sql2 = 'DELETE FROM CATEGORIAS WHERE id='.$id.';';
			$resultado2 = $conectar->query($sql2);
			header('Location: ../index.php');
        }

        public function modificarCategoria($id){
			$servidor = "2daw.esvirgua.com";
			$bbdd = "user2daw_BD1-14";
			$usuario = "user2daw_14";
			$contrasena = "RuolZQ4M{}Nx";
			$conectar = new mysqli($servidor, $usuario, $contrasena, $bbdd);
			$idCategoria = $id;
			$consulta = 'SELECT nombre
			FROM CATEGORIAS
			WHERE id='.$idCategoria.';';
			$resultado2=$conectar->query($consulta);
			while($fila=$resultado2 -> fetch_assoc()){
				$nombre2 = $fila['nombre'];
			}
			$resultado2=$conectar->query($consulta);
			header('Location: ../modificar.php?id='.$idCategoria.'&nombre='.$nombre2.'');	
		}

		public function updateCategoria($id,$nombre){
				$idCategoria = $id;
				$modNom = $nombre;
				$servidor = "2daw.esvirgua.com";
				$bbdd = "user2daw_BD1-14";
				$usuario = "user2daw_14";
				$contrasena = "RuolZQ4M{}Nx";
				$conectar = new mysqli($servidor, $usuario, $contrasena, $bbdd);
				
				$sql2 = 'UPDATE CATEGORIAS SET nombre="'.$modNom.'" WHERE id='.$idCategoria.';';
				$resultado3=$conectar->query($sql2);
				$conectar->close();
				header('Location: ../index.php');
		}
    }
?>