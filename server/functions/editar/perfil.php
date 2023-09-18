<?php

function foto_perfil()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $foto = 'perfil';
    
    if(isset($_FILES))
    { 
        Actualizado('usuarios', $userID);
        MyProfilePhoto($userID, $foto, $_FILES);
    }
}

function editar_user_name()
{
  include_once '../conexion.php';
  $userID = UserID($_SESSION['admin']);
  $actualizado = CurrentTime();
  $respuesta = 
  [
      'titulo'=>'warning',
      'cuerpo'=> 'warning',
      'accion'=> 'warning'
  ];

  if(isset($_POST['username']))
  {
     $username = $_POST['username'];

     if($username)
     {
        $checkUser = CheckUserName($username);

        if($checkUser)
        {
            $username = UserRandom($username);
        }

        $username = ucfirst($username);

        $editsql = 'UPDATE usuarios SET User_name=?, Actualizado=? WHERE Id=?';
        $editar_sentence = $pdo->prepare($editsql);

        if($editar_sentence->execute(array($username, $actualizado, $userID)))
        {
            $respuesta = 
            [
                'titulo'=>'Operación Exitosa',
                'cuerpo'=> '',
                'accion'=> 'success'
            ];
        }
        else
        {
            $respuesta = 
            [
                'titulo'=>'Ups!',
                'cuerpo'=> 'No Se Pudo Guardar El Registro.',
                'accion'=> 'error'
            ];
        }

     }
     else
     {
        $respuesta = 
        [
            'titulo'=>'Ups!',
            'cuerpo'=> 'No se Pueden Guardar Campos Vacíos',
            'accion'=> 'warning'
        ];
     }

     echo json_encode($respuesta);
  }
}