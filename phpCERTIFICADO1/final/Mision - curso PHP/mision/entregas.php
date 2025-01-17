<?php
include ('sesion.php');
?>
<!DOCTYPE html> 
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">  		
		<link type="text/css" href="estilo.css" rel="stylesheet">
		<title>Entregas</title>

	</head>

	<body>
		<div class="contenedor">
			<div class= "encabezado">
	        	<div class="izq">
	        		<p>Bienvenido/a:<br></p>
	        		<?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>
	        	</div>

	            <div class="centro">
	            	<a href=principalBodega.php><img src='imagenes/home.png'><br>Home</a>
	            </div>
	            
	            <div class="derecha">
	                <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
	            </div>
	        </div>

			<h1 align='center'>ENTREGAS REALIZADAS</h1>
			<br><br>
			<?php
				include('conexion.php');

				$consulta="SELECT * FROM ENTREGAS";
				$query = $conn -> prepare($consulta) ;
				$query->execute();
				$results =  $query -> fetchAll(PDO:: FETCH_ASSOC);
		
				echo "<table  width='80%' align='center'><tr>";	         	  
				echo "<th width='20%'>RUT</th>";
				echo "<th width='20%'>CÓDIGO DEL PRODUCTO</th>";
				echo "<th width='20%'>CANTIDAD</th>";
				echo "<th width='20%'>FECHA DE ENTREGA</th>";
				echo  "</tr>"; 
		
				if ($query -> rowCount() > 0){
					foreach($results as $result) {	          	
		          echo "<tr>";	         	  
				  echo '<td width=20%>'.$result['rut'].'</td>';
				  echo '<td width=20%>'.$result['cod_producto'].'</td>';
				  echo '<td width=20%>'.$result['cantidad'].'</td>';
				  echo '<td width=20%>'.$result['fecha_entrega'].'</td>';
				  echo "</tr>";
				}
			}
			 	echo "</table></br>";
			?>

	</body>
</html>