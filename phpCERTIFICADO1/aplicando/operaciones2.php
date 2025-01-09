<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Document</title>
    <html lang="en">
</head>
<body>
    <div class="Contenedor">
        <h1>Funciones y estructuras de control en PHP</h1>
        <div class="izquierda">
            <?php
        
        function operaciones($var1, $var2, $var3){
            
            $resultado = 0;
            if($var2 == "+"){
                $resultado = $var1 + $var3;
                echo  "El resultado de: $var1 + $var3 = ";
                
            }else if($var2 == "-"){
                $resultado = $var1 - $var3;
                echo  "El resultado de: $var1 - $var3 = ";
                
            }else if($var2 == "/"){
                $resultado = $var1 / $var3;
                echo  "El resultado de: $var1 / $var3 = ";
            }
        return $resultado;    
        }
        $r2 = operaciones(20, "-", 4);
        $r = operaciones(12, "/", 3);
        echo "$r </br></br>";        
        if ($r2%2==0){
            $pares= ($r2/2);
        }
        echo "los numeros pares entre 0 y el $r2 son:".($pares). "</br></br>";
        $conta = 0;
        
        /*while($conta<=$r2){ #codigo original sin sentido porque en !=0 impide que se vean los pares
            if ($conta%2 !=0) {
                echo $conta."</br>";
            }
            $conta++    ;
        }*/
        while($conta<=$r2){
            if ($conta%2 ==0 && $conta!=0) { #arreglado pares y eliminado el 0
                echo $conta."</br>";
            }
            $conta++    ;
        }

        ?>
        </div>
        <div class="centro">
            <?php
                $r2 = operaciones(20, "-", 4);
                echo "$r2 </br></br>";            
                echo "los numeros pares entre 0 y el $r2 son:".($pares). "</br></br>";
                $conta = 0;
                while($conta<=$r2){
                    if ($conta%2 ==0 && $conta!=0) { #arreglado pares y eliminado el 0
                        echo $conta."</br>";
                    }
                    $conta++    ;
                }
            ?>
        </div>
        <div class="derecha">
            <?php

                $r3 = operaciones($r, "+", $r2);
                if ($r3%2==0){
                    $pares3= ($r3/2);
                }
                echo "$r3 </br></br>";
                echo "los numeros pares entre 0 y el $r3 son:".($pares3). "</br></br>";
                $conta = 0;
                while($conta<=$r3){
                    if ($conta%2 ==0 && $conta!=0) { #arreglado pares y eliminado el 0
                        echo $conta."</br>";
                    }
                    $conta++    ;
                }
            ?>
        </div>
    </div>
</body>
</html>