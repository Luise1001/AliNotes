<?php

function generar_planilla()
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

  if(isset($_POST['tipo']) && isset($_POST['titular']) && isset($_POST['responsable']) && isset($_POST['vehiculo']) && isset($_POST['conductor']) && isset($_POST['items']))
  { 
    $tipo = $_POST['tipo'];
    $id_titular = $_POST['titular'];
    $id_responsable = $_POST['responsable'];
    $id_vehiculo = $_POST['vehiculo'];
    $id_conductor = $_POST['conductor'];
    $items = $_POST['items'];
    
    if($tipo && $id_titular && $id_responsable && $id_vehiculo && $id_conductor && $items)
    {
        $cliente = Titular($tipo, $id_titular, $userID, $nivel);
  
        $responsables = Responsible($id_responsable, $userID);
        if($responsables)
        {
            foreach($responsables as $resp)
            {
                $responsable = $resp;
            }
        }

        $carro = UserCar($id_vehiculo, $userID);
        if($carro)
        {
            foreach($carro as $car)
            {
                $vehiculo = $car;
            }
        }

        $drivers = UserDriver($id_conductor, $userID, $nivel);

        if($drivers)
        {
            foreach($drivers as $driver)
            {
                $conductor = $driver;
            }
        }

        $total_items = count($items);
        $planillas =  PlanillaTemplate($cliente, $responsable, $items, $total_items, $vehiculo, $conductor);

        if($planillas)
        {
            $respuesta = 
            [
                'titulo'=>'Operación Exitosa',
                'cuerpo'=> 'Revise la lista de Planillas',
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
            'cuerpo'=> 'No se Pueden Generar Planillas Vacíos.',
            'accion'=> 'error'
        ];
    }

   echo json_encode($respuesta);
  }
}