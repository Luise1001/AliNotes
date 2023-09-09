<?php

function SearchProfilePhoto($id)
{
    $ruta = "../../images/arts/profile/users/$id/photo/perfil.jpg";

    if(file_exists($ruta))
    {
        return $ruta;
    }
    else
    {
        $ruta = "../../images/arts/profile/jane_doe/user.png";   
        return $ruta;
    }
}