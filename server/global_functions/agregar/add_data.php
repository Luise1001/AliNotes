<?php

function AddItem($descripcion, $tipo_unidad, $peso, $userID, $fecha)
{
    require '../conexion.php';

    $descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);
    $tipo_unidad = filter_var($tipo_unidad, FILTER_SANITIZE_STRING);
    $peso = filter_var($peso, FILTER_SANITIZE_STRING);
    $userID = filter_var($userID, FILTER_SANITIZE_STRING);

    $descripcion = ucfirst($descripcion);

    if($descripcion && $tipo_unidad && $peso &&  $userID)
    {
        $insert_sql = 'INSERT INTO items_para_lista (Descripcion, Tipo_unidad, Peso, Id_usuario, Fecha) VALUES (?,?,?,?,?)';
        $sent = $pdo->prepare($insert_sql);
        
        if($sent->execute(array($descripcion, $tipo_unidad, $peso, $userID, $fecha)))
        {
            return true;
        }
    }
    else
    {
        return false;
    }
    
}

function AddSection($titulo, $userID, $fecha)
{
    require '../conexion.php';

    $titulo = filter_var($titulo, FILTER_SANITIZE_STRING);
    $userID = filter_var($userID, FILTER_SANITIZE_STRING);

    $titulo = ucwords($titulo);

    if($titulo && $userID)
    {
        $insert_sql = 'INSERT INTO secciones (Titulo, Id_usuario, Fecha) VALUES (?,?,?)';
        $sent = $pdo->prepare($insert_sql);
        
        if($sent->execute(array($titulo, $userID, $fecha)))
        {
            return true;
        }
    }
    else
    {
        return false;
    }
    
}