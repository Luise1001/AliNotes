<?php

require '../global_functions/consultas/global_functions.php';
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
    }
}