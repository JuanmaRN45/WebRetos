<?php
	session_start();
    if(!isset($_SESSION['id'])){
        header('Location: ../vistas/inicio_sesion.php');
    }
	
    if(isset($_POST['cerrarsesion'])){
        require_once('../controlador/controladorGeneral.php');
        $controladorGeneral =new ControladorGeneral();
        $controladorGeneral->cerrarSesion();
    }
	if(isset($_POST['borrar'])){
		require_once('../controlador/controladorCategorias.php');
		$controladorCategorias = new ControladorCategorias();
		$controladorCategorias->eliminarCat($_POST);
	}
	if(isset($_POST['modificar'])){
		require_once('../controlador/controladorCategorias.php');
		$controladorCategorias = new ControladorCategorias();
		$controladorCategorias->irModificar($_POST);
	}
	require_once('../controlador/controladorCategorias.php');
	$controladorCategorias = new ControladorCategorias();
	$datos = $controladorCategorias->consultaCategorias();
	$i=0;
	while($i<sizeof($datos['id'])){
			echo '<table>';
				echo '<tr>';
					echo '<td>'.$datos['id'][$i].'</td>';
					echo '<td>'.$datos['nombre'][$i].'</td>';
					echo '<td><form action="" method="post"><input type="text" name="id" value="'.$datos['id'][$i].'" hidden><input type="submit" name="borrar" value="borrar"></form></td>';
					echo '<td><form action="" method="post"><input type="text" name="id" value="'.$datos['id'][$i].'" hidden><input type="submit" name="modificar" value="modificar"></form></td>';
				echo '</tr>';
				$i = $i+1;
			echo '</table>';
	}
	echo '<a href="altaCategorias.php">Añadir Categoría</a>';
?>



