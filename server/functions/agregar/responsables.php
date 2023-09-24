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

    if(isset($_POST['nombre']) && isset($_POST['letra']) && isset($_POST['identidad']))
    {
        $nombre = $_POST['nombre'];
        $letra = $_POST['letra'];
        $identidad = $_POST['identidad'];
        $sello = "No";

        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $letra = filter_var($letra, FILTER_SANITIZE_STRING);
        $identidad = filter_var($identidad, FILTER_SANITIZE_STRING);
        
        $nombre = ucwords($nombre);


        if($nombre && $letra && $identidad)
        {
            $checkResponsable = CheckResponsable($identidad,$userID);
            if(isset($_FILES['file']))
            {
               $sello = NewSign($userID, $identidad, 'sello', $_FILES);

               if($sello == 1)
               {
                  $sello = "Si";
               }
            }
            

            if(!$checkResponsable)
            {
                $insert_sql = 'INSERT INTO responsables (Nombre, Tipo_id, Numero, Sello, Id_usuario, Fecha) VALUES (?,?,?,?,?,?)';
                $sent = $pdo->prepare($insert_sql);
                if($sent->execute(array($nombre, $letra, $identidad, $sello, $userID, $fecha)))
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