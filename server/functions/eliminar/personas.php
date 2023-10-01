<?php

function eliminar_persona()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $actualizado = CurrentTime();

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        $respuesta = 
        [
            'titulo'=>'warning',
            'cuerpo'=> 'warning',
            'accion'=> 'warning'
        ];

        $deletesql = 'DELETE FROM personas WHERE Id=? AND Id_usuario=?';
        $sentenceDelete = $pdo->prepare($deletesql);
        if($sentenceDelete-> execute(array($id, $userID)))
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
                'cuerpo'=> 'No se Pudo Eliminar El Registro.',
                'accion'=> 'error'
            ];
        }

        echo json_encode($respuesta);
    }
}