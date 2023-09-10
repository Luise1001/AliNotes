<?php

function ProcessLevel($nivel)
{
    $nivel = false;

    if($nivel === '1')
    {
       $nivel = 'Administrador';
    }

    if($nivel === '0')
    {
        $nivel = 'Usuario';
    }

    return $nivel;
}

function EmptyPage($contenido)
{
    $respuesta =
    "
    <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
    <div class=' text-center'>
       <strong class='me-auto'>$contenido</strong>    
   </div>
 </div>
 ";

 return $respuesta;
}