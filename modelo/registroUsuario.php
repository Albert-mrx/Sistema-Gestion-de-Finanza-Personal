<?php
require 'conexion.php';

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperar los datos del formulario
    $nombreUsuario = $_POST["username"];
    $correo = $_POST["email"];
    $password = $_POST["password"];
    $fotoPerfil = $_POST["file"];
    // Verificar si se cargó una foto de perfil
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        // Si se cargó una foto, procede a guardarla en el servidor
        $tempFile = $_FILES["file"]["tmp_name"];
        $fotoPerfil = "users" . time() . ".jpg"; // Nombre único para la foto de perfil
        move_uploaded_file($tempFile, "../fotos/" . $fotoPerfil);
    }else{
        $fotoPerfil = "fotos/usuario1.jpg";
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
