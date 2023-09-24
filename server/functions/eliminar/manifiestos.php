<?php

function eliminar_manifiesto()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $respuesta = 
    [
        'titulo'=>'warning',
        'cuerpo'=> 'warning',
        'accion'=> 'warning'
    ];
    
    if(isset($_POST['archivo']))
    {
      $archivo = $_POST['archivo'];
      $ruta = "../../server/docs/manifiestos/user_$userID/$archivo";

      if(file_exists($ruta))
      {
         unlink($ruta);

         $respuesta = 
         [
             'titulo'=>'Operación Exitosa',
             'cuerpo'=> '',
             'accion'=> 'success'
         ];
      }
      else
      {
        $respuesta = 
        [
            'titulo'=>'Ups!',
            'cuerpo'=> 'Ocurrió Un Problema',
            'accion'=> 'error'
        ];
      }

      echo json_encode($respuesta);
    }

}