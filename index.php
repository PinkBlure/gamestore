<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameStore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <?php
  if (!file_exists("./src/base/functions.php")) {
    die("Error: Functions file not found.");
  }

  require_once "./src/base/functions.php";

  enableErrorLog();
  $conn = createConnection("localhost", "gamestore", "root", "");

  if ($conn === null) {
    echo "<div class='alert alert-danger'>Error: No se pudo establecer conexión con la base de datos.</div>";
  }

  $conn = null;
  ?>
 
  <h1>Tienda Online</h1>

  <a type="button" class="btn btn-primary" href="admin.php">Administrar Tienda Online</a>
  <a type="button" class="btn btn-primary" href="juegos.php">Ver lista de juegos</a>

</body>

</html>