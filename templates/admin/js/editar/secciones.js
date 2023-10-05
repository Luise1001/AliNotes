$(document).on('click', '.btn-edit-section', function(data)
{
    let id = data.currentTarget.id;
    let titulo = data.currentTarget.attributes.titulo.value;

    $('#section_id').val(id);
    $('#edit_section_name').val(titulo);
})


$(document).on('click', '#editar_seccion', function()
{
   editar_seccion();
})

function editar_seccion()
{

   let id = $('#section_id').val();
   let titulo = $('#edit_section_name').val();
   let page = 'editar_seccion';

    $.ajax
    ({
       url: '../../server/functions/editar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data:
       {
         page: page,
         id: id,
         titulo: titulo
       }  
    })
    .done(function(res)
    {
       let titulo = res.titulo;
       let cuerpo = res.cuerpo;
       let accion = res.accion;

       if(accion === 'success')
       {
         mis_secciones();
       }
       else
       {
          swal(titulo, cuerpo, accion);
       }
    })
    .fail(function(err)
    {
        console.log(err);
    })
}