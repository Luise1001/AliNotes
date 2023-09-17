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

function ProcessUnits($unidad)
{
    $respuesta = '';

    if($unidad)
    {
        if($unidad === 'Unidad')
        {
            $respuesta = 'Unidades';
        }
        if($unidad === 'Bulto')
        {
            $respuesta = 'Bultos';
        }
        if($unidad === 'Caja')
        {
            $respuesta = 'Cajas';
        }
        if($unidad === 'Saco')
        {
            $respuesta = 'Sacos';
        }
        if($unidad === 'Frasco')
        {
            $respuesta = 'Frascos';
        }
        if($unidad === 'Botella')
        {
            $respuesta = 'Botellas';
        }

        return $respuesta;
    }
    else
    {
        return false;
    }

}