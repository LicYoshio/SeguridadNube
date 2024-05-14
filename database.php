<?php declare(strict_types = 1); 

  function database() {
    // Datos de conexión
    $hostname = 'bienesraicessn-server';
    $port = '3306';
    $dbname = 'bienesraicessn-database';
    $username = 'nqzqfankng';
    $password = 'UQKVHtK$xOXU4mNW';

    // Intentar conectarse a la base de datos
    try {
        $dsn = "mysql:host=$hostname;port=$port;dbname=$dbname";
        $pdo = new PDO($dsn, $username, $password);
        
        // Configurar el modo de error para que PDO lance excepciones en caso de error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $pdo;
    } catch (PDOException $e) {
        // En caso de error, mostrar el mensaje de error
        // echo "Error de conexión: " . $e->getMessage();
        return $pdo;
    }
  }

?>