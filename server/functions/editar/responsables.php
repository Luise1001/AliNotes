<?php

function editar_responsable()
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

    if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['letra']) && isset($_POST['numero']))
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $letra = $_POST['letra'];
        $numero = $_POST['numero'];

        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $letra = filter_var($letra, FILTER_SANITIZE_STRING);
        $numero = filter_var($numero, FILTER_SANITIZE_STRING);

        $nombre = ucwords($nombre);

        if(isset($_FILES['file']))
        {
           $sello = NewSign($userID, $numero, 'sello', $_FILES);
        }
        else
        {
            $checkSign = CheckSign('sello', $numero, $userID);
            if(!$checkSign)
            { 
                $sello = 'Sin Sello';
            }
            else
            {
                $sello = $checkSign.'/sello.jpg';
            }
        }


        if($id && $nombre && $letra && $numero)
        {
                $editsql = 'UPDATE responsables SET Nombre=?, Tipo_id=?, Numero=?, Sello=?, Actualizado=? WHERE Id=? AND Id_usuario=?';
                $editar_sentence = $pdo->prepare($editsql);
    
                if($editar_sentence->execute(array($nombre, $letra, $numero, $sello, $actualizado, $id, $userID)))
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