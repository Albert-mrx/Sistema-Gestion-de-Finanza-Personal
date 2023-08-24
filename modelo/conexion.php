<?php
    $user = 'root';
    $pass = '';
    $host = 'localhost';
    $dbName = 'db_finanzas';

    $connection = mysqli_connect($host, $user, $pass, $dbName);
    if (!$connection) {
        echo 'No se pudo hacer la conexión: ' . mysqli_connect_error();
    } else {
        mysqli_select_db($connection, $dbName);
    }
?>