<?php

require '../global_functions/agregar/global_functions.php';
require '../global_functions/consultas/global_functions.php';
require '../global_functions/editar/global_functions.php';
include_once 'editar/scripts.php';

if($_POST)
{
    if(isset($_POST['page']))
    {
        $page = $_POST['page'];

        if($page === 'foto_perfil')
        {
            foto_perfil();
        }
        if($page === 'editar_nota')
        {
            editar_nota();
        }
    }
}