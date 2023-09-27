<?php

function editar_empresa()
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

    if(isset($_POST['id']) && isset($_POST['razon_social']) && isset($_POST['direccion']) && isset($_POST['letra']) && isset($_POST['rif']))
    {
        $id = $_POST['id'];
        $razon_social = $_POST['razon_social'];
        $direccion = $_POST['direccion'];
        $letra = $_POST['letra'];
        $rif = $_POST['rif'];

        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $razon_social = filter_var($razon_social, FILTER_SANITIZE_STRING);
        $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);
        $letra = filter_var($letra, FILTER_SANITIZE_STRING);
        $rif = filter_var($rif, FILTER_SANITIZE_STRING);

        $razon_social = ucwords($razon_social);
        $direccion = ucwords($direccion);


        if($id && $razon_social && $letra && $rif && $direccion)
        {
            $editsql = 'UPDATE empresas SET Razon_social=?, Direccion=?, Tipo_id=?, Rif=?, Actualizado=? WHERE Id=? AND Id_usuario=?';
            $editar_sentence = $pdo->prepare($editsql);

            if($editar_sentence->execute(array($razon_social, $direccion, $letra, $rif, $actualizado, $id, $userID)))
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
