<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("Location:index.php");
    }
    $nombre = $_SESSION['nombre'];
    $fotoPerfil = $_SESSION['foto_perfil']; 
    $rutaFotoPerfil = "fotos/" . $fotoPerfil;
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
    <link rel="stylesheet" href="css/ingresos/ingreso.css">
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
    <title>Ingreso</title>
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
                    <a href="configuracion.php" class="list__link">
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
                    <img src="<?php echo $rutaFotoPerfil;?>" alt="" class="image">
                </div>
                <a href="modelo/logout.php" class="user__link"><i class="fi fi-rr-sign-out-alt exit"></i></a>
            </div>
        </div>
        <section class="spend">
            <p class="spend__title">INGRESOS</p>
            <div class="btn-container">
                <button class="btn-container__btn" id="openModalBtn">
                    <i class="fi fi-rr-plus btn-add"></i>
                    <p>Agregar nuevo Ingreso</p>
                </button>
                <!-- modal -->
                <div id="Modal" class="modal">
                    <div class="modal-content">
                      <span class="close">&times;</span>
                      <h2 class="modal__title">Agregar nuevo Ingreso</h2>
                      <form class="modal__form" onsubmit="return validateForm()" action="./modelo/registroIngreso.php" method="POST">
                            <div class="input">
                                <span>s/</span>
                                <input type="text" id="montoInput" placeholder="Monto" required name="monto">
                            </div>
                            <div class="input">
                                <span><i class="fi fi-rr-handshake"></i></span>
                                <input type="text" id="formaPagoInput" placeholder="Forma de pago" name="forma_pago" required>
                            </div>
                            <div class="input-note">
                                <label for="note">Nota</label>
                                <textarea id="note" cols="30" rows="10" class="textarea" name="nota" required></textarea>
                            </div>
                            <input type="submit" value="Añadir" class="modal-btn-add">
                      </form>
                    </div>
                </div>
            </div>
            <!-- tabla ingreso -->
            <div class="table-container">
                <div class="container">
                    <div class="table-container__information">
                        <i class="fi fi-sr-coins table-container__gast-img"></i>
                        <div class="table-container__texts">
                            <p>Total de Ingresos</p>
                            <p class="text">+<span>S/</span><?php require 'modelo/totalIngreso.php' ?></p>
                        </div>
                    </div>
                    <div class="table-container__cta">
                        <p>Filtrar</p>
                        <select class="select-container" id="input-select">
                            <option selected disabled>Mes</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                </div>
                <div class="table-container__table">
                    <table class="table table-dark table-striped">
                        <thead>
                            <th>Monto</th>
                            <th>Forma de pago</th>
                            <th>Fecha</th>
                            <th>Nota</th>
                        </thead>
                        <tbody id="gastos-table-body">
                            <?php require 'modelo/tableIngreso.php'?>
                            <!-- modal2 -->
                            <div id="Modals" class="modal">
                                <div class="modal-content">
                                    <span class="closer">&times;</span>
                                    <h2 class="modal__title">Agregar nuevo Ingreso</h2>
                                    <form class="modal__form" onsubmit="return validateForm()" action="./modelo/registroIngreso.php" method="POST">
                                            <div class="input">
                                                <span>s/</span>
                                                <input type="text" id="montoInput" placeholder="Monto" required name="monto">
                                            </div>
                                            <div class="input">
                                                <span><i class="fi fi-rr-handshake"></i></span>
                                                <input type="text" id="formaPagoInput" placeholder="Forma de pago" name="forma_pago" required>
                                            </div>
                                            <div class="input-note">
                                                <label for="note">Nota</label>
                                                <textarea id="note" cols="30" rows="10" class="textarea" name="nota" required></textarea>
                                            </div>
                                            <input type="submit" value="Añadir" class="modal-btn-add">
                                    </form>
                                </div>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
<script src="js/ingreso/valida.js"></script>
<script src="js/ingreso/modal.js"></script>


