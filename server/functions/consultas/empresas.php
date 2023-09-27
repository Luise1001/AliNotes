<?php

function mis_empresas()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($userID);
    $mis_empresas = BusinessData($userID, $nivel);
    $botones = 
    '
    <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-business" aria-expanded="true" aria-controls=".container-business" ><i class="fa-solid fa-plus"></i></a>

    ';
    $respuesta = 
    [
        'botones'=>$botones,
        'empresas'=> ''
    ];
   
    if($mis_empresas)
    {
      foreach($mis_empresas as $empresa)
      {

          $id = $empresa['Id'];
          $razon_social = $empresa['Razon_social'];
          $letra = $empresa['Tipo_id'];
          $rif = $empresa['Rif'];
          $direccion = $empresa['Direccion'];
          $actualizado = $empresa['Actualizado'];
          $fecha_actual = CurrentTime();
          $fecha_movimiento = TimeDifference($actualizado,$fecha_actual);

          $respuesta['empresas'] .= 
          "
          <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
              <div class='toast-header'>
                 <strong class='me-auto label-option-3' data-bs-toggle='collapse' data-bs-target='.body-$id' 
                 data-bs-auto-close='true'>$razon_social</strong>
                 <small class='card-time'>$fecha_movimiento</small>
                 <div> 
                 <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
                 <span><i class='fas fa-ellipsis-v'></i></span>
               </button>
                 <ul class='dropdown-menu card-menu'>
                  <li class='dropdown-item card-menu-item'><a id='edit_user_juridica_info' business='$id' razon='$razon_social' direccion='$direccion' letra='$letra' rif='$rif' title='Editar Información Jurídica'
                  data-toggle='modal' data-target='#modal_editar_juridica_info'>
                  <i class='fas fa-edit'></i> Editar</a></li>
                  <li class='dropdown-item card-menu-item'><a class='btn-eliminar-empresa' id='$id'>
                  <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                 </ul>
                 </div>
             </div>
             <div class='toast-body body-$id collapse'>
             <p>Razón Social: $razon_social</p>
             <p>Rif: $letra-$rif</p>
             <p>Dirección: $direccion</p>
          </div>
           </div>
          ";
      }

      
    }
    else
    {
        $respuesta['empresas'] = EmptyPage('Sin Empresas Para Mostrar');
    }

    echo json_encode($respuesta);
}