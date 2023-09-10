<?php

function nueva_lista()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $fecha = CurrentDate();
    $respuesta = 
    [
        'titulo'=>'warning',
        'cuerpo'=> 'warning',
        'accion'=> 'warning'
    ];

    if(isset($_POST['titulo']))
    {
        $titulo = $_POST['titulo'];
        $titulo = filter_var($titulo, FILTER_SANITIZE_STRING);
        $titulo = ucwords($titulo);

        if($titulo)
        {
            $insert_sql = 'INSERT INTO listas (Titulo, Id_usuario, Fecha) VALUES (?,?,?)';
            $sent = $pdo->prepare($insert_sql);
            if($sent->execute(array($titulo,$userID, $fecha)))
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
                    'cuerpo'=> 'No Se Pudo Generar El Registro.',
                    'accion'=> 'error'
                ];
            }
        }
        else
        {
            $respuesta = 
            [
                'titulo'=>'Ups!',
                'cuerpo'=> 'No Se Pueden Registrar Datos Vacíos.',
                'accion'=> 'warning'
            ];
        }

        echo json_encode($respuesta);
    }
}