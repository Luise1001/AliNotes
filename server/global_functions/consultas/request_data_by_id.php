<?php

function AdminLevel($userID)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Id=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      $nivel= $resultado[0]['Nivel'];
      return $nivel;
    }
    else
    {
      return false;
    }

}

function UserPassword($userID, $nivel)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Id=? AND Nivel=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID, $nivel));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      $password = $resultado[0]['Pass'];
      return $password;
    }
    else
    {
      return false;
    }

}


function UserData($userID)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Id=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      return $resultado;
    }
    else
    {
      return false;
    }

}

function MyNotes($userID)
{
    require '../conexion.php';
    $eliminado = 1;

    $consulta_sql = "SELECT * FROM notas WHERE Id_usuario=? AND Eliminado !=? ORDER BY Actualizado DESC";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID, $eliminado));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      return $resultado;
    }
    else
    {
      return false;
    }

}
function Mytasks($userID)
{
    require '../conexion.php';
    $eliminado = 1;

    $consulta_sql = "SELECT * FROM tareas WHERE Id_usuario=? AND Eliminado !=? ORDER BY Actualizado DESC";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID, $eliminado));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      return $resultado;
    }
    else
    {
      return false;
    }

}

function Mylists($userID)
{
    require '../conexion.php';
    $eliminado = 1;
    
    $consulta_sql = "SELECT * FROM listas WHERE Id_usuario=? AND Eliminado !=? ORDER BY Actualizado DESC";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID, $eliminado));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      return $resultado;
    }
    else
    {
      return false;
    }

}

function ListTitle($id_lista, $userID)
{
    require '../conexion.php';
    $eliminado = 1;
    
    $consulta_sql = "SELECT * FROM listas WHERE Id=? AND Id_usuario=? AND Eliminado !=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($id_lista, $userID, $eliminado));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      $titulo = $resultado[0]['Titulo'];
      return $titulo;
    }
    else
    {
      return false;
    }

}



function InsideMyList($id_lista, $userID)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM item_lista INNER JOIN items_para_lista ON item_lista.Id_item = items_para_lista.Id 
  WHERE item_lista.Id_lista=? AND item_lista.Id_usuario=? ORDER BY item_lista.Actualizado DESC";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($id_lista, $userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}