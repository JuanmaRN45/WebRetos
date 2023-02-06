<?php
    require_once('../controlador/controladorRetos.php');
    require_once('../config/config.php');
    /**
     * Clase para la gestión de objetos de tipo Categorias
     */
    class Retos{
        private $conexion;
        private $usuario;
        private $contrasenia;
        private $servidor;
        private $bd;
        /**
         * Constructor para el instanciamiento de objetos de tipo Categorias
         */
        function __construct(){
            $this->servidor = constant('SERVIDOR');
            $this->usuario = constant('USUARIO');
            $this->contrasenia = constant('CONTRASENIA');
            $this->bd = constant('BD');
        }

        public function anadirReto($array){
            $this->conectar();
            $sql = $this->conexion->prepare('INSERT INTO RETOS(nombre,dirigido,descripcion,fechaInicioInscripcion,fechaFinInscripcion,fechaInicioReto,fechaFinReto,fechaPublicacion,idProfesor,idCategoria) VALUE(?,?,?,?,?,?,?,?,?,?)');
			$sql->bind_param('ssssssssii', $array[0],$array[1],$array[2],$array[3],$array[4],$array[5],$array[6],$array[7],$array[9],$array[8]);
            $sql->execute();
        }

        public function listarReto(){
            $this->conectar();
            $sql = 'SELECT *
			FROM RETOS;';
            $resultado = $this->conexion->query($sql);
            $i = 0;
            $array = [];
			while($fila=$resultado -> fetch_assoc()){
                $array[0][$i]= $fila['id'];
                $array[1][$i]= $fila['nombre'];
                $array[2][$i]= $fila['dirigido'];
                $array[3][$i]= $fila['descripcion'];
                $array[4][$i]= $fila['fechaInicioInscripcion'];
                $array[5][$i]= $fila['fechaFinInscripcion'];
                $array[6][$i]= $fila['fechaInicioReto'];
                $array[7][$i]= $fila['fechaFinReto'];
                $array[8][$i]= $fila['fechaPublicacion'];
                $array[9][$i]= $fila['publicado'];
                $array[10][$i]= $fila['idProfesor'];
                $array[11][$i]= $fila['idCategoria'];
                $i=$i+1;
			}
            return $array;
        }

        public function sacarReto($array){
            $this->conectar();
            $sql = 'SELECT *
			FROM RETOS
            WHERE id='.$array[0].';';
            $resultado = $this->conexion->query($sql);
            $datos = [];
			while($fila=$resultado -> fetch_assoc()){
                $datos[0]= $fila['id'];
                $datos[1]= $fila['nombre'];
                $datos[2]= $fila['dirigido'];
                $datos[3]= $fila['descripcion'];
                $datos[4]= $fila['fechaInicioInscripcion'];
                $datos[5]= $fila['fechaFinInscripcion'];
                $datos[6]= $fila['fechaInicioReto'];
                $datos[7]= $fila['fechaFinReto'];
                $datos[8]= $fila['fechaPublicacion'];
                $datos[9]= $fila['publicado'];
                $datos[10]= $fila['idProfesor'];
                $datos[11]= $fila['idCategoria'];
			}
            return $datos;
        }

        public function actualizarReto($array){
            $this->conectar();
            $sql = ('UPDATE RETOS SET nombre="'.$array[1].'",dirigido="'.$array[2].'",descripcion="'.$array[3].'",fechaInicioInscripcion="'.$array[4].'",fechaFinInscripcion="'.$array[5].'",fechaInicioReto="'.$array[6].'",fechaFinReto="'.$array[7].'",fechaPublicacion="'.$array[8].'",idProfesor="'.$array[10].'",idCategoria="'.$array[9].'" WHERE id="'.$array[0].'"');
            $resultado=$this->conexion->query($sql);
        }

        public function eliminarReto($array){
            $this->conectar();
            $sql = 'DELETE FROM RETOS WHERE id='.$array[0].';';
            $resultado=$this->conexion->query($sql); 
        }

        public function listarCat(){

            $this->conectar();
            $sql = 'SELECT id,nombre
			FROM CATEGORIAS;';
            $resultado=$this->conexion->query($sql);
            $categorias = [];
            $i=0;
            while($fila=$resultado -> fetch_assoc()){
                $categorias[0][$i]= $fila['id'];
                $categorias[1][$i]= $fila['nombre'];
                $i=$i+1;
            }
            return $categorias;
        }

        private function conectar(){
            $this->conexion = new mysqli($this->servidor,  $this->usuario,  $this->contrasenia, $this->bd);
        }
    }
?>