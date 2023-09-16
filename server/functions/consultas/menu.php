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
    <a href="../admin/tareas"><i class="fa-solid fa-list-check fa-2x footer-icons"><span class="span-icon">Tareas</span></i></a>
    <a href="../home/inicio"><i class="fas fa-home fa-2x footer-icons"><span class="span-icon">Inicio</span></i></a>
    <a href="../admin/listas"><i class="fas fa-list fa-2x footer-icons"><span class="span-icon">Listas</span></i></a>
    <a href="../admin/mi_perfil"><i class="fa-solid fa-user fa-2x footer-icons"><span class="span-icon">Perfil</span></i></a>
    ';

    echo $menu;
}

//<li><a class="dropdown-itemn header-item" href="../../functions/cerrar"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
      
//<li><hr class="dropdown-divider header-divider"></li>
