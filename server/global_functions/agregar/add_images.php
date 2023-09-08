<?php

function MyProfilePhoto($id, $foto, $files)
{
  
    $ruta = "../../images/arts/profile/users/$id/photo";
    $calidad = 30;

    if(file_exists($ruta))
    {
        $ruta .= '/';
        $img = imagejpeg(imagecreatefromstring(file_get_contents($files['file']["tmp_name"])), $ruta.$foto.'.jpg'); 
        $new_img = imagejpeg($img, $ruta, $calidad);
      
        return $new_img;
    }
    else
    {
        $result = mkdir($ruta, 0777, true);

        $ruta .= '/';
        $img = imagejpeg(imagecreatefromstring(file_get_contents($files['file']["tmp_name"])), $ruta.$foto.'.jpg'); 
        $new_img = imagejpeg($img, $ruta, $calidad);

        return $result;

    }

    return $ruta;

}

