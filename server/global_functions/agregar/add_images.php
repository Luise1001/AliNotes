<?php

function MyProfilePhoto($id, $foto, $files)
{
  
    $ruta = "../../images/arts/profile/users/$id/photo";
    $calidad = 30;

    if(file_exists($ruta))
    {
        $ruta .= '/';
        $img = imagejpeg(imagecreatefromstring(file_get_contents($files['file']["tmp_name"])), $ruta.$foto.'.jpg', $calidad); 
      
        return $img;
    }
    else
    {
        $result = mkdir($ruta, 0777, true);

        $ruta .= '/';
        $img = imagejpeg(imagecreatefromstring(file_get_contents($files['file']["tmp_name"])), $ruta.$foto.'.jpg', $calidad); 

        return $img;

    }
}


function NewSign($userID, $responsable, $sello, $files)
{
  
    $ruta = "../../images/arts/sellos/user_$userID/sello/responsable_$responsable";
    $calidad = 30;

    if(file_exists($ruta))
    {
        $ruta .= '/';
        $img = imagejpeg(imagecreatefromstring(file_get_contents($files['file']["tmp_name"])), $ruta.$sello.'.jpg', $calidad); 
        $imagen = $ruta.'sello.jpg';
        return $imagen;
    }
    else
    {
        $result = mkdir($ruta, 0777, true);

        $ruta .= '/';
        $img = imagejpeg(imagecreatefromstring(file_get_contents($files['file']["tmp_name"])), $ruta.$sello.'.jpg', $calidad); 
        $imagen = $ruta.'sello.jpg';
        return $imagen;

    }
}



