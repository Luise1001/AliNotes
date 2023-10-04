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
<div class="container container-lists">

<div class="add-area collapse">
<a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".add-section" aria-expanded="true" 
 aria-controls=".add-section" ><i class="fa-solid fa-plus"></i> Nueva Sección
</a>

<a class="header-icons-item accordon-button" data-bs-toggle="collapse" data-bs-target=".add-item" aria-expanded="true" 
 aria-controls=".add-item" ><i class="fa-solid fa-plus"></i> Nuevo Item
</a>

<div class="add-section collapse">
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

<div class="add-item collapse">
    <div class="add-item-header">
     <h6 class="label-option-1"> <i class="fa-solid fa-square-plus"></i> Nuevo Item</h6>
    </div>
   <div class="add-item-body">

    <div class="input-group">
      <span class="input-group-text">Sección<span class="obligatory-span">*</span></span>
      <select id="seccion" name="seccion" class="form-select">
        <option value="Seleccionar">Seleccionar</option>
      </select>
    </div>

    <div class="input-group">
      <span class="input-group-text">Tipo Unidad <span class="obligatory-span">*</span></span>
      <select id="tipo_unidad" name="tipo_unidad" class="form-select">
        <option value="Seleccionar">Seleccionar</option>
      </select>
    </div>

    <div class="input-group">
      <span class="input-group-text">Descripción <span class="obligatory-span">*</span></span>
      <input id="descripcion" name="descripcion" type="text" class="form-control" placeholder="Ej. Cereal con Avena">
    </div>

    <div class="input-group">
     <ul id='predicted_items' class="predicted-items d-none"></ul>
   </div>

    <div class="input-group">
      <span class="input-group-text">Peso KG.<span class="obligatory-span">*</span></span>
      <input id="peso" name="peso" type="number" class="form-control" placeholder="0,00">

      <span class="input-group-text">Cantidad <span class="obligatory-span">*</span></span>
      <input id="cantidad" name="cantidad" type="number" class="form-control" placeholder="1 o 0,50">
    </div>

    <div class="input-group">
      <span class="input-group-text">Observación</span>
      <input id="observacion" name="observacion" type="text" class="form-control" placeholder="Ej. Sacos Industriales">
    </div>

  </div>

  <div class="add-item-footer">
  <button id="save_item_lista" name="save_item_lista" class="btn btn-option-1">Guardar</button>
  </div>
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