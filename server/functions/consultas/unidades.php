<?php

function unidades()
{
  include_once '../conexion.php';
  $userID = UserID($_SESSION['admin']);
  $unidades = Units($userID);
  $respuesta = 
  [
    'unidades'=> ''
  ];

  if($unidades)
  {
    foreach($unidades as $unidad)
    {
       $id_unidad = $unidad['Id'];
       $nombre = $unidad['Nombre'];

       $respuesta['unidades'] .= "<option value='$nombre'>$nombre</option>";

    }
  }
  else
  {
     $respuesta['unidades'] = '<option value="0">Sin Datos</option>';
  }

  echo json_encode($respuesta);
}

function unidades_en_editar()
{
  include_once '../conexion.php';
  $userID = UserID($_SESSION['admin']);
  $unidades = Units($userID);
  $respuesta = 
  [
    'unidades'=> ''
  ];

  if(isset($_POST['unidad']))
  {
     $mi_unidad = $_POST['unidad'];

     $respuesta['unidades'] = "<option value='$mi_unidad'>$mi_unidad</option>";

     if($unidades)
     {
       foreach($unidades as $unidad)
       {
          $id_unidad = $unidad['Id'];
          $nombre = $unidad['Nombre'];
   
          if($nombre != $mi_unidad)
          {
            $respuesta['unidades'] .= "<option value='$nombre'>$nombre</option>";
          }
   
       }
     }
  }




  echo json_encode($respuesta);
}