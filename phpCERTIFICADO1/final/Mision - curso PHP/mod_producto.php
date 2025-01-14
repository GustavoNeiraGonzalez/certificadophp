<?php
include ('sesion.php');
?>

<!DOCTYPE html> 
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link type="text/css" href="estilo.css" rel="stylesheet">
		<title>Modificar producto</title>		

	</head>
	<body>
		<div class="contenedor">
			<div class= "encabezado">
				<div class="izq">
					<p>Bienvenido/a:<br></p>
					<?php 
					 error_reporting(E_ALL  ^  E_NOTICE  ^  E_WARNING ^E_DEPRECATED );
					echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>
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
			<br><h1 align="center">PRODUCTOS EXISTENTES</h1><br>
			<?php
				include('conexion.php');

				$consulta="SELECT * FROM PRODUCTOS";
				$query = $conn -> prepare($consulta) ;
				$query->execute();
				$results =  $query -> fetchAll(PDO:: FETCH_ASSOC);
			
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


			<div class="encabezado">
	                <h1>Modificar producto</h1>
	        </div>

	        <div class="formulario">

	            <form name="actualizar" method="post" action="" enctype="application/x-www-form-urlencoded">
	           		<div class="campo">
	               		<p>Para actualizar el stock de un producto ingresa el código del producto y la cantidad que deseas agregar. Para quitar deber ingresar la cantidad anteponiendo el signo menos (-) a la cantidad</p><br><br>

	                    <label name="Seleccionar">Ingresa el código del producto que deseas actualizar:</label>
			 			<input name='seleccionar' type="text" required>
	                </div>

	                <div class="campo">
	                    <div class="en-linea izquierdo">
	                        <label for="descrip">Stock:</label>
	                        <input type="number" name="stock" required/>
	                    </div>

	                    <div class="en-linea">
	                        <label for="apellido">Stock:</label>
	                        <input type="submit" name="actualiza" value="Actualizar" required/>
	                    </div>
	                </div>
	            </form>	        	
			<?php 
			// las siguientes líneas realizan la verificaciín del boton submit "actualiza"
			if (isset($_POST['actualiza'])) {
				$codigo = $_POST['seleccionar'];
				$stock_nuevo = $_POST['stock'];
				
				// En las siguientes líneas se recuperan las variables con los valores ingresados.
				$consulta = "SELECT * FROM PRODUCTOS WHERE cod_producto = '$codigo'";
				$query =$conn->prepare($consulta);
				$query->execute();
          		$results= $query -> fetchAll(PDO:: FETCH_ASSOC);
				
				if($query -> rowCount() > 0){							
					$stock_antiguo = $result['stock'];
					$stock_nuevo = (int)$stock_nuevo + $stock_antiguo;

				// Las siguientes líneas actualizan el stock del producto seleccionado.
					$consulta = "UPDATE PRODUCTOS SET STOCK = '$stock_nuevo'
					WHERE cod_producto = '$codigo'";
					$query= $conn-> query($consulta);	
					$query->execute();

					// La siguiente línea redirige a la misma página para visualizar los cambios.										
					header('Location:mod_producto.php');
				}else{
					echo "<span style='color:#F00; font-size:2em;'>Producto NO Existe</span>";
					}					
				}
				?>   	

	            <form name="modificar" method="post" action="" enctype="application/x-www-form-urlencoded">

	                <div class="campo">
	                    <label name="Seleccionar">Ingresa el código del producto que deseas modificar:</label>
			 			<input name='seleccionar' type="text" required>
	                </div>

	                <div class="campo">
	                    <label for="descrip">Descripción:</label>
	                    <input type="text" name="descripcion" required/>
	                </div>

	                <div class="campo">
	                    <label for="cargo">Proveedor:</label>
		                <input type="text" name="proveedor" required/>
	                </div>

	                <div class="campo">
	                    <label for="cargo">Fecha ingreso:</label>
		                <input type="date" name="fecha" required/>
	                </div>

	                <div class="botones">
	                    <input type="submit" name="modificar" value="Modificar"/>
					</div>
				</form>				
							 
				<?php 
				/* En las siguientes líneas se realiza la verificación del boton submit "modificar" y se
				recuperan las variables con los valores ingresados.*/
					if (isset($_POST['modificar'])) {
						$codigo = $_POST['seleccionar'];
						$descripcion = $_POST['descripcion'];
						$proveedor = $_POST['proveedor'];
						$fecha = $_POST['fecha'];
				
				//En las siguientes líneas se realiza la modificación de datos en la tabla correspondiente. 
						$consulta = "UPDATE PRODUCTOS SET descripcion ='$descripcion', proveedor='$proveedor', 
						fecha_ingreso = '$fecha' WHERE cod_producto = '$codigo'";
						$query= $conn-> query($consulta);	
						$query->execute();
		
						header('Location:mod_producto.php');	
								
						}	               		
				?>
			</div>
		</div>
	</body>
</html>