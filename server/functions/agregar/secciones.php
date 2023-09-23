<?php

function nueva_seccion()
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

    if(isset($_POST['seccion']))
    {
        $seccion = $_POST['seccion'];

        $seccion = filter_var($seccion, FILTER_SANITIZE_STRING);
        $seccion = ucfirst($seccion);

        if($seccion)
        {
            $section_id = SectionID($seccion, $userID);

            if(!$section_id)
            {
               $new_section = AddSection($seccion, $userID, $fecha);
            }
            else
            {
                $new_section = false;
            }

            if($new_section)
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