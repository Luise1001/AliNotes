<?php

function mis_manifiestos()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($userID);
    $mis_manifiestos = MyManifests($userID, $nivel);
    $respuesta = 
    [
        'manifiestos'=> ''
    ];
   
    if($mis_manifiestos)
    {
      foreach($mis_manifiestos as $archivo)
      {
         if(strpos($archivo, 'Manifiesto') !== false)
         {
            $nombre = $archivo;

            $respuesta['manifiestos'] .= 
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
                    <li class='dropdown-item card-menu-item'><a href='../../server/docs/manifiestos/user_$userID/$archivo' >
                    <i class='fa-solid fa-download'></i> Descargar</a></li>
                    <li class='dropdown-item card-menu-item'><a class='btn-eliminar-barco'>
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
        $respuesta['manifiestos'] = EmptyPage('Sin Manifiestos Para Mostrar');
    }

    echo json_encode($respuesta);
}

function datos_manifiesto()
{
   include_once '../conexion.php';
   $admin = $_SESSION['AliNotes']['admin'];
   $userID = UserID($admin);
   $nivel = AdminLevel($userID);
   $UserData = UserData($userID, $nivel);
   $UserBarcos = UserBarcos($userID, $nivel);
   $respuesta = 
   [
     'titular'=> false,
     'barco'=> false,
   ];

   if($UserData)
   {
      foreach($UserData as $user)
      {
         $id_titular = $user['Id'];
         $nombre = $user['Nombre'];
         $apellido = $user['Apellido'];

         $respuesta['titular'] = "<option value='$nombre $apellido'>$nombre $apellido</option>";
      }
   }

   if($UserBarcos)
   {
      $respuesta['barco'] = '';
     foreach($UserBarcos as $ship)
     {
        $id_barco = $ship['Id'];
        $barco = $ship['Barco'];

        $respuesta['barco'] .= "<option value='$barco'>$barco</option>";
     }
   }

   echo json_encode($respuesta);

}