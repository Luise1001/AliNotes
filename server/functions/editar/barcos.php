<?php

function editar_barco()
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

    if(isset($_POST['id']) && isset($_POST['nombre']))
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];

        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $nombre = ucwords($nombre);


        if($id && $nombre)
        {
            $editsql = 'UPDATE barcos SET Barco=?, Actualizado=? WHERE Id=? AND Id_usuario=?';
            $editar_sentence = $pdo->prepare($editsql);

            if($editar_sentence->execute(array($nombre, $actualizado, $id, $userID)))
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