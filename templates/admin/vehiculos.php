<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

<div class="contenido">
<div class="container container-cars collapse">
 <div class="add-notes">

    <div class="add-notes-header">
    <i class="fa-solid fa-square-plus"></i> Nuevo Vehículo
    </div>

  <div class="add-notes-body">

    <div class="input-group">
    <span class="input-group-text">Marca <span class="obligatory-span">*</span></span>
      <input class="form-control" id="marca_vehiculo" name="marca_vehiculo" type="text" placeholder="Ej. Toyota">
    </div>

    <div class="input-group">
    <span class="input-group-text">Tipo <span class="obligatory-span">*</span></span>
      <input class="form-control" id="tipo_vehiculo" name="tipo_vehiculo" type="text" placeholder="Ej. Camión">
    </div>

    <div class="input-group">
    <span class="input-group-text">Placa <span class="obligatory-span">*</span></span>
     <input class="form-control" id="placa" name="placa" type="text" placeholder="Ej. A387HDF" >
    </div>

    <div class="input-group">
    <span class="input-group-text">Año <span class="obligatory-span">*</span></span>
     <input class="form-control" id="year" name="year" type="number" placeholder="Ej. 1990" >
    </div>

    <div class="input-group">
    <span class="input-group-text">Modelo <span class="obligatory-span">*</span></span>
     <input class="form-control" id="modelo_vehiculo" name="modelo_vehiculo" type="text" placeholder="Ej. Plataforma" >
    </div>


  </div>

</div>

 <div class="add-notes-footer">
 <button id="guardar_vehiculo" name="guardar_vehiculo" class="btn btn-option-1">Guardar</button>
 </div>
 </div>   
 <div class="my-cars"></div>

</div>
<?php include_once 'modals.php';?>

    <script src="js/consulta/vehiculos.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>