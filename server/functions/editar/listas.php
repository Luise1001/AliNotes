<?php

function editar_titulo_lista()
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

    if(isset($_POST['id']) && isset($_POST['titulo']))
    {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];

        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $titulo = filter_var($titulo, FILTER_SANITIZE_STRING);

        $titulo = ucwords($titulo);

        if($id && $titulo)
        {
            $editsql = 'UPDATE listas SET Titulo=?, Actualizado=? WHERE Id=? AND Id_usuario=?';
            $editar_sentence = $pdo->prepare($editsql);
        
            if($editar_sentence->execute(array($titulo, $actualizado, $id, $userID)))
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
                'accion'=> 'warning'
            ];   
        }
       
        echo json_encode($respuesta);
    }


}