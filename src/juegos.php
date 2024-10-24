<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de juegos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">

  <nav class="navbar navbar-expand-lg" style="background-color: purple;">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">GameStore</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="./src/admin.php">Administrar Tienda Online</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="./src/juegos.php">Ver lista de juegos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container text-center my-4 flex-grow-1">
    <h1>Lista de juegos</h1>

    <div class="row"> <!-- Agregada la clase row para el grid -->
      <?php
      require_once "./base/functions.php";

      enableErrorLog();
      $conn = createConnection("localhost", "gamestore", "root", "");

      if ($conn === null) {
        echo "<div class='alert alert-danger'>Error: No se pudo establecer conexión con la base de datos.</div>";
      }

      $resultado_query = $conn->query('SELECT * FROM Juegos');

      while ($row = $resultado_query->fetch(PDO::FETCH_OBJ)) {
        echo "<div class='col-md-4 mb-4'> <!-- Ajustado a col-md-4 para 3 cards por fila -->
          <div class='card'>
            <div class='card-body'>
              <h5 class='card-title'>{$row->Nombre}</h5>
              <h6 class='card-subtitle mb-2 text-muted'>{$row->Genero}</h6>
              <p class='card-text'>ID: {$row->ID}</p>
              <a href='detalle.php?id={$row->ID}' class='btn btn-primary'>Ver juego</a>
            </div>
          </div>
        </div>";
      }

      $conn = null;
      ?>
    </div>
  </main>

  <footer class="bg-purple text-white text-center text-lg-start mt-auto" style="background-color: purple;">
    <div class="text-center p-3">
      © 2024 GameStore - Todos los derechos reservados.
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>

</html>
