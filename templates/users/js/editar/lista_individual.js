$(document).on('click', '.btn-editar-item-lista', function(data)
{ 
    let id_item = data.currentTarget.attributes.objeto.value;
    let id_seccion = data.currentTarget.attributes.ids.value;
    let seccion_name = data.currentTarget.attributes.seccion.value;
    let descripcion = data.currentTarget.attributes.descripcion.value;
    let unidad = data.currentTarget.attributes.unidad.value;
    let peso = data.currentTarget.attributes.peso.value;
    let cantidad = data.currentTarget.attributes.cantidad.value;
    let observacion = data.currentTarget.attributes.observacion.value;
    
    secciones_en_editar(id_seccion, seccion_name);
    unidades_en_editar(unidad);
  
   $('#item_id').val(id_item);
   $('#edit_descripcion').val(descripcion);
   $('#edit_peso').val(peso);
   $('#edit_cantidad').val(cantidad);
   $('#edit_observacion').val(observacion);

})

$(document).on('click', '#editar_item_lista', function()
{
   editar_item_lista();
})

function editar_item_lista()
{
    let id_lista = $('#lista_id').val();
    let id_seccion = $('#edit_seccion').val();
    let id_item = $('#item_id').val();
    let tipo_unidad = $('#edit_tipo_unidad').val();
    let descripcion = $('#edit_descripcion').val();
    let peso = $('#edit_peso').val();
    let cantidad = $('#edit_cantidad').val();
    let observacion = $('#edit_observacion').val();

    let page = 'editar_item_lista';

    $.ajax
    ({
       url: '../../server/functions/editar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          id_lista: id_lista,
          id_seccion: id_seccion,
          id_item: id_item,
          tipo_unidad: tipo_unidad,
          descripcion: descripcion,
          peso: peso,
          cantidad: cantidad,
          observacion: observacion
       }
  
    })
    .done(function(res)
    {
       let titulo = res.titulo;
       let cuerpo = res.cuerpo;
       let accion = res.accion;

       if(accion === 'success')
       {
         lista_individual();
       }
       else
       {
          swal(titulo, cuerpo, accion);
       }
    })
    .fail(function(err)
    {
        console.log(err.responseText);
    })
}


function secciones_en_editar(id_seccion, seccion_name)
{
  let lista = $('#lista_id').val();
  let page = 'secciones_en_editar';

  $.ajax
  ({
     url: '../../server/functions/consultas.php',
     type: 'POST',
     dataType: 'json',
     async: false,
     data: 
     {
        page: page,
        lista: lista,
        id_seccion: id_seccion,
        seccion_name: seccion_name
     }

  })
  .done(function(res)
  {
    $('#edit_seccion').html(res.secciones);
  })
  .fail(function(err)
  {
      console.log(err);
  })
}


function unidades_en_editar(unidad)
{
  let page = 'unidades_en_editar';

  $.ajax
  ({
     url: '../../server/functions/consultas.php',
     type: 'POST',
     dataType: 'json',
     async: false,
     data: 
     {
        page: page,
        unidad: unidad
     }

  })
  .done(function(res)
  {
    $('#edit_tipo_unidad').html(res.unidades);
  })
  .fail(function(err)
  {
      console.log(err);
  })
}
