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
       if($page === 'nuevo_item_lista')
       {
          nuevo_item_lista();
       }
    }
}