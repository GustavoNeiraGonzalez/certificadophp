<?php
include('conexion.php');
#if con 2 contraseñas por la contraseña y el confirmar contraseña
if ($_POST['contrasena1'] == $_POST['contrasena2']) { 
			
    $rut = $_POST['rut']; #variables del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contraseña = md5($_POST['contrasena2']);
    
    #sql
    $sql =  "INSERT INTO REGISTROS (rut,nombre,apellido,email,contraseña)
    VALUES ( '$rut', '$nombre', '$apellido', '$email', '$contraseña')";    
    $query= $conn -> prepare($sql);    
    $query ->execute() ;
         
    header("Location:formulario.php?valida=si");    
} else {
    header("Location:formulario.php?error=si");
}
?>




