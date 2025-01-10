<?php
    include('conexion.php');

    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    $query =$conn -> prepare( "SELECT * FROM registros WHERE rut = :usuario AND contraseña= :pass"); 
    $query->bindParam(":usuario",$usuario);
    $query->bindParam(":pass",$pass);
    $query->execute();
    $result = $query -> fetch(PDO:: FETCH_ASSOC);

    if($result>0)
    {
        echo $result["rut"]." - ".$result["nombre"]." - ".$result["apellido"]."  -  ".$result["email"]." 
        - " .$result["contraseña"];
    }else{
        header("Location: formulario.php ?error=si");
    }

?>