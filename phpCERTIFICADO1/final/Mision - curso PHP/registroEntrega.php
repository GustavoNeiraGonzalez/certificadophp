<?php
include ('conexion.php');
if (isset($_POST['agregar'])) {
    try{
        $rut= $_POST['rut'];
        $codigo= $_POST['codigo'];
        $cantidad= $_POST['cantidad'];
        $fecha= $_POST['fecha'];

        $sql = "UPDATE PRODUCTOS SET  cantidad = cantidad-:cantidad
                WHERE cod_producto=:codigo";
                $query->bindParam(":cantidad", $cantidad);
                $query->bindParam(':codigo', $codigo);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);

        $sql = "INSERT  INTO ENTREGAS (rut,cod_producto,cantidad,fecha_entrega) 
                VALUES($rut,$codigo,$cantidad,$fecha)";
                $query= $conn -> prepare($sql);    
                $query ->execute() ;


        header("Location:crear_personal.php?valida=si");

    } catch (PDOException $e) {
        // aqui se comprueba con el codigo 23000 si el rut ya esta en el sistema
        if ($e->getCode() == 23000) {
            header("Location:crear_personal.php?error=rut");
            echo "Error: El RUT $rut ya existe en el sistema.";
        } else {
            // Para otros errores, muestra el mensaje general
            echo "Error inesperado: " . $e->getMessage();
        }
    }
    
}else{
    header("Location:crear_personal.php?error=si");
}

?>