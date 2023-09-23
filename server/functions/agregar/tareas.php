<?php 
function nueva_tarea()
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

    if(isset($_POST['tarea']))
    {
        $tarea = $_POST['tarea'];
        $tarea = filter_var($tarea, FILTER_SANITIZE_STRING);
        $tarea = ucfirst($tarea);

        if($tarea)
        {
            $insert_sql = 'INSERT INTO tareas (Tarea, Id_usuario, Fecha) VALUES (?,?,?)';
            $sent = $pdo->prepare($insert_sql);
            if($sent->execute(array($tarea, $userID, $fecha)))
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
            'cuerpo'=> 'No Se Pueden Generar Registros Vacíos.',
            'accion'=> 'warning'
          ];
        }
        
        echo json_encode($respuesta);
    }
}