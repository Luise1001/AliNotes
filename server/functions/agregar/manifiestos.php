<?php

function generar_manifiesto()
{
  include_once '../conexion.php';
  $admin = $_SESSION['AliNotes']['admin'];
  $userID = UserID($admin);
  $nivel = AdminLevel($userID);
  $fecha = CurrentDate();
  $respuesta = 
  [
      'titulo'=>'warning',
      'cuerpo'=> 'warning',
      'accion'=> 'warning'
  ];

  if(isset($_POST['titular']) && isset($_POST['barco']) && isset($_POST['items']))
  { 
    $titular = $_POST['titular'];
    $barco = $_POST['barco'];
    $items = $_POST['items'];
    
    if($titular && $barco && $items)
    {
        $manifiesto = ManifestTemplate($titular, $items, $barco);

        if($manifiesto)
        {
            $respuesta = 
            [
                'titulo'=>'Operación Exitosa',
                'cuerpo'=> 'Revise la lista de Manifiestos',
                'accion'=> 'success'
            ];
        }
        else
        {
            $respuesta = 
            [
                'titulo'=>'Ups!',
                'cuerpo'=> 'Ocurrió Un Problema.',
                'accion'=> 'error'
            ];
        }
    }
    else
    {
        $respuesta = 
        [
            'titulo'=>'Ups!',
            'cuerpo'=> 'No se Pueden Generar Manifiestos Vacíos.',
            'accion'=> 'error'
        ];
    }

    echo json_encode($respuesta);
  }
}