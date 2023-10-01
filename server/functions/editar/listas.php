<?php

function editar_titulo_lista()
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

function hide_show_lista()
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

    if(isset($_POST['lista']) && isset($_POST['visible']))
    {
        $id_lista = $_POST['lista'];
        $visible = $_POST['visible'];

        $id_lista = filter_var($id_lista, FILTER_SANITIZE_STRING);
        $visible = filter_var($visible, FILTER_SANITIZE_STRING);

        if($visible == 1)
        {
            $visible = 0;
        }
        else
        {
            $visible = 1;
        }

        if($id_lista)
        {
            $editsql = 'UPDATE listas SET Visible=?, Actualizado=? WHERE Id=? AND Id_usuario=?';
            $editar_sentence = $pdo->prepare($editsql);
        
            if($editar_sentence->execute(array($visible, $actualizado, $id_lista, $userID)))
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
                    'cuerpo'=> 'No se Pudo Editar El Registro.',
                    'accion'=> 'error'
                ]; 
            }
        }

        echo json_encode($respuesta);
    }
}

function hide_show_item()
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

    if(isset($_POST['lista']) && isset($_POST['item']) && isset($_POST['visible']))
    {
        $id_lista = $_POST['lista'];
        $id_item = $_POST['item'];
        $visible = $_POST['visible'];

        $id_lista = filter_var($id_lista, FILTER_SANITIZE_STRING);
        $id_item = filter_var($id_item, FILTER_SANITIZE_STRING);
        $visible = filter_var($visible, FILTER_SANITIZE_STRING);

        if($visible == 1)
        {
            $visible = 0;
        }
        else
        {
            $visible = 1;
        }

        if($id_lista && $id_item)
        {
            $editsql = 'UPDATE item_lista SET Visible=?, Actualizado=? WHERE Id_item=? AND Id_lista=? AND Id_usuario=?';
            $editar_sentence = $pdo->prepare($editsql);
        
            if($editar_sentence->execute(array($visible, $actualizado, $id_item, $id_lista, $userID)))
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
                    'cuerpo'=> 'No se Pudo Editar El Registro.',
                    'accion'=> 'error'
                ]; 
            }
        }
        else
        {
             echo 'aja';
        }

        echo json_encode($respuesta);
    }
}

function editar_item_lista()
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

 
    if(isset($_POST['id_lista']) && isset($_POST['id_seccion']) && isset($_POST['id_item']) && 
       isset($_POST['tipo_unidad']) && isset($_POST['descripcion']) && isset($_POST['peso']) && isset($_POST['cantidad']))
    {
        $id_lista = $_POST['id_lista'];
        $id_seccion = $_POST['id_seccion'];
        $id_item = $_POST['id_item'];
        $tipo_unidad = $_POST['tipo_unidad'];
        $descripcion = $_POST['descripcion'];
        $peso = $_POST['peso'];
        $cantidad = $_POST['cantidad'];
        $observacion = $_POST['observacion'];
        $kilos = $peso * $cantidad;

        $id_lista = filter_var($id_lista, FILTER_SANITIZE_STRING);
        $id_seccion = filter_var($id_seccion, FILTER_SANITIZE_STRING);
        $id_item = filter_var($id_item, FILTER_SANITIZE_STRING);
        $tipo_unidad = filter_var($tipo_unidad, FILTER_SANITIZE_STRING);
        $descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);
        $peso = filter_var($peso, FILTER_SANITIZE_STRING);
        $cantidad = filter_var($cantidad, FILTER_SANITIZE_STRING);
        $observacion = filter_var($observacion, FILTER_SANITIZE_STRING);

    
        if($id_lista && $id_seccion && $id_item && $tipo_unidad && $descripcion && $peso && $cantidad)
        {
            $itemID = ItemID($descripcion, $tipo_unidad);

            if(!$itemID)
            {
                $add_item = AddItem($descripcion, $tipo_unidad, $peso, $userID, $fecha);

                if($add_item)
                {
                   $itemID = ItemID($descripcion, $tipo_unidad);
                   
                 }
            }

            $editsql = 'UPDATE item_lista SET Id_item=?, Cantidad=?, Kilos=?, Observacion=?, Id_seccion=?, Actualizado=? WHERE Id_item=? AND Id_lista=? AND Id_usuario=?';
            $editar_sentence = $pdo->prepare($editsql);
        
            if($editar_sentence->execute(array($itemID, $cantidad, $kilos, $observacion, $id_seccion, $actualizado, $id_item, $id_lista, $userID)))
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
                    'cuerpo'=> 'No se Pudo Editar El Registro.',
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