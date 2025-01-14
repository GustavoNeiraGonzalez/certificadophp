 <!--Completar el Código que se requerirá a continuación-->
 <!--Recuperar las variables con los datos ingresados en el formulario. 
  Validar que el rut ingresado no se encuantre en la base de datos.
  Si ya existe un registro vinc ulado al rut ingresado:
	 Redirigir a crear_personal y entregar mensaje.
  Si no existe:
	 Insertar datos en tabla correspondiente.
	 Redirigir a crear_personal y mostrar mensaje.
Si las contraseñas no existen redirigir a crear_personal y mostrar mensaje. --> 	
<?php
include ('conexion.php');
if ($_POST['contrasena1'] == $_POST['contrasena2']) { 

    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cargo = $_POST['cargo'];
    $contraseña = md5($_POST['contrasena2']);

    $sql = "INSERT INTO PERSONAL (rut,nombre,apellido,cargo,contraseña)
            VALUES($rut,$nombre,$apellido,$cargo,$contraseña)";
            $query= $conn -> prepare($sql);    
            $query ->execute() ;

    header("Location:crear_personal.php?valida=si");
}else{
    header("Location:crear_personal.php?error=si");
}

?>