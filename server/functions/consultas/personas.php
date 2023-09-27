<?php

function mis_personas()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($userID);
    $mis_personas = PersonData($userID, $nivel);
    $botones = 
    '
    <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-people" aria-expanded="true" aria-controls=".container-people" ><i class="fa-solid fa-plus"></i></a>

    ';
    $respuesta = 
    [
        'botones'=>$botones,
        'personas'=> ''
    ];
   
    if($mis_personas)
    {
      foreach($mis_personas as $persona)
      {

          $id = $persona['Id'];
          $nombre = $persona['Nombre'];
          $apellido = $persona['Apellido'];
          $letra = $persona['Tipo_id'];
          $cedula = $persona['Cedula'];
          $actualizado = $persona['Actualizado'];
          $fecha_actual = CurrentTime();
          $fecha_movimiento = TimeDifference($actualizado,$fecha_actual);

          $respuesta['personas'] .= 
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
                  <li class='dropdown-item card-menu-item'><a id='edit_user_personal_info' persona='$id' nombre='$nombre' apellido='$apellido' letra='$letra' cedula='$cedula' title='Editar Información Personal'
                  data-toggle='modal' data-target='#modal_editar_personal_info'>
                  <i class='fas fa-user-edit'></i> Editar</a></li>
                  <li class='dropdown-item card-menu-item'><a class='btn-eliminar-persona' id='$id'>
                  <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                 </ul>
                 </div>
             </div>
             <div class='toast-body body-$id collapse'>
             <p>Nombres: $nombre</p>
             <p>Apellidos: $apellido</p>
             <p>Cédula: $letra-$cedula</p>
          </div>
           </div>
          ";
      }

      
    }
    else
    {
        $respuesta['personas'] = EmptyPage('Sin Personas Para Mostrar');
    }

    echo json_encode($respuesta);
}