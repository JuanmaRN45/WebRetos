<?php
    require_once('../controlador/controladorRetos.php');
    require_once('../config/config.php');
    require_once('../modelo/modeloSesion.php');
    /**
     * Clase para la gestión de objetos de tipo Inicio
     */
    class Inicio{
        private $conexion;
        private $usuario;
        private $contrasenia;
        private $servidor;
        private $bd;
        private $codi;
        /**
         * Constructor para el instanciamiento de objetos de tipo Categorias
         */
        function __construct(){
            $this->servidor = constant('SERVIDOR');
            $this->usuario = constant('USUARIO');
            $this->contrasenia = constant('CONTRASENIA');
            $this->bd = constant('BD');
            $this->codi = constant('CODIFICACION');
        }

        public function iniciarSesion($datos){
           // Hacer conexión
           $this->conectar();

           // Preparar consulta preparada para obtener los datos del administrador de la BBDD
           $consulta = $this->conexion->prepare("SELECT * FROM PROFESORES WHERE correo=? AND contrasena=?");
           $consulta->bind_param('ss', $datos['correo'],$datos['contrasena']);
           $consulta->execute();
           $resultado = $consulta->get_result();

           $consulta->close();
           $this->conexion->close();

           
           if($resultado->num_rows == 1) 
           {
               $fila = $resultado->fetch_assoc();
               $correo = $fila['correo'];
               $contrasena = $fila['contrasena'];
               $id=$fila['id'];
               
               
               if($datos['contrasena'] === $contrasena && $datos['correo'] === $correo) 
               {
                   ini_set('session.use_strict_mode', true);   
                   ini_set('session.use_only_cookies', 1);     
                   session_set_cookie_params(0);             
                   session_start();                            
                   
                   $_SESSION['nombre'] = $correo;
                   $_SESSION['contrasena'] = $contrasena;
                   $_SESSION['id'] = $id;
               }
           } 
        }

        public function comprobarAdmin()
        {
            
            
        }

        private function conectar(){
            $this->conexion = new mysqli($this->servidor,  $this->usuario,  $this->contrasenia, $this->bd);
            $this->conexion->set_charset($this->codi);
        }
    }
?>