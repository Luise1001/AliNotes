<?php

function agregar_persona()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
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
           $person = PersonData($userID, $nivel);

         if($nivel === '1' || $nivel === '0' && $person === false)
         {
            $insert_sql = 'INSERT INTO personas (Nombre, Apellido, Tipo_id, Cedula, Id_usuario, Fecha) VALUES (?,?,?,?,?,?)';
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
                'cuerpo'=> 'Usuario No Autorizado Para Esta Operación.',
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