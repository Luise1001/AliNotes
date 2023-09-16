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