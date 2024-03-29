<?php
    require_once('controladorCategorias.php');
    require_once('controladorRetos.php');
    require_once('../modelo/modeloSesion.php');
    require_once('../modelo/modeloImportarExcel');

    class ControladorGeneral{
        /**
         * Constructor para el instanciamiento de objetos de tipo ControladorGeneral
         */
        function __construct(){
            $this->modeloSesion=new Inicio();
            $this->modeloExcel=new ImportarExcel();
            $this->controladorCategorias=new ControladorCategorias();
            $this->controladorRetos=new ControladorRetos();
            if(isset ($_POST["btnCategorias"])){
                header('Location:../vistas/consultaCategorias.php');
                
            }
            if(isset ($_POST["btnRetos"])){
                header('Location:../vistas/listarRetos.php');
            }
        }

        public function inicioSesion($datos){
            $this->modeloSesion->iniciarSesion($datos);
            header('Location: ../index.php');
        }
        public function cerrarSesion(){
            $this->modeloSesion->cerrarSesion();
            header('Location: ../vistas/inicio_sesion.php');
        }
        public function importarExcel($array){
            $this->modeloExcel->importarExcel($array);
        }
     }

    $controlador = new ControladorGeneral();

?>