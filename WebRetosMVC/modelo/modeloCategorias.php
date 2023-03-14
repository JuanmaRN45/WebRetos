<?php
    require_once('../controlador/controladorCategorias.php');
    require_once('../config/config.php');
    /**
     * Clase para la gestión de objetos de tipo Categorias
     */
    class Categorias{
        private $conexion;
        private $usuario;
        private $contrasenia;
        private $servidor;
        private $bd;
        private $codi;
        /**
         * Constructor para el instanciamiento de objetos de tipo Categorias
         */
        function __construct(){
            $this->servidor = constant('SERVIDOR');
            $this->usuario = constant('USUARIO');
            $this->contrasenia = constant('CONTRASENIA');
            $this->bd = constant('BD');
            $this->codi = constant('CODIFICACION');
        }

        public function insertarCategoria($datos){
            $this->conectar();
            $sql = $this->conexion->prepare('INSERT INTO CATEGORIAS(nombre) VALUE(?)');
			$sql->bind_param('s', $datos['nombre']);
            $sql->execute();
        }
        public function eliminarCategoria($datos){
            $this->conectar();
			$sql2 = 'DELETE FROM CATEGORIAS WHERE id='.$datos['id'].';';
			$resultado2 = $this->conexion->query($sql2);
        }

        public function consultaCategoria(){
			$this->conectar();
			$consulta = 'SELECT id,nombre
			FROM CATEGORIAS;';
			$resultado2=$this->conexion->query($consulta);
            $i = 0;
			while($fila=$resultado2 -> fetch_assoc()){
                $datos['id'][$i] = $fila['id'];
				$datos['nombre'][$i] = $fila['nombre'];
                $i=$i+1;
			}
            return $datos;
		}

        public function sacarCategoria($datos){
			$this->conectar();
			$consulta = 'SELECT id,nombre
			FROM CATEGORIAS
            WHERE id='.$datos.';';
            $array = [];
			$resultado2=$this->conexion->query($consulta);
			while($fila=$resultado2 -> fetch_assoc()){
                $array['id']= $fila['id'];
				$array['nombre'] = $fila['nombre'];
			}
            return $array;
		}

		public function modificarCategoria($datos){
			$this->conectar();
			$sql2 = 'UPDATE CATEGORIAS SET nombre="'.$datos['nombreMod'].'" WHERE id='.$datos['id'].';';
			$resultado3=$this->conexion->query($sql2);
		}

        private function conectar(){
            $this->conexion = new mysqli($this->servidor,  $this->usuario,  $this->contrasenia, $this->bd);
            $this->conexion->set_charset($this->codi);
        }
    }
?>