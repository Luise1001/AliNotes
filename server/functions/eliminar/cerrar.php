<?php
include_once '../../conexion.php';

if(isset($_SESSION['AliNotes']))
{
    unset($_SESSION['AliNotes']);

    echo"<script type='text/javascript'>
    window.location.href='../../../index';
    </script>";
}
 ?>