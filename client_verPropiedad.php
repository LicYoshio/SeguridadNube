<?php declare(strict_types = 1);
  include_once 'database.php';  
  $pdo = database();

  $propiedadVisitar = $_GET['id'];

  $sql = "SELECT propiedades.nombre, propiedades.precio, propiedades.ubicacion, propiedades.baños, propiedades.cuartos, propiedades.estacionamiento, propiedades.metros_cuadrados, usuarios.nombre as 'username', usuarios.correo, usuarios.telefono FROM propiedades LEFT JOIN usuarios ON propiedades.propietario_id = usuarios.id WHERE propiedades.id = $propiedadVisitar;";

  $stmt = $pdo->prepare($sql);  
  // Ejecutar la consulta
  $stmt->execute();
  // Obtener todas las filas como un arreglo asociativo
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienes Raices MTY - All Property</title>
</head>
<body>
  <!-- Title -->
  <h1>Todas las Propiedades disponibles</h1>

  <!-- Break -->
  <hr>

  <!-- User Nav -->
  <?php include_once 'nav.php'; ?>

  <!-- Break -->
  <hr>

  <main>

    <h2><?php echo $row['nombre']; ?></h2>

    <h3>Informacion de la propiedad</h3>
    <p><b>Precio:</b> <?php echo $row['precio']; ?></p>
    <p><b>Ubicacion:</b> <?php echo $row['ubicacion']; ?></p>
    <p><b>Baños:</b> <?php echo $row['baños']; ?></p>
    <p><b>Cuartos:</b> <?php echo $row['cuartos']; ?></p>
    <p><b>Estacionamiento:</b> <?php echo $row['estacionamiento']; ?></p>
    <p><b>Metros cuadrados:</b> <?php echo $row['metros_cuadrados']; ?></p>

    <h3>Informacion del Propietario</h3>
    <p><b>Propietario:</b> <?php echo $row['username']; ?></p>
    <p><b>Propietario:</b> <?php echo $row['correo']; ?></p>
    <p><b>Propietario:</b> <?php echo $row['telefono']; ?></p>

    <a href="client_propiedades.php">Regresar</a>

  </main>
</body>
</html>