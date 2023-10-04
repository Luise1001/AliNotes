<?php

function lista_de_usuarios()
{
   include_once '../conexion.php';
   $admin = $_SESSION['AliNotes']['admin'];
   $userID = UserID($admin);
   $nivel = AdminLevel($userID);
   $UserList = UserList($userID);
   $respuesta = 
   [
      'botones'=> '',
      'usuarios'=>''
   ];

  if($UserList)
  {
     foreach($UserList as $user)
     {
        $id = $user['Id'];
        $user_name = $user['user'];
        $correo = $user['email'];
        $nombre = $user['nombre'];
        $apellido = $user['apellido'];
        $empresa = $user['razon_social'];
        $actualizado = $user['actualizado'];
        $foto = SearchProfilePhoto($id);
        $fecha_actual = CurrentTime();
        $fecha_movimiento = TimeDifference($actualizado, $fecha_actual);

        $respuesta['usuarios'] .= 
        "
        <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
            <div class='toast-header'>
               <img src=$foto width='32' height='32' class='rounded me-2' alt='Perfil'>
               <strong class='me-auto label-option-3' data-bs-toggle='collapse' data-bs-target='.body-$id' 
               data-bs-auto-close='true'>$user_name</strong>
               <small class='card-time'></small>
           </div>
           <div class='toast-body body-$id'>
               <p>$nombre $apellido</p>
            </div>
         </div>
        ";
     }
  }
  else
  {
     $respuesta['usuarios'] = EmptyPage('Sin Usuarios Para Mostrar');
  }
   echo json_encode($respuesta);

}