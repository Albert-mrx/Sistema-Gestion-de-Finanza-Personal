<?php
  require 'modelo/conexion.php';
  session_start();
  if ($_POST) {
      $email = $_POST['email'];
      $password = $_POST['password'];
  
      // Utilizamos una consulta preparada para mayor seguridad
      $stmt = $connection->prepare("SELECT id_usuario, nombre, password, foto_perfil FROM usuarios WHERE correo = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $resultado = $stmt->get_result();
      $num = $resultado->num_rows;
  
      if ($num > 0) {
          $row = $resultado->fetch_assoc();
          $password_bd = $row['password'];
          if ($password_bd == $password) {
              $_SESSION['nombre'] = $row['nombre'];
              $_SESSION['id_usuario'] = $row['id_usuario'];
              $_SESSION['foto_perfil'] = $row['foto_perfil'];
  
              header('Location:inicio.php');
              exit;
          } else {
              echo "la contraseña no coincide";
          }
      } else {
          echo "no existe usuario";
      }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login/login.css">
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
    <title>Login</title>
</head>
<body>
    <main>
    <div class="loginForm">
  <picture class="picture">
    <img src="recursos/img/banner.jpg" alt="banner" class="image">
  </picture>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form" onsubmit="return validarFormulario()">
    <p class="form__title">¡Bienvenido al Sistema!</p>
    <div class="form__inputs">
      <input type="email" name="email" id="email" placeholder="Correo electrónico" required>
      <label id="emailError" class="errorLabel"></label>
      <input type="password" name="password" id="pass" placeholder="Contraseña" required>
      <label id="passwordError" class="errorLabel"></label>
    </div>
    <div class="form__cta">
      <input type="checkbox" id="showPassword">
      <label for="showPassword">Mostrar contraseña</label>
    </div>
    <input type="submit" value="Ingresar" class="form__btn">
    <div class="form__cta-user">
      <a href="registrarse.php">¿Aún no tienes una cuenta?</a>
    </div>
  </form>
</div>
    </main>
</body>
</html>
<script src="js/login/pass.js"></script>
<script src="js/login/validacion.js"></script>