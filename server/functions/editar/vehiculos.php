<?php

function editar_carro()
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

    if(isset($_POST['id']) && isset($_POST['tipo']) && isset($_POST['modelo']) && isset($_POST['placa']) && isset($_POST['year']))
    {
        $id = $_POST['id'];
        $tipo = $_POST['tipo'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $year = $_POST['year'];

        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $tipo = filter_var($tipo, FILTER_SANITIZE_STRING);
        $modelo = filter_var($modelo, FILTER_SANITIZE_STRING);
        $placa = filter_var($placa, FILTER_SANITIZE_STRING);
        $year = filter_var($year, FILTER_SANITIZE_STRING);
        
        $tipo = ucwords($tipo);
        $modelo = ucwords($modelo);
        $placa = strtoupper($placa);



        if($id && $tipo && $modelo && $placa && $year)
        {
            $editsql = 'UPDATE carros SET Tipo=?, Modelo=?, Placa=?, Year_car=?, Actualizado=? WHERE Id=? AND Id_usuario=?';
            $editar_sentence = $pdo->prepare($editsql);

            if($editar_sentence->execute(array($tipo, $modelo, $placa, $year, $actualizado, $id, $userID)))
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