<?php

    echo "hola mundo!";
    $nombre = "tavo";
    $dinero = 5;
    $altura = 1.70;
    $chileno = true;
    #variables para operaciones
    $a = 8;
    $b = 4;

    #suma
    echo $a+$b;
    #resta
    echo $a-$b;
    #multiplicacion
    echo $a * $b;
    #division
    echo $a / $b;
    #resto o modulo
    #el resto o módulo es simplemente lo que sobra después de dividir dos números
    # usos: -al divir con % un numero por 2 se sabra si es impar o par si el resultado es 0
    #       -encontrar multiplos si $a % $b == 0 entonces es multiplo
    #       - El módulo también se usa en algoritmos que necesitan hacer cálculos 
    #       cíclicos (por ejemplo, cuando se necesita acceder a un índice en una lista 
    #       que vuelve al principio cuando llega al final).
 
    echo $a % $b;
?>