<?php

function UserID($correo)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Correo=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($correo));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      $id_usuario = $resultado[0]['Id'];
    }
    else
    {
      return false;
    }

    return $id_usuario;
}