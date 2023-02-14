<!-- Juan Manuel Rincón Navarro -->
<?php
	require_once('../controlador/controladorRetos.php');
	$controladorRetos = new ControladorRetos();
	$array = $controladorRetos->listarReto();
	$i=0;
?>
<html>
	<head>
		<title>Modificar Selección de Reto</title>
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
		<form action="../vistas/modificarRetosForm.php" method="post">
			<h2>Elige Reto a Modificar</h2>
			
				<?php
					if(isset($array[0])){
						echo '<select name="retoMod">';
						while($i<sizeof($array[0])){
							echo '<option value="'.$array[0][$i].'">'.$array[1][$i].'</option>';
							$i=$i+1;
						}
						echo '</select><br><br>';
						echo '<input type="submit" value="Enviar" name="btnModificar"/>';
					}
					else{
						echo '<label>NO HAY RETOS CREADOS AÚN</label>';
					}
				?>
			</select><br><br>
			
		</form>
    </body>
</html>