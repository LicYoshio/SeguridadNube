<?php declare(strict_types = 1); 

  include_once 'database.php';
  $pdo = database();

  if ($pdo) {
    // Datos a insertar
    $nombre = $_POST['name'];
    $precio = (float)$_POST['price'];
    $ubicacion = $_POST['location'];
    $baños = (int)$_POST['restroom'];
    $cuartos = (int)$_POST['bedrooms'];
    $estacionamiento = (int)$_POST['parkingSlot'];
    $metros_cuadrados = (float)$_POST['squardMeter'];
    $propietario_id = "";

    try
    {
      session_start();
      $correo_usuario = $_SESSION['user'];

      // Consulta SQL para obtener el ID por correo electrónico
      $sql = "SELECT id FROM usuarios WHERE correo = :correo";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':correo', $correo_usuario);
      // Ejecutar la consulta
      $stmt->execute();
      // Obtener el ID y guardarlo en una variable
      $propietario_id = (int)$stmt->fetchColumn();
    }
    catch (PDOException $e) {
      echo "Error al obtener el id: " . $e->getMessage();
      exit();
    }

    try {
        // Consulta SQL para insertar datos en la tabla
        $sql2 = "INSERT INTO propiedades (nombre, precio, ubicacion, propietario_id, baños, cuartos, estacionamiento, metros_cuadrados) VALUES (:nombre, :precio, :ubicacion, :propietario_id, :banos, :cuartos, :estacionamiento, :metros_cuadrados)";

        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':nombre', $nombre);
        $stmt2->bindParam(':precio', $precio);
        $stmt2->bindParam(':ubicacion', $ubicacion);
        $stmt2->bindParam(':propietario_id', $propietario_id);
        $stmt2->bindParam(':banos', $baños);
        $stmt2->bindParam(':cuartos', $cuartos);
        $stmt2->bindParam(':estacionamiento', $estacionamiento);
        $stmt2->bindParam(':metros_cuadrados', $metros_cuadrados);

        // Ejecutar la consulta
        $stmt2->execute();
        header('Location: user_adminPropiedades.php');
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