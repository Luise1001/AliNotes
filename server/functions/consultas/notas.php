<?php

function mis_notas()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $botones = '<a ><i class="fa-solid fa-plus"></i></a>';
    $respuesta = 
    [
        'botones'=>$botones,
        'notas'=> ''
    ];

    echo json_encode($respuesta);
}