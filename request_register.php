<?php declare(strict_types = 1); 

  include_once 'database.php';
  $pdo = database();

  if ($pdo) {
    // Datos a insertar
    $nombre = $_POST['name'];
    $correo = $_POST['email'];
    $telefono = $_POST['cellphone'];
    $contrasena = $_POST['pwd'];

    $contrasenaHasheada = password_hash($contrasena, PASSWORD_DEFAULT);
    try {
        // Consulta SQL para insertar datos
        $sql = "INSERT INTO usuarios (nombre, correo, telefono, contraseña) VALUES (:nombre, :correo, :telefono, :contrasena)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':contrasena', $contrasenaHasheada);

        // Ejecutar la consulta
        $stmt->execute();

        session_start();
        $_SESSION['user'] = $correo;
        $_SESSION['user_auth'] = true;

        header('Location: index.php');
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