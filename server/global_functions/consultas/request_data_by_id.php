<?php

function AdminLevel($id)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Id=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($id));
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

function UserPassword($id, $nivel)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Id=? AND Nivel=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($id, $nivel));
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


function UserData($id)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Id=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($id));
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
