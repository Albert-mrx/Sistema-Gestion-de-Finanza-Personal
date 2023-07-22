<?php
require 'conexion.php';
global $connection;

$id_usu = $_SESSION['id_usuario'];

$query = "SELECT i.monto, i.forma_pago, i.fecha, i.nota 
          FROM ingresos AS i
          JOIN usuarios AS u ON i.id_usuario = u.id_usuario
          WHERE i.id_usuario = '$id_usu'";

$resultado = mysqli_query($connection, $query);
while ($fila = mysqli_fetch_assoc($resultado)) {
    $monto = $fila['monto'];
    $formaPago = $fila['forma_pago'];
    $fecha = $fila['fecha'];
    $nota = $fila['nota'];
    
    $fechaDateTime = new DateTime($fecha);
    $locale = Locale::getDefault();
    $formatter = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::NONE);
    $fechaFormateada = $formatter->format($fechaDateTime);

    ?>
    <tr>
        <td>s/.<?php echo $monto; ?></td>
        <td><?php echo $formaPago; ?></td>
        <td><?php echo $fechaFormateada; ?></td>
        <td><?php echo $nota; ?></td>
    </tr>
    <?php
}

mysqli_free_result($resultado);
?>
