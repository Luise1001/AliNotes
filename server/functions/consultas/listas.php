<?php

function mis_listas()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $foto = SearchProfilePhoto($userID);
    $mis_listas = MyLists($userID);
    $botones = 
    '
    <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-listas" aria-expanded="true" aria-controls=".container-lists" ><i class="fa-solid fa-plus"></i></a>

    ';
    $respuesta = 
    [
        'botones'=> $botones,
        'listas'=> ''
    ];

    if($mis_listas)
    {
       foreach($mis_listas as $listas)
       {
          $id = $listas['Id'];
          $titulo = $listas['Titulo'];
          $actualizado = $listas['Actualizado'];
          $fecha_actual = CurrentTime();
          $fecha_movimiento = TimeDifference($actualizado, $fecha_actual);

          $respuesta['listas'] .= 
          "
          <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
              <div class='toast-header'>
                 <img src=$foto width='32' height='32' class='rounded me-2' alt='Perfil'>
                 <strong class='me-auto'>$titulo</strong>
                 <small class='card-time'>$fecha_movimiento</small>
                 <div> 
                 <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
                 <span><i class='fas fa-ellipsis-v'></i></span>
               </button>
                 <ul class='dropdown-menu card-menu'>
                  <li class='dropdown-item card-menu-item'><a class='btn-edit-nota' id='$id' titulo='$titulo'  data-toggle='modal' data-target='#modal_editar_titulo_lista'>Editar</a></li>
                  <li class='dropdown-item card-menu-item'><a class='btn-eliminar-lista' id='$id'>Eliminar</a></li>
                 </ul>
                 </div>
             </div>
           </div>
          ";
       }
    }
    else
    {
        $respuesta['listas'] = EmptyPage('Sin Listas Para Mostrar');
    }

    echo json_encode($respuesta);
}