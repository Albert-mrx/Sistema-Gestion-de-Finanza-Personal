<?php
require 'conexion.php';
global $connection;
$id_usu = $_SESSION['id_usuario'];

$query = "SELECT g.monto, g.forma_pago, g.fecha, c.categoria, g.nota 
          FROM gastos AS g
          JOIN categorias AS c ON g.id_categoria = c.id_categoria
          WHERE g.id_usuario = $id_usu";

$resultado = mysqli_query($connection, $query);
while ($fila = mysqli_fetch_assoc($resultado)) {
    $monto = $fila['monto'];
    $formaPago = $fila['forma_pago'];
    $fecha = $fila['fecha'];
    $categoria = $fila['categoria'];
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
        <td><?php echo $categoria; ?></td>
        <td><?php echo $nota; ?></td>
    </tr>
    <?php
}

    mysqli_free_result($resultado);
?>