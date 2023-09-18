<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

<div class="contenido">
<div class="container container-lists collapse">
 <div class="add-list">
    <div class="add-list-header">
    <i class="fa-solid fa-square-plus"></i> Nueva Lista
    </div>
  <div class="add-list-body">
    <label class="label-option-1" for="listas_titulo">Titulo <span class="obligatory-span">*</span></label>
    <input class="input-option-1" id="listas_titulo" name="task" type="text" placeholder="Ej. Lista de Compras." >
   
  </div>
</div>
 <div class="add-list-footer">
 <button id="save_list" name="save_list" class="btn btn-option-1">Guardar</button>
 </div>
 </div>   

 <div class="my-lists"></div>
 <div class="hidden-lists"></div>

</div>
<?php include_once 'modals.php';?>

    <script src="js/consulta/listas.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>