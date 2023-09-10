<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

<div class="contenido">
<div class="container container-listas collapse">
 <div class="add-listas">
    <div class="add-listas-header">
    <i class="fa-solid fa-square-plus"></i> Nueva Lista
    </div>
  <div class="add-listas-body">
    <label class="label-option-1" for="listas_titulo">Titulo <span class="obligatory-span">*</span></label>
    <input class="input-option-1" id="listas_titulo" name="listas_titulo" type="text" placeholder="Ej. Lista de Compras" >
   
  </div>
</div>
 <div class="add-listas-footer">
 <button id="guardar_listas" name="guardar_listas" class="btn btn-option-1">Guardar</button>
 </div>
 </div>   
 <div class="my-lists"></div>

</div>
<?php include_once 'modals.php';?>

    <script src="js/consulta/listas.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>