<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

<div class="contenido">
<div class="container container-business collapse">

<div class="add-item">
    <div class="add-item-header">
     <h6 class="label-option-1"> <i class="fa-solid fa-square-plus"></i> Nueva Empresa</h6>
    </div>
    <div class="container">
 <div class="add-user-data">

 <div class="add-user-body">

<div class="input-group">
  <input id="razon_social" name="razon_social" type="text" class="form-control" placeholder="Razón Social">
</div>

<div class="input-group">
  <select id="tipo_id_emp" name="tipo_id_emp" class="form-select">
    <option value="J">J</option>
    <option value="V">V</option>
    <option value="G">G</option>
    <option value="E">E</option>
  </select>
  <input id="rif" name="rif" type="text" class="form-control" placeholder="Rif">
</div>

<div class="input-group">
  <input id="direccion" name="direccion" type="text" class="form-control" placeholder="Dirección Fiscal">
</div>

</div>

<div class="add-user-footer">
<button id="guardar_juridica_info" name="guardar_juridica_info" data-dismiss="modal" class="btn btn-option-1">Guardar</button>
</div>
</div>  


</div>
</div>


 </div> 
 <div class="mis-empresas"></div>

</div>
<?php include_once 'modals.php';?>

    <script src="js/consulta/empresas.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>