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