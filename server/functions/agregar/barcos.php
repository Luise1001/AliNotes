<?php 
function nuevo_barco()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $nivel = AdminLevel($_SESSION['admin']);
    $fecha = CurrentDate();
    $respuesta = 
    [
        'titulo'=>'warning',
        'cuerpo'=> 'warning',
        'accion'=> 'warning'
    ];

    if(isset($_POST['nombre']))
    {
        $nombre = $_POST['nombre'];
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $nombre = ucwords($nombre);


        if($nombre)
        {
            $insert_sql = 'INSERT INTO barcos (Barco, Id_usuario, Fecha) VALUES (?,?,?)';
            $sent = $pdo->prepare($insert_sql);
            if($sent->execute(array($nombre, $userID, $fecha)))
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