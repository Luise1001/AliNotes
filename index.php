<?php
 include_once 'server/conexion.php';
 if(isset($_SESSION['AliNotes']))
 {
  echo"<script type='text/javascript'>
     window.location.href='templates/home/inicio';
  </script>";
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-title" content="AliNotes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#0F2C40"/>

    <link rel="manifest" href="manifest.json">
    <link rel="shortcut icon" href="images/icons/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <title>AliNotes</title>
</head>
<body>
<div id="login_card" class="container login-card">
<div class="row">
<div class="card">
    <form method="post" class="card">
  <img src="images/logos/logo.png" class="login-logo" alt="logo">
  <div class="login-titulo">
    <h5 class="card-title">Iniciar Sesión</h5>
  </div>
  <ul class="list-group list-group-flush login-inputs">
    <li class="list-group-item"><input class="input-opcion-1" id="user" name="user" type="email" placeholder=" Ejemplo@ejemplo.com" required></li>
    <li class="list-group-item"><input class="input-opcion-1" id="pass" name="pass" type="password" placeholder=" Contraseña" required></li>
  </ul>
  <div class="login-buttons">
    <button type="submit" id="login" class="btn login-btn">Acceder</button>
  </div>
  <div class="container sing-up">
    <a id="registrarme" class="sing-up">Registrarme</a>
  </div>
</form>
  <div class="login-buttons">
    <button hidden id="installButton" class="btn login-btn">Instalar</button>
  </div>
</div>
</div>
</div>

<div id="singup_card" class="container login-card d-none">
<div class="row">
<div class="card">
    <form method="post" class="card">
  <img src="images/logos/logo.png" class="login-logo" alt="logo">
  <div class="login-titulo">
    <h5 class="card-title">Registrarme</h5>
  </div>
  <ul class="list-group list-group-flush login-inputs">
    <li class="list-group-item"><input class="input-opcion-1" id="r_user" name="r_user" type="email" placeholder=" Ejemplo@ejemplo.com" required></li>
    <li class="list-group-item"><input class="input-opcion-1" id="r_pass" name="r_pass" type="password" placeholder=" Contraseña" required></li>
    <li class="list-group-item"><input class="input-opcion-1" id="r_pass_2" name="r_pass_2" type="password" placeholder=" Repetir Contraseña" required></li>
  </ul>
  <div class="login-buttons">
    <button type="button" id="singup" data-toggle="modal" data-target="#modal_codigo" class="btn login-btn">Enviar</button>
  </div>
  <div class="container sing-up">
    <a id="acceder" class="sing-up">Acceder</a>
  </div>
</form>
</div>
</div>
</div>


<div>
<div class="modal fade" id="modal_codigo" tabindex="-1" role="dialog"   aria-labelledby="modal_codigo_Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

    <div class="container">
 <div class="modal-code">
    <div class="modal-code-header">
        <div class="div-back-btn">
        <button class="btn back-btn" data-dismiss="modal"><i class="fa-solid fa-arrow-left"></i></button>
        </div>
        <i class="fa-solid fa-lock"></i> Código de Verificación
    </div>
  <div class="modal-code-body">
    <label class="label-option-1" for="codigo">Código <span class="obligatory-span">*</span></label>
    <input class="input-opcion-1" id="codigo" name="codigo" type="text" placeholder=" ******" >
    <p class="code-alert">Inserte el codigo enviado a su Correo</p>
  </div>
</div>
 <div class="modal-code-footer">
 <button id="got_code" name="got_code" data-dismiss="modal" class="btn btn-option-1">Guardar</button>
 </div>
 </div> 
   
    </div>
  </div>
</div>
</div>




<div class=" container index-footer">
    <h1 class="app-name">AliNotes</h1>
    <p class="app-version">V1.1.2023.09.01</p>
</div>

<script src="js/index.js"></script>
</body>
</html>