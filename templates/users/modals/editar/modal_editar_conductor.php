<div>
<div class="modal fade" id="modal_editar_conductor" tabindex="-1" role="dialog"   aria-labelledby="modal_editar_conductor_Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

    <div class="container">
    <div class="add-notes">

<div class="add-list-header">
<i class="fa-solid fa-edit"></i> Editar Conductor
</div>

<div class="add-notes-body">

<div class="input-group">
  <input type="hidden" id="conductor_id" name="conductor_id">
    <span class="input-group-text">Nombres <span class="obligatory-span">*</span></span>
      <input class="form-control" id="edit_nombre_conductor" name="edit_nombre_conductor" type="text" placeholder="Ej. Juan">
    </div>

    <div class="input-group">
    <span class="input-group-text">Apellidos <span class="obligatory-span">*</span></span>
     <input class="form-control" id="edit_apellido_conductor" name="edit_apellido_conductor" type="text" placeholder="Ej. Perez" >
    </div>

    <div class="input-group">
    <span class="input-group-text">Cédula <span class="obligatory-span">*</span></span>
    <select class="form-select" id="edit_tipo_id_conductor" name="edit_tipo_id_conductor">
      <option value="V">V</option>
      <option value="E">E</option>
      <option value="P">P</option>
    </select>
     <input class="form-control" id="edit_cedula_conductor" name="edit_cedula_conductor" type="number" placeholder="Ej. 12345789" >
    </div>


</div>

</div>

<div class="add-notes-footer">
<button id="editar_conductor" name="editar_conductor" class="btn btn-option-1" data-dismiss="modal">Guardar</button>
</div>
</div> 
   
    </div>
  </div>
</div>
</div>

