<?php
include ('sesion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="estilo.css" />
    <title>Agregar productos</title>
</head>

<body>

    <div class="contenedor">
        <div class="encabezado">
            <div class="izq">

                <p>Bienvenido/a:<br> </p>
                <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>
            </div>
            <div class="centro">
                <?php

                    if ($_SESSION['cargo']=='Admin') {
                            echo "<a href=principalAdmin.php><center><img src='imagenes/home.png'><br>Home<center></a>";
                    }else {
                            echo "<a href=principalBodega.php><img src='imagenes/home.png'><br>Home</a>";
                    };

                    error_reporting(E_ALL  ^  E_NOTICE  ^  E_WARNING ^E_DEPRECATED );
                ?>
            </div>

            <div class="derecha">
            <!-- La siguiente línea corresponde al links con imagen para finalizar sesión, que redirige 
            a la página salir.php con la varible "sal=si" que destruye la sesión y nos 
            muestra la pagina del login. -->
                <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
            </div>
        </div>
        <br>
        <h1 align="center">GESTIÓN DE PRODUCTOS</h1>

        <div class="formulario">
            <form name="registro" method="post" action="" enctype="application/x-www-form-urlencoded">
                <div class="campo">
                    <label for="codigo">Código del producto:</label>
                    <input type="text" name="codigo" required />
                </div>

                <div class="campo">
                    <label for="nombre">Descripción:</label>
                    <input type="text" name="descripcion" required />
                </div>

                <div class="campo">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" required />
                </div>

                <div class="campo">
                    <label for="proveedor">Proveedor:</label>
                    <input type="text" name="proveedor" required />
                </div>

                <div class="campo">
                    <label for="fecha">Fecha ingreso:</label>
                    <input type="date" name="fecha" required />
                </div>

                <div class="botones">
                    <input type="submit" name="crear" value="Agregar producto" />
                </div>

                <?php
               
                    include ('conexion.php');
                     // La siguiente línea de codigo verifica que la varible del boton submit "modificar" este creada.
                    if (isset($_POST['crear'])) {
                        
                    //La siguiente lineas de codigo recuperan las variables que se deben registrar.
                         $codigo = $_POST['codigo'];
                         $descripcion = $_POST['descripcion'];
                         $stock = $_POST['stock'];
                         $proveedor = $_POST['proveedor'];
                         $fecha = ($_POST['fecha']);

                    //La siguiente lineas consultan el la tabla PRODUCTOS el código igresado
                         $consulta = "SELECT  * FROM PRODUCTOS WHERE cod_producto = '$codigo' ";
                         $query = $conn -> prepare($consulta) ;
                         $query->execute();
                         $result =  $query -> fetch(PDO:: FETCH_ASSOC);

                         if( $result > 0){
                            echo "ya existe un producto con el mismo codigo ";                             
                         }else {
                    //Si no corresponde al código entonces:
                        $consulta = "INSERT INTO PRODUCTOS (cod_producto, descripcion, stock, proveedor, fecha_ingreso) 
                        VALUES ('$codigo', '$descripcion', '$stock', '$proveedor', '$fecha')";
                        $query= $conn->prepare($consulta);
                        $query->execute() or die ("No se pudo crear el registro");
                        echo "Producto añadido correctamente ";

                         }
                                       
                    }

                 ?>


            </form>

        </div>

    </div>
</body>

</html>