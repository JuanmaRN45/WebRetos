<?php
    require_once('controladorCategorias.php');
    require_once('controladorRetos.php');
    class ControladorGeneral{
        /**
         * Constructor para el instanciamiento de objetos de tipo ControladorGeneral
         */
        function __construct(){
            $this->controladorCategorias=new ControladorCategorias();
            $this->controladorRetos=new ControladorRetos();
            if(isset ($_POST["btnCategorias"])){
                $this->controladorCategorias->consultaCategorias();
                
            }
            if(isset ($_POST["btnRetos"])){
                header('Location:../vistas/listarRetos.php');
            }
        }
     }

    $controlador = new ControladorGeneral();

?>