<!-- Juan Manuel Rincón Navarro -->
<?php
	require_once('../controlador/controladorGeneral.php');
	$controladorGeneral = new ControladorGeneral();
	if(isset($_POST['enviarArchivo'])){
		$controladorGeneral->importarExcel($_FILES);
		echo '<p>insertado</p>';
	}
?>
<html>
	<head>
		<title>Formulario Importar Profesores</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			<label></label><br><br>
			<input type="file" name="archivoImportado" accept=".xls,.xlsx" require><br><br>
			<input type="submit" name="enviarArchivo"/>
		</form>
	</body>
</html>
