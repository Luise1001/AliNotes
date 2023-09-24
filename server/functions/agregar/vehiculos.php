<?php 
function nuevo_carro()
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

    if(isset($_POST['tipo']) && isset($_POST['modelo']) && isset($_POST['placa']) && isset($_POST['year']))
    {
        $tipo = $_POST['tipo'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $year = $_POST['year'];

        $tipo = filter_var($tipo, FILTER_SANITIZE_STRING);
        $modelo = filter_var($modelo, FILTER_SANITIZE_STRING);
        $placa = filter_var($placa, FILTER_SANITIZE_STRING);
        $year = filter_var($year, FILTER_SANITIZE_STRING);
        
        $tipo = ucwords($tipo);
        $modelo = ucwords($modelo);
        $placa = strtoupper($placa);


        if($tipo && $modelo && $placa && $year)
        {
            $insert_sql = 'INSERT INTO carros (Tipo, Modelo, Placa, Year_car, Id_usuario, Fecha) VALUES (?,?,?,?,?,?)';
            $sent = $pdo->prepare($insert_sql);
            if($sent->execute(array($tipo, $modelo, $placa, $year, $userID, $fecha)))
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