<?php declare(strict_types = 1); 

  include_once 'database.php';
  $pdo = database();

  if ($pdo) {
    // Datos a insertar
    $correo = $_POST['email'];
    $contrasena = $_POST['pwd'];

    try {
      // Consulta SQL para obtener la contraseña del usuario a partir del correo
      $sql = "SELECT contraseña FROM usuarios WHERE correo = :correoUsuario";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':correoUsuario', $correo);
      $stmt->execute();

      // Obtener la contraseña del resultado de la consulta
      $resultado = $stmt->fetch();
      $contrasenaUsuarioAlmacenada = $resultado['contraseña'];

      if (password_verify($contrasena, $contrasenaUsuarioAlmacenada)) {
        session_start();
        $_SESSION['user'] = $correo;
        $_SESSION['user_auth'] = true;

        header('Location: index.php');
      } else {
          echo "¡La contraseña es incorrecta, vuelve a intentarlo!";
      }
    } catch (PDOException $e) {
      echo "Error al insertar datos: " . $e->getMessage();
      exit();
    }
  }
  else {
    echo 'Error - DB';
    exit();
  }

?>