<?php

require 'conexion.php';

// Obtén el id_usuario del usuario que ha iniciado sesión.
session_start();
$id_usuario = $_SESSION['id_usuario'];

// Función para obtener la cantidad total de ingreso del usuario.
function getTotalIngreso($connection, $id_usuario) {
    $query = "SELECT SUM(monto) as total FROM ingresos WHERE id_usuario = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('i', $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    return $data['total'];
}

// Función para obtener la cantidad total de gasto del usuario.
function getTotalGasto($connection, $id_usuario) {
    $query = "SELECT SUM(monto) as total FROM gastos WHERE id_usuario = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('i', $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    return $data['total'];
}
function getPresupuesto() {
    return 500;
}
// Establecer el charset para evitar problemas con acentos y caracteres especiales.
$connection->set_charset('utf8');

// Obtener la cantidad total de ingreso y gasto del usuario.
$totalIngreso = getTotalIngreso($connection, $id_usuario);
$totalGasto = getTotalGasto($connection, $id_usuario);

$presupuesto = getPresupuesto();
// Cerrar la conexión a la base de datos.
$connection->close();

// Crea un array para almacenar los datos.
$data = [
    'totalIngreso' => $totalIngreso,
    'totalGasto' => $totalGasto,
    'presupuesto' => $presupuesto
];

// Devuelve los datos en formato JSON.
header('Content-Type: application/json');
echo json_encode($data);
?>
