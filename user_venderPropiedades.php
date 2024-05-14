<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienes Raices MTY - Sell Property</title>
</head>
<body>
  <!-- Title -->
  <h1>Vender una propiedad</h1>
  <p>!Publica tu propiedad para que todos lo vean¡</p>

  <!-- Break -->
  <hr> 

  <!-- User Nav -->
  <?php include_once 'nav.php'; ?>

  <!-- Break -->
  <hr>

  <main>
    <h2>Propiedad a la venta</h2>

    <form action="request_venderPropiedades.php" method="post">
      <div>
        <label for="name">Ingresa el nombre de la propiedad: </label>
        <input type="text" name="name" id="name" required>
      </div>
      <br>
      <div>
        <label for="price">Ingresa el precio de la propiedad: </label>
        <input type="number" name="price" id="price" required>
      </div>
      <br>
      <div>
        <label for="location">Ingresa la ubicacion de la propiedad: </label>
        <input type="text" name="location" id="location" required>
      </div>
      <br>
      <div>
        <label for="restroom">Ingresa la cantidad de baños: </label>
        <input type="number" name="restroom" id="restroom" required>
      </div>
      <br>
      <div>
        <label for="bedrooms">Ingresa la cantidad de cuartos: </label>
        <input type="number" name="bedrooms" id="bedrooms" required>
      </div>
      <br>
      <div>
        <label for="parkingSlot">Ingresa la cantidad de estacionamientos: </label>
        <input type="number" name="parkingSlot" id="parkingSlot" required>
      </div>
      <br>
      <div>
        <label for="squardMeter">Ingresa los metros_cuadrados: </label>
        <input type="text" name="squardMeter" id="squardMeter" required>
      </div>
      <br>
      <input type="submit" value="Publicar propiedad">
    </form>
  </main>
</body>
</html>