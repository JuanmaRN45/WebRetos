<!-- Juan Manuel Rincón Navarro -->
<?php
	
	require_once('../controlador/controladorRetos.php');
	$controladorRetos = new ControladorRetos();
	$array = $controladorRetos->listarCat();
	$i=0;
?>
<html>
	<head>
		<title>Formulario Alta Retos</title>
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
		</nav>
		<?php
			if(isset($_POST['enviar'])){
				$anadir = $controladorRetos->anadirReto($_POST);
				switch($anadir)
				{
					case 1:
						echo '<p>Fallo al insertar</p>';
						break;
		
					case 2:
						echo '<center><p>Se han insertado datos vacíos, se deben rellenar todos los datos, excepto la descripción que es opcional</p><center>';
						break;
		
				}
			}
		?>
		<form action="" method="post">
			<h2>Añadir Retos</h2>
			<label>Nombre:</label>
			<input type="text" name="nombre" maxlength="100"/><br><br>
            <label>Dirigido:</label>
			<input type="text" name="dirigido" maxlength="100"/><br><br>
            <label>Descripción:</label>
			<textarea name="descripcion"></textarea><br><br>
            <label>Fecha Inicio Inscripción:</label>
			<input type="datetime-local" name="fiinscrip"/><br><br>
            <label>Fecha Fin Inscripción:</label>
			<input type="datetime-local" name="ffinscrip"/><br><br>
            <label>Fecha Inicio Reto:</label>
			<input type="datetime-local" name="fireto"/><br><br>
            <label>Fecha Fin Reto:</label>
			<input type="datetime-local" name="ffreto"/><br><br>
            <label>Fecha Publicación:</label>
			<input type="datetime-local" name="fpubli"/><br><br>
            <label>Categoría:</label>
			<select name="categoria">
				<?php
					while($i<sizeof($array[0])){
						echo '<option value="'.$array[0][$i].'">'.$array[1][$i].'</option>';
						$i=$i+1;
					}
				?>
            </select><br><br>
			<label>Publicar:</label><br><br>
			<input type="radio" value="1" name="publicar"/>Si<br><br>
			<input type="radio" value="0" name="publicar"/>No<br><br>
			<input type="submit" name="enviar"/>
		</form>
	</body>
</html>
