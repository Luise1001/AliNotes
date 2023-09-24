<?php

function mis_barcos()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($userID);
    $mis_barcos = UserBarcos($userID, $nivel);
    $botones = 
    '
    <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-ships" aria-expanded="true" aria-controls=".container-ships" ><i class="fa-solid fa-plus"></i></a>

    ';
    $respuesta = 
    [
        'botones'=>$botones,
        'barcos'=> ''
    ];
   
    if($mis_barcos)
    {
      foreach($mis_barcos as $barco)
      {

          $id = $barco['Id'];
          $nombre = $barco['Barco'];
          $actualizado = $barco['Actualizado'];
          $fecha_actual = CurrentTime();
          $fecha_movimiento = TimeDifference($actualizado,$fecha_actual);

          $respuesta['barcos'] .= 
          "
          <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
              <div class='toast-header'>
                 <strong class='me-auto label-option-3' data-bs-toggle='collapse' data-bs-target='.body-$id' data-bs-auto-close='true'>$nombre</strong>
                 <small class='card-time'>$fecha_movimiento</small>
                 <div> 
                 <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
                 <span><i class='fas fa-ellipsis-v'></i></span>
               </button>
                 <ul class='dropdown-menu card-menu'>
                  <li class='dropdown-item card-menu-item'><a class='btn-edit-barco' id='$id' nombre='$nombre' 
                  data-toggle='modal' data-target='#modal_editar_barco'>
                  <i class='fa-solid fa-edit'></i> Editar</a></li>
                  <li class='dropdown-item card-menu-item'><a class='btn-eliminar-barco' id='$id'>
                  <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                 </ul>
                 </div>
             </div>
           </div>
          ";
      }

      
    }
    else
    {
        $respuesta['barcos'] = EmptyPage('Sin Barcos Para Mostrar');
    }

    echo json_encode($respuesta);
}