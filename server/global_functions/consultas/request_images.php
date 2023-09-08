<?php

function SearchProfilePhoto($id, $foto)
{
    $ruta = "../../images/arts/profile/users/$id/photo/$foto.jpg";

    if(file_exists($ruta))
    {
        return true;
    }
    else
    {
        return false;
    }
}