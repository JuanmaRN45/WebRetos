<html>
	<head>
		<title>Formulario Alta Retos</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	</head>
	<body>
		<?php
            require_once('../controlador/controladorGeneral.php');
            $controladorGeneral = new ControladorGeneral();
			if(isset($_POST['enviar'])){
				$inicio = $controladorGeneral->inicioSesion($_POST);
				switch($inicio)
				{
					case 1:
						echo '<p>Fallo al iniciar Sesión</p>';
						break;
                    case 2:	
                        echo '<p>Has dejado datos vacíos</p>';
						break;	
				}
			}
		?>
		<form action="" method="post">
			<h2>Inicio de Sesión</h2>
			<label>Correo:</label>
			<input type="text" name="correo"/><br><br>
            <label>Contraseña:</label>
			<input type="text" name="contrasena"/><br><br>
			<input type="submit" name="enviar"/>
		</form>
	</body>
</html>
