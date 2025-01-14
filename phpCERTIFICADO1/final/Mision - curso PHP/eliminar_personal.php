<?php
include ('sesion.php');
?>

<!DOCTYPE html> 
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<link type="text/css" href="estilo.css" rel="stylesheet">		 
		<title>formulario eliminar PERSONAL</title>

	</head>

	<body>
		<div class="contenedor">
		<div class= "encabezado">
			<div class="izq">
			
				<p>Bienvenido/a:<br></p>
                 <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>
			</div>

			<div class="centro">
				<a href=principalAdmin.php><center><img src='imagenes/home.png'><br>Home<center></a>
			</div>
				
			<div class="derecha">
				<a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
			</div>
		</div>
		
		
		<br><br><h1 align='center'>REGISTROS EXISTENTES</h1><br>
		<?php
			include('conexion.php');

			$consulta = "SELECT  * FROM PERSONAL";
            $query = $conn -> prepare($consulta) ;
			$query->execute();
            $results= $query -> fetchAll(PDO:: FETCH_ASSOC);
		
			echo "<table  width='80%' align='center'><tr>";	         	  
			echo "<th width='20%'>RUT</th>";
			echo "<th width='20%'>NOMBRE</th>";
			echo "<th width='20%'>APELLIDO</th>";
			echo "<th width='20%'>CARGO</th>";
			echo  "</tr>"; 
		
			if ($query -> rowCount() > 0){
				foreach($results as $result) {
	          	
	          echo "<tr>";	         	  
			  echo '<td width=20%>'.$result['rut'].'</td>';
			  echo '<td width=20%>'.$result['nombre'].'</td>';
			  echo '<td width=20%>'.$result['apellido'].'</td>';
			  echo '<td width=20%>'.$result['cargo'].'</td>';
			  echo "</tr>";
			}
		}
			echo "</table></br>";
		?>

		<form action="" method="post" align='center'>
			<label name="elimina">Ingresa el Rut del personal a eliminar:</label>
			<input name='eliminar-personal' type="text">
			<input name='eliminar' type="submit" value="ELIMINAR">
		</form>
					  
		<?php
		/*En las siguientes 4 lineas se verifica la creación del boton submit, 
		 se recupera el rut ingresado para ser eliminado, se verifica si es igual al rut del Admin, 
		y se muestra alerta con mensaje*/
			 if (isset($_POST['eliminar'])) {
				$eliminar = $_POST['eliminar-personal'];
				if ($eliminar == '180332403') {
				echo "<script lenguaje='javascript'>alert('Admin general no puede ser eliminado');</script>";
			}else{
			// En las siguientes líneas gerstionamos la eliminación de un registro
				$consulta= "DELETE FROM PERSONAL WHERE rut= '$eliminar'";
				$query= $conn->prepare($consulta);
				$query->execute();

				// la siguiente línea nos redirige a la página, para verificar la eliminación
				header('Location:eliminar_personal.php');				
			}	
		};
		?>		    	
		</div>
	</body>
</html>		 