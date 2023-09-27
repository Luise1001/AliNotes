<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

<div class="contenido">
<div class="container container-people collapse">

<div class="add-item">
    <div class="add-item-header">
     <h6 class="label-option-1"> <i class="fa-solid fa-square-plus"></i> Nueva Persona</h6>
    </div>
    <div class="container">
    <div class="add-user-body">

<div class="add-item">
<div class="input-group">
  <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombres">
</div>

<div class="input-group">
<input id="apellido" name="apellido" type="text" class="form-control" placeholder="Apellidos">
</div>

<div class="input-group">
  <select id="tipo_id" name="tipo_id" class="form-select">
    <option value="V">V</option>
    <option value="P">P</option>
    <option value="E">E</option>
  </select>
  <input id="cedula" name="cedula" type="text" class="form-control" placeholder="Cedula">
</div>

</div>

<div class="add-user-footer">
<button id="guardar_personal_info" name="guardar_personal_info" data-dismiss="modal" class="btn btn-option-1">Guardar</button>
</div>
</div>  


</div>
</div>


 </div> 
 <div class="mis-personas"></div>

</div>
<?php include_once 'modals.php';?>

    <script src="js/consulta/personas.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>