<?php
 include_once '../../server/conexion.php';
 if(!isset($_SESSION['AliNotes']))
 {
  echo"<script type='text/javascript'>
     window.location.href='../../index';
  </script>";
 }

?>