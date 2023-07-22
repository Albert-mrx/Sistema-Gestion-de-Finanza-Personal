<?php
require 'conexion.php';

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperar los datos del formulario
    $nombreUsuario = $_POST["username"];
    $correo = $_POST["email"];
    $password = $_POST["password"];

    // Verificar si se cargó una foto de perfil
    $fotoPerfil = "usuario.jpg"; // Valor por defecto
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        // Guardar la foto de perfil en una ubicación temporal
        $tempFile = $_FILES["file"]["tmp_name"];

        // Generar un nombre único para la foto de perfil
        $fotoPerfil = "users" . time() . ".jpg"; // Aquí asumimos que la foto es un archivo de tipo JPEG

        // Mover la foto de perfil a su ubicación final
        move_uploaded_file($tempFile, "../fotos/" . $fotoPerfil);
    }

    // Consulta SQL para insertar el nuevo usuario en la tabla "usuarios"
    $sql = "INSERT INTO usuarios (nombre, correo, password, foto_perfil)
            VALUES ('$nombreUsuario', '$correo', '$password', '$fotoPerfil')";

    if ($connection->query($sql) === TRUE) {
        // Redireccionar a la ventana de registro exitoso
        header("Location: registroExitoso.php");
        exit(); // Terminar el script para asegurar que no se realicen más acciones después de la redirección.
    } else {
        echo "Error al crear el usuario: " . $connection->error;
    }

    // Cerrar la conexión a la base de datos
    $connection->close();
}
?>
