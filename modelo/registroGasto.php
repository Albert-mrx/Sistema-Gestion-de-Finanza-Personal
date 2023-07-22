<?php
    session_start();
    require_once 'conexion.php';
    
    if (!isset($_SESSION['id_usuario'])) {
        header("Location: index.php");
        exit;
    }
    
    global $connection;
    $id_usu = $_SESSION['id_usuario'];
    
    $monto = $_POST['monto'];
    $forma_pago = $_POST['forma_pago'];
    $categoria = $_POST['categoria'];
    $nota = $_POST['nota'];
    $fecha = date("Y-m-d");
    
    $datab = 'db_finanzas';
    $db = mysqli_select_db($connection, $datab);
    
    if (!$db) {
        echo 'No se encontró la base de datos';
    } else {
        $mensaje_SQL = "INSERT INTO gastos(`id_gasto`, `id_usuario`, `monto`, `forma_pago`, `fecha`, `id_categoria`, `nota`) 
                       VALUES (NULL, '$id_usu', '$monto', '$forma_pago', '$fecha', '$categoria', '$nota')";
        $resultado = mysqli_query($connection, $mensaje_SQL);
    
        if ($resultado) {
            header('Location: ../gasto.php');
            exit;
        } else {
            echo 'Error al insertar el registro: ' . mysqli_error($connection);
        }
    }
    
?>
