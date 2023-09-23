<?php

function eliminar_nota()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
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

        $editsql = 'UPDATE notas SET Eliminado=?, Actualizado=? WHERE Id=? AND Id_usuario=?';
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