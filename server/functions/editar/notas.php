<?php

function editar_nota()
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

    if(isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['nota']))
    {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $contenido = $_POST['nota'];

        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $titulo = filter_var($titulo, FILTER_SANITIZE_STRING);
        $contenido = filter_var($contenido, FILTER_SANITIZE_STRING);

        $titulo = ucwords($titulo);
        $contenido = ucfirst($contenido);

        if($id && $titulo && $contenido)
        {
            $editsql = 'UPDATE notas SET Titulo=?, Contenido=?, Actualizado=? WHERE Id=? AND Id_usuario=?';
            $editar_sentence = $pdo->prepare($editsql);

            if($editar_sentence->execute(array($titulo, $contenido, $actualizado, $id, $userID)))
            {
                $respuesta = 
                [
                    'titulo'=>'Operación Exitosa',
                    'cuerpo'=> '',
                    'accion'=> 'success'
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