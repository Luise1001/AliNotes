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

function nuevo_item_lista()
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

    if(isset($_POST['id']) && isset($_POST['item']))
    {
        $id_lista = $_POST['id'];
        $item = $_POST['item'];

        $id_lista = filter_var($id_lista, FILTER_SANITIZE_STRING);
        $item = filter_var($item, FILTER_SANITIZE_STRING);

        if($id_lista && $item)
        {
            $item_id = ItemID($item);
            if(!$item_id)
            {
                $tipo_unidad = NULL;
                $cantidad = NULL;

              $add_item = AddItem($item, $tipo_unidad, $cantidad, $userID, $fecha);

              if($add_item)
              {
                 $item_id = ItemID($item);
              }
            }


            $insert_sql = 'INSERT INTO item_lista (Id_item, Observacion, Id_seccion, Id_lista, Id_usuario, Fecha) VALUES (?,?,?,?,?,?)';
            $sent = $pdo->prepare($insert_sql);
            if($sent->execute(array($item_id, NULL,  NULL, $id_lista, $userID, $fecha)))
            {
                Actualizado('listas', $id_lista);
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