<?php

function header_menu()
{
    include_once '../conexion.php';

    $userID = UserID($_SESSION['admin']);
    $nivel = AdminLevel($userID);
    $menu = '';

    if($nivel === '1')
    {
      $menu = 
      '
      <li><a class="dropdown-itemn header-item" href="../../functions/cerrar"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
      
      <li><hr class="dropdown-divider header-divider"></li>

     <li><a class="dropdown-itemn header-item" href="../../server/functions/eliminar/cerrar"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
      ';

      echo $menu;
    }
}

function footer_menu()
{
    include_once '../conexion.php';

    $menu = 
    '
    <a href="../admin/notas"><i class="fa-solid fa-comment fa-2x footer-icons"><span class="span-icon">Notas</span></i></a>
    <a href="#"><i class="fas fa-calculator fa-2x footer-icons"><span class="span-icon">Rutas</span></i></a>
    <a href="../home/inicio"><i class="fas fa-home fa-2x footer-icons"><span class="span-icon">Inicio</span></i></a>
    <a href="#"><i class="fas fa-file-alt fa-2x footer-icons"><span class="span-icon">Pedidos</span></i></a>
    <a href="../admin/mi_perfil"><i class="fa-solid fa-user fa-2x footer-icons"><span class="span-icon">Perfil</span></i></a>
    ';

    echo $menu;
}
