<?php

  include_once 'database.php';
  $pdo = database();

  if ($pdo) {
    try {
      // ID del registro que deseas borrar
      $id_registro_a_borrar = $_GET['id']; // ¡Reemplaza 1 con el ID del registro que quieras borrar!
  
      // Sentencia SQL para eliminar el registro
      $sql = "DELETE FROM propiedades WHERE id = :id";
  
      // Preparar la sentencia
      $stmt = $pdo->prepare($sql);
  
      // Vincular parámetros
      $stmt->bindParam(':id', $id_registro_a_borrar, PDO::PARAM_INT);
  
      // Ejecutar la sentencia
      $stmt->execute();
  
      header('Location: user_adminPropiedades.php');
    } catch(PDOException $e) {
      echo "Error al borrar el registro: " . $e->getMessage();
      exit();
    }
  }
  else {
    echo 'Error - DB';
    exit();
  }

  
?>