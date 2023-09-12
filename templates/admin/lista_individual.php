<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

    <input type="hidden" id="lista_id" name="lista_id" value=<?php if($_GET){$id = $_GET['id']; echo $id;}else{echo 0;} ?>>

<div class="contenido">
<div class="container container-listas">

<div class="add-item collapse">
    <div class="add-item-header">
     <h6 class="label-option-1"> <i class="fa-solid fa-square-plus"></i> Nuevo Item</h6>

    </div>
  <div class="add-item-body">
    <input class="input-option-1" id="item_name" name="item_name" type="text" placeholder=" Ej. Cosméticos" >
  </div>

  <div class="add-item-footer">
  <button id="save_item_lista" name="save_item_lista" class="btn btn-option-1">Guardar</button>
  </div>
</div>

 </div> 
 <div class="list-title"></div>
 <div class="my-list"></div>

</div>
<?php include_once 'modals.php';?>

    <script src="js/consulta/lista_individual.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>