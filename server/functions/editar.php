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
        if($page === 'editar_user_name')
        {
            editar_user_name();
        }
        if($page === 'editar_persona')
        {
            editar_persona();
        }
        if($page === 'editar_empresa')
        {
            editar_empresa();
        }
        if($page === 'editar_nota')
        {
            editar_nota();
        }
        if($page === 'editar_tarea')
        {
            editar_tarea();
        }
        if($page === 'completar_tarea')
        {
            completar_tarea();
        }
        if($page === 'editar_titulo_lista')
        {
            editar_titulo_lista();
        }
        if($page === 'hide_show_lista')
        {
            hide_show_lista();
        }
        if($page === 'hide_show_item')
        {
            hide_show_item();
        }
        if($page === 'editar_item_lista')
        {
            editar_item_lista();
        }
        if($page === 'editar_barco')
        {
            editar_barco();
        }
        if($page === 'editar_carro')
        {
            editar_carro();
        }
        if($page === 'editar_conductor')
        {
            editar_conductor();
        } 
        if($page === 'editar_responsable')
        {
            editar_responsable();
        } 
        if($page === 'editar_seccion')
        {
            editar_seccion();
        }
    }
}