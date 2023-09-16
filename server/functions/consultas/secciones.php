<?php

function secciones()
{
  include_once '../conexion.php';
  $userID = UserID($_SESSION['admin']);
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
     $respuesta['secciones'] = '<option value="2">Sin Sección</option>';
  }

  echo json_encode($respuesta);
}