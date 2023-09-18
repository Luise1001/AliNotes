<?php

function enviar_codigo()
{
  include_once '../conexion.php';

  if(isset($_POST['correo']))
  {
    $correo = $_POST['correo'];
    $codigo = GeneratePassword();
    $fecha = CurrentDate();

    $insert_sql = 'INSERT INTO codigos_enviados (Codigo, Correo, Fecha) VALUES (?,?,?)';
    $sent = $pdo->prepare($insert_sql);
    $sent->execute(array($codigo, $correo, $fecha));

    $asunto = "Código de Verificación";
    $headers = "From: admin@aliensnotes.com" . "\r\n" ."MIME-Version: 1.0" . "\r\n";
    $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";
    //$mensaje = NewPasswordTemplate('Codigo De Verificación', $codigo);
    $mensaje = $codigo;
    mail($correo, $asunto, $mensaje, $headers);
    
  }

}