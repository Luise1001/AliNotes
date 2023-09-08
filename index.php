<?php
 include_once 'server/conexion.php';
 if(isset($_SESSION['admin']))
 {
  echo"<script type='text/javascript'>
     window.location.href='templates/home/inicio';
  </script>";
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <link rel="shortcut icon" href="images/icons/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Alien's Notes</title>
</head>
<body>
<div class="container login-card">
<div class="row">
<div class="card">
    <form method="post" class="card">
  <img src="images/logos/logo.png" class="login-logo" alt="logo">
  <div class="login-titulo">
    <h5 class="card-title">Iniciar Sesión</h5>
  </div>
  <ul class="list-group list-group-flush login-inputs">
    <li class="list-group-item"><input class="input-opcion-1" id="user" name="user" type="email" required></li>
    <li class="list-group-item"><input class="input-opcion-1" id="pass" name="pass" type="password" required></li>
  </ul>
  <div class="login-buttons">
    <button type="submit" id="login" class="btn login-btn">Acceder</button>
  </div>
</form>
</div>
</div>
</div>

<div class=" container index-footer">
    <h1>Alien's Notes</h1>
</div>

<script src="js/index.js"></script>
</body>
</html>