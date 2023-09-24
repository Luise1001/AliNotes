<?php

function Units()
{
    require '../conexion.php';
    
    $consulta_sql = "SELECT * FROM unidades";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute();
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

function ShowCode($correo)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM codigos_enviados WHERE correo=? ORDER BY Actualizado DESC";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($correo));
    $resultado = $preparar_sql->fetchAll();

    if($resultado)
    {
        $codigo = $resultado[0]['Codigo'];

        return $codigo;
    }
    else
    {
        return false;
    }
}

function CheckUserName($username)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE User_name=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($username));
    $resultado = $preparar_sql->fetchAll();

    if($resultado)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function CheckPlaca($placa, $userID)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM carros WHERE Placa=? AND Id_usuario=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($placa, $userID));
    $resultado = $preparar_sql->fetchAll();

    if($resultado)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function CheckDriver($cedula, $userID)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM conductores WHERE Cedula=? AND Id_usuario=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($cedula, $userID));
    $resultado = $preparar_sql->fetchAll();

    if($resultado)
    {
        return true;
    }
    else
    {
        return false;
    }
}