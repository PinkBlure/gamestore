<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Lista de juegos</h1>
  <?php
  require_once "./base/functions.php";

  enableErrorLog();
  $conn = createConnection("localhost", "gamestore", "root", "");

  if ($conn === null) {
    echo "<div class='alert alert-danger'>Error: No se pudo establecer conexión con la base de datos.</div>";
  }

  $resultado_query = $conn->query('select * from Juegos');

  while ($row = $resultado_query->fetch(PDO::FETCH_OBJ)) {
    echo "<article>
            {$row->ID}
            {$row->Nombre}
            {$row->Genero}
          </article>";
  }

  $conn = null;
  ?>
</body>

</html>
