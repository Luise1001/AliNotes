<?php

function agregar_informacion_personal()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $nivel = AdminLevel($userID);
    $fecha = CurrentDate();
    $respuesta = 
    [
        'titulo'=>'warning',
        'cuerpo'=> 'warning',
        'accion'=> 'warning'
    ];

    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['letra']) && isset($_POST['cedula']))
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $letra = $_POST['letra'];
        $cedula = $_POST['cedula'];

        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $apellido = filter_var($apellido, FILTER_SANITIZE_STRING);
        $letra = filter_var($letra, FILTER_SANITIZE_STRING);
        $cedula = filter_var($cedula, FILTER_SANITIZE_STRING);

        $nombre = ucwords($nombre);
        $apellido = ucwords($apellido);


      if($nombre && $apellido && $letra && $cedula)
      {
        $insert_sql = 'INSERT INTO informacion_personal (Nombre, Apellido, Tipo_id, Cedula, Id_usuario, Fecha) VALUES (?,?,?,?,?,?)';
        $sent = $pdo->prepare($insert_sql);
        if($sent->execute(array($nombre, $apellido, $letra, $cedula, $userID, $fecha)))
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
                'accion'=> 'warning'
            ];
        }
      }
      else
      {
        $respuesta = 
        [
            'titulo'=>'Ups!',
            'cuerpo'=> 'No se Pueden Guardar Campos Vacíos.',
            'accion'=> 'warning'
        ];
      }

      echo json_encode($respuesta);

    }
}

function agregar_informacion_juridica()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $nivel = AdminLevel($userID);
    $fecha = CurrentDate();
    $respuesta = 
    [
        'titulo'=>'warning',
        'cuerpo'=> 'warning',
        'accion'=> 'warning'
    ];

    if(isset($_POST['razon_social']) && isset($_POST['letra']) && isset($_POST['rif']) && isset($_POST['direccion']))
    {
        $razon_social = $_POST['razon_social'];
        $letra = $_POST['letra'];
        $rif = $_POST['rif'];
        $direccion = $_POST['direccion'];

        $razon_social = filter_var($razon_social, FILTER_SANITIZE_STRING);
        $letra = filter_var($letra, FILTER_SANITIZE_STRING);
        $rif = filter_var($rif, FILTER_SANITIZE_STRING);
        $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);

        $razon_social = ucwords($razon_social);
        $direccion = ucwords($direccion);


      if($razon_social && $letra && $rif && $direccion)
      {
        $insert_sql = 'INSERT INTO empresas (Razon_social, Tipo_id, Rif, Direccion, Id_usuario, Fecha) VALUES (?,?,?,?,?,?)';
        $sent = $pdo->prepare($insert_sql);
        if($sent->execute(array($razon_social, $letra, $rif, $direccion, $userID, $fecha)))
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
                'accion'=> 'warning'
            ];
        }
      }
      else
      {
        $respuesta = 
        [
            'titulo'=>'Ups!',
            'cuerpo'=> 'No se Pueden Guardar Campos Vacíos.',
            'accion'=> 'warning'
        ];
      }

      echo json_encode($respuesta);

    }
}