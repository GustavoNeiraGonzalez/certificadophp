<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'registro_usuarios';

try {
  $conn= new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    
    echo "conexión realizada exitosamente </br>"; #texto que solo se muestra despues de que conn sea ejecutado exitosamente

  } catch (PDOException $e) { #excepcion para manejar error y mostrarlo
    die('La conexión ha fallado: ' . $e->getMessage());
  }

    ?>