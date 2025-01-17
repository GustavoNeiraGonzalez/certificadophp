<?php
include ('conexion.php');
if (isset($_POST['agregar'])) {
    /*echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    #codigo para ver que devuelven las variables*/ 
    try{
        $rut= $_POST['rut'];
        $codigo= $_POST['codigo'];
        $cantidad= $_POST['cantidad'];
        $fecha= $_POST['fecha'];
        // Primero, verifica si el producto con ese código existe
        $sqlCheck = "SELECT COUNT(*) FROM PRODUCTOS WHERE cod_producto = :codigo";
        $queryCheck = $conn->prepare($sqlCheck);
        $queryCheck->bindParam(':codigo', $codigo);
        $queryCheck->execute();
        $count = $queryCheck->fetchColumn();

        if ($count > 0) {
            #---actualizar (update) tabla productos y restar la cantidad quitada --
            $sql = "UPDATE PRODUCTOS SET stock = stock-'$cantidad'
                    WHERE cod_producto='$codigo'";
            $query = $conn->prepare($sql); // $query ahora es una instancia de PDOStatement

            $query->execute(); // Aquí solo necesitas ejecutar la declaración

            #---crear (insert) los datos de entrega ---
            $sql2 = "INSERT  INTO ENTREGAS (rut,cod_producto,cantidad,fecha_entrega) 
                    VALUES('$rut','$codigo','$cantidad','$fecha')";
                    $query2= $conn -> prepare($sql2);    
                    $query2 ->execute() ;


            header("Location:realizar_entrega.php?valida=si");
        }else{
            header("Location:realizar_entrega.php?error=codigoProducto");
        }
    } catch (PDOException $e) {
       
        // Para otros errores, muestra el mensaje general
        echo "Error inesperado: " . $e->getMessage();
    
    }
}else{
    header("Location:realizar_entrega.php?error=si");
}

?>