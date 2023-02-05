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
        }

        public function anadirReto($array){
            $this->modelo->anadirReto($array);
        }

        public function listarReto(){
            return $this->modelo->listarReto();
            header('Location:../vistas/listarRetos.php');
        }
    }

    $controlador = new ControladorRetos();

?>