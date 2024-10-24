<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Juego</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">

  <nav class="navbar navbar-expand-lg" style="background-color: purple;">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="../index.php">GameStore</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="./juegos.php">Ver lista de juegos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container text-center my-4 flex-grow-1">
    <?php
    if (!isset($_GET['id'])) {
      echo "<script>console.log(Error: 'No existe el producto con este ID')</script>";
      header('Location: listado.php');
      exit();
    }

    $id_producto = $_GET['id'];

    require_once "./base/functions.php";

    enableErrorLog();
    $conn = createConnection("localhost", "gamestore", "root", "");

    if ($conn === null) {
      echo "<div class='alert alert-danger'>Error: No se pudo establecer conexión con la base de datos.</div>";
    }

    $resultado_query = $conn->query("select * from Juegos where id = $id_producto");

    $media_puntuacion = 0;
    $total_calificaciones = 0;

    while ($row = $resultado_query->fetch(PDO::FETCH_OBJ)) {
      // Mostrar los detalles del juego
      echo "<div class='card text-center'>
                <div class='card-header'>{$row->Nombre}</div>
                <div class='card-body'>
                  <p class='card-text'>Género: {$row->Genero}</p>";

      // Obtener la puntuación media
      $calificaciones_query = $conn->query("SELECT AVG(Puntuación) as media FROM Calificaciones WHERE JuegoID = $id_producto");
      $calificacion_media_row = $calificaciones_query->fetch(PDO::FETCH_OBJ);
      
      if ($calificacion_media_row->media !== null) {
        $media_puntuacion = round($calificacion_media_row->media, 2);
        echo "<p class='card-text'>Puntuación Media: {$media_puntuacion}</p>";
      } else {
        echo "<p class='card-text'>Puntuación Media: No hay calificaciones aún.</p>";
      }

      echo "</div>
                <div class='card-footer'>Código: {$row->ID}</div>
              </div>";
    }

    // Manejo del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $calificacion = $_POST['calificacion'];
      $comentario = $_POST['comentario'];

      // Insertar en la base de datos
      $stmt = $conn->prepare("INSERT INTO Calificaciones (JuegoID, Puntuación, Comentario) VALUES (:id_producto, :puntuacion, :comentario)");
      $stmt->bindParam(':id_producto', $id_producto);
      $stmt->bindParam(':puntuacion', $calificacion);
      $stmt->bindParam(':comentario', $comentario);

      if ($stmt->execute()) {
        echo "<div class='alert alert-success mt-2'>Comentario guardado correctamente.</div>";
      } else {
        echo "<div class='alert alert-danger mt-2'>Error al guardar el comentario.</div>";
      }
    }

    $conn = null;
    ?>

    <h2 class="mt-4">Comentarios</h2>

    <div class="container mt-2">
      <form method="POST">
        <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
        <div class="form-group">
          <label for="calificacion">Califica el juego:</label>
          <input id="calificacion" name="calificacion" type="number" class="form-control" max="10" min="1" required>
        </div>
        <div class="form-group mt-2">
          <label for="comentario">Comenta el juego:</label>
          <input id="comentario" name="comentario" type="text" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Enviar</button>
      </form>
    </div>

    <?php
    $conn = createConnection("localhost", "gamestore", "root", "");

    if ($conn === null) {
      echo "<div class='alert alert-danger'>Error: No se pudo establecer conexión con la base de datos.</div>";
    }

    $resultado_query = $conn->query("SELECT * FROM Calificaciones WHERE JuegoID = $id_producto");

    while ($row = $resultado_query->fetch(PDO::FETCH_OBJ)) {
      echo "<div class='col-md-4 mb-4'>
        <div class='card'>
          <div class='card-body'>
            <h6 class='card-title mb-2 text-muted'>{$row->Puntuación}</h6>
            <p class='card-text'>{$row->Comentario}</p>
          </div>
        </div>
      </div>";
    }

    $conn = null;
    ?>

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
