<?php
require 'conexion.php'; // Incluir el archivo de conexión a la base de datos

session_start();

if (!isset($_SESSION['id_usuario'])) {
    die("Error: No se ha iniciado sesión.");
}

$idUsuario = $_SESSION['id_usuario'];

// Consulta SQL para obtener la cantidad total de gasto por categoría
$sql = "SELECT c.categoria, SUM(g.monto) AS total_gasto
        FROM gastos g
        INNER JOIN categorias c ON g.id_categoria = c.id_categoria
        WHERE g.id_usuario = $idUsuario
        GROUP BY g.id_categoria";

$resultado = $connection->query($sql);

if ($resultado->num_rows > 0) {
    $data = array();
    while ($fila = $resultado->fetch_assoc()) {
        $data[$fila['categoria']] = $fila['total_gasto'];
    }
    echo json_encode($data); // Devolver los datos en formato JSON
} else {
    echo "No se encontraron datos de gasto.";
}

// Cerrar la conexión a la base de datos
$connection->close();
?>
