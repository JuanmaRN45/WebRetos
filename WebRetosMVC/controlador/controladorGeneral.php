<?php
    require_once('controladorCategorias.php');
    class ControladorGeneral{
        /**
         * Constructor para el instanciamiento de objetos de tipo ControladorGeneral
         */
        function __construct(){
            $this->controladorCategorias=new ControladorCategorias();
            if(isset ($_POST["btnCategorias"])){
                $this->controladorCategorias->consultaCategorias();
            }
        }
     }

    $controlador = new ControladorGeneral();

?>