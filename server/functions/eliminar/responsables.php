<?php

function eliminar_responsable()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $actualizado = CurrentTime();

    if(isset($_POST['id']) && isset($_POST['numero']))
    {
        $id = $_POST['id'];
        $numero = $_POST['numero'];
        $respuesta = 
        [
            'titulo'=>'warning',
            'cuerpo'=> 'warning',
            'accion'=> 'warning'
        ];

        $deletesql = 'DELETE FROM responsables WHERE Id=? AND Id_usuario=?';
        $sentenceDelete = $pdo->prepare($deletesql);
        if($sentenceDelete-> execute(array($id, $userID)))
        {
            $checkSign = CheckSign('sello', $numero, $userID);
            if($checkSign)
            {
                unlink($checkSign.'/sello.jpg');
                rmdir($checkSign);
            }
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