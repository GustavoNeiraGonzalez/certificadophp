<?php
include ('sesion.php');
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" href="estilo.css"/>
        <title>Admin</title>
        
    </head>

    <body>
        
        <div class="contenedor">
            <h1 align="center">CUENTA DE ADMINISTRADOR</h1>
            <div class= "encabezado">
            <div class="izq">
        
                <p>Bienvenido/a:<br></p>
               <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>
              
               
            </div>
            
            <div class="derecha">
                <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
            </div>

            <br><h1 align="center">CONTROL DE PRODUCTO</h1><br>

            </div>
            <div>
                <table align="center" class="tabla">
                    <tr height="150">
                    <td width="200"><center><a class="modulos" href="agregar_producto.php"><img src="imagenes/adp.png"></a>
                    <br><br><br>Agregar producto
                    <td></center>
                    <td width="200"><center><a class="modulos" href="mod_producto.php"><img src="imagenes/modp.png"></a>
                    <br><br><br>Modificar poducto<td></center>
                    <td width="200"><center><a class="modulos" href="eliminar_producto.php"><img src="imagenes/elp.png"></a>
                    <br><br><br>Eliminar producto<td></center>
                    </tr>
                </table>

            </div>

            <div class="encabezado">
                <h2>CONTROL DE PERSONAL</h2>
            </div>

            <div>
                <table align="center" class="tabla">
                    <tr height="150">
                    <td width="200"><center><a class="modulos" href="crear_personal.php"><img src="imagenes/ad.png"></a>
                    <br><br><br>Registrar personal
                    <td></center>
                    <td width="200"><center><a class="modulos" href="mod_personal.php"><img src="imagenes/mod.png"></a>
                    <br><br><br>Modificar personal<td></center>
                    <td width="200"><center><a class="modulos" href="eliminar_personal.php"><img src="imagenes/el.png"></a>
                    <br><br><br>Eliminar personal<td></center>
                    </tr>
                </table>

            </div>
        </div>
    </body>
</html>