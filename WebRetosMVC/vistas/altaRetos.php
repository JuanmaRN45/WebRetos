<!-- Juan Manuel Rincón Navarro -->
<html>
	<head>
		<title>Formulario Categorias</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
	</head>
	<body>
		<nav>
			<a href="../vistas/altaRetos.php"><button>ALTA RETOS</button></a>
			<a href="../vistas/listarRetos.php"><button>LISTAR RETOS</button></a>
			<a href="../vistas/eliminarReto.php"><button>ELIMINAR RETOS</button></a>
			<a href="../vistas/modificarRetos.php"><button>MODIFICAR RETOS</button></a>
		</nav>
		<form action="../controlador/controladorRetos.php"method="post">
			<h2 class="letraazul">Añadir Retos</h2>
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
			<a href="listarRetos.php">Ver listado</a><br><br>
			<input type="submit" name="enviar"/>
		</form>
	</body>
</html>