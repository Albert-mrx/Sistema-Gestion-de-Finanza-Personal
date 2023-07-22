<?php
    require 'conexion.php';
    //obtencion de categorias
    // Consulta para obtener las categorías
    $sql = "SELECT id_categoria,categoria FROM categorias";
    $result = $conn->query($sql);

    // Obtener las categorías en un arreglo asociativo
    $categorias = [];
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }

    $conn->close();

    // Devolver las categorías como JSON
    header('Content-Type: application/json');
    echo json_encode($categorias);
?>