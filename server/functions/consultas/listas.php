<?php

function mis_listas()
{
    include_once '../conexion.php';
    $userID = UserID($_SESSION['admin']);
    $foto = SearchProfilePhoto($userID);
    $mis_listas = MyLists($userID);
    $botones = 
    '
    <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-listas" aria-expanded="true" aria-controls=".container-lists" ><i class="fa-solid fa-plus"></i></a>

    ';
    $respuesta = 
    [
        'botones'=> $botones,
        'listas'=> ''
    ];

    if($mis_listas)
    {
       foreach($mis_listas as $listas)
       {
          $id = $listas['Id'];
          $titulo = $listas['Titulo'];
          $actualizado = $listas['Actualizado'];
          $visible = $listas['Visible'];
          $fecha_actual = CurrentTime();
          $fecha_movimiento = TimeDifference($actualizado, $fecha_actual);

          if($visible === '1')
          {
             $eye = 'fa-eye-slash';
          }
          else
          {
            $eye = 'fa-eye';
          }

          $respuesta['listas'] .= 
          "
          <div class='card listas-items' role='alert' aria-live='assertive' aria-atomic='true'>
              <div class='toast-header'>
                 <img src=$foto width='32' height='32' class='rounded me-2' alt='Perfil'>
                 <strong class='me-auto'><a href='lista_individual?id=$id'>$titulo</a></strong>
                 <small class='card-time'><a lista='$id' visible='$visible' class='hide-show'><i class='fa-solid $eye'></i></a></small>
                 <small class='card-time'>$fecha_movimiento</small>
                 <div> 
                 <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
                 <span><i class='fas fa-ellipsis-v'></i></span>
               </button>
                 <ul class='dropdown-menu card-menu'>
                  <li class='dropdown-item card-menu-item'><a class='btn-edit-titulo-lista' id='$id' titulo='$titulo'  data-toggle='modal' data-target='#modal_editar_titulo_lista'>Editar</a></li>
                  <li class='dropdown-item card-menu-item'><a class='btn-eliminar-titulo-lista' id='$id'>Eliminar</a></li>
                 </ul>
                 </div>
             </div>
           </div>
          ";
       }
    }
    else
    {
        $respuesta['listas'] = EmptyPage('Sin Listas Para Mostrar');
    }

    echo json_encode($respuesta);
}

function lista_individual()
{
   include_once '../conexion.php';
   $userID = UserId($_SESSION['admin']);
   $botones = 
   '
   <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".add-item" aria-expanded="true" aria-controls=".add-item" ><i class="fa-solid fa-plus"></i></a>
   ';
   $respuesta = 
   [
     'botones'=>$botones,
     'titulo'=> '',
     'contenido'=>'' 
   ];

   if(isset($_POST['id']))
   {
     $id_lista = $_POST['id'];
     $titulo = ListTitle($id_lista, $userID);
     $respuesta['titulo'] = $titulo;
     $inside_my_list = InsideMyList($id_lista, $userID);

     if($inside_my_list)
     {
       foreach($inside_my_list as $item)
       {
        $id_seccion = $item['Id_seccion'];
         $id_item = $item['Id'];
         $descripcion = $item['Descripcion'];
         $tipo_unidad = $item['Tipo_unidad'];
         $cantidad = $item['Cantidad'];
         $observacion = $item['Observacion'];


        $respuesta['contenido'] .= 
        "
        <div class='card listas-items' role='alert' aria-live='assertive' aria-atomic='true'>
            <div class='toast-header'>
               <p class='me-auto'>$descripcion</p>
               <small class='card-time'></small>
               <div> 
               <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
               <span><i class='fas fa-ellipsis-v'></i></span>
             </button>
               <ul class='dropdown-menu card-menu'>
                <li class='dropdown-item card-menu-item'><a class='btn-edit-titulo-lista' id='' titulo=''  data-toggle='modal' data-target='#modal_editar_titulo_lista'>Editar</a></li>
                <li class='dropdown-item card-menu-item'><a class='btn-eliminar-titulo-lista' id=''>Eliminar</a></li>
               </ul>
               </div>
           </div>
         </div>
        ";
       }
     }
     else
     {
       $respuesta['contenido'] = EmptyPage('Lista Vacía');
     }

     echo json_encode($respuesta);
   }
}