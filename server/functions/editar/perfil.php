<?php

function foto_perfil()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $foto = 'perfil';
    
    if(isset($_FILES))
    { 
        Actualizado('usuarios', $userID);
        MyProfilePhoto($userID, $foto, $_FILES);
    }
}