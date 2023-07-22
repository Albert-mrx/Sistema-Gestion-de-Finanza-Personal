<?php

    // Obtener el valor seleccionado del formulario
    $categoriaSeleccionada = $_POST['categoria'];

    // Realizar la conexión a la base de datos y ejecutar la consulta
    $conexion = mysqli_connect("nombre_servidor", "usuario", "contraseña", "nombre_base_datos");
    $consulta = "SELECT * FROM gastos WHERE id_categoria = $categoriaSeleccionada";
    $resultado = mysqli_query($conexion, $consulta);

    // Mostrar los resultados en una tabla
    echo '<table>';
    echo '<tr><th>ID Gasto</th><th>ID Usuario</th><th>Monto</th><th>Forma de Pago</th><th>Fecha</th><th>ID Categoría</th><th>Nota</th></tr>';

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<tr>';
        echo '<td>' . $fila['id_gasto'] . '</td>';
        echo '<td>' . $fila['id_usuario'] . '</td>';
        echo '<td>' . $fila['monto'] . '</td>';
        echo '<td>' . $fila['forma_pago'] . '</td>';
        echo '<td>' . $fila['fecha'] . '</td>';
        echo '<td>' . $fila['id_categoria'] . '</td>';
        echo '<td>' . $fila['nota'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

?>