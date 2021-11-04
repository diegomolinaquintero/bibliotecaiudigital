<?php
    session_start();
    session_destroy();

    echo "the session is over coming back in 3s";
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <script src="Script/jquery.js"></script>
    <title>Bibliotecaiudigital</title>
</head>
    <body>
    <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Gracias por usarnos</h4>
  <p>Estas saliendo de la plataforma, esperamos que vuelvas a visitarnos, recuerda, para nosotros eres importante.</p>
  <hr>
  <p class="mb-0">Si necesitas ayuda por favor llamanos</p>
</div>
</body>
    <?php
    header("refresh:3;url=index.php");
?>