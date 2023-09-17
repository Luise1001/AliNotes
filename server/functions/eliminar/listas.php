<?php

function eliminar_lista()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $actualizado = CurrentTime();

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        $eliminado = 1;
        $respuesta = 
        [
            'titulo'=>'warning',
            'cuerpo'=> 'warning',
            'accion'=> 'warning'
        ];

        $editsql = 'UPDATE listas SET Eliminado=?, Actualizado=? WHERE Id=? AND Id_usuario=?';
        $editar_sentence = $pdo->prepare($editsql);
        if($editar_sentence->execute(array($eliminado, $actualizado, $id, $userID)))
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

function eliminar_item_lista()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $actualizado = CurrentTime();

    if(isset($_POST['id_lista']) && isset($_POST['id_item']))
    {
        $id_lista = $_POST['id_lista'];
        $id_item = $_POST['id_item'];
        $respuesta = 
        [
            'titulo'=>'warning',
            'cuerpo'=> 'warning',
            'accion'=> 'warning'
        ];

        $deletesql = 'DELETE FROM item_lista WHERE Id_item=? AND Id_lista=? AND Id_usuario=?';
        $sentenceDelete = $pdo->prepare($deletesql);
    
        if($sentenceDelete-> execute(array($id_item, $id_lista, $userID)))
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

