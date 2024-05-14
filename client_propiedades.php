<?php declare(strict_types = 1);
  include_once 'database.php';  
  $pdo = database();

  $sql = "SELECT propiedades.nombre, propiedades.precio, propiedades.ubicacion, usuarios.nombre as 'username', propiedades.id FROM propiedades LEFT JOIN usuarios ON propiedades.propietario_id = usuarios.id;";

  $stmt = $pdo->prepare($sql);  
  // Ejecutar la consulta
  $stmt->execute();
  // Obtener todas las filas como un arreglo asociativo
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <ul>
      <?php foreach ($rows as $row) : ?>
      <li>
        <h3><?php echo $row['nombre']; ?></h3>
        <p><b>Precio:</b> <?php echo $row['precio']; ?></p>
        <p><b>Ubicacion:</b> <?php echo $row['ubicacion']; ?></p>
        <p><b>Propietario:</b> <?php echo $row['username']; ?></p>
        <a href="client_verPropiedad.php?id=<?php echo $row['id']?>">Ver más informacion</a>
      </li>
      <br>
      <?php endforeach ?>
    </ul>
  </main>
</body>
</html>