$(document).on('click', '#edit_user_juridica_info', function(data)
{
  let id = data.currentTarget.attributes.business.value;
  let razon_social = data.currentTarget.attributes.razon.value;
  let direccion = data.currentTarget.attributes.direccion.value;
  let letra = data.currentTarget.attributes.letra.value;
  let rif = data.currentTarget.attributes.rif.value;

  $('#business_id').val(id);
  $('#edit_razon_social').val(razon_social);
  $('#edit_direccion').val(direccion);
  $('#edit_tipo_id_emp').val(letra);
  $('#edit_rif').val(rif);
})

$(document).on('click', '#editar_juridica_info', function()
{
   editar_empresa();
})

function editar_empresa()
{
  let id = $('#business_id').val();
  let razon_social = $('#edit_razon_social').val();
  let direccion = $('#edit_direccion').val();
  let letra = $('#edit_tipo_id_emp').val();
  let rif = $('#edit_rif').val();

  let page = "editar_empresa";

  $.ajax
  ({
     url: '../../server/functions/editar.php',
     type: 'POST',
     dataType: 'json',
     data: 
     {
        page: page,
        id: id,
        razon_social: razon_social,
        direccion: direccion,
        letra: letra,
        rif: rif
     }

  })
  .done(function(res)
  { 
    let titulo = res.titulo;
    let cuerpo = res.cuerpo;
    let accion = res.accion;

    if(accion === 'success')
    {
          mis_empresas();
    }
    else
    {
       swal(titulo, cuerpo, accion);
    }
  })
  .fail(function(err)
  {
    console.log(err)
  })
}
