<?php

function AddItem($descripcion, $tipo_unidad, $cantidad, $userID, $fecha)
{
    require '../conexion.php';

    $descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);
    $tipo_unidad = filter_var($tipo_unidad, FILTER_SANITIZE_STRING);
    $cantidad = filter_var($cantidad, FILTER_SANITIZE_STRING);
    $userID = filter_var($userID, FILTER_SANITIZE_STRING);

    $descripcion = ucfirst($descripcion);

    if($descripcion && $userID)
    {
        $insert_sql = 'INSERT INTO items_para_lista (Descripcion, Tipo_unidad, Cantidad, Id_usuario, Fecha) VALUES (?,?,?,?,?)';
        $sent = $pdo->prepare($insert_sql);
        
        if($sent->execute(array($descripcion, $tipo_unidad, $cantidad, $userID, $fecha)))
        {
            return true;
        }
    }
    else
    {
        return false;
    }
    

}