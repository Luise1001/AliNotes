<?php

function mis_carros()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($userID);
    $mis_carros = UserCars($userID, $nivel);
    $botones = 
    '
    <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-cars" aria-expanded="true" aria-controls=".container-ships" ><i class="fa-solid fa-plus"></i></a>

    ';
    $respuesta = 
    [
        'botones'=>$botones,
        'carros'=> ''
    ];
   
    if($mis_carros)
    {
      foreach($mis_carros as $carro)
      {
        $id = $carro['Id'];
        $tipo = $carro['Tipo'];
        $modelo = $carro['Modelo'];
        $placa = $carro['Placa'];
        $year = $carro['Year_car'];
        $actualizado = $carro['Actualizado'];
        $fecha_actual = CurrentTime();
        $fecha_movimiento = TimeDifference($actualizado,$fecha_actual);

          $respuesta['carros'] .= 
          "
          <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
              <div class='toast-header'>
                 <strong class='me-auto label-option-3' data-bs-toggle='collapse' 
                 data-bs-target='.body-$id' data-bs-auto-close='true'>$tipo</strong>
                 <small class='card-time'>$fecha_movimiento</small>
                 <div> 
                 <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
                 <span><i class='fas fa-ellipsis-v'></i></span>
               </button>
                 <ul class='dropdown-menu card-menu'>
                  <li class='dropdown-item card-menu-item'><a class='btn-edit-carro' id='$id' tipo='$tipo'
                  modelo='$modelo' placa='$placa' year='$year'
                  data-toggle='modal' data-target='#modal_editar_carro'>
                  <i class='fa-solid fa-edit'></i> Editar</a></li>
                  <li class='dropdown-item card-menu-item'><a class='btn-eliminar-carro' id='$id'>
                  <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                 </ul>
                 </div>
             </div>
             <div class='toast-body body-$id collapse'>
             <p>Tipo: $tipo</p>
             <p>Modelo: $modelo</p>
             <p>Placa: $placa</p>
             <p>Año: $year</p>
          </div>
           </div>
          ";
      }

      
    }
    else
    {
        $respuesta['carros'] = EmptyPage('Sin Carros Para Mostrar');
    }

    echo json_encode($respuesta);
}