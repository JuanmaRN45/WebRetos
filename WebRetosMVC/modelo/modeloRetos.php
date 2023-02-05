<?php
    require_once('../controlador/controladorRetos.php');
    /**
     * Clase para la gestión de objetos de tipo Categorias
     */
    class Retos{
        /**
         * Constructor para el instanciamiento de objetos de tipo Categorias
         */
        function __construct(){
        }
        public function anadirReto($array){
            require_once('../config/config.php');
            $conexion = new mysqli($servidor, $usuario, $contrasena, $bbdd);
            $sql = $conexion->prepare('INSERT INTO RETOS(nombre,dirigido,descripcion,fechaInicioInscripcion,fechaFinInscripcion,fechaInicioReto,fechaFinReto,fechaPublicacion,idProfesor,idCategoria) VALUE(?,?,?,?,?,?,?,?,?,?)');
			$sql->bind_param('ssssssssii', $array[0],$array[1],$array[2],$array[3],$array[4],$array[5],$array[6],$array[7],$array[9],$array[8]);
            $sql->execute();
        }

        public function listarReto(){
            require_once('../config/config.php');
            $conexion = new mysqli($servidor, $usuario, $contrasena, $bbdd);
            $sql = 'SELECT *
			FROM RETOS;';
            $resultado = $conexion->query($sql);
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
    }
?>