<?php

function Units()
{
    require '../conexion.php';
    
    $consulta_sql = "SELECT * FROM unidades";
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

function ShowCode($correo)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM codigos_enviados WHERE correo=? ORDER BY Actualizado DESC";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($correo));
    $resultado = $preparar_sql->fetchAll();

    if($resultado)
    {
        $codigo = $resultado[0]['Codigo'];

        return $codigo;
    }
    else
    {
        return false;
    }
}

function CheckUserName($username)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM usuarios WHERE User_name=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($username));
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

function CheckPlaca($placa)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM carros WHERE Placa=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($placa));
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

function CheckDriver($cedula, $userID)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM conductores WHERE Cedula=? AND Id_usuario=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($cedula, $userID));
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

function CheckResponsable($identidad, $userID)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM responsables WHERE Numero=? AND Id_usuario=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($identidad, $userID));
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

function CheckSign($sello, $responsable, $userID)
{
    $ruta = "../../images/arts/sellos/user_$userID/sello/responsable_$responsable";

    if(file_exists($ruta))
    {
        return $ruta;
    }
    else
    {
        return false;
    }
}

function IsSectionComplete($id_seccion, $id_lista, $userID)
{
    require '../conexion.php';

    $consulta_sql = "SELECT * FROM item_lista WHERE Id_seccion=? AND Id_lista=? AND Id_usuario=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($id_seccion, $id_lista, $userID));
    $resultado = $preparar_sql->fetchAll();

    if($resultado)
    {
        foreach($resultado as $result)
        {
             $visible = $result['Visible'];

             if($visible)
             {
                 return false;
             }
        }

        return true;
    }
    else
    {
        return false;
    }
}

function CheckList($id_lista, $userID, $visible)
{
    require '../conexion.php';

    $consulta_sql = "SELECT count(*) AS total FROM item_lista WHERE Id_lista=? AND Id_usuario=? AND Visible=?";
    $preparar_sql = $pdo->prepare($consulta_sql);
    $preparar_sql->execute(array($id_lista, $userID, $visible));
    $resultado = $preparar_sql->fetchAll();

    if($resultado)
    {
        return $resultado[0]['total'];
    }
    else
    {
        return 'nada';
    }
}