<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("Location:index.php");
    }
    $nombre = $_SESSION['nombre'];
    require_once 'modelo/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="css/gasto/mobile.css">
    <link rel="stylesheet" href="css/gasto/style.css">
    <link rel="stylesheet" href="css/configuracion/configura.css">
    <!-- font icons -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=B612&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=B612:ital@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=B612:wght@700&display=swap" rel="stylesheet">
    <!----  -->
    <title>Gasto</title>
</head>
<body>
    <header>
        <nav class="navcontainer">
            <div class="logo">
                <figure class="logo__icon">
                    <i class="fi fi-tr-money logo__img"></i>
                </figure>
                <p class="logo__text">Control de Datos</p>
            </div>
            <span class="navcontainer__line"></span>
            <ul class="list">
                <span class="list__title">Home</span>
                <li class="list__item">
                    <a href="./inicio.php" class="list__link">
                        <i class="fi fi-sr-dashboard list__img"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <span class="list__title">Finanzas</span>
                <li class="list__item">
                    <a href="./ingreso.php" class="list__link">
                        <i class="fi fi-sr-coins list__img"></i>
                        <p>ingresos</p>
                    </a>
                </li>
                <li class="list__item">
                    <a href="./gasto.php" class="list__link">
                        <i class="fi fi-sr-hand-holding-usd list__img"></i>
                        <p>Gastos</p>
                    </a>
                </li>
                <li class="list__item">
                    <a href="./balance.php" class="list__link">
                        <i class="fi fi-rr-chart-histogram list__img"></i>
                        <p>Balance</p>
                    </a>
                </li>
                <span class="list__title">Otros</span>
                <li class="list__item">
                    <a href="#" class="list__link">
                        <i class="fi fi-br-gears list__img"></i>
                        <p>Configuracion</p>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="head-container">
            <div class="user">
                <p class="user__name"><?php echo $nombre;?></p>
                <div class="user__img">
                    <img src="recursos/img/usuario1.jpg" alt="" class="image">
                </div>
                <a href="modelo/logout.php" class="user__link"><i class="fi fi-rr-sign-out-alt exit"></i></a>
            </div>
        </div>
        <div class="configuracion">
    <div class="configuracion__title">
        <p>Editar Perfil</p>
        <figure class="img-container">
            <!-- Tu imagen de perfil -->
            <img src="recursos/img/usuario1.jpg" alt="foto del perfil">
            <div class="configuracion__icon">
                <i class="fi fi-sr-camera"></i>
            </div>
        </figure>
    </div>
    <form  class="form" method="POST">
        <div class="form__data">
            <div class="form__input">
                <label for="nombre">Nombre de usuario</label>
                <!-- Rellena el campo de entrada con el nombre actual del usuario -->
                <input type="text" name="nombre" id="name"value="<?php echo $datosUsuario['nombre']; ?>"required readonly>
            </div>
            <div class="form__input">
                <label for="correo">Correo</label>
                <!-- Rellena el campo de entrada con el correo electrónico actual del usuario -->
                <input type="email" name="correo" id="email" value="<?php echo $datosUsuario['correo']; ?>"required readonly>
            </div>
        </div>
        <div class="passwor">
            <div class="form__pass">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="pass" value="<?php echo $datosUsuario['password'];?>" required readonly>
            </div>
            <div class="form__pass">
                <label for="confirm_password">Confirmar Contraseña</label>
                <input type="password" name="confirm_password" id="confirm_pass" required readonly>
            </div>
            <div class="form__cta">
                <input type="checkbox" id="showPassword">
                <label for="showPassword">Mostrar contraseñas</label>
            </div>
            <div id="error-message"></div>
        </div>
        <div class="form__btns">
            <input type="button" id="editButton" value="Editar">
            <input type="submit" value="Guardar" id="submitButton" style="display: none;">
        </div>
    </form>
</div>
    </main>
</body>
</html>
<script src="./js/configuracion/showpass.js"></script>