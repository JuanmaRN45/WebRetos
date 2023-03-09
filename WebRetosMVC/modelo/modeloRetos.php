<?php
    require_once('../controlador/controladorRetos.php');
    require_once('../config/config.php');
    require_once('../fpdf185/fpdf.php');
    /**
     * Clase para la gestión de objetos de tipo Categorias
     */
    class Retos{
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

        public function anadirReto($array){
            $this->conectar();
            if($array[2]==""){
                $array[2]=NULL;
            }
            $nom_archivo = $array[11]['name'];
            $ruta = "../archivos_subidos/".$nom_archivo;
            $archivo=$array[11]['tmp_name'];
            $subir=move_uploaded_file($archivo,$ruta);

            $sql = $this->conexion->prepare('INSERT INTO RETOS(nombre,dirigido,descripcion,fechaInicioInscripcion,fechaFinInscripcion,fechaInicioReto,fechaFinReto,fechaPublicacion,publicado,idProfesor,idCategoria,archivo) VALUE(?,?,?,?,?,?,?,?,?,?,?,?)');
            $sql->bind_param('ssssssssiiis', $array[0],$array[1],$array[2],$array[3],$array[4],$array[5],$array[6],$array[7],$array[10],$array[9],$array[8],$ruta);
            $sql->execute();
        }

        public function listarReto(){
            $this->conectar();
            $sql = 'SELECT *
			FROM RETOS
            WHERE idProfesor='.$_SESSION['id'].';';
            $resultado = $this->conexion->query($sql);
            $i = 0;
            $array = [];
			while($fila=$resultado -> fetch_assoc()){
                $array[0][$i]= $fila['id'];
                $array[1][$i]= $fila['nombre'];
                $array[2][$i]= $fila['dirigido'];
                $array[3][$i]= $fila['descripcion'];
                $array[4][$i]= $fila['fechaInicioInscripcion'];
                $array[5][$i]= $fila['fechaFinInscripcion'];
                $array[6][$i]= $fila['fechaInicioReto'];
                $array[7][$i]= $fila['fechaFinReto'];
                $array[8][$i]= $fila['fechaPublicacion'];
                $array[9][$i]= $fila['publicado'];
                $array[10][$i]= $fila['idProfesor'];
                $array[11][$i]= $fila['idCategoria'];
                $i=$i+1;
			}
            return $array;
        }

        public function sacarReto($array){
            $this->conectar();
            $sql = 'SELECT *
			FROM RETOS
            WHERE id='.$array[0].';';
            $resultado = $this->conexion->query($sql);
            $datos = [];
			while($fila=$resultado -> fetch_assoc()){
                $datos[0]= $fila['id'];
                $datos[1]= $fila['nombre'];
                $datos[2]= $fila['dirigido'];
                $datos[3]= $fila['descripcion'];
                $datos[4]= $fila['fechaInicioInscripcion'];
                $datos[5]= $fila['fechaFinInscripcion'];
                $datos[6]= $fila['fechaInicioReto'];
                $datos[7]= $fila['fechaFinReto'];
                $datos[8]= $fila['fechaPublicacion'];
                $datos[9]= $fila['publicado'];
                $datos[10]= $fila['idProfesor'];
                $datos[11]= $fila['idCategoria'];
                $datos[12]= $fila['archivo'];
			}
            return $datos;
        }

        public function filtrarReto($array){
            $this->conectar();
            $sql = 'SELECT *
			FROM RETOS
            WHERE nombre="'.$array[0].'";';
            $resultado = $this->conexion->query($sql);
            $datos = [];
			while($fila=$resultado -> fetch_assoc()){
                $datos[0]= $fila['id'];
                $datos[1]= $fila['nombre'];
                $datos[2]= $fila['dirigido'];
                $datos[3]= $fila['descripcion'];
                $datos[4]= $fila['fechaInicioInscripcion'];
                $datos[5]= $fila['fechaFinInscripcion'];
                $datos[6]= $fila['fechaInicioReto'];
                $datos[7]= $fila['fechaFinReto'];
                $datos[8]= $fila['fechaPublicacion'];
                $datos[9]= $fila['publicado'];
                $datos[10]= $fila['idProfesor'];
                $datos[11]= $fila['idCategoria'];
			}
            return $datos;
        }

        public function actualizarReto($array){
            $this->conectar();

            $consulta1 = 'SELECT archivo FROM RETOS';
            $resultado1 = $this->conexion->query($consulta1);
            while($fila = $resultado1->fetch_assoc()){
                $archivoAntiguo = $fila['archivo'];
            }

            $nom_archivo = $array[12]['name'];
            $ruta = "../archivos_subidos/".$nom_archivo;
            $archivo=$array[12]['tmp_name'];
            $subir=move_uploaded_file($archivo,$ruta);
            unlink(realpath($archivoAntiguo));
            
            if($array[3]==""){
                $sql = ('UPDATE RETOS SET nombre="'.$array[1].'",dirigido="'.$array[2].'",descripcion=NULL,fechaInicioInscripcion="'.$array[4].'",fechaFinInscripcion="'.$array[5].'",fechaInicioReto="'.$array[6].'",fechaFinReto="'.$array[7].'",fechaPublicacion="'.$array[8].'",publicado="'.$array[11].'",idProfesor="'.$array[10].'",idCategoria="'.$array[9].'",archivo="'.$ruta.'" WHERE id="'.$array[0].'"');
                $resultado=$this->conexion->query($sql);
            }
            else{
                $sql = ('UPDATE RETOS SET nombre="'.$array[1].'",dirigido="'.$array[2].'",descripcion="'.$array[3].'",fechaInicioInscripcion="'.$array[4].'",fechaFinInscripcion="'.$array[5].'",fechaInicioReto="'.$array[6].'",fechaFinReto="'.$array[7].'",fechaPublicacion="'.$array[8].'",publicado="'.$array[11].'",idProfesor="'.$array[10].'",idCategoria="'.$array[9].'",archivo="'.$ruta.'" WHERE id="'.$array[0].'"');
                $resultado=$this->conexion->query($sql);
            }
            
        }

        public function eliminarReto($array){
            $this->conectar();
            $sql = 'DELETE FROM RETOS WHERE id='.$array[0].';';
            $resultado=$this->conexion->query($sql); 
        }

        public function listarCat(){

            $this->conectar();
            $sql = 'SELECT id,nombre
			FROM CATEGORIAS;';
            $resultado=$this->conexion->query($sql);
            $categorias = [];
            $i=0;
            while($fila=$resultado -> fetch_assoc()){
                $categorias[0][$i]= $fila['id'];
                $categorias[1][$i]= $fila['nombre'];
                $i=$i+1;
            }
            return $categorias;
        }

        public function sacarpdf(){
            $retos = $this->listarReto();
            // Creación del objeto de la clase heredada
            $pdf = new FPDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            // Arial bold 15
            $pdf->SetFont('Arial','B',15);
            // Movernos a la derecha
            $pdf->Cell(70);
            // Título
            $pdf->Cell(50,10,'Listado de Retos',1,0,'C');
            // Salto de línea
            $pdf->Ln(20);
            $pdf->SetFont('Times','',12);
            for($x=0;$x<=6;$x++){
                for($i=0;$i<=11;$i++){
                    $pdf->Cell(0,10,$retos[$i][$x],0,1);
                }
            }

            $pdf->Output();
        }

        private function conectar(){
            $this->conexion = new mysqli($this->servidor,  $this->usuario,  $this->contrasenia, $this->bd);
            $this->conexion->set_charset($this->codi);
        }
    }
?>