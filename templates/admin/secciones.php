<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

<div class="contenido">
<div class="container container-sections collapse">
 <div class="add-notes">
 <div class="add-section">
    <div class="add-section-header">
     <h6 class="label-option-1"> <i class="fa-solid fa-square-plus"></i> Nueva Sección</h6>

    </div>
  <div class="add-section-body">
    <input class="input-option-1" id="section_name" name="section_name" type="text" placeholder=" Ej. Cosméticos" >
  </div>

  <div class="add-item-footer">
  <button id="save_section" name="save_section" class="btn btn-option-1">Guardar</button>
  </div>
</div>
</div>
 </div>   
 <div class="my-sections"></div>

</div>
<?php include_once 'modals.php';?>

    <script src="js/consulta/secciones.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>