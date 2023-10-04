<?php

function predecir_items()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($userID);
    $respuesta =
    [
        'items'=>''
    ];
    
    if(isset($_POST['buscar']))
    {
         $buscar = $_POST['buscar'];
         if($buscar != '')
         {
            $ItemsPredicted = ItemsPredicted($buscar);
         }
         else
         {
            $ItemsPredicted = false;
         }

         
      
         if($ItemsPredicted)
         {
            $i = 0;
           foreach($ItemsPredicted as $item)
           {
              if($i < 5)
              {
              $unidad = $item['Tipo_unidad'];
              $descripcion = $item['Descripcion'];
              $peso = $item['Peso'];

              $respuesta['items'] .=
              "
              <li class='li-predicted'>
              <a class='item-predicted' unidad='$unidad' descripcion='$descripcion' peso='$peso'> $unidad de $descripcion $peso Kg.</a>
              </li>
              ";
              }

              $i++;
           }
         }
         else
         {
            $respuesta['items'] = false;
         }
   
         echo json_encode($respuesta);

    }
}