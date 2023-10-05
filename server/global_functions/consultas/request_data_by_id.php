<?php

function AdminLevel($userID)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Id=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      $nivel= $resultado[0]['Nivel'];
      return $nivel;
    }
    else
    {
      return false;
    }

}

function UserPassword($userID, $nivel)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Id=? AND Nivel=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID, $nivel));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      $password = $resultado[0]['Pass'];
      return $password;
    }
    else
    {
      return false;
    }

}


function UserInfo($userID)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Id=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      return $resultado;
    }
    else
    {
      return false;
    }

}

function UserList($userID)
{
    require '../conexion.php';

    $consulta_sql = "SELECT 
    u.Id AS Id, u.User_name AS user, u.Correo AS email, u.Actualizado AS actualizado,
    p.Nombre AS nombre, p.Apellido As apellido, 
    e.Razon_social AS razon_social
    FROM usuarios AS u 
    INNER JOIN personas AS p ON p.Id_usuario = u.Id
    INNER JOIN empresas AS e ON e.Id_usuario = u.Id
    WHERE u.Id !=? GROUP BY Id, user, email, nombre, apellido, razon_social, actualizado ORDER BY actualizado";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      return $resultado;
    }
    else
    {
      return false;
    }

}

function UserName($userID)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Id=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      return $resultado[0]['User_name'];
    }
    else
    {
      return false;
    }

}

function PersonData($userID, $nivel)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM personas WHERE Id_usuario=? ORDER BY Actualizado DESC";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}

Function BusinessData($userID, $nivel)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM empresas WHERE Id_usuario=? ORDER BY Actualizado DESC";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}

function MyNotes($userID)
{
    require '../conexion.php';
    $eliminado = 1;

    $consulta_sql = "SELECT * FROM notas WHERE Id_usuario=? AND Eliminado !=? ORDER BY Actualizado DESC";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID, $eliminado));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      return $resultado;
    }
    else
    {
      return false;
    }

}
function Mytasks($userID)
{
    require '../conexion.php';
    $eliminado = 1;

    $consulta_sql = "SELECT * FROM tareas WHERE Id_usuario=? AND Eliminado !=? ORDER BY Actualizado DESC";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID, $eliminado));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      return $resultado;
    }
    else
    {
      return false;
    }

}

function Mylists($userID)
{
    require '../conexion.php';
    $eliminado = 1;
    
    $consulta_sql = "SELECT * FROM listas WHERE Id_usuario=? AND Eliminado !=? ORDER BY Actualizado DESC";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID, $eliminado));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      return $resultado;
    }
    else
    {
      return false;
    }

}

function Sections($userID)
{
    require '../conexion.php';
    
    $consulta_sql = "SELECT * FROM secciones WHERE Id_usuario=? ORDER BY Actualizado DESC";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($userID));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      return $resultado;
    }
    else
    {
      return false;
    }

}

function ItemsPredicted($search)
{
    require '../conexion.php';
    
    $consulta_sql = "SELECT * FROM items_para_lista WHERE Descripcion LIKE '%".$search."%'";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute();
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      return $resultado;
    }
    else
    {
      return false;
    }
}

function ListSections($id_lista, $userID)
{
  require '../conexion.php';


  $consulta_sql = "SELECT a.Id_seccion, b.Titulo FROM item_lista AS a
  INNER JOIN secciones AS b ON a.Id_seccion = b.Id
  WHERE a.Id_lista=? AND a.Id_usuario=? GROUP BY  a.Id_seccion, b.Titulo ORDER BY b.Actualizado DESC";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($id_lista, $userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}

function ListTitle($id_lista, $userID)
{
    require '../conexion.php';
    $eliminado = 1;
    
    $consulta_sql = "SELECT * FROM listas WHERE Id=? AND Id_usuario=? AND Eliminado !=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($id_lista, $userID, $eliminado));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      $titulo = $resultado[0]['Titulo'];
      return $titulo;
    }
    else
    {
      return false;
    }

}



function InsideMyList($id_lista, $id_seccion, $userID)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM item_lista INNER JOIN items_para_lista ON item_lista.Id_item = items_para_lista.Id 
  INNER JOIN secciones ON item_lista.Id_seccion = secciones.Id
  WHERE item_lista.Id_lista=? AND item_lista.Id_usuario=? AND item_lista.Id_seccion=? ORDER BY item_lista.Actualizado DESC";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($id_lista, $userID, $id_seccion));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}

function ItemForList($id_item, $id_lista, $userID)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM item_lista INNER JOIN items_para_lista ON item_lista.Id_item = items_para_lista.Id 
  INNER JOIN secciones ON item_lista.Id_seccion = secciones.Id
  WHERE item_lista.Id_item=? AND item_lista.Id_lista=? AND item_lista.Id_usuario=? ORDER BY item_lista.Actualizado DESC";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($id_item, $id_lista, $userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}

function ItemOnList($id_lista, $id_item, $userID)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM item_lista  WHERE Id_item=? AND Id_lista=? AND Id_usuario=?";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($id_item, $id_lista, $userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return true;
  }
  else
  {
    return false;
  }
}

function UserBarcos($userID, $nivel)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM barcos  WHERE Id_usuario=? ORDER BY Actualizado DESC";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}

function UserCars($userID, $nivel)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM carros  WHERE Id_usuario=? ORDER BY Actualizado DESC";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}

function UserCar($id_car, $userID)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM carros  WHERE Id=? AND Id_usuario=?";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($id_car, $userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}

function UserDrivers($userID, $nivel)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM conductores  WHERE Id_usuario=? ORDER BY Actualizado DESC";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}

function UserDriver($id_conductor, $userID, $nivel)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM conductores  WHERE Id=? AND Id_usuario=?";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($id_conductor, $userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}

function UserResponsibles($userID, $nivel)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM responsables  WHERE Id_usuario=? ORDER BY Actualizado DESC";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}

function Responsible($id_responsable, $userID)
{
  require '../conexion.php';

  $consulta_sql = "SELECT * FROM responsables  WHERE Id=? AND Id_usuario=?";
  $preparar_sql = $pdo->prepare($consulta_sql);
  $preparar_sql->execute(array($id_responsable, $userID));
  $resultado = $preparar_sql->fetchAll();
  
  if($resultado)
  {
    return $resultado;
  }
  else
  {
    return false;
  }
}

function Titular($tipo, $id_titular, $userID, $nivel)
{
  require '../conexion.php';
  
  $cliente = 
  [
    'Nombre'=>'',
    'Rif'=>''
  ];

  if($tipo === 'Personal')
  {
    $consulta_sql = "SELECT p.Nombre, p.Apellido, p.Tipo_id, p.Cedula
     FROM personas AS p WHERE p.Id=? AND p.Id_usuario=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($id_titular, $userID));
    $resultado = $preparar_sql->fetchAll();

    if($resultado)
    {
      foreach($resultado as $result)
      {
         $cliente['Nombre'] = $result['Nombre'].' '.$result['Apellido'];
         $cliente['Rif'] = $result['Tipo_id'].'-'.$result['Cedula'];
      }

      return $cliente;
    }
    else
    {
       return false;
    }

  }
  
  if($tipo === 'Juridico')
  {
    $consulta_sql = "SELECT p.Razon_social, p.Tipo_id, p.Rif
    FROM empresas AS p WHERE p.Id=? AND p.Id_usuario=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($id_titular, $userID));
    $resultado = $preparar_sql->fetchAll();

    if($resultado)
    {
      foreach($resultado as $result)
      {
         $cliente['Nombre'] = $result['Razon_social'];
         $cliente['Rif'] = $result['Tipo_id'].'-'.$result['Rif'];
      }

      return $cliente;
    }
    else
    {
       return false;
    }
  }
  
}


function MyManifests($userID, $nivel)
{
   $ruta = "../docs/manifiestos/user_$userID/";

   if(file_exists($ruta))
   {
      $manifiestos = scandir($ruta);

      return $manifiestos;
   }
   else
   {
     return false;
   }
}

function MySeniatDocuments($userID, $nivel)
{
   $ruta = "../docs/planillas/user_$userID/";

   if(file_exists($ruta))
   {
      $planillas = scandir($ruta);

      return $planillas;
   }
   else
   {
     return false;
   }
}