<?php

function mi_perfil()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $foto = SearchProfilePhoto($userID);
    $user_data = UserData($userID);
    $respuesta = 
    [
        'header'=> ''
    ];
    
    if($user_data)
    {
        foreach($user_data as $data)
        {
            $id = $data['Id'];
            $user_name = $data['User_name'];
            $correo = $data['Correo'];
            $nivel = ProcessLevel($data['Nivel']);
        }

        $respuesta['header'] =
        "
        <div class='container my-profile-header'>
        <img class='profile-photo' id='foto_perfil' src='$foto' alt='Foto de Perfil'>
        <input type='file' accept='image/*' id='input_fp' class='file-selector'>
        <label for='input_fp' class='file-selector-label'>
        <span class='file-selector-span-icon'><i class='fas fa-camera'></i></span>
    
        </label>
        </div>
        <div class=' container my-profile-body'>
        <h1>$user_name</h1>
        <p>$correo</p>
        <p>$nivel</p>
        <a class='btn' id='edit_user_btn' name='$userID' user='$user_name' title='Editar'
        data-toggle='modal' data-target='#modal_editar_user_name'>
        <i class='fas fa-user-edit'></i>
        </a>
        </div>
        ";
    }

    echo json_encode($respuesta);
}