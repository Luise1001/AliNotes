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

    $consulta_sql = "SELECT * FROM notas WHERE Id_usuario=? ORDER BY Actualizado DESC";
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