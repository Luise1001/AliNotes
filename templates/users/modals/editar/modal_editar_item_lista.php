<div>
<div class="modal fade" id="modal_editar_item_lista" tabindex="-1" role="dialog"   aria-labelledby="modal_editar_titulo_lista_Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

    <div class="container">
 <div class="add-item">
    <div class="add-list-header">
        <div class="div-back-btn">
        <button class="btn back-btn" data-dismiss="modal"><i class="fa-solid fa-arrow-left"></i></button>
        </div>
        <i class="fa-solid fa-pen-to-square"></i> Editar Item
    </div>

  <div class="add-item-body">

  <div class="input-group">
    <input type="hidden" id="section_id" name="section_id">
      <span class="input-group-text">Sección<span class="obligatory-span">*</span></span>
      <select id="edit_seccion" name="edit_seccion" class="form-select">
        <option value="Seleccionar">Seleccionar</option>
      </select>
    </div>

    <div class="input-group">
    <input type="hidden" id="unidad_id" name="unidad_id">
      <span class="input-group-text">Tipo Unidad <span class="obligatory-span">*</span></span>
      <select id="edit_tipo_unidad" name="edit_tipo_unidad" class="form-select">
        <option value="Seleccionar">Seleccionar</option>
      </select>
    </div>

    <div class="input-group">
    <input type="hidden" id="item_id" name="item_id">
      <span class="input-group-text">Descripción <span class="obligatory-span">*</span></span>
      <input id="edit_descripcion" name="edit_descripcion" type="text" class="form-control" placeholder="Ej. Cereal con Avena">
    </div>

    <div class="input-group">
      <span class="input-group-text">Peso KG.<span class="obligatory-span">*</span></span>
      <input id="edit_peso" name="edit_peso" type="number" class="form-control" placeholder="0,00">

      <span class="input-group-text">Cantidad <span class="obligatory-span">*</span></span>
      <input id="edit_cantidad" name="edit_cantidad" type="number" class="form-control" placeholder="1 o 0,50">
    </div>

    <div class="input-group">
      <span class="input-group-text">Observación</span>
      <input id="edit_observacion" name="edit_observacion" type="text" class="form-control" placeholder="Ej. Sacos Industriales">
    </div>

</div>

 <div class="add-item-footer">
 <button id="editar_item_lista" name="editar_item_lista" data-dismiss="modal" class="btn btn-option-1">Guardar</button>
 </div>
 </div> 
   
    </div>
  </div>
</div>
</div>
