<html>
	<head>
		<title>Listado de Retos</title>
		<meta charset="utf-8">
		<meta name="author" content="jrinconnavarro.guadalupe@alumnado.fundacionloyola.net">
	</head>
	<body>
        <?php
            require_once('../controlador/controladorRetos.php');
            $controladorRetos =new ControladorRetos();
            $array = $controladorRetos->listarReto();
            $i=0;
            while($i<sizeof($array[0])){
                    echo '<table>';
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
                        echo '</tr>';
                    echo '</table>';
                    $i=$i+1;
            }
            echo '<a href="altaRetos.php">Añadir Reto</a>';
        ?>
	</body>
</html>