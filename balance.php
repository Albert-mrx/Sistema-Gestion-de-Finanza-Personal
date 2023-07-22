<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("Location:index.php");
    }
    $nombre = $_SESSION['nombre'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/reset.css">
    <!-- font icons -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css'>
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
    <!-- style -->
    <link rel="stylesheet" href="css/balance/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Balance</title>
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
        <p class="text">Balance del Mes</p>
        <div class="container">
            <div class="information">
                <div class="information__content">
                    <div class="select-container">
                        <i class="fi fi-ss-calendar calendar"></i>
                        <select class="select-container__select" id="input-select">
                            <option selected disabled>Mes</option>
                        </select>
                    </div>
                    <div class="balance">
                        <i class="fi fi-rr-chart-histogram icon-histori"></i>
                        <div class="data">
                            <p class="data__title">Ingreso total de Mes</p>
                            <span class="data__money azul">s/300,00</span>
                        </div>
                        <div class="data">
                            <p class="data__title">Gasto total de Mes</p>
                            <span class="data__money rojo">s/195,00</span>
                        </div>
                    </div>
                </div>
                <div class="grafica">
                    <div id="chart-container">
                        <canvas id="myChart"></canvas>
                    </div>
                    <!-- <div class="chart-icons">
                        <div class="char-icon">
                            <i class="fi fi-sr-restaurant icon"></i>
                            <p class="chart-text">Comida</p>
                        </div>
                        <div class="char-icon">
                            <i class="fi fi-bs-taxi icon"></i>
                            <p class="chart-text">Transporte</p>
                        </div>
                        <div class="char-icon">
                            <i class="fi fi-ss-house-chimney icon"></i>
                            <p class="chart-text">Vivienda</p>
                        </div>
                        <div class="char-icon">
                            <i class="fi fi-sr-gamepad icon"></i>
                            <p class="chart-text">Entretenimiento</p>
                        </div>
                        <div class="char-icon">
                            <i class="fi fi-br-menu-dots icon"></i>
                            <p class="chart-text">Otros</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="js/balance/chart.js"></script>
<script type="module" src="js/balance/list.js"></script>