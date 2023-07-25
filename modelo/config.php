<?php
// Incluye el archivo de conexión a la base de datos
require_once 'conexion.php';

// Inicia o reanuda la sesión


// Verifica si el usuario ha iniciado sesión; si no, redirígelo a la página de inicio de sesión
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
}

// Obtiene el ID de usuario desde la sesión
$user_id = $_SESSION['id_usuario'];

// Función para obtener los datos del usuario desde la base de datos
function obtenerDatosUsuario($connection, $user_id) {
    $sql = "SELECT nombre, correo, password FROM usuarios WHERE id_usuario = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

// Función para actualizar los datos del usuario en la base de datos
function actualizarUsuario($connection, $user_id, $nombre, $correo, $password) {
    // No hashing of the password here
    // Determine if the password field is empty to decide whether to update it
    if (empty($password)) {
        $sql = "UPDATE usuarios SET nombre = ?, correo = ? WHERE id_usuario = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssi", $nombre, $correo, $user_id);
    } else {
        $sql = "UPDATE usuarios SET nombre = ?, correo = ?, password = ? WHERE id_usuario = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssi", $nombre, $correo, $password, $user_id);
    }

    if ($stmt->execute()) {
        // Actualización exitosa, actualiza el nombre en la sesión también
        $_SESSION['nombre'] = $nombre;
        return true;
    } else {
        return false;
    }
}

// Obtiene los datos del usuario desde la base de datos
$datosUsuario = obtenerDatosUsuario($connection, $user_id);

if (!$datosUsuario) {
    echo "Error: Usuario no encontrado.";
}

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];

    // Actualiza los datos del usuario en la base de datos
    if (actualizarUsuario($connection, $user_id, $nombre, $correo, $password)) {
        // Actualización exitosa, puedes redirigir al usuario o mostrar un mensaje de éxito
        header('Location: ./inicio.php');
    } else {
        echo "Error al actualizar el usuario.";
    }
}
?>
