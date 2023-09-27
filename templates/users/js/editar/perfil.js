$(document).on('change', '#input_fp', function()
{

  let container = '#foto_perfil';
 readImage(container, this);
 editar_foto();
});
function editar_foto()
{
  let page = 'foto_perfil';
  var formData = new FormData();
  var foto = $('#input_fp')[0].files[0];
  let confirmar = false;

  formData.append('file', foto);
  formData.append('page', page);

  $.ajax
  ({
     url: '../../server/functions/editar.php',
     type: 'POST',
     dataType: 'html',
     async: true,
     data: formData,
     contentType: false,
     processData: false

  })
  .done(function(res)
  { 
     mi_perfil();
  })
  .fail(function(err)
  {
    console.log(err)
  })

}

$(document).on('click', '#edit_user_btn', function(data)
{
    let user = data.currentTarget.attributes.user.value;
   $('#user_name').val(user);
})

$(document).on('click', '#editar_user_name', function()
{
   editar_user_name();
})

function editar_user_name()
{
  let username = $('#user_name').val();
  let page = 'editar_user_name';

  $.ajax
  ({
     url: '../../server/functions/editar.php',
     type: 'POST',
     dataType: 'json',
     data: 
     {
        page: page,
        username:username
     }

  })
  .done(function(res)
  { 
    let titulo = res.titulo;
    let cuerpo = res.cuerpo;
    let accion = res.accion;

    if(accion === 'success')
    {
      mi_perfil();
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

$(document).on('click', '#edit_user_personal_info', function(data)
{
  let id = data.currentTarget.attributes.personal.value;
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
      mi_perfil();
      personal_info();
      business_info();
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
      mi_perfil();
      personal_info();
      business_info();
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
