<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienes Raices MTY - Login</title>
</head>
<body>
  <!-- Title -->
  <h1>Inicia Sesion en Bienes Raices MTY</h1>
  <p>Crea y/o compra propiedades una vez que hayas iniciado sesion</p>

  <!-- Break -->
  <hr> 

  <!-- User Nav -->
  <?php include_once 'nav.php'; ?>

  <!-- Break -->
  <hr>

  <main>
    <h2>Inicar Sesion</h2>

    <form action="request_login.php" method="post">
      <div>
        <label for="email">Ingresa tu correo: </label>
        <input type="email" name="email" id="email" required>
      </div>
      <br>
      <div>
        <label for="pwd">Ingresa tu contraseña: </label>
        <input type="password" name="pwd" id="pwd" required>
      </div>
      <br>
      <input type="submit" value="Iniciar Sesion">
    </form>
  </main>
</body>
</html>