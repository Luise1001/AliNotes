<?php

function mis_listas()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $foto = SearchProfilePhoto($userID);
    $mis_listas = MyLists($userID);
    $botones = 
    '
    <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".container-lists" aria-expanded="true" aria-controls=".container-lists" ><i class="fa-solid fa-plus"></i></a>

    ';
    $respuesta = 
    [
        'botones'=> $botones,
        'listas'=> '',
        'ocultas'=> ''
    ];


    if($mis_listas)
    {
      $respuesta['listas'] .=
      "
      <div class='accordion'>
        <div class='accordion-item'>
          <h2 class='accordion-header'>
           <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#visibles' 
            aria-expanded='true' aria-controls='visibles'>
              Activas
           </button>
         </h2>
         <div id='visibles' class='accordion-collapse collapse show'>
         <div class=''>
      ";

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
             $eye = 'fa-check';



             $respuesta['listas'] .= 
             "
             <div class='card list-items' role='alert' aria-live='assertive' aria-atomic='true'>
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
                     <li class='dropdown-item card-menu-item'><a class='btn-edit-titulo-lista' id='$id' titulo='$titulo'  data-toggle='modal' data-target='#modal_editar_titulo_lista'>
                     <i class='fa-solid fa-edit'></i> Editar</a></li>
                     <li class='dropdown-item card-menu-item'><a class='btn-eliminar-titulo-lista' id='$id'>
                     <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                    </ul>
                    </div>
                </div>
              </div>
             ";

          }
       }

       $respuesta['listas'] .=
       "
         </div>
       </div>
     </div>
     ";

     $respuesta['ocultas'] .=
     "
     <div class='accordion'>
       <div class='accordion-item'>
         <h2 class='accordion-header'>
          <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#oculta' 
           aria-expanded='true' aria-controls='oculta'>
             Procesadas
          </button>
        </h2>
        <div id='oculta' class='accordion-collapse collapse'>
        <div class=''>
     ";

      foreach($mis_listas as $listas)
      {
         $id = $listas['Id'];
         $titulo = $listas['Titulo'];
         $actualizado = $listas['Actualizado'];
         $visible = $listas['Visible'];
         $fecha_actual = CurrentTime();
         $fecha_movimiento = TimeDifference($actualizado, $fecha_actual);

         if($visible === '0')
         {
          $eye = 'fa-check-double';

          $respuesta['ocultas'] .= 
          "
          <div class='card list-items' role='alert' aria-live='assertive' aria-atomic='true'>
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
                  <li class='dropdown-item card-menu-item'><a class='btn-edit-titulo-lista' id='$id' titulo='$titulo'  data-toggle='modal' data-target='#modal_editar_titulo_lista'>
                  <i class='fa-solid fa-edit'></i> Editar</a></li>
                  <li class='dropdown-item card-menu-item'><a class='btn-eliminar-titulo-lista' id='$id'>
                  <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                 </ul>
                 </div>
             </div>
           </div>
          ";

         }
      }

      $respuesta['ocultas'] .=
      "
        </div>
      </div>
    </div>
    ";

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
   $admin = $_SESSION['AliNotes']['admin'];
   $userID = UserId($admin);
   $botones = 
   '
   <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".add-area" aria-expanded="true"
    aria-controls=".add-area" ><i class="fa-solid fa-plus"></i></a>
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
     $respuesta['titulo'] = "<div><button class='history-back' onclick=history.back()><i class='fa-solid fa-arrow-left'></i></button>$titulo</div>";
     $list_sections = ListSections($id_lista, $userID);

     if($list_sections)
     {
       foreach($list_sections as $section)
       {
          $id_section = $section['Id_seccion'];
          $section_name = $section['Titulo'];

          $respuesta['contenido'] .=
          "
          <div class='accordion'>
            <div class='accordion-item'>
              <h2 class='accordion-header'>
               <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#$id_section' aria-expanded='true' aria-controls='$id_section'>
                 <input id='section_$id_section' onchange='SelectAll($id_section)' class='section-sl' type='checkbox'> $section_name
               </button>
             </h2>
             <div id='$id_section' class='accordion-collapse collapse show'>
             <div class=''>
          ";

          $inside_my_list = InsideMyList($id_lista, $id_section, $userID);
          if($inside_my_list)
          {
            foreach($inside_my_list as $item)
            {
              $id_seccion = $item['Id_seccion'];
              $id_item = $item['Id_item'];
              $descripcion = $item['Descripcion'];
              $tipo_unidad = $item['Tipo_unidad'];
              $cantidad = $item['Cantidad'];
              $peso = $item['Peso'];
              $kilos = $item['Kilos'];
              $observacion = $item['Observacion'];

              if($cantidad > 1)
              {
                 $unidad = ProcessUnits($tipo_unidad);
              }
              else
              {
                $unidad = $tipo_unidad;
              }
     
     
             $respuesta['contenido'] .= 
             "
             <div class='card list-items' role='alert' aria-live='assertive' aria-atomic='true'>
                 <div class='item-header'>
                    <p class='me-auto'><input id='item_$id_item' onchange='SelectOne($id_item)'  section='$id_seccion' item='$id_item' class='item-sl item-$id_section' type='checkbox'> $cantidad - $unidad de $descripcion - $kilos Kg.</p>
                    <small class='card-comment'>$observacion</small>
                    <div> 
                    <button class=' btn-option-2' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
                    <span><i class='fas fa-ellipsis-v'></i></span>
                  </button>
                    <ul class='dropdown-menu card-menu'>
                     <li class='dropdown-item card-menu-item'><a class='btn-editar-item-lista' ids='$id_section' seccion='$section_name' objeto='$id_item'
                       descripcion='$descripcion' unidad='$tipo_unidad' peso='$peso' cantidad='$cantidad' observacion='$observacion'
                       data-toggle='modal' data-target='#modal_editar_item_lista'>
                       <i class='fa-solid fa-edit'></i> Editar</a></li>
                     <li class='dropdown-item card-menu-item'><a class='btn-eliminar-item-lista' id='$id_item'>
                     <i class='fa-solid fa-trash'></i> Eliminar</a></li>
                    </ul>
                    </div>
                </div>
              </div>
             ";
            }
          }

          $respuesta['contenido'] .=
          "
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


function generar_listado()
{
   include_once '../conexion.php';
   $admin = $_SESSION['AliNotes']['admin'];
   $userID = UserID($admin);
   $botones = 
   '
    <a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".add-area" aria-expanded="true"
    aria-controls=".add-area" ><i class="fa-solid fa-plus"></i></a>
   ';
   $respuesta = 
   [
      'titulo'=> 'AliNotes',
      'botones'=> $botones,
      'items'=> []
   ];

   if(isset($_POST['id_lista']) && isset($_POST['array_items']))
   {
      $id_lista = $_POST['id_lista'];
      $array_items = $_POST['array_items'];
      $ItemForList = [];

      foreach($array_items as $item)
      {
        array_push($respuesta['items'], ItemForList($item, $id_lista, $userID));
         
      }

      $respuesta['titulo'] = '';
      $respuesta['botones'] .=
       '
       <a class="datos-manifiesto header-icons-item accordon-button" data-toggle="modal" data-target="#modal_datos_manifiesto"><i class="fas fa-file-word"></i></a>
        
       <a class="datos-planilla header-icons-item accordon-button" data-toggle="modal" data-target="#modal_datos_planilla"><i class="fas fa-file-pdf"></i></a>
        
       ';
  
   }

   echo json_encode($respuesta);
}