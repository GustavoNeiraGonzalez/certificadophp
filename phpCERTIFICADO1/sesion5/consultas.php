<?php

    include('conexion.php');
    #-----INSERT----------
    /*
    $sql= "INSERT INTO registros(rut, nombre,apellido,email,contraseña) 
    VALUES('123456789','Andy', 'Rodriguez','a.rodriguez@gmail.com','aro2023')";

    $query= $conn->prepare($sql);

    $query->execute() or die("Error al insertar datos");#aqui ejecuta o lanzará el error al tratar de insertar datos
    echo "Se insertaron los datos correctamente";
    */
    #------UPDATE------
    /*
    $sql= "UPDATE registros SET nombre='Eden', email='e.rodriguez@yahoo.es', contraseña='ER2023' WHERE rut='123456789'";

    $query= $conn->prepare($sql);
    $query->execute() or die("Error al modificar datos");
    echo "Registro actualizado correctamente";
    */
    #-----------DELETE
    /*
    $sql= "DELETE FROM registros WHERE rut='123456789'";
    $query= $conn->prepare($sql);
    $query->execute() or die("Error al eliminar datos");
    echo "Registro ha sido eliminado correctamente";
    */
    #-------SELECT
    $sql = "SELECT * FROM registros"; 
    $query = $conn -> prepare($sql) ;
    $query->execute() or die ("No se pudo realizar la consulta </br>");
    echo "Consulta exitosa <br>";
    $results= $query -> fetchAll(PDO:: FETCH_ASSOC);
    foreach($results as $result)
    {
        echo $result["rut"]." - ".$result["nombre"]." - ".$result["apellido"]."  -  ".$result["email"]." <br> ";
    }
?>