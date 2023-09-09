<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

<div class="contenido">
<div class="container container-notes collapse">
 <div class="add-notes">
    <div class="add-notes-header">
    <i class="fa-solid fa-square-plus"></i> Nueva Nota
    </div>
  <div class="add-notes-body">
    <label class="label-option-1" for="nota_titulo">Titulo <span class="obligatory-span">*</span></label>
    <input class="input-option-1" id="nota_titulo" name="nota_titulo" type="text" placeholder="Ej. Receta de Comida" >
    <label class="label-option-1" for="nota_in">Contenido <span class="obligatory-span">*</span></label>
    <textarea id="nota_in" name="nota_in" cols="40" rows="10" placeholder="Ej. Ingredientes"></textarea>
   
  </div>
</div>
 <div class="add-notes-footer">
 <button id="guardar_nota" name="guardar_nota" class="btn btn-option-1">Guardar</button>
 </div>
 </div>   
 <div class="my-notes"></div>

</div>
<?php include_once 'modals.php';?>

    <script src="js/consulta/notas.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>