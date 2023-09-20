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
     $respuesta['secciones'] = "<option value='0'>Agregue Una Sección</option>";
  }

  echo json_encode($respuesta);
}

function secciones_en_editar()
{
  include_once '../conexion.php';
  $userID = UserID($_SESSION['admin']);
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