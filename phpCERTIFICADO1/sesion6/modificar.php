<?php
include('sesion.php');#ESTA LINEA PARA VERIFICAR QUE LA SESION HA SIDO CREADA ANTES DE USAR COSAS PARA USUARIO
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario modificar PERSONAL</title>
    <link type="text/css" href="estilo.css" rel="stylesheet">

</head>

<body>
<P>Bienvenido: </P>
	<?php echo $_SESSION["usuario"];?></br>	
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
		<div class="encabezado">
                <h1>Modificar registro</h1>
            </div>

            <div class="formulario">
                <form ="registro" method="post" action="" enctype="application/x-www-form-urlencoded">

                	<div class="campo">
                        <label name="Seleccionar">Ingresa el Rut que desea modificar:</label>
		 				<input name='seleccionar' type="text" required>
                    </div>

                    <div class="campo">
                        <label for="rut">RUT:</label>
                        <input type="text" name="rut" required/>
                    </div>

                    <div class="campo">
                        <div class="en-linea izquierdo">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" required/>
                        </div>

                        <div class="en-linea">
                            <label for="apellido">Apellido:</label>
                            <input type="text" name="apellido" required/>
                        </div>
                    </div>

                    <div class="campo">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" name="email" required/>
                    </div>

                    <div class="botones">
                        <input type="submit" name="modificar" value="Modificar"/>
					</div>                    
				</form>      
				
				<?php
                if(isset($_POST['modificar'])){ #isset verifica si existe la variable dentro de () en este caso
                    #post de modificar

                    $seleccionar =$_POST['seleccionar'];#query para modificar
                    $rut= $_POST['rut'];
                    $nombre= $_POST['nombre'];
                    $apellido= $_POST['apellido'];
                    $email= $_POST['email'];
                    $sql= "UPDATE REGISTROS SET rut= '$rut', nombre= '$nombre', apellido= '$apellido', email= '$email' 
                    WHERE rut= '$seleccionar'";
                    $query= $conn->prepare(query: $sql);
                    $query->execute();

                    header ("Location:modificar.php");
                }
                ?>
                       
</body>

</html>


