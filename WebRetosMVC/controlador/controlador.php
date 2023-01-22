<?php
    require_once('../modelo/modelo.php');
    class Controlador{
        /**
         * Constructor para el instanciamiento de objetos de tipo Controlador
         */
        function __construct(){
            $this->modelo=new Categorias();

            if(isset ($_GET["id"])){
                $id = $_GET['id'];
                $this->modelo->eliminarCategoria($id);
            }
            if(isset ($_POST['nombre'])){
                $nombre = $_POST['nombre'];
                $this->modelo->insertarCategoria($nombre);
            }
            if(isset ($_GET["idMod"])){
                $id = $_GET['idMod'];
                $this->modelo->modificarCategoria($id);
            }
            if(isset ($_POST['nombreMod'])){
                $id = $_GET['id2'];
                $nombre = $_POST['nombreMod'];
                $this->modelo->updateCategoria($id,$nombre);
            }
        }
     }

    $controlador = new Controlador();

?>