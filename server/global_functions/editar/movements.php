<?php

function Actualizado($tabla,$id)
{
    require '../conexion.php';
    $fecha = CurrentTime();

    $editsql = "UPDATE $tabla SET Actualizado=?  WHERE Id=?";
    $editar_sentence = $pdo->prepare($editsql);
    $editar_sentence->execute(array($fecha, $id));
}