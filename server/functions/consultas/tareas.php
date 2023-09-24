<?php

function mis_tareas()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $foto = SearchProfilePhoto($userID);
    $mis_tareas = MyTasks($userID);
    $botones = 
    '<a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-tasks" aria-expanded="true"
     aria-controls=".container-tasks" ><i class="fa-solid fa-plus"></i></a>';

    $respuesta = 
    [
        'botones'=>$botones,
        'tareas'=> ''
    ];

    if($mis_tareas)
    {
      $respuesta['tareas'] .=
      "
      <div class='accordion'>
        <div class='accordion-item'>
          <h2 class='accordion-header'>
           <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#pendientes' aria-expanded='true' aria-controls='pendientes'>
              Pendientes
           </button>
         </h2>
         <div id='pendientes' class='accordion-collapse collapse show'>
         <div class=''>
      ";
      foreach($mis_tareas as $tarea)
      {
        $id = $tarea['Id'];
        $contenido = $tarea['Tarea'];
        $completado = $tarea['Completado'];
        $eliminado = $tarea['Eliminado'];
        $actualizado = $tarea['Actualizado'];
        $fecha_actual = CurrentTime();
        $fecha_movimiento = TimeDifference($actualizado, $fecha_actual);

        if(!$completado)
        {
          $check = "<i class='fa-solid fa-check'></i>";

          $respuesta['tareas'] .= 
          "
          <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
              <div class='toast-header'>
                 <img src=$foto width='32' height='32' class='rounded me-2' alt='Perfil'>
                 <strong class='me-auto label-option-3' data-bs-toggle='collapse' data-bs-target='.body-$id' data-bs-auto-close='true'>$contenido</strong>
                 <small class='card-time'><a tarea='$id' completado='$completado' class='finish-task btn-option-5'>$check</a></small>
                 <small class='card-time'>$fecha_movimiento</small>
                 <div> 
                 <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
                 <span><i class='fas fa-ellipsis-v'></i></span>
               </button>
                 <ul class='dropdown-menu card-menu'>
                  <li class='dropdown-item card-menu-item'><a class='btn-editar-tarea' id='$id' tarea='$contenido'  data-toggle='modal' data-target='#modal_editar_tarea'>
                  <i class='fa-solid fa-edit'></i> Editar</a></li>
                  <li class='dropdown-item card-menu-item'><a class='btn-eliminar-tarea' id='$id'>
                  <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                 </ul>
                 </div>
             </div>
             <div class='toast-body body-$id collapse'>
             $contenido
          </div>
           </div>
          ";

          $respuesta['tareas'] .=
          "
          </div>
        </div>
      </div>
      ";
        }
      }

  $respuesta['tareas'] .=
  "
  <div class='accordion'>
    <div class='accordion-item'>
      <h2 class='accordion-header'>
       <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#completadas' aria-expanded='true' aria-controls='completadas'>
          Completadas
       </button>
     </h2>
     <div id='completadas' class='accordion-collapse collapse'>
     <div class=''>
  ";
  foreach($mis_tareas as $tarea)
  {
    $id = $tarea['Id'];
    $contenido = $tarea['Tarea'];
    $completado = $tarea['Completado'];
    $eliminado = $tarea['Eliminado'];
    $actualizado = $tarea['Actualizado'];
    $fecha_actual = CurrentTime();
    $fecha_movimiento = TimeDifference($actualizado, $fecha_actual);

    if($completado)
    {
      $check = "<i class='fa-solid fa-check-double'></i>";

      $respuesta['tareas'] .= 
      "
      <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
          <div class='toast-header'>
             <img src=$foto width='32' height='32' class='rounded me-2' alt='Perfil'>
             <strong class='me-auto label-option-3' data-bs-toggle='collapse' data-bs-target='.body-$id' data-bs-auto-close='true'>$contenido</strong>
             <small class='card-time'><a tarea='$id' completado='$completado' class='finish-task btn-option-5'>$check</a></small>
             <small class='card-time'>$fecha_movimiento</small>
             <div> 
             <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
             <span><i class='fas fa-ellipsis-v'></i></span>
           </button>
             <ul class='dropdown-menu card-menu'>
              <li class='dropdown-item card-menu-item'><a class='btn-editar-tarea' id='$id' tarea='$contenido'  data-toggle='modal' data-target='#modal_editar_tarea'>
              <i class='fa-solid fa-edit'></i> Editar</a></li>
              <li class='dropdown-item card-menu-item'><a class='btn-eliminar-tarea' id='$id'>
              <i class='fa-solid fa-trash'></i> Eliminar</a></li>
             </ul>
             </div>
         </div>
         <div class='toast-body body-$id collapse'>
         $contenido
      </div>
       </div>
      ";
      $respuesta['tareas'] .=
      "
      </div>
    </div>
    </div>
    ";
    }

  }

    }
    else
    {
      $respuesta['tareas'] = EmptyPage('Sin Tareas Para Mostrar.');
    }
    echo json_encode($respuesta);
}