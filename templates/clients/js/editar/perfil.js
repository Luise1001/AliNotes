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