<?php
    require_once('../controlador/controladorCategorias.php');
    /**
     * Clase para la gestión de objetos de tipo Categorias
     */
    class Categorias{
        /**
         * Constructor para el instanciamiento de objetos de tipo Categorias
         */
        function __construct(){
        }

        public function insertarCategoria($datos){
            require_once('../config/config.php');
            $conexion = new mysqli($servidor, $usuario, $contrasena, $bbdd);
            $sql = $conexion->prepare('INSERT INTO CATEGORIAS(nombre) VALUE(?)');
			$sql->bind_param('s', $datos['nombre']);
            $sql->execute();
        }
        public function eliminarCategoria($datos){
            require_once('../config/config.php');
			$conectar = new mysqli($servidor, $usuario, $contrasena, $bbdd);
			$sql2 = 'DELETE FROM CATEGORIAS WHERE id='.$datos['id'].';';
			$resultado2 = $conectar->query($sql2);
        }

        public function consultaCategoria($datos){
			require_once('../config/config.php');
			$conectar = new mysqli($servidor, $usuario, $contrasena, $bbdd);
			$consulta = 'SELECT nombre
			FROM CATEGORIAS
			WHERE id='.$datos['id'].';';
			$resultado2=$conectar->query($consulta);
			while($fila=$resultado2 -> fetch_assoc()){
				$datos['nombre'] = $fila['nombre'];
			}
			$resultado2=$conectar->query($consulta);
		}

		public function modificarCategoria($datos){
			require_once('../config/config.php');
			$conectar = new mysqli($servidor, $usuario, $contrasena, $bbdd);
			$sql2 = 'UPDATE CATEGORIAS SET nombre="'.$datos['id'].'" WHERE id='.$datos['nombre'].';';
			$resultado3=$conectar->query($sql2);
		}
    }
?>