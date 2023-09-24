<?php

require '../global_functions/consultas/global_functions.php';
include_once 'consultas/scripts.php';

if($_POST)
{
    if(isset($_POST['page']))
    {
        $page = $_POST['page'];

        if($page === 'login')
        {
            login();
        }
        if($page === 'header_menu')
        {
            header_menu();
        }
        if($page === 'footer_menu')
        {
            footer_menu();
        }
        if($page === 'mi_perfil')
        {
            mi_perfil();
        }
        if($page === 'mis_notas')
        {
            mis_notas();
        }
        if($page === 'mis_tareas')
        {
            mis_tareas();
        }
        if($page === 'mis_listas')
        {
            mis_listas();
        }
        if($page === 'lista_individual')
        {
            lista_individual();
        }
        if($page === 'generar_listado')
        {
            generar_listado();
        }
        if($page === 'secciones')
        {
           secciones();
        }
        if($page === 'secciones_en_editar')
        {
            secciones_en_editar();
        }
        if($page === 'unidades')
        {
            unidades();
        }
        if($page === 'unidades_en_editar')
        {
            unidades_en_editar();
        }
        if($page === 'mis_barcos')
        {
            mis_barcos();
        }
        if($page === 'mis_manifiestos')
        {
            mis_manifiestos();
        }
        if($page === 'datos_manifiesto')
        {
            datos_manifiesto();
        }
        if($page === 'mis_carros')
        {
            mis_carros();
        }
        if($page === 'mis_conductores')
        {
            mis_conductores();
        }
    }
}