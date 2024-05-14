<?php declare(strict_types = 1);
  include_once 'database.php';  
  $pdo = database();

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
    
  $sql2 = "SELECT propiedades.nombre, propiedades.precio, propiedades.ubicacion, usuarios.nombre as 'username', propiedades.id FROM propiedades LEFT JOIN usuarios ON propiedades.propietario_id = usuarios.id WHERE propiedades.propietario_id = $propietario_id;";

  $stmt2 = $pdo->prepare($sql2);  
  // Ejecutar la consulta
  $stmt2->execute();
  // Obtener todas las filas como un arreglo asociativo
  $rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienes Raices MTY - Admin Property</title>
</head>
<body>
  <!-- Title -->
  <h1>Administrar Propiedades</h1>
  <p>!Administra tus porpiedades desde aqui¡</p>

  <!-- Break -->
  <hr>

  <!-- User Nav -->
  <?php include_once 'nav.php'; ?>

  <!-- Break -->
  <hr>

  <main>
    <h2>Tus Propiedades</h2>

    <ul>
      <?php foreach ($rows as $row) : ?>
      <li>
        <h3><?php echo $row['nombre']; ?></h3>
        <p><b>Precio:</b> <?php echo $row['precio']; ?></p>
        <p><b>Ubicacion:</b> <?php echo $row['ubicacion']; ?></p>
        <p><b>Propietario:</b> <?php echo $row['username']; ?></p>

        <a href="client_verPropiedad.php?id=<?php echo $row['id']?>">Ver más informacion</a>
        <form action="request_adminPropiedades.php?id=<?php echo $row['id']?>" method="post" style="margin-top: 10px;">
          <input type="submit" value="Eliminar propiedad" style="color: red;">
        </form>
      </li>
      <br>
      <?php endforeach ?>
    </ul>
  </main>
</body>
</html>