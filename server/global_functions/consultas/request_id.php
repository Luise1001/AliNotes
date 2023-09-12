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

      return $id_usuario;
    }
    else
    {
      return false;
    }
}

function ItemID($descripcion)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM items_para_lista WHERE Descripcion=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($descripcion));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      $item_id = $resultado[0]['Id'];
      
      return $item_id;
    }
    else
    {
      return false;
    }
}