<?php

function login()
{
    if(isset($_POST['user']) && isset($_POST['pass']))
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $alert = 
        [
            'titulo'=> 'warnign',
            'cuerpo'=> 'warning',
            'action'=> 'warning'
        ];

        $user = filter_var($user, FILTER_SANITIZE_EMAIL);
        $pass =  filter_var($pass, FILTER_SANITIZE_STRING);

        if(!filter_var($user, FILTER_VALIDATE_EMAIL))
        {
            $alert['titulo'] = 'Cuidado!';
            $alert['cuerpo'] = 'Debe Ingresar Un Correo Valido.';
            $alert['accion'] = 'error';

            echo json_encode($alert);

            die();
        }

        $userID = UserID($user);
    
        if($userID)
        {
            $nivel = AdminLevel($userID);
            $password = UserPassword($userID, $nivel);
            $user_name = UserName($userID);

            if(password_verify($pass, $password))
            {
                $_SESSION['admin'] = $user;

                $alert['titulo'] = 'Operación Exitosa.';
                $alert['cuerpo'] = '';
                $alert['accion'] = 'success';
            }
            else
            {
                $alert['titulo'] = "Atención!";
                $alert['cuerpo'] = 'Contraseña Incorrecta.';
                $alert['accion'] = 'warning';

            }
          
        }
        else
        {
           $alert['titulo'] = 'Atención!';
           $alert['cuerpo'] = 'Este Usuario No Se Encuentra Registrado.';
           $alert['accion'] = 'error';
        }

        echo json_encode($alert);

    }
}
