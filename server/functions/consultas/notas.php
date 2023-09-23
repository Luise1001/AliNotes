<?php

function mis_notas()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $foto = SearchProfilePhoto($userID);
    $mis_notas = MyNotes($userID);
    $botones = 
    '
    <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-notes" aria-expanded="true" aria-controls=".container-notes" ><i class="fa-solid fa-plus"></i></a>

    ';
    $respuesta = 
    [
        'botones'=>$botones,
        'notas'=> ''
    ];
   
    if($mis_notas)
    {
      foreach($mis_notas as $notas)
      {
          $id = $notas['Id'];
          $titulo = $notas['Titulo'];
          $nota = $notas['Contenido'];
          $eliminado = $notas['Eliminado'];
          $actualizado = $notas['Actualizado'];
          $fecha_actual = CurrentTime();
          $fecha_movimiento = TimeDifference($actualizado,$fecha_actual);

          $respuesta['notas'] .= 
          "
          <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
              <div class='toast-header'>
                 <img src=$foto width='32' height='32' class='rounded me-2' alt='Perfil'>
                 <strong class='me-auto label-option-3' data-bs-toggle='collapse' data-bs-target='.body-$id' data-bs-auto-close='true'>$titulo</strong>
                 <small class='card-time'>$fecha_movimiento</small>
                 <div> 
                 <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
                 <span><i class='fas fa-ellipsis-v'></i></span>
               </button>
                 <ul class='dropdown-menu card-menu'>
                  <li class='dropdown-item card-menu-item'><a class='btn-edit-nota' id='$id' titulo='$titulo' nota='$nota' data-toggle='modal' data-target='#modal_editar_nota'>
                  <i class='fa-solid fa-edit'></i> Editar</a></li>
                  <li class='dropdown-item card-menu-item'><a class='btn-eliminar-nota' id='$id'>
                  <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                 </ul>
                 </div>
             </div>
             <div class='toast-body body-$id collapse'>
                 $nota
              </div>
           </div>
          ";
      }

      
    }
    else
    {
        $respuesta['notas'] = EmptyPage('Sin Notas Para Mostrar');
    }

    echo json_encode($respuesta);
}