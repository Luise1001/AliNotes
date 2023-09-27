<div>
<div class="modal fade" id="modal_editar_responsable" tabindex="-1" role="dialog"   aria-labelledby="modal_editar_responsable_Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

    <div class="container">
    <div class="add-notes">

<div class="add-list-header">
<i class="fa-solid fa-edit"></i> Editar Responsable
</div>

<div class="add-notes-body">

<div class="input-group">
  <input type="hidden" id="responsable_id" name="responsable_id">
    <span class="input-group-text">Nombre <span class="obligatory-span">*</span></span>
      <input class="form-control" id="edit_nombre_responsable" name="edit_nombre_responsable" type="text" placeholder="Nombre o Razón Social">
    </div>

    <div class="input-group">
    <span class="input-group-text">ID <span class="obligatory-span">*</span></span>
    <select class="form-select" id="edit_tipo_id_responsable" name="edit_tipo_id_responsable">
      <option value="V">V</option>
      <option value="J">J</option>
      <option value="G">G</option>
      <option value="E">E</option>
      <option value="P">P</option>
    </select>
     <input class="form-control" id="edit_numero_identidad" name="edit_numero_identidad" type="number" placeholder="Ej. 12345789" >
    </div>

    <div class="input-group">
    <span class="input-group-text">Sello <span class="obligatory-span"></span></span>
      <label class="label-option-4" for="edit_sello"><i class="fa-solid fa-camera"></i></label>
      <input class="file-selector" accept="image/*" id="edit_sello" name="edit_sello" type="file">
      <img id="edit_img_sello"  src="../../images/logos/logo.png" alt="sello">
    </div>


</div>

</div>

<div class="add-notes-footer">
<button id="editar_responsable" name="editar_responsable" class="btn btn-option-1" data-dismiss="modal">Guardar</button>
</div>
</div> 
   
    </div>
  </div>
</div>
</div>

