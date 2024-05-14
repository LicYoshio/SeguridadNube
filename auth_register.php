<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienes Raices MTY - Register</title>
</head>
<body>
  <!-- Title -->
  <h1>Registrate en Bienes Raices MTY</h1>
  <p>Crea y/o compra propiedades una vez que te hayas registrado</p>

  <!-- Break -->
  <hr> 

  <!-- User Nav -->
  <?php include_once 'nav.php'; ?>

  <!-- Break -->
  <hr>

  <main>
    <h2>Registrate</h2>

    <form action="request_register.php" method="post">
      <div>
        <label for="name">Ingresa tu nombre: </label>
        <input type="text" name="name" id="name" required>
      </div>
      <br>
      <div>
        <label for="email">Ingresa tu correo: </label>
        <input type="email" name="email" id="email" required>
      </div>
      <br>
      <div>
        <label for="cellphone">Ingresa tu telefono: </label>
        <input type="tel" name="cellphone" id="cellphone" maxlength="10" required>
      </div>
      <br>
      <div>
        <label for="pwd">Crea tu contraseña: </label>
        <input type="password" name="pwd" id="pwd" required>
      </div>
      <br>
      <input type="submit" value="Registrate">
    </form>
  </main>
</body>
</html>