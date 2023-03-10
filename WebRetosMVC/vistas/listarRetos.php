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
    require_once('../controlador/controladorRetos.php');
    $controladorRetos =new ControladorRetos();
    $array = $controladorRetos->listarReto();
    $i=0;
    if(isset($_POST['btnPDF'])){
        $SacarPDF = $controladorRetos->sacarPDF(); 
    }
    
?>

<html>
	<head>
		<title>Listado de Retos</title>
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
        <form action="../vistas/filtroLista.php" method="post">
            <label>Nombre</label>
            <input type="text" name="nomFiltro">
            <input type="submit" value="Filtrar" name="btnFiltro">
        </form>
        <h1>LISTADO DE RETOS</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DIRIGIDO</th>
                <th>PUBLICADO</th>
            </tr>
            <?php
                if(isset($array[0])){
                    while($i<sizeof($array[0])){
                        echo '<tr>';
                            echo '<td>'.$array[0][$i].'</td>';
                            echo '<td>'.$array[1][$i].'</td>';
                            echo '<td>'.$array[2][$i].'</td>';
                            if($array[9][$i]==1){
                                echo '<td>Si</td>';
                            }
                            else{
                                echo '<td>No</td>';
                            }
                            $i=$i+1;
                        echo '</tr>';
                    }
                }
                else{
                    echo '<tr><td colspan="12">NO HAY RETOS CREADOS AÚN</td></tr>';
                }   
            ?>
        </table>
        <form action="" method="post">
            <input type="submit" value="Sacar PDF" name="btnPDF">
        </form>
	</body>
</html>