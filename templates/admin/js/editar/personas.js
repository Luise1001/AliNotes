$(document).on('click', '#edit_user_personal_info', function(data)
{
  let id = data.currentTarget.attributes.persona.value;
  let nombre = data.currentTarget.attributes.nombre.value;
  let apellido = data.currentTarget.attributes.apellido.value;
  let letra = data.currentTarget.attributes.letra.value;
  let cedula = data.currentTarget.attributes.cedula.value;

  $('#personal_id').val(id);
  $('#edit_nombre').val(nombre);
  $('#edit_apellido').val(apellido);
  $('#edit_tipo_id').val(letra);
  $('#edit_cedula').val(cedula);
})

$(document).on('click', '#editar_personal_info', function()
{
   editar_persona();
})

function editar_persona()
{
  let id = $('#personal_id').val();
  let nombre = $('#edit_nombre').val();
  let apellido = $('#edit_apellido').val();
  let letra = $('#edit_tipo_id').val();
  let cedula = $('#edit_cedula').val();
  
  let page = "editar_persona";

  $.ajax
  ({
     url: '../../server/functions/editar.php',
     type: 'POST',
     dataType: 'json',
     data: 
     {
        page: page,
        id: id,
        nombre: nombre,
        apellido: apellido,
        letra: letra,
        cedula: cedula
     }

  })
  .done(function(res)
  { 
    let titulo = res.titulo;
    let cuerpo = res.cuerpo;
    let accion = res.accion;

    if(accion === 'success')
    {
      mis_personas();
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
