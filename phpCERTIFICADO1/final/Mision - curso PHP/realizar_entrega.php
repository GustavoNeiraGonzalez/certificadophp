<?php
include ('sesion.php');

?>


<!DOCTYPE html> 
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <title>Entregas</title>
        <link type="text/css" href="estilo.css" rel="stylesheet">

    </head>

    <body>
        <div class="contenedor">
            <?php
                error_reporting(E_ALL  ^  E_NOTICE  ^  E_WARNING);
            ?>
            <div class= "encabezado">
                <div class="izq">
                    <p>Bienvenido/a:<br></p>
                    <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>
                </div>

                <div class="centro">
                    <a href=principalBodega.php><img src='imagenes/home.png'><br>Home</a>
                </div>
                
                <div class="derecha">
                    <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
                </div>
            </div>
                
            
            <br><h1 align='center'>PRODUCTOS EXISTENTES</h1><br>
            <?php
                include('conexion.php');

                $consulta="SELECT * FROM PRODUCTOS";
                $query = $conn -> prepare($consulta) ;
				$query->execute();
		        $results= $query -> fetchAll(PDO:: FETCH_ASSOC);
        
                echo "<table  width='80%' align='center'><tr>";               
                echo "<th width='10%'>CODIGO PRODUCTO</th>";
                echo "<th width='20%'>DESCRIPCIÓN</th>";
                echo "<th width='10%'>STOCK</th>";
                echo "<th width='20%'>PROVEEDOR</th>";
                echo "<th width='20%'>FECHA DE INGRESO</th>";
                echo  "</tr>"; 
            
                if ($query -> rowCount() > 0){
					foreach($results as $result) {    
                    
                  echo "<tr>";                
                  echo '<td width=10%>'.$result['cod_producto'].'</td>';
                  echo '<td width=20%>'.$result['descripcion'].'</td>';
                  echo '<td width=20%>'.$result['stock'].'</td>';
                  echo '<td width=20%>'.$result['proveedor'].'</td>';
                  echo '<td width=20%>'.$result['fecha_ingreso'].'</td>';
                  echo "</tr>";
                }
            }
                 echo "</table></br>";
            ?>

            <form ="registro" align='center' method="post" action="registroEntrega.php" enctype="application/x-www-form-urlencoded">

                <div class="campo">
                    <label name="rut">Rut personal que retira:</label>
                    <input name='rut' type="text" required/>
                </div>

                <div class="campo">
                    <label name="cod">Código del producto:</label>
                    <input name='codigo' type="text" required/>
                </div>

                <div class="campo">
                    <label name="cantd">Cantidad:</label>
                    <input name='cantidad' type="text" required/>
                </div>

                <div class="campo">
                    <label name="cantd">Fecha entrega:</label>
                    <input name='fecha' type="date" required/>
                </div>
                
                <div class="botones">
                    <input name='agregar' type="submit" value="agregar"/>
                    <?php
                        if ($_GET["error"]=="si") { 
                            echo "<p class='mensaje'> Error inesperado</p>";
                            
                        }else if ($_GET['valida'] == "si") {

                            echo "<p class='mensaje'> Entrega realizada con exito</p>";
                        }else if ($_GET['error'] == "codigoProducto") { #manejo de error: codigo de producto

                            echo "<p class='mensaje'> ERROR, codigo de producto no valido</p>";
                        }
                    ?>
                </div>
                
            </form>

            

                 <!--Completar el Código que se requerirá a continuación--> 
                 <!--Se verifica que la variable del boton submit este creada y se requiere:
                 Recuperar las variables con los datos ingresados. 
                 Descontar la cantidad ingresada al stock existente del producto a retirar.
                 Insertar los datos ingresados en la tabla "entregas" de la base de datos. 
                 Redirigir a esta misma página para visualizar la actualización del stock.-->    
                    
            <?php 
                #ESTA COMENTADO POR QUE EL CODIGO FUNCIONANDO EN EL PROGRAMA LO HICE DENTRO DE 
                #registroEntrega.php
                /*if (isset($_POST['agregar'])) {
                    echo "<pre>";
                    print_r($_POST);
                    echo "</pre>";  
                    try{
                        $rut= $_POST['rut'];
                        $codigo= $_POST['codigo'];
                        $cantidad= $_POST['cantidad'];
                        $fecha= $_POST['fecha'];

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

                    } catch (PDOException $e) {
                    
                        // Para otros errores, muestra el mensaje general
                        echo "Error inesperado: " . $e->getMessage();
                    
                    }
                }else{
                    header("Location:realizar_entrega.php?error=si");
                }
                */
              

             ?>
                
        </div>
    </body>
</html> 