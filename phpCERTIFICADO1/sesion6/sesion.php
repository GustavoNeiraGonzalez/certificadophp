<?php
session_start();
if (!isset($_SESSION['activo']) || !$_SESSION['activo']) {
    die("Acceso denegado. Debes iniciar sesión.");
}

echo "Bienvenido, usuario: " . $_SESSION['usuario'];
?>

