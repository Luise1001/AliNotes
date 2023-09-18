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