<?php

require '../global_functions/agregar/global_functions.php';
require '../global_functions/consultas/global_functions.php';
require '../global_functions/editar/global_functions.php';
include_once 'agregar/scripts.php';

if($_POST)
{
    if(isset($_POST['page']))
    {
        $page = $_POST['page'];
        
       if($page === 'agregar_informacion_personal')
       {
          agregar_informacion_personal();
       } 
       if($page === 'agregar_informacion_juridica')
       {
          agregar_informacion_juridica();
       } 
       if($page === 'nueva_nota')
       {
          nueva_nota();
       }
       if($page === 'nueva_tarea')
       {
          nueva_tarea();
       }
       if($page === 'nueva_lista')
       {
         nueva_lista();
       }
       if($page === 'nueva_seccion')
       {
         nueva_seccion();
       }
       if($page === 'nuevo_item_lista')
       {
          nuevo_item_lista();
       }
       if($page === 'enviar_codigo')
       {
          enviar_codigo();
       }
       if($page === 'nuevo_usuario')
       {
          nuevo_usuario();
       }
       if($page === 'nuevo_barco')
       {
          nuevo_barco();
       }
       if($page === 'generar_manifiesto')
       {
          generar_manifiesto();
       }
    }
}