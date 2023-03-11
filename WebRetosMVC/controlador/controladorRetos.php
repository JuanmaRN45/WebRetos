<?php
    require_once('../modelo/modeloRetos.php');
    class ControladorRetos{
        /**
         * Constructor para el instanciamiento de objetos de tipo Controlador
         */
        function __construct(){
            $this->modelo=new Retos();
        }

        public function anadirReto($datos,$archivo){
            try {
                if(!empty($datos['nombre']) && !empty($datos['dirigido']) && !empty($datos['fiinscrip']) && !empty($datos['ffinscrip']) && !empty($datos['fireto']) && !empty($datos['fpubli']) && !empty($datos['categoria']) && !empty($datos['publicar']) && !empty($archivo)){
                    $array = array(
                        0 =>$datos['nombre'],
                        $datos['dirigido'],
                        $datos['descripcion'],
                        $datos['fiinscrip'],
                        $datos['ffinscrip'],
                        $datos['fireto'],
                        $datos['ffreto'],
                        $datos['fpubli'],
                        $datos['categoria'],
                        $_SESSION['id'],
                        $datos['publicar'],
                        $archivo['archivo']
                    );
                    $this->modelo->anadirReto($array);
                    header('Location:../vistas/listarRetos.php');
                }
                else{
                    return 2;
                }     
            }
            catch(mysqli_sql_exception $e) 
            {
                return 1;
            }
        }

        public function listarReto(){
            return $this->modelo->listarReto();
        }

        public function modReto($array){
            return $this->modelo->sacarReto($array);
        }

        public function actualizarReto($datos,$archivo){
            $array = array(
                0 =>$_POST['id'],
                $_POST['nombre'],
                $_POST['dirigidoMod'],
                $_POST['descripcion'],
                $_POST['fiinscrip'],
                $_POST['ffinscrip'],
                $_POST['fireto'],
                $_POST['ffreto'],
                $_POST['fpubli'],
                $_POST['categoria'],
                $_SESSION['id'],
                $_POST['publicar'],
                $archivo['archivo']

            );
            $this->modelo->actualizarReto($array);
            header('Location:../vistas/listarRetos.php');
        }

        public function eliminarReto($datos){
            $array = array(
                0 =>$_POST['retoDel'],
            );
            $this->modelo->eliminarReto($array);
            header('Location:../vistas/listarRetos.php');
        }
        
        public function filtrarReto($array){
           return $this->modelo->filtrarReto($array); 
        }

        public function listarCat(){
           return $this->modelo->listarCat();
        }

        public function sacarPDF(){
            $this->modelo->sacarpdf();
        }
    }

    $controlador = new ControladorRetos();
?>