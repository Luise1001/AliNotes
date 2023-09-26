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

    if(isset($_POST['marca']) && isset($_POST['tipo']) && isset($_POST['modelo']) && isset($_POST['placa']) && isset($_POST['year']))
    {
        $marca = $_POST['marca'];
        $tipo = $_POST['tipo'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $year = $_POST['year'];

        $marca = filter_var($marca, FILTER_SANITIZE_STRING);
        $tipo = filter_var($tipo, FILTER_SANITIZE_STRING);
        $modelo = filter_var($modelo, FILTER_SANITIZE_STRING);
        $placa = filter_var($placa, FILTER_SANITIZE_STRING);
        $year = filter_var($year, FILTER_SANITIZE_STRING);
        
        $marca = ucwords($marca);
        $tipo = ucwords($tipo);
        $modelo = ucwords($modelo);
        $placa = strtoupper($placa);


        if($marca && $tipo && $modelo && $placa && $year)
        {
            $checkPlaca = CheckPlaca($placa, $userID);
            
            if(!$checkPlaca)
            {
                $insert_sql = 'INSERT INTO carros (Marca, Tipo, Modelo, Placa, Year_car, Id_usuario, Fecha) VALUES (?,?,?,?,?,?,?)';
                $sent = $pdo->prepare($insert_sql);
                if($sent->execute(array($marca, $tipo, $modelo, $placa, $year, $userID, $fecha)))
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
                    'cuerpo'=> 'Número de Placa Duplicado.',
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