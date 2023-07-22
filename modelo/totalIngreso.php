<?php
$id_usu = $_SESSION['id_usuario'];
require_once 'conexion.php';
global $connection; 

$query = "SELECT SUM(monto) AS total FROM ingresos WHERE id_usuario = '$id_usu'";
$resultado = mysqli_query($connection, $query);
$fila = mysqli_fetch_assoc($resultado);
$totalIngresos = $fila['total'];
mysqli_free_result($resultado);

// Formatear el total de ingresos como moneda con dos decimales y separador de miles
$totalIngresosFormateado = number_format($totalIngresos, 2);

echo $totalIngresosFormateado;
?>
