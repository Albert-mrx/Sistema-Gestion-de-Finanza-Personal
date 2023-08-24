<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/registro/registro.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=B612&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=B612:ital@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=B612:wght@700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <title>Registrate</title>
</head>
<body>
   <main>
        <a href="login.php" class="btn-regresar"><i class="fi fi-rr-angle-circle-left"></i></a>
        <div class="registro">
            <form action="./modelo/registroUsuario.php" class="form" method="post"enctype="multipart/form-data">
                <p class="form__title">¡Crea una cuenta Gratis!</p>
                <div class="form__inputs">
                    <input type="text" name="username" placeholder="nombre de usuario" required>
                    <input type="email" name="email" id="email" placeholder="Correo electrónico" required>
                    <label id="emailError" class="errorLabel"></label>
                    <input type="password" name="password" id="pass" placeholder="Contraseña" required>
                    <label id="passwordError" class="errorLabel"></label>
                    <div class="form__cta">
                        <input type="checkbox" id="showPassword" class="showpass">
                        <label for="showPassword">Mostrar contraseña</label>
                    </div>
                    <div class="drag-area">
                        <i class="fi fi-tr-cloud-upload-alt"></i>
                        <p class="drag-area__title">Arrastra y suelta un archivo</p>
                        <span class="subtext">o</span>
                        <button type="button"class="drag-area__btn">selecciona tus archivos</button>
                        <input type="file" name="file" id="input-file" class="drag-area__file" hidden multiple="false">
                    </div>
                    <div class="preview">
                        
                    </div>
                <input type="submit" value="Registrarse" class="form__btn">
            </form>
        </div>
   </main>
</body>
</html>
<script src="js/registro/showpass.js"></script>
<script src="js/registro/valid.js"></script>
<script src="js/registro/file.js"></script>
