<div>
<div class="modal fade" id="modal_editar_personal_info" tabindex="-1" role="dialog"   aria-labelledby="modal_editar_personal_info_Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

    <div class="container">
 <div class="add-user-data">
    <div class="add-user-header">
        <div class="div-back-btn">
        <button class="btn back-btn" data-dismiss="modal"><i class="fa-solid fa-arrow-left"></i></button>
        </div>
        <i class="fa-solid fa-user-edit"></i> Información Personal
    </div>

  <div class="add-user-body">

    <div class="input-group">
      <input type="hidden" id="personal_id" name="personal_id">
      <input id="edit_nombre" name="edit_nombre" type="text" class="form-control" placeholder="Nombres">
    </div>

    <div class="input-group">
    <input id="edit_apellido" name="edit_apellido" type="text" class="form-control" placeholder="Apellidos">
    </div>

    <div class="input-group">
      <select id="edit_tipo_id" name="edit_tipo_id" class="form-select">
        <option value="V">V</option>
        <option value="P">P</option>
        <option value="E">E</option>
      </select>
      <input id="edit_cedula" name="edit_cedula" type="text" class="form-control" placeholder="Cedula">
    </div>

</div>

 <div class="add-user-footer">
 <button id="editar_personal_info" name="editar_personal_info" data-dismiss="modal" class="btn btn-option-1">Guardar</button>
 </div>
 </div> 
   
    </div>
  </div>
</div>
</div>
