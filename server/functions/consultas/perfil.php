<?php

function mi_perfil()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $foto = SearchProfilePhoto($userID);
    $UserInfo = UserInfo($userID);
    $UserData = UserData($userID);
    $UserBusinessData = UserBusinessData($userID);
    $respuesta = 
    [
        'header'=> '',
        'personal_data'=>''
    ];
    
    if($UserInfo)
    {
        foreach($UserInfo as $info)
        {
            $id = $info['Id'];
            $user_name = $info['User_name'];
            $correo = $info['Correo'];
            $nivel = ProcessLevel($info['Nivel']);
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
     
        if($UserData)
        {
            $respuesta['personal_data'] = 
            "
            <div class='accordion'>
            <div class='accordion-item'>
              <h2 class='accordion-header'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#personal_data' aria-expanded='true' aria-controls='personal_data'>
                  Información Personal
                </button>
              </h2>
              <div id='personal_data' class='accordion-collapse collapse'>
                <div class='accordion-body personal-info-body'>";

                foreach($UserData as $data)
                {
                    $personal_id = $data['Id'];
                    $nombre = $data['Nombre'];
                    $apellido = $data['Apellido'];
                    $letra = $data['Tipo_id'];
                    $cedula = $data['Cedula'];

                }

                $respuesta['personal_data'].=
                "
                <p>Nombre: $nombre $apellido</p>
                <p>Cedula: $letra-$cedula</p>
            
                ";
           
                $respuesta['personal_data'] .=
                "
                </div>
                <div class='acordion-footer'>
                <a class='btn' id='edit_user_personal_info' personal='$personal_id' nombre='$nombre' apellido='$apellido' letra='$letra' cedula='$cedula' title='Editar Información Personal'
                data-toggle='modal' data-target='#modal_editar_personal_info'>
                <i class='fas fa-user-edit'></i>
                </a>
                </div>
              </div>
            </div>
            ";
        }
        else
        {
            $respuesta['personal_data'] = 
            "
            <div class='accordion'>
            <div class='accordion-item'>
              <h2 class='accordion-header'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#personal_data' aria-expanded='true' aria-controls='personal_data'>
                  Información Personal
                </button>
              </h2>
              <div id='personal_data' class='accordion-collapse collapse'>
                <div class='accordion-body personal-info-body'>
                Sin Información Personal
                </div>
                <div class='acordion-footer'>
                <a class='btn' id='add_user_data' title='Agregar Mis Datos'
                data-toggle='modal' data-target='#modal_agregar_personal_info'>
                <i class='fas fa-user-plus'></i>
                </a>
                </div>
              </div>
            </div>
            ";
        }

        if($UserBusinessData)
        {
          $respuesta['personal_data'] .=
          "
          <div class='accordion-item'>
          <h2 class='accordion-header'>
            <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#business_data' aria-expanded='false' aria-controls='business_data'>
              Información Jurídica
            </button>
          </h2>
          <div id='business_data' class='accordion-collapse collapse'>
            <div class='accordion-body personal-info-body'>";

            foreach($UserBusinessData as $business)
            {
              $business_id = $business['Id'];
              $razon_social = $business['Razon_social'];
              $letra = $business['Tipo_id'];
              $rif = $business['Rif'];
              $direccion = $business['Direccion'];
            }

            $respuesta['personal_data'] .=
            "
            <p>Razón Social: $razon_social</p>
            <p>Rif: $letra-$rif</p>
            <p>Dirección: $direccion</p>
            ";

        
            $respuesta['personal_data'] .=
            "
            </div>
            <div class='acordion-footer'>
            <a class='btn' id='edit_user_juridica_info' business='$business_id' razon='$razon_social' direccion='$direccion' letra='$letra' rif='$rif' title='Editar Información Jurídica'
            data-toggle='modal' data-target='#modal_editar_juridica_info'>
            <i class='fas fa-edit'></i>
            </a>
            </div>
          </div>
        </div>
        ";
        }
        else
        {
            $respuesta['personal_data'] .=
            "
            <div class='accordion-item'>
            <h2 class='accordion-header'>
              <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#business_data' aria-expanded='false' aria-controls='business_data'>
                Información Jurídica
              </button>
            </h2>
            <div id='business_data' class='accordion-collapse collapse'>
              <div class='accordion-body'>
        
              </div>
              <div class='acordion-footer'>
              <a class='btn' id='add_user_business'  title='Información Jurídica'
              data-toggle='modal' data-target='#modal_agregar_juridica_info'>
              <i class='fas fa-plus'></i>
              </a>
              </div>
            </div>
          </div>
          ";
        }
    }

    echo json_encode($respuesta);
}