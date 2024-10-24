<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameStore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">GameStore</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./src/admin.php">Administrar Tienda Online</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./src/juegos.php">Ver lista de juegos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

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

  <a type="button" class="btn btn-primary" href="./src/admin.php">Administrar Tienda Online</a>
  <a type="button" class="btn btn-primary" href="./src/juegos.php">Ver lista de juegos</a>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>

</html>
