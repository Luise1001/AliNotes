<?php

function mis_responsables()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($userID);
    $mis_responsables = UserResponsibles($userID, $nivel);
    $botones = 
    '
    <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-responsables" aria-expanded="true" aria-controls=".container-ships" ><i class="fa-solid fa-plus"></i></a>

    ';
    $respuesta = 
    [
        'botones'=>$botones,
        'responsables'=> ''
    ];
   
    if($mis_responsables)
    {
      foreach($mis_responsables as $responsable)
      {
          $id = $responsable['Id'];
          $nombre = $responsable['Nombre'];
          $letra = $responsable['Tipo_id'];
          $numero = $responsable['Numero'];
          $sello = $responsable['Sello'];
          $actualizado = $responsable['Actualizado'];
          $fecha_actual = CurrentTime();
          $fecha_movimiento = TimeDifference($actualizado,$fecha_actual);

          $respuesta['responsables'] .= 
          "
          <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
              <div class='toast-header'>
                 <strong class='me-auto label-option-3' data-bs-toggle='collapse' data-bs-target='.body-$id' 
                 data-bs-auto-close='true'>$nombre</strong>
                 <small class='card-time'>$fecha_movimiento</small>
                 <div> 
                 <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
                 <span><i class='fas fa-ellipsis-v'></i></span>
               </button>
                 <ul class='dropdown-menu card-menu'>
                  <li class='dropdown-item card-menu-item'><a class='btn-edit-conductor' id='$id' nombre='$nombre'
                   letra='$letra' numero='$numero' 
                  data-toggle='modal' data-target='#modal_editar_conductor'>
                  <i class='fa-solid fa-edit'></i> Editar</a></li>
                  <li class='dropdown-item card-menu-item'><a class='btn-eliminar-conductor' id='$id'>
                  <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                 </ul>
                 </div>
             </div>
             <div class='toast-body body-$id collapse'>
             <p>Nombre: $nombre</p>
             <p>Identificación: $letra-$numero</p>
             <p>Sello: $sello</p>
          </div>
           </div>
          ";
      }

      
    }
    else
    {
        $respuesta['responsables'] = EmptyPage('Sin Responsables Para Mostrar');
    }

    echo json_encode($respuesta);
}