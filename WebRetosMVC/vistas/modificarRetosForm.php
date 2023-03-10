<!-- Juan Manuel Rincón Navarro -->
<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header('Location: ./vistas/inicio_sesion.php');
	}
	
    if(isset($_POST['cerrarsesion'])){
        require_once('../controlador/controladorGeneral.php');
        $controladorGeneral =new ControladorGeneral();
        $controladorGeneral->cerrarSesion();
    }
	if(isset($_POST['enviarActu'])){
		require_once('../controlador/controladorRetos.php');
    	$controladorRetos = new ControladorRetos();
		print_r($_POST);
		$actualizar = $controladorRetos->actualizarReto($_POST,$_FILES);
	}
    $array = array(
        0 =>$_POST['retoMod']
    );
	
    require_once('../controlador/controladorRetos.php');
    $controladorRetos = new ControladorRetos();
    $reto = $controladorRetos->modReto($array);
	$categorias = $controladorRetos->listarCat();
	$i=0;
?>

<html>
	<head>
		<title>Formulario Modificar Reto</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	</head>
	<body>
		<nav>
			<a href="../vistas/altaRetos.php"><button>ALTA RETOS</button></a>
			<a href="../vistas/listarRetos.php"><button>LISTAR RETOS</button></a>
			<a href="../vistas/eliminarReto.php"><button>ELIMINAR RETOS</button></a>
			<a href="../vistas/modificarRetos.php"><button>MODIFICAR RETOS</button></a>
			<form action="" method="post" id="cerrarsesion"><input type="submit" value="Cerrar Sesión" name="cerrarsesion"></form>
		</nav>
		<form action="" method="post" enctype="multipart/form-data">
            <h2>Modificación de Reto</h2>
			<label>Id:</label>
			<?php echo '<input type="text" name="id" value="'.$reto[0].'" readonly/>';?><br><br>
			<label>Nombre:</label>
			<?php echo '<input type="text" name="nombre" value="'.$reto[1].'" maxlength="100"/>';?><br><br>
            <label>Dirigido:</label>
			<?php echo'<input type="text" name="dirigidoMod"value="'.$reto[2].'" maxlength="100"/>';?><br><br>
            <label>Descripción:</label>
			<?php echo'<textarea name="descripcion">'.$reto[3].'</textarea>';?><br><br>
            <label>Fecha Inicio Inscripción:</label>
			<?php echo'<input type="datetime-local" value="'.$reto[4].'"name="fiinscrip"/>';?><br><br>
            <label>Fecha Fin Inscripción:</label>
			<?php echo'<input type="datetime-local" value="'.$reto[5].'" name="ffinscrip"/>';?><br><br>
            <label>Fecha Inicio Reto:</label>
			<?php echo'<input type="datetime-local"value="'.$reto[6].'" name="fireto"/>';?><br><br>
            <label>Fecha Fin Reto:</label>
			<?php echo'<input type="datetime-local"value="'.$reto[7].'" name="ffreto"/>';?><br><br>
            <label>Fecha Publicación:</label>
			<?php echo'<input type="datetime-local"value="'.$reto[8].'" name="fpubli"/>';?><br><br>
            <label>Categoría:</label>
			<select name="categoria">
				<?php 
					while($i<sizeof($categorias[0])){
						echo '<option value="'.$categorias[0][$i].'">'.$categorias[1][$i].'</option>';
						$i=$i+1;
					}
				?>
            </select><br><br>
			<label>Archivo:</label><br><br>
			<input type="file" name="archivo" accept=".doc,.docx"><br><br>
			<label>Publicar:</label><br><br>
			<?php 
				if($reto[9]==1){
					echo'<input type="radio" value="1" name="publicar" checked/>Si';
					echo'<input type="radio" value="0" name="publicar"/>No<br><br>';
				}
				else{
					echo'<input type="radio" value="1" name="publicar"/>Si';
					echo'<input type="radio" value="0" name="publicar" checked/>No<br><br>';
				}
			?>
			<input type="submit" name="enviarActu"/>
		</form>
    </body>
</html>