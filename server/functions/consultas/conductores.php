<?php

function mis_conductores()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($userID);
    $mis_conductores = UserDrivers($userID, $nivel);
    $botones = 
    '
    <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-drivers" aria-expanded="true" aria-controls=".container-ships" ><i class="fa-solid fa-plus"></i></a>

    ';
    $respuesta = 
    [
        'botones'=>$botones,
        'conductores'=> ''
    ];
   
    if($mis_conductores)
    {
      foreach($mis_conductores as $driver)
      {

          $id = $driver['Id'];
          $nombre = $driver['Nombre'];
          $apellido = $driver['Apellido'];
          $letra = $driver['Tipo_id'];
          $cedula = $driver['Cedula'];
          $actualizado = $driver['Actualizado'];
          $fecha_actual = CurrentTime();
          $fecha_movimiento = TimeDifference($actualizado,$fecha_actual);

          $respuesta['conductores'] .= 
          "
          <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
              <div class='toast-header'>
                 <strong class='me-auto label-option-3' data-bs-toggle='collapse' data-bs-target='.body-$id' 
                 data-bs-auto-close='true'>$nombre $apellido</strong>
                 <small class='card-time'>$fecha_movimiento</small>
                 <div> 
                 <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
                 <span><i class='fas fa-ellipsis-v'></i></span>
               </button>
                 <ul class='dropdown-menu card-menu'>
                  <li class='dropdown-item card-menu-item'><a class='btn-edit-conductor' id='$id' nombre='$nombre'
                  apellido='$apellido' letra='$letra' cedula='$cedula' 
                  data-toggle='modal' data-target='#modal_editar_conductor'>
                  <i class='fa-solid fa-edit'></i> Editar</a></li>
                  <li class='dropdown-item card-menu-item'><a class='btn-eliminar-conductor' id='$id'>
                  <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                 </ul>
                 </div>
             </div>
             <div class='toast-body body-$id collapse'>
             <p>Nombre: $nombre</p>
             <p>Apellido: $apellido</p>
             <p>Cédula: $letra-$cedula</p>
          </div>
           </div>
          ";
      }

      
    }
    else
    {
        $respuesta['conductores'] = EmptyPage('Sin Conductores Para Mostrar');
    }

    echo json_encode($respuesta);
}