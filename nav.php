<?php declare(strict_types = 1); 
  !isset($_SESSION) ? session_start() : '';
?>

<nav>
  <h2>Navegacion</h2>

  <h3>Navegacion General</h3>
  <ul>
    <li>
      <a href="index.php">Inicio</a>
    </li>

    <!-- Si no ha iniciado sesion no puede ver estas opciones -->
    <?php if (isset($_SESSION['user']) && isset($_SESSION['user_auth'])) : ?>
      <li>
        <a href="user_venderPropiedades.php">Vender propiedad</a>
      </li>
      <li>
        <a href="user_adminPropiedades.php">Administrar mis propiedades</a>
      </li>
    <?php endif ?>

    <li>
      <a href="client_propiedades.php">Ver todas las propiedades</a>
    </li>
  </ul>

  <h3>Navegacion de Usuarios</h3>
  <ul>
    <?php if (isset($_SESSION['user']) && isset($_SESSION['user_auth'])) : ?>
      <li>
        <a href="/auth_logout.php">Cerrar Sesion</a>
      </li>
    <?php else : ?>
      <li>
        <a href="auth_register.php">Crear Cuenta</a>
      </li>
      <li>
        <a href="auth_login.php">Iniciar Sesion</a>
      </li>
    <?php endif ?>
  </ul>
</nav>