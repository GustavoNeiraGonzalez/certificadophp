<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$a=5;
$b=7;
$result=($a<=5 & $b<>7); #si A es menor o igual a 5 y b NO es igual a 7
if($result==true){
    echo "Se cumple la condición";
}else{
    echo "No se cumple la condición </br>";
    if ($a>5){
        echo "$a A es mayor a 5 INCORRECTO";
    }
    if($b === 7){
        echo "$b b no es diferente a 7 INCORRECTO";
    }
}
?>
</body>
</html>


