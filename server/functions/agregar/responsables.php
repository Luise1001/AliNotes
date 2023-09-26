<?php 
function nuevo_responsable()
{ 
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($admin);
    $fecha = CurrentDate();
    $respuesta = 
    [
        'titulo'=>'warning',
        'cuerpo'=> 'warning',
        'accion'=> 'warning'
    ];

    if(isset($_POST['nombre']) && isset($_POST['letra']) && isset($_POST['numero']))
    {
        $nombre = $_POST['nombre'];
        $letra = $_POST['letra'];
        $numero = $_POST['numero'];

        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $letra = filter_var($letra, FILTER_SANITIZE_STRING);
        $numero = filter_var($numero, FILTER_SANITIZE_STRING);
        
        $nombre = ucwords($nombre);


        if($nombre && $letra && $numero)
        {
            $checkResponsable = CheckResponsable($numero,$userID);

            if(!$checkResponsable)
            {
                if(isset($_FILES['file']))
                {
                   $sello = NewSign($userID, $numero, 'sello', $_FILES);
                }
                else
                {
                  $sello = "Sin Sello";
                }
                
                $insert_sql = 'INSERT INTO responsables (Nombre, Tipo_id, Numero, Sello, Id_usuario, Fecha) VALUES (?,?,?,?,?,?)';
                $sent = $pdo->prepare($insert_sql);
                if($sent->execute(array($nombre, $letra, $numero, $sello, $userID, $fecha)))
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
                    'cuerpo'=> 'Responsable Duplicado',
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