<?php
    require_once('../modelo/modeloCategorias.php');
    class ControladorCategorias{
        /**
         * Constructor para el instanciamiento de objetos de tipo Controlador
         */
        function __construct(){
            $this->modelo=new Categorias();
            if(isset ($_GET["idBor"])){
                $datos['id'] = $_GET['idBor'];
                $this->eliminarCat($datos);
            }
            if(isset ($_POST['nombre'])){
                $datos['nombre'] = $_POST['nombre'];
                $this->anadirCat($datos);
            }
            if(isset ($_GET["idMod"])){
                $datos['id'] = $_GET['idMod'];
                $this->modCat($datos);
            }
            if(isset ($_POST['nombreMod'])){
                $datos['id'] = $_GET['id2'];
                $datos['nombre'] = $_POST['nombreMod'];
                $this->updateCat($datos);
            }
        }

        public function eliminarCat($datos){
            $this->modelo->eliminarCategoria($datos);
            header('Location:../vistas/consultaCategorias.php');
        }

        public function anadirCat($datos){
            $this->modelo->insertarCategoria($datos);
            header('Location:../vistas/consultaCategorias.php');
        }

        public function modCat($datos){
            $this->modelo->consultaCategoria($datos);
            header('Location:../vistas/modificarCategorias.php?id='.$datos['id'].'&nombre='.$datos['nombre'].'');	
        }

        public function updateCat($datos){
            $this->modelo->modificarCategoria($datos);
			header('Location:../vistas/consultaCategorias.php');
        }

        public function consultaCategorias(){
            $this->modelo->consultaCategoria();
            header('Location:../vistas/consultaCategorias.php?id='.$datos['id'].'&nombre='.$datos['nombre'].'');	
        }
     }

    $controlador = new ControladorCategorias();

?>