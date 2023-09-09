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
        $mis_notas = array_reverse($mis_notas);
      foreach($mis_notas as $notas)
      {
          $id_nota = $notas['Id'];
          $titulo = $notas['Titulo'];
          $nota = $notas['Contenido'];
          $fecha = $notas['Fecha'];
          $actualizado = $notas['Actualizado'];
          $fecha_actual = CurrentTime();
          $fecha_movimiento = TimeDifference($actualizado, $fecha_actual, 'minutos');
          $respuesta['notas'] .= 
          "
          <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
              <div class='toast-header'>
                 <img src=$foto width='32' height='32' class='rounded me-2' alt='logo'>
                 <strong class='me-auto'>$titulo</strong>
                 <small> Hace $fecha_movimiento Minutos</small>
             </div>
             <div class='toast-body'>
                 $nota
              </div>
           </div>
          ";
      }

      echo json_encode($respuesta);
    }

    
}