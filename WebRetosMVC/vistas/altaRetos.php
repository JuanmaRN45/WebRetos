<!-- Juan Manuel Rincón Navarro -->
<html>
	<head>
		<title>Formulario Categorias</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
	</head>
	<body>
		<form action="../controlador/controladorRetos.php"method="post">
			<h2 class="letraazul">Añadir Retos</h2>
			<label>Nombre:</label>
			<input type="text" name="nombre" maxlength="100"/><br><br>
            <label>Dirigido:</label>
			<input type="text" name="dirigido" maxlength="100"/><br><br>
            <label>Descripción:</label>
			<textarea name="descripcion"></textarea><br><br>
            <label>Fecha Inicio Inscripción:</label>
			<input type="date" name="fiinscrip"/><br><br>
            <label>Fecha Fin Inscripción:</label>
			<input type="date" name="ffinscrip"/><br><br>
            <label>Fecha Inicio Reto:</label>
			<input type="datetime-local" name="fireto"/><br><br>
            <label>Fecha Fin Reto:</label>
			<input type="datetime-local" name="ffreto"/><br><br>
            <label>Fecha Publicación:</label>
			<input type="datetime-local" name="fpubli"/><br><br>
            <label>Categoría:</label>
			<select name="categoria">
				<?php 
					require_once('../config/config.php');
					$conexion = new mysqli($servidor, $usuario, $contrasena, $bbdd);
					$consulta = 'SELECT id,nombre
					FROM CATEGORIAS;';
					$resultado=$conexion->query($consulta);
					while($fila=$resultado -> fetch_assoc()){
						echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
					}
				?>
            </select>
			<a href="listarRetos.php">Ver listado</a><br><br>
			<input type="submit" name="enviar"/>
		</form>
	</body>
</html>