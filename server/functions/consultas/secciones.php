<?php

function mis_secciones()
{
  include_once '../conexion.php';
  $admin = $_SESSION['AliNotes']['admin'];
  $userID = UserID($admin);
  $sections = Sections($userID);
  $botones = 
  '
  <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-sections" 
  aria-expanded="true" aria-controls=".container-sections" ><i class="fa-solid fa-plus"></i></a>

  ';
  $respuesta = 
  [
    'botones'=> $botones,
    'secciones'=> ''
  ];

  if($sections)
  {
    foreach($sections as $section)
    {
       $id = $section['Id'];
       $titulo = $section['Titulo'];
       $actualizado = $section['Actualizado'];
       $fecha_actual = CurrentTime();
       $fecha_movimiento = TimeDifference($actualizado, $fecha_actual);

       $respuesta['secciones'] .= 
       "
       <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
           <div class='toast-header'>
              <strong class='me-auto label-option-3' data-bs-toggle='collapse' data-bs-target='.body-$id' 
              data-bs-auto-close='true'>$titulo</strong>
              <small class='card-time'>$fecha_movimiento</small>
              <div> 
              <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
              <span><i class='fas fa-ellipsis-v'></i></span>
            </button>
              <ul class='dropdown-menu card-menu'>
               <li class='dropdown-item card-menu-item'><a class='btn-edit-section' id='$id' titulo='$titulo'
               data-toggle='modal' data-target='#modal_editar_seccion'>
               <i class='fa-solid fa-edit'></i> Editar</a></li>
               <li class='dropdown-item card-menu-item'><a class='btn-eliminar-section' id='$id'>
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
     $respuesta['secciones'] = EmptyPage('Sin Secciones Para Mostrar');
  }

  echo json_encode($respuesta);
}

function secciones()
{
  include_once '../conexion.php';
  $admin = $_SESSION['AliNotes']['admin'];
  $userID = UserID($admin);
  $sections = Sections($userID);
  $respuesta = 
  [
    'secciones'=> ''
  ];

  if($sections)
  {
    foreach($sections as $section)
    {
       $id_section = $section['Id'];
       $titulo = $section['Titulo'];

       $respuesta['secciones'] .= "<option value='$id_section'>$titulo</option>";

    }
  }
  else
  {
     $respuesta['secciones'] = "<option value='0'>Agregue Una Sección</option>";
  }

  echo json_encode($respuesta);
}

function secciones_en_editar()
{
  include_once '../conexion.php';
  $admin = $_SESSION['AliNotes']['admin'];
  $userID = UserID($admin);
  $sections = Sections($userID);
  $respuesta = 
  [
    'secciones'=> ''
  ];

  if(isset($_POST['id_seccion']) && isset($_POST['seccion_name']))
  {
     $id_seccion = $_POST['id_seccion'];
     $seccion_name = $_POST['seccion_name'];

     $respuesta['secciones'] = "<option value='$id_seccion'>$seccion_name</option>";

     if($sections)
     {
       foreach($sections as $section)
       {
          $id_section = $section['Id'];
          $titulo = $section['Titulo'];
   
          if($id_section != $id_seccion && $seccion_name != $titulo)
          {
            $respuesta['secciones'] .= "<option value='$id_section'>$titulo</option>";
          }
          
       }
     }
  }


  echo json_encode($respuesta);
}