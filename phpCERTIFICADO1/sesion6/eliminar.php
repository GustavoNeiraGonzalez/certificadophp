<?php
include('sesion.php');#ESTA LINEA PARA VERIFICAR QUE LA SESION HA SIDO CREADA ANTES DE USAR COSAS PARA USUARIO
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
<P>Bienvenido: </P>
    <?php echo $_SESSION["usuario"]; ?></br>
    <a href="salir.php?sal=si">CERRAR SESIÓN</a>
    <h1 align='center'>REGISTROS EXISTENTES</h1>
    <br><br>

    <?php
	include ('conexion.php');
	$sql="SELECT * FROM REGISTROS";
	$query = $conn -> prepare($sql) ;
	$query->execute();
	$results= $query -> fetchAll(PDO:: FETCH_ASSOC);

	echo "<table width='80%' align='center'></tr>";
	echo "<th width='20%'>RUT</th>";
	echo "<th width='20%'>NOMBRE</th>";
	echo "<th width='20%'>APELLIDO</th>";
	echo "<th width='20%'>EMAIL</th>";
	echo "</tr>";

	if ($query -> rowCount() > 0){
		foreach($results as $result) {
			echo "</tr>";
			echo '<td width=20%>'.$result['rut'].'</td>';
			echo '<td width=20%>'.$result['nombre'].'</td>';
			echo '<td width=20%>'.$result['apellido'].'</td>';
			echo '<td width=20%>'.$result['email'].'</td>';
			echo "</tr>";
		 }			
	}
	echo "</table></br>";
	?>
	<div><br><br>
			<form action="" method="post" align='center'>
		 	<label name="elimina">Ingresa el Rut que desea eliminar:</label>
		 	<input name='eliminar-registro' type="text">
		 	<input name='eliminar' type="submit" value="ELIMINAR">
		</form>	

			<?php
			if (isset($_POST['eliminar'])){
				$eliminar= $_POST['eliminar-registro'];

				$sql= "DELETE FROM REGISTROS WHERE rut= '$eliminar'";
				$query= $conn->prepare($sql);
				$query->execute();

				header("Location:eliminar.php");
			}
			?>	

	</div>
</body>
</html>		 