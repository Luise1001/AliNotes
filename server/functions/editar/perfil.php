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

function editar_personal_info()
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

    if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['letra']) && isset($_POST['cedula']))
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $letra = $_POST['letra'];
        $cedula = $_POST['cedula'];

        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $apellido = filter_var($apellido, FILTER_SANITIZE_STRING);
        $letra = filter_var($letra, FILTER_SANITIZE_STRING);
        $cedula = filter_var($cedula, FILTER_SANITIZE_STRING);

        $nombre = ucwords($nombre);
        $apellido = ucwords($apellido);


        if($id && $nombre && $apellido && $letra && $cedula)
        {
            $editsql = 'UPDATE informacion_personal SET Nombre=?, Apellido=?, Tipo_id=?, Cedula=?, Actualizado=? WHERE Id=? AND Id_usuario=?';
            $editar_sentence = $pdo->prepare($editsql);

            if($editar_sentence->execute(array($nombre, $apellido, $letra, $cedula, $actualizado, $id, $userID)))
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
                    'cuerpo'=> 'No se Pudo Guardar El Registro.',
                    'accion'=> 'error'
                ]; 
            }
        }
        else
        {
            $respuesta = 
            [
                'titulo'=>'Ups!',
                'cuerpo'=> 'No se Pueden Guardar Campos Vacíos.',
                'accion'=> 'error'
            ];
        }

        echo json_encode($respuesta);

    }
}

function editar_juridica_info()
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

    if(isset($_POST['id']) && isset($_POST['razon_social']) && isset($_POST['direccion']) && isset($_POST['letra']) && isset($_POST['rif']))
    {
        $id = $_POST['id'];
        $razon_social = $_POST['razon_social'];
        $direccion = $_POST['direccion'];
        $letra = $_POST['letra'];
        $rif = $_POST['rif'];

        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $razon_social = filter_var($razon_social, FILTER_SANITIZE_STRING);
        $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);
        $letra = filter_var($letra, FILTER_SANITIZE_STRING);
        $rif = filter_var($rif, FILTER_SANITIZE_STRING);

        $razon_social = ucwords($razon_social);
        $direccion = ucwords($direccion);


        if($id && $razon_social && $letra && $rif && $direccion)
        {
            $editsql = 'UPDATE empresas SET Razon_social=?, Direccion=?, Tipo_id=?, Rif=?, Actualizado=? WHERE Id=? AND Id_usuario=?';
            $editar_sentence = $pdo->prepare($editsql);

            if($editar_sentence->execute(array($razon_social, $direccion, $letra, $rif, $actualizado, $id, $userID)))
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
                    'cuerpo'=> 'No se Pudo Guardar El Registro.',
                    'accion'=> 'error'
                ]; 
            }
        }
        else
        {
            $respuesta = 
            [
                'titulo'=>'Ups!',
                'cuerpo'=> 'No se Pueden Guardar Campos Vacíos.',
                'accion'=> 'error'
            ];
        }

        echo json_encode($respuesta);

    }
}

