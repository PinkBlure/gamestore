<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis funciones</title>
</head>
<body>
    <?php

      // Función personalizada que nos habilita que php nos detalle más sobre los errores del código.
      function enableErrorLog() {
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        return true;
      }

      function createConnection($host, $db, $user, $pass) {
        try {
          $dns = "mysql:host=$host;dbname=$db";
          $conn = new PDO($dns, $user, $pass);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conn;
        } catch (PDOException $ex) {
          error_log("Error en la conexión a la base de datos: ".
                     $ex->getMessage());
          return null;
        }
      }

    ?>
</body>
</html>
