<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

<div class="contenido">
<div class="container container-responsables collapse">
 <div class="add-notes">

 <div class="add-list-header">
<i class="fa-solid fa-user-plus"></i> Nuevo Responsable
</div>

 <div class="input-group">
    <span class="input-group-text">Nombre <span class="obligatory-span">*</span></span>
      <input class="form-control" id="nombre_responsable" name="nombre_responsable" type="text" placeholder="Nombre o Razón Social">
    </div>

    <div class="input-group">
    <span class="input-group-text">ID <span class="obligatory-span">*</span></span>
    <select class="form-select" id="tipo_id_responsable" name="tipo_id_responsable">
      <option value="V">V</option>
      <option value="J">J</option>
      <option value="G">G</option>
      <option value="E">E</option>
      <option value="P">P</option>
    </select>
     <input class="form-control" id="numero_identidad" name="numero_identidad" type="number" placeholder="Ej. 12345789" >
    </div>

    <div class="input-group">
    <span class="input-group-text">Sello <span class="obligatory-span"></span></span>
      <label class="label-option-4" for="sello"><i class="fa-solid fa-camera"></i></label>
      <input class="file-selector" accept="image/*" id="sello" name="sello" type="file">
      <img id="img_sello"  src="../../images/logos/logo.png" alt="sello">
    </div>

</div>

 <div class="add-notes-footer">
 <button id="guardar_responsable" name="guardar_responsable" class="btn btn-option-1">Guardar</button>
 </div>
 </div>   
 <div class="mis-responsables"></div>

</div>
<?php include_once 'modals.php';?>

    <script src="js/consulta/responsables.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>