<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
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

  while ($row = $resultado_query->fetch(PDO::FETCH_OBJ)) {
    echo "<div class='card text-center'>
                <div class='card-header'>{$row->Nombre}</div>

                <div class='card-body'>
                  <p class='card-text'>Género: {$row->Genero}</p>

                </div>

                <div class='card-footer'>Código: {$row->ID}</div>
              </div>
             ";
  }

  $conn = null;
  ?>
</body>

</html>
