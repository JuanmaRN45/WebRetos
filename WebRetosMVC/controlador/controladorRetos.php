<?php
    require_once('../modelo/modeloRetos.php');
    class ControladorRetos{
        /**
         * Constructor para el instanciamiento de objetos de tipo Controlador
         */
        function __construct(){
            $this->modelo=new Retos();
            if(isset ($_POST["dirigido"])){
                $array = array(
                    0 =>$_POST['nombre'],
                    $_POST['dirigido'],
                    $_POST['descripcion'],
                    $_POST['fiinscrip'],
                    $_POST['ffinscrip'],
                    $_POST['fireto'],
                    $_POST['ffreto'],
                    $_POST['fpubli'],
                    $_POST['categoria'],
                    1,
                );

                $this->anadirReto($array);
            }
            if(isset ($_POST["dirigidoMod"])){
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
                    1,
                );

                $this->actualizarReto($array);
            }

            if(isset ($_POST["retoDel"])){
                $array = array(
                    0 =>$_POST['retoDel'],
                );

                $this->eliminarReto($array);
            }
        }

        public function anadirReto($array){
            $this->modelo->anadirReto($array);
            header('Location:../vistas/listarRetos.php');
        }

        public function listarReto(){
            return $this->modelo->listarReto();
        }

        public function modReto($array){
            return $this->modelo->sacarReto($array);
        }

        public function actualizarReto($array){
            $this->modelo->actualizarReto($array);
            header('Location:../vistas/listarRetos.php');
        }

        public function eliminarReto($array){
            $this->modelo->eliminarReto($array);
            header('Location:../vistas/listarRetos.php');
        }
    }

    $controlador = new ControladorRetos();
?>