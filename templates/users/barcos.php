<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

<div class="contenido">
<div class="container container-ships collapse">
 <div class="add-notes">

    <div class="add-notes-header">
    <i class="fa-solid fa-square-plus"></i> Nuevo Barco
    </div>

  <div class="add-notes-body">
    <label class="label-option-1" for="nombre_barco">Nombre <span class="obligatory-span">*</span></label>
    <input class="input-option-1" id="nombre_barco" name="nombre_barco" type="text" placeholder="Nombre" >
  </div>

</div>

 <div class="add-notes-footer">
 <button id="guardar_barco" name="guardar_barco" class="btn btn-option-1">Guardar</button>
 </div>
 </div>   
 <div class="my-ships"></div>

</div>
<?php include_once 'modals.php';?>

    <script src="js/consulta/barcos.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>