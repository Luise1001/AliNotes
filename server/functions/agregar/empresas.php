<?php

function agregar_empresa()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($userID);
    $fecha = CurrentDate();
    $respuesta = 
    [
        'titulo'=>'warning',
        'cuerpo'=> 'warning',
        'accion'=> 'warning'
    ];

    if(isset($_POST['razon_social']) && isset($_POST['letra']) && isset($_POST['rif']) && isset($_POST['direccion']))
    {
        $razon_social = $_POST['razon_social'];
        $letra = $_POST['letra'];
        $rif = $_POST['rif'];
        $direccion = $_POST['direccion'];

        $razon_social = filter_var($razon_social, FILTER_SANITIZE_STRING);
        $letra = filter_var($letra, FILTER_SANITIZE_STRING);
        $rif = filter_var($rif, FILTER_SANITIZE_STRING);
        $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);

        $razon_social = ucwords($razon_social);
        $direccion = ucwords($direccion);


      if($razon_social && $letra && $rif && $direccion)
      {
         $empresa = BusinessData($userID, $nivel);

         if($nivel === '1' || $nivel === '0' && $empresa === false)
         {
            $insert_sql = 'INSERT INTO empresas (Razon_social, Tipo_id, Rif, Direccion, Id_usuario, Fecha) VALUES (?,?,?,?,?,?)';
            $sent = $pdo->prepare($insert_sql);
            if($sent->execute(array($razon_social, $letra, $rif, $direccion, $userID, $fecha)))
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
                    'accion'=> 'warning'
                ];
            }
         }
         else
         {
            $respuesta = 
            [
                'titulo'=>'Ups!',
                'cuerpo'=> 'Usuario No Autorizado Para Esta Operación.',
                'accion'=> 'warning'
            ];
         }
      }
      else
      {
        $respuesta = 
        [
            'titulo'=>'Ups!',
            'cuerpo'=> 'No se Pueden Guardar Campos Vacíos.',
            'accion'=> 'warning'
        ];
      }

      echo json_encode($respuesta);

    }
}