<!-- Juan Manuel Rincón Navarro -->
<html>
	<head>
		<title>Formulario Categorias</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
	</head>
	<body>
		<form action="../vistas/modificarRetosForm.php" method="post">
			<select name="retoMod">
				<?php
					require_once('../controlador/controladorRetos.php');
					$controladorRetos = new ControladorRetos();
					$array = $controladorRetos->listarReto();
					$i=0;
					while($i<sizeof($array[0])){
						echo '<option value="'.$array[0][$i].'">'.$array[1][$i].'</option>';
						$i=$i+1;
					}
				?>
			</select>
			<input type="submit" value="Enviar" name="btnModificar"/>
		</form>
    </body>
</html>