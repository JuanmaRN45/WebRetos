<?php
    require_once('../modelo/modeloCategorias.php');
    class ControladorCategorias{
        /**
         * Constructor para el instanciamiento de objetos de tipo Controlador
         */
        function __construct(){
            $this->modelo=new Categorias();
        }

        public function eliminarCat($datos){
            $this->modelo->eliminarCategoria($datos);
            header('Location:../vistas/consultaCategorias.php');
        }

        public function anadirCat($datos){
            $this->modelo->insertarCategoria($datos);
            header('Location:../vistas/consultaCategorias.php');
        }

        public function irModificar($datos){
            header('Location:../vistas/modificarCategorias.php?id='.$datos['id'].'');
        } 

        public function modCat($datos){
            return $this->modelo->sacarCategoria($datos);
        }

        public function updateCat($datos){
            $this->modelo->modificarCategoria($datos);
			header('Location:../vistas/consultaCategorias.php');
        }

        public function consultaCategorias(){
            return $this->modelo->consultaCategoria();
        }
     }

    $controlador = new ControladorCategorias();

?>