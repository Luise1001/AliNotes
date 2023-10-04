<?php

function nueva_lista()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
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
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $fecha = CurrentDate();
    $respuesta = 
    [
        'titulo'=>'warning',
        'cuerpo'=> 'warning',
        'accion'=> 'warning'
    ];


    if(isset($_POST['lista']) && isset($_POST['tipo_unidad']) && isset($_POST['descripcion']) && isset($_POST['peso']) && isset($_POST['cantidad']))
    {
        $id_lista = $_POST['lista'];
        $id_seccion = $_POST['seccion'];
        $tipo_unidad = $_POST['tipo_unidad'];
        $descripcion = $_POST['descripcion'];
        $peso = $_POST['peso'];
        $cantidad = $_POST['cantidad'];
        $observacion = $_POST['observacion'];

        $id_lista = filter_var($id_lista, FILTER_SANITIZE_STRING);
        $id_seccion = filter_var($id_seccion, FILTER_SANITIZE_STRING);
        $tipo_unidad = filter_var($tipo_unidad, FILTER_SANITIZE_STRING);
        $descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);
        $peso = filter_var($peso, FILTER_SANITIZE_STRING);
        $cantidad = filter_var($cantidad, FILTER_SANITIZE_STRING);
        $observacion = filter_var($observacion, FILTER_SANITIZE_STRING);

        $descripcion = ucwords($descripcion);
        $observacion = ucwords($observacion);


        if($id_lista && $tipo_unidad && $descripcion && $peso && $cantidad)
        {
            $kilos = $peso * $cantidad;
            $item_id = ItemID($descripcion, $tipo_unidad);
            if(!$item_id)
            {
              $add_item = AddItem($descripcion, $tipo_unidad, $peso, $userID, $fecha);

              if($add_item)
              {
                 $item_id = ItemID($descripcion, $tipo_unidad);
              }
            }

            $itemOnList = ItemOnList($id_lista, $item_id, $userID);

            if($itemOnList)
            {
                $respuesta = 
                [
                    'titulo'=>'Atención',
                    'cuerpo'=> 'Item Duplicado',
                    'accion'=> 'warning'
                ];
            }
            else
            {
                $insert_sql = 'INSERT INTO item_lista (Id_item, Observacion, Cantidad, Kilos, Id_seccion, Id_lista, Id_usuario, Fecha) VALUES (?,?,?,?,?,?,?,?)';
                $sent = $pdo->prepare($insert_sql);
                if($sent->execute(array($item_id, $observacion, $cantidad, $kilos, $id_seccion, $id_lista, $userID, $fecha)))
                {
                    Actualizado('listas', $id_lista);
                    Actualizado('secciones', $id_seccion);
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