<?php
 include_once '../../server/conexion.php';
 if(isset($_SESSION['admin']))
 {

   $userID = UserID($_SESSION['admin']);
   $nivel = AdminLevel($userID);

   if($nivel != '1')
   {
      echo"<script type='text/javascript'>
      window.location.href='../home/inicio';
      </script>";

   }

 }
 else
 {
   echo"<script type='text/javascript'>
   window.location.href='../../index';
   </script>";
 }

 function UserID($correo)
{
    require '../../server/conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Correo=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($correo));
    $resultado = $preparar_sql->fetchAll();
    
    if($resultado)
    {
      $id_usuario = $resultado[0]['Id'];
    }
    else
    {
      return false;
    }

    return $id_usuario;
}

function AdminLevel($id)
{
    require '../../server/conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE Id=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($id));
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

?>