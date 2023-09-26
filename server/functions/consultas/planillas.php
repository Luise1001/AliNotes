<?php

function mis_planillas()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($userID);
    $mis_planillas = MySeniatDocuments($userID, $nivel);
    $respuesta = 
    [
        'planillas'=> ''
    ];
   
    if($mis_planillas)
    {
      foreach($mis_planillas as $archivo)
      {
         if(strpos($archivo, 'Planilla') !== false)
         {
            $nombre = $archivo;

            $respuesta['planillas'] .= 
            "
            <div class='card notes-items' role='alert' aria-live='assertive' aria-atomic='true'>
                <div class='toast-header'>
                   <strong class='me-auto label-option-3'>$nombre</strong>
                   <small class='card-time'></small>
                   <div> 
                   <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
                   <span><i class='fas fa-ellipsis-v'></i></span>
                 </button>
                   <ul class='dropdown-menu card-menu'>
                    <li class='dropdown-item card-menu-item'><a href='../../server/docs/planillas/user_$userID/$archivo' >
                    <i class='fa-solid fa-download'></i> Descargar</a></li>
                    <li class='dropdown-item card-menu-item'><a archivo='$archivo' class='btn-eliminar-planilla'>
                    <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                   </ul>
                   </div>
               </div>
             </div>
            ";
         }
      }

      
    }
    else
    {
        $respuesta['planillas'] = EmptyPage('Sin Planillas Para Mostrar');
    }

    echo json_encode($respuesta);
}

function datos_planilla()
{
   include_once '../conexion.php';
   $admin = $_SESSION['AliNotes']['admin'];
   $userID = UserID($admin);
   $nivel = AdminLevel($userID);
   $respuesta = 
   [
     'titular'=> false,
     'responsable'=> false,
     'vehiculo'=> false,
     'conductor'=> false,
   ];


   if(isset($_POST['tipo']))
   {
      $tipo = $_POST['tipo'];
      $vehiculos = UserCars($userID, $nivel);
      $conductores = UserDrivers($userID, $nivel);
      $responsables = UserResponsibles($userID, $nivel);

      if($tipo === 'Personal')
      {
         $UserData = UserData($userID, $nivel);
         if($UserData)
         {
            foreach($UserData as $user)
            {
               $id_titular = $user['Id'];
               $nombre = $user['Nombre'];
               $apellido = $user['Apellido'];
      
               $respuesta['titular'] = "<option value='$id_titular'>$nombre $apellido</option>";
            }
         }
      }

      if($tipo === 'Juridico')
      {
         $UserBusinessData = UserBusinessData($userID, $nivel);
         if($UserBusinessData)
         {
            foreach($UserBusinessData as $business)
            {
               $id_titular = $business['Id'];
               $razon_social = $business['Razon_social'];
      
               $respuesta['titular'] = "<option value='$id_titular'>$razon_social</option>";
            }
         }
      }

      if($responsables)
      {
         foreach($responsables as $responsable)
         {
            $id_responsable = $responsable['Id'];
            $nombre = $responsable['Nombre'];
            $respuesta['responsable'] .= "<option value='$id_responsable'>$nombre</option>";
         }
      }

      if($vehiculos)
      {
         foreach($vehiculos as $carro)
         {
            $id_carro = $carro['Id'];
            $modelo = $carro['Modelo'];

   
            $respuesta['vehiculo'] .= "<option value='$id_carro'>$modelo</option>";
         }
      }

      if($conductores)
      {
         foreach($conductores as $conductor)
         {
           $id_conductor = $conductor['Id'];
           $nombre = $conductor['Nombre'];
           $apellido = $conductor['Apellido'];

   
            $respuesta['conductor'] .= "<option value='$id_conductor'>$nombre $apellido</option>";
         }
      }

 

      echo json_encode($respuesta);
   }
}