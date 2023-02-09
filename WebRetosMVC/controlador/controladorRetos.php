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
                    $_POST['publicar'],
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
                    $_POST['publicar'],
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
            try {
                $this->modelo->anadirReto($array);
                header('Location:../vistas/listarRetos.php');
            }
            catch(mysqli_sql_exception $e) 
            {
                echo '<p>' . $e->getMessage() . '</p>';
                echo '<p><a href="../vistas/altaRetos.php">Volver</a></p>';
            }
        }

        public function listarReto(){
            try {
               return $this->modelo->listarReto();
            }
            catch(mysqli_sql_exception $e) 
            {
                echo '<p>' . $e->getMessage() . '</p>';
                echo '<p><a href="../index.html">Volver</a></p>';
            }
            
        }

        public function modReto($array){
            try {
                return $this->modelo->sacarReto($array);
            }
            catch(mysqli_sql_exception $e) 
            {
                echo '<p>' . $e->getMessage() . '</p>';
                echo '<p><a href="../vistas/modificarRetos.php">Volver</a></p>';
            }
            
        }

        public function actualizarReto($array){
            try {
                $this->modelo->actualizarReto($array);
                header('Location:../vistas/listarRetos.php');
            }
            catch(mysqli_sql_exception $e) 
            {
                echo '<p>' . $e->getMessage() . '</p>';
                echo '<p><a href="../vistas/modificarRetosForm.php">Volver</a></p>';
            }
            
        }

        public function eliminarReto($array){
            try {
                $this->modelo->eliminarReto($array);
                header('Location:../vistas/listarRetos.php');
            }
            catch(mysqli_sql_exception $e) 
            {
                echo '<p>' . $e->getMessage() . '</p>';
                echo '<p><a href="../vistas/eliminarReto.php">Volver</a></p>';
            }
        }
        
        public function listarCat(){
            try {
                return $this->modelo->listarCat();
             }
            catch(mysqli_sql_exception $e) 
            {
                echo '<p>' . $e->getMessage() . '</p>';
                echo '<p><a href="../vistas/listarRetos.php">Volver</a></p>';
            }
        }
    }

    $controlador = new ControladorRetos();
?>