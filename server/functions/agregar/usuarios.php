<?php

function nuevo_usuario()
{
    include_once '../conexion.php';

    $respuesta = 
    [
        'titulo'=>'warning',
        'cuerpo'=> 'warning',
        'accion'=> 'warning'
    ];

    if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass_2']) && isset($_POST['codigo']))
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass_2 = $_POST['pass_2'];
        $codigo = $_POST['codigo'];
        $codigo_bdd = ShowCode($user);

        $user = filter_var($user, FILTER_SANITIZE_STRING);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        $pass_2 = filter_var($pass_2, FILTER_SANITIZE_STRING);
        $codigo = filter_var($codigo, FILTER_SANITIZE_STRING);
        
        if($codigo != $codigo_bdd)
        {
            $respuesta = 
            [
                'titulo'=>'Ups!',
                'cuerpo'=> 'El codigo De Verificación No Coincide.',
                'accion'=> 'error'
            ];

            echo json_encode($respuesta);

            die();
        }
 
        if(!filter_var($user, FILTER_VALIDATE_EMAIL))
        {
            $respuesta = 
            [
                'titulo'=>'Ups!',
                'cuerpo'=> 'Debe Ingresar Una Dirección de Correo Valida.',
                'accion'=> 'error'
            ];

            echo json_encode($respuesta);

            die();
        }
        else
        {
            $userID = UserID($user);

            if($userID)
            {
                $respuesta = 
                [
                    'titulo'=>'Ups!',
                    'cuerpo'=> 'Esta Dirección de Correo Ya Esta En Uso.',
                    'accion'=> 'error'
                ];
    
                echo json_encode($respuesta);
    
                die();
            }
            else
            {
                if($pass != $pass_2)
                {
                    $respuesta = 
                    [
                        'titulo'=>'Ups!',
                        'cuerpo'=> 'Las Contraseñas No Coinciden.',
                        'accion'=> 'error'
                    ];
        
                    echo json_encode($respuesta);
        
                    die();
                }
                else
                {
                    $pass = password_hash($pass, PASSWORD_DEFAULT);
                    $fecha = CurrentDate();
                    $user_explode = explode('@', $user);
                    $user_name = $user_explode[0];
                    $nivel = 0;

                    $chekUser = CheckUserName($user_name);

                    if($chekUser)
                    {
                        $user_name = UserRandom($user_name);
                    }

                    $user_name = ucfirst($user_name);
                    
                    $insert_sql = 'INSERT INTO usuarios (User_name, Correo, Pass, Nivel, Fecha) VALUES (?,?,?,?,?)';
                    $sent = $pdo->prepare($insert_sql);
                    
                    if($sent->execute(array($user_name, $user, $pass, $nivel, $fecha)))
                    {
                        $respuesta = 
                        [
                            'titulo'=>'Registro Exitoso',
                            'cuerpo'=> '',
                            'accion'=> 'success'
                        ];
            
                        echo json_encode($respuesta);
            
                        die();
                    }
                    else
                    {
                        $respuesta = 
                        [
                            'titulo'=>'Error!',
                            'cuerpo'=> 'No Se Pudo Procesar La Solicitud.',
                            'accion'=> 'error'
                        ];
            
                        echo json_encode($respuesta);
            
                        die();
                    }
                }

            }
        }

        echo json_encode($respuesta);
    }

}