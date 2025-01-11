<?php
    include('conexion.php');

    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

        $query = $conn->prepare("SELECT contraseña FROM registros WHERE rut = :usuario");
        $query->bindParam(":usuario", $usuario);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $hashed_input = hash('sha256', $pass); // Genera el hash de la contraseña ingresada
            if ($hashed_input === $result['contraseña']) {
                echo "Inicio de sesión exitoso";
            } else {
                echo "Usuario o contraseña inválidos";
            }
        }
    if($result>0)
    {
        session_start();

        $_SESSION['activo']= true;
        $_SESSION['usuario']= $usuario;
     
        if($usuario == '153412977'){
     
         header("Location:eliminar.php");
     
        }else if ($usuario == '132497123') {
     
           header("Location:modificar.php");  	
     
       }else if ($usuario == '91273320') {
           header("Location:mostrar.php");
       }
     
    
    }else{
        header("Location: formulario.php ?error=si");
    }

?>