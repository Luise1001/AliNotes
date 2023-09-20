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

function ItemID($descripcion, $unidad)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM items_para_lista WHERE Descripcion=? AND Tipo_unidad=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($descripcion, $unidad));
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

function SectionID($titulo, $userID)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM secciones WHERE Titulo=? AND Id_usuario=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($titulo, $userID));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      $section_id = $resultado[0]['Id'];
      
      return $section_id;
    }
    else
    {
      return false;
    }
}