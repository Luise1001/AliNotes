<?php

function header_menu()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($userID);
    $menu = '';

    if($nivel === '0')
    {
      $menu = 
      '
      <li><a href="../users/manifiestos"class="dropdown-itemn header-item"><i class="fa-regular fa-file-word"></i> Manifiestos</a></li>
      <li><a href="../users/planillas"class="dropdown-itemn header-item"><i class="fa-regular fa-file-pdf"></i> Planillas</a></li>
      <li><a href="../users/barcos"class="dropdown-itemn header-item"><i class="fa-solid fa-ship"></i></i> Barcos</a></li>
      <li><a href="../users/vehiculos"class="dropdown-itemn header-item"><i class="fa-solid fa-car"></i></i> Vehículos</a></li>
      <li><a href="../users/conductores"class="dropdown-itemn header-item"><i class="fa-solid fa-user-tie"></i></i> Conductores</a></li>
      <li><a href="../users/responsables"class="dropdown-itemn header-item"><i class="fa-solid fa-user"></i></i> Responsables</a></li>
      <li><hr class="dropdown-divider header-divider"></li>
      <li><a class="dropdown-itemn header-item" href="../../server/functions/eliminar/cerrar"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
      ';
    }

    if($nivel === '1')
    {
      $menu = 
      '
      <li><a href="../admin/barcos"class="dropdown-itemn header-item"><i class="fa-solid fa-ship"></i></i> Barcos</a></li>
      <li><hr class="dropdown-divider header-divider"></li>
      <li><a class="dropdown-itemn header-item" href="../../server/functions/eliminar/cerrar"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
      ';

    }

    echo $menu;
}

function footer_menu()
{
    include_once '../conexion.php';
    $admin = $_SESSION['AliNotes']['admin'];
    $userID = UserID($admin);
    $nivel = AdminLevel($userID);
    $menu = '';

    if($nivel === '0')
    {
      $menu = 
      '
      <a href="../users/notas"><i id="icon_note" class="fa-solid fa-comment fa-2x footer-icons"><span class="span-icon">Notas</span></i></a>
      <a href="../users/tareas"><i id="icon_task" class="fa-solid fa-list-check fa-2x footer-icons"><span class="span-icon">Tareas</span></i></a>
      <a href="../home/inicio"><i id="icon_home" class="fas fa-home fa-2x footer-icons"><span class="span-icon">Inicio</span></i></a>
      <a href="../users/listas"><i id="icon_list" class="fas fa-list fa-2x footer-icons"><span class="span-icon">Listas</span></i></a>
      <a href="../users/mi_perfil"><i id="icon_profile" class="fa-solid fa-user fa-2x footer-icons"><span class="span-icon">Perfil</span></i></a>
      ';
    }

    if($nivel === '1')
    {
      $menu = 
      '
      <a href="../admin/notas"><i class="fa-solid fa-comment fa-2x footer-icons"><span class="span-icon">Notas</span></i></a>
      <a href="../admin/tareas"><i class="fa-solid fa-list-check fa-2x footer-icons"><span class="span-icon">Tareas</span></i></a>
      <a href="../home/inicio"><i class="fas fa-home fa-2x footer-icons"><span class="span-icon">Inicio</span></i></a>
      <a href="../admin/listas"><i class="fas fa-list fa-2x footer-icons"><span class="span-icon">Listas</span></i></a>
      <a href="../admin/mi_perfil"><i class="fa-solid fa-user fa-2x footer-icons"><span class="span-icon">Perfil</span></i></a>
      ';
    }

    if($nivel === '2')
    {
      $menu = 
      '
      <a href="../clients/notas"><i class="fa-solid fa-comment fa-2x footer-icons"><span class="span-icon">Notas</span></i></a>
      <a href="../clients/tareas"><i class="fa-solid fa-list-check fa-2x footer-icons"><span class="span-icon">Tareas</span></i></a>
      <a href="../home/inicio"><i class="fas fa-home fa-2x footer-icons"><span class="span-icon">Inicio</span></i></a>
      <a href="../clients/listas"><i class="fas fa-list fa-2x footer-icons"><span class="span-icon">Listas</span></i></a>
      <a href="../clients/mi_perfil"><i class="fa-solid fa-user fa-2x footer-icons"><span class="span-icon">Perfil</span></i></a>
      ';
    }
    
    echo $menu;
}

