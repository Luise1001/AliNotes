<?php

require '../global_functions/consultas/global_functions.php';
require '../global_functions/editar/global_functions.php';
include_once 'eliminar/scripts.php';

if($_POST)
{
    if(isset($_POST['page']))
    {
        $page = $_POST['page'];

        if($page === 'eliminar_nota')
        {
            eliminar_nota();
        }
        if($page === 'eliminar_tarea')
        {
            eliminar_tarea();
        }
        if($page === 'eliminar_lista')
        {
            eliminar_lista();
        }
        if($page === 'eliminar_item_lista')
        {
            eliminar_item_lista();
        }
        if($page === 'eliminar_barco')
        {
            eliminar_barco();
        }
        if($page === 'eliminar_carro')
        {
            eliminar_carro();
        }
        if($page === 'eliminar_conductor')
        {
            eliminar_conductor();
        }
        if($page === 'eliminar_responsable')
        {
            eliminar_responsable();
        }
        if($page === 'eliminar_manifiesto')
        {
            eliminar_manifiesto();
        }
        if($page === 'eliminar_planilla')
        {
            eliminar_planilla();
        }
        if($page === 'eliminar_persona')
        {
            eliminar_persona();
        }
        if($page === 'eliminar_empresa')
        {
            eliminar_empresa();
        }
        if($page === 'eliminar_seccion')
        {
            eliminar_seccion();
        }

    }
}