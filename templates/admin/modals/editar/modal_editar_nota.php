<div>
<div class="modal fade" id="modal_editar_nota" tabindex="-1" role="dialog"   aria-labelledby="modal_editar_nota_Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

    <div class="container">
 <div class="edit-notes">
    <div class="add-notes-header">
        <div class="div-back-btn">
        <button class="btn back-btn" data-dismiss="modal"><i class="fa-solid fa-arrow-left"></i></button>
        </div>
    <i class="fa-solid fa-pen-to-square"></i> Editar Nota
    </div>
  <div class="edit-notes-body">
    <input type="hidden" id="nota_id" name="nota_id">
    <label class="label-option-1" for="edit_nota_titulo">Titulo <span class="obligatory-span">*</span></label>
    <input class="input-option-1" id="edit_nota_titulo" name="edit_nota_titulo" type="text" placeholder="Ej. Receta de Comida" >
    <label class="label-option-1" for="edit_nota_in">Contenido <span class="obligatory-span">*</span></label>
    <textarea id="edit_nota_in" name="edit_nota_in" cols="40" rows="10" placeholder="Ej. Ingredientes"></textarea>
   
  </div>
</div>
 <div class="edit-notes-footer">
 <button id="editar_nota" name="editar_nota" data-dismiss="modal" class="btn btn-option-1">Guardar</button>
 </div>
 </div> 
   
    </div>
  </div>
</div>
</div>
