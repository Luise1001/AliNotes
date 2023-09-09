<?php 
function nueva_nota()
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

    if(isset($_POST['contenido']) && isset($_POST['titulo']))
    {
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $titulo = filter_var($titulo, FILTER_SANITIZE_STRING);
        $contenido = filter_var($contenido, FILTER_SANITIZE_STRING);
        $titulo = ucwords($titulo);
        $contenido = ucfirst($contenido);

        if($titulo && $contenido)
        {
            $insert_sql = 'INSERT INTO notas (Titulo, Contenido, Id_usuario, Fecha) VALUES (?,?,?,?)';
            $sent = $pdo->prepare($insert_sql);
            if($sent->execute(array($titulo, $contenido, $userID, $fecha)))
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