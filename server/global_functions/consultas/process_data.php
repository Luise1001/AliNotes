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