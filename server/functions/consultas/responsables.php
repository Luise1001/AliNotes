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
    <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-responsables" aria-expanded="true" aria-controls=".container-responsables" ><i class="fa-solid fa-plus"></i></a>

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
          
          if($sello === 'Sin Sello')
          {
             $sello = '';
             $ver = 'Sin Sello';
             $eye = 'eye-slash';
             $modal = '';
          }
          else
          {
             $ver = 'Ver';
             $eye = 'eye';
             $modal = '#modal_watch_sign';
          }

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
                  <li class='dropdown-item card-menu-item'><a class='btn-edit-responsable' id='$id' nombre='$nombre'
                   letra='$letra' numero='$numero' sello='$sello'
                  data-toggle='modal' data-target='#modal_editar_responsable'>
                  <i class='fa-solid fa-edit'></i> Editar</a></li>
                  <li class='dropdown-item card-menu-item'><a class='btn-eliminar-responsable' id='$id' numero='$numero'>
                  <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                 </ul>
                 </div>
             </div>
             <div class='toast-body body-$id collapse'>
             <p>Nombre: $nombre</p>
             <p>Identificación: $letra-$numero</p>
             <p>Sello: <a class='btn-watch-sign' sello='$sello'
             data-toggle='modal' data-target='$modal'><i class='fa-solid fa-$eye'></i> $ver</a></li></p>
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