<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

<div class="contenido">
<div class="container container-drivers collapse">
 <div class="add-notes">

 <div class="add-list-header">
<i class="fa-solid fa-user-plus"></i> Nuevo Conductor
</div>

 <div class="input-group">
    <span class="input-group-text">Nombres <span class="obligatory-span">*</span></span>
      <input class="form-control" id="nombre_conductor" name="nombre_conductor" type="text" placeholder="Ej. Juan">
    </div>

    <div class="input-group">
    <span class="input-group-text">Apellidos <span class="obligatory-span">*</span></span>
     <input class="form-control" id="apellido_conductor" name="apellido_conductor" type="text" placeholder="Ej. Perez" >
    </div>

    <div class="input-group">
    <span class="input-group-text">Cédula <span class="obligatory-span">*</span></span>
    <select class="form-select" id="tipo_id_conductor" name="tipo_id_conductor">
      <option value="V">V</option>
      <option value="E">E</option>
      <option value="P">P</option>
    </select>
     <input class="form-control" id="cedula_conductor" name="cedula_conductor" type="number" placeholder="Ej. 12345789" >
    </div>

</div>

 <div class="add-notes-footer">
 <button id="guardar_conductor" name="guardar_conductor" class="btn btn-option-1">Guardar</button>
 </div>
 </div>   
 <div class="my-drivers"></div>

</div>
<?php include_once 'modals.php';?>

    <script src="js/consulta/conductores.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>