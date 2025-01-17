<!-- Conexión a la base de datos,
codificación de caracteres,
seleccion de base de datos. -->
<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'gestion_bodega';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
       
  } catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
  }

  ?>