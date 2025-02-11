<?php
include ('sesion.php');
?>

<!DOCTYPE html> 
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">  		
		<link type="text/css" href="estilo.css" rel="stylesheet">
		<title>formulario eliminar producto</title>

	</head>

	<body>
		<div class="contenedor">
			<div class= "encabezado">
				<div class="izq">
					<p>Bienvenido/a:<br></p>
					<?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>
				</div>

				<div class="centro">
					<?php
						
						if ($_SESSION['cargo']=='Admin') {
								echo "<a href=principalAdmin.php><center><img src='imagenes/home.png'><br>Home<center></a>";
						}else {
								echo "<a href=principalBodega.php><img src='imagenes/home.png'><br>Home</a>";
						}
	       			?> 
				</div>
				
				<div class="derecha">
				<!-- La siguiente línea corresponde al links con imagen para finalizar sesión, que redirige a la página salir.php con la varible "sal=si" que destruye la sesión y nos 
				muestra la pagina del login. -->
					<a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
				</div>
			</div>
				
			
			<br><h1 align='center'>REGISTROS EXISTENTES</h1><br>
			<?php
				include('conexion.php');

				$consulta="SELECT * FROM PRODUCTOS";
				$query = $conn -> prepare($consulta) ;
				$query->execute();
				$results= $query -> fetchAll(PDO:: FETCH_ASSOC);	
							
				echo "<table  width='80%' align='center'><tr>";	         	  
				echo "<th width='10%'>CODIGO PRODUCTO</th>";
				echo "<th width='20%'>DESCRIPCIÓN</th>";
				echo "<th width='10%'>STOCK</th>";
				echo "<th width='20%'>PROVEEDOR</th>";
				echo "<th width='20%'>FECHA DE INGRESO</th>";
				echo  "</tr>"; 
			
				if ($query -> rowCount() > 0){
					foreach($results as $result) {
		          	
		          echo "<tr>";	         	  
				  echo '<td width=10%>'.$result['cod_producto'].'</td>';
				  echo '<td width=20%>'.$result['descripcion'].'</td>';
				  echo '<td width=20%>'.$result['stock'].'</td>';
				  echo '<td width=20%>'.$result['proveedor'].'</td>';
				  echo '<td width=20%>'.$result['fecha_ingreso'].'</td>';
				  echo "</tr>";
				}
			}
				echo "</table></br>";
			?>

			<form action="" method="post" align='center'>
			 	<label name="elimina">Ingresa el código del producto a eliminar:</label>
			 	<input name='eliminar-producto' type="text">
			 	<input name='eliminar' type="submit" value="ELIMINAR">
			</form>
			
			
		    <?php 
		     if (isset($_POST['eliminar'])) {
		     	$eliminar = $_POST['eliminar-producto'];
		     	$consulta = "DELETE FROM PRODUCTOS WHERE cod_producto = '$eliminar'";
				$query= $conn->prepare($consulta);
				$query->execute();
				header("Location:eliminar_producto.php");

			}

		     ?>
		</div>
	</body>
</html>		 