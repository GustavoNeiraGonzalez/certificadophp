<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function operaciones ($var1, $var2, $var3){
            $resultado= 0;
            if($var2=="+"){
                $resultado= $var1 + $var3;
                echo "El resultado de: $var1 + $var3  =  ";
            }else if ($var2 == "-"){
                $resultado =$var1 - $var3;
                echo "El resultado de: $var1 - $var3 = ";
            }else if ($var2== "/"){
                $resultado= $var1 / $var3;
                echo "El resultado de $var1 / $var3 = ";
            }
            return $resultado;
        }
        $r = operaciones (12, "/", 3);
        echo "$r </br>";
        $r2 = operaciones (20, "-", 4);
        echo "$r2 </br>";
        $r3 = operaciones ($r, "+", $r2);
        echo "$r3 </br>";
    ?>
</body>
</html>