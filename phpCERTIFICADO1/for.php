<?php
    for ($numeros=0; $numeros<10; $numeros++){
        echo "numeros for:".($numeros+1)."</br>";
    }
    $numeros=0;
    while($numeros<10){
        echo "numeros while: ".$numeros."</br>";
        $numeros++;
    }
    $numeros=0;
    do{
        echo "numeros do while: ".$numeros."</br>";
        $numeros++;
    }while($numeros <10);
?>