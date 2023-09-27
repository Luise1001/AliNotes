<?php

function editar_persona()
{ 
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
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
            $editsql = 'UPDATE personas SET Nombre=?, Apellido=?, Tipo_id=?, Cedula=?, Actualizado=? WHERE Id=? AND Id_usuario=?';
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
