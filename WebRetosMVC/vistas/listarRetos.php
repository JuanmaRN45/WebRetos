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
		</nav>
        <h1>LISTADO DE RETOS</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DIRIGIDO</th>
                <th>DESCRIPCIÓN</th>
                <th>FECHA INICIO INSCRIPCIÓN</th>
                <th>FECHA FIN INSCRIPCIÓN</th>
                <th>FECHA INICIO RETO</th>
                <th>FECHA FIN RETO</th>
                <th>FECHA DE PUBLICACIÓN</th>
                <th>PUBLICADO</th>
                <th>PROFESOR</th>
                <th>CATEGORÍA</th>
            </tr>
            <?php
                require_once('../controlador/controladorRetos.php');
                $controladorRetos =new ControladorRetos();
                $array = $controladorRetos->listarReto();
                $i=0;
                while($i<sizeof($array[0])){
                    echo '<tr>';
                        echo '<td>'.$array[0][$i].'</td>';
                        echo '<td>'.$array[1][$i].'</td>';
                        echo '<td>'.$array[2][$i].'</td>';
                        echo '<td>'.$array[3][$i].'</td>';
                        echo '<td>'.$array[4][$i].'</td>';
                        echo '<td>'.$array[5][$i].'</td>';
                        echo '<td>'.$array[6][$i].'</td>';
                        echo '<td>'.$array[7][$i].'</td>';
                        echo '<td>'.$array[8][$i].'</td>';
                        echo '<td>'.$array[9][$i].'</td>';
                        echo '<td>'.$array[10][$i].'</td>';
                        echo '<td>'.$array[11][$i].'</td>';
                        $i=$i+1;
                    echo '</tr>';
                }
            ?>
        </table>
	</body>
</html>