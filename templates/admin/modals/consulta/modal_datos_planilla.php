<div>
<div class="modal fade" id="modal_datos_planilla" tabindex="-1" role="dialog"   aria-labelledby="modal_datos_planilla_Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

    <div class="container">
 <div class="add-item">
    <div class="add-list-header">
        <div class="div-back-btn">
        <button class="btn back-btn" data-dismiss="modal"><i class="fa-solid fa-arrow-left"></i></button>
        </div>
        <i class="fa-solid fa-file-signature"></i> Redactar Planilla Seniat
    </div>

  <div class="add-item-body">

  <div class="input-group">
      <span class="input-group-text">Tipo<span class="obligatory-span">*</span></span>
      <select id="tipo_planilla" name="tipo_planilla" class="form-select">
        <option value="Juridico">Jurídico</option>
        <option value="Personal">Personal</option>
      </select>
    </div>

  <div class="input-group">
      <span class="input-group-text">Titular<span class="obligatory-span">*</span></span>
      <select id="titular_planilla" name="titular_planilla" class="form-select">
        <option value="Seleccionar">Seleccionar</option>
      </select>
    </div>

  <div class="input-group">
      <span class="input-group-text">Responsable<span class="obligatory-span">*</span></span>
      <select id="responsable_planilla" name="responsable_planilla" class="form-select">
        <option value="Seleccionar">Seleccionar</option>
      </select>
    </div>

    <div class="input-group">
      <span class="input-group-text">Vehículo <span class="obligatory-span">*</span></span>
      <select id="vehiculo_planilla" name="vehiculo_planilla" class="form-select">
        <option value="Seleccionar">Seleccionar</option>
      </select>
    </div>

    <div class="input-group">
      <span class="input-group-text">Conductor <span class="obligatory-span">*</span></span>
      <select id="conductor_planilla" name="conductor_planilla" class="form-select">
        <option value="Seleccionar">Seleccionar</option>
      </select>
    </div>

    <div class="alerts">
      <div class="alert-titular"></div>
      <div class="alert-responsable"></div>
      <div class="alert-vehiculo"></div>
      <div class="alert-conductor"></div>
    </div>

</div>

 <div class="add-item-footer">
 <button id="generar_planilla" name="generar_planilla" data-dismiss="modal" class="btn btn-option-1">Crear</button>
 </div>
 </div> 
   
    </div>
  </div>
</div>
</div>
