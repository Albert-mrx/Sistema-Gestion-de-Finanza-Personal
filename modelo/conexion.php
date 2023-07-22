<?php
    $user = 'root';
    $pass = '';
    $host = 'localhost';
    $dbName = 'db_finanzas'; // Reemplaza 'nombre_base_datos' por el nombre de tu base de datos

    $connection = mysqli_connect($host, $user, $pass, $dbName);
    if (!$connection) {
        echo 'No se pudo hacer la conexión: ' . mysqli_connect_error();
    } else {
        mysqli_select_db($connection, $dbName);
    }
?>