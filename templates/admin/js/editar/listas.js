$(document).on('click', '.btn-edit-titulo-lista', function(data)
{
    let id = data.currentTarget.id;
    let titulo = data.currentTarget.attributes.titulo.value;

   $('#titulo_lista_id').val(id);
   $('#edit_lista_titulo').val(titulo);
})

$(document).on('click', '#editar_titulo_lista', function()
{
    let id = $('#titulo_lista_id').val();
    let titulo = $('#edit_lista_titulo').val();

    let page = 'editar_titulo_lista';

    $.ajax
    ({
       url: '../../server/functions/editar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          id:id,
          titulo:titulo
       }
  
    })
    .done(function(res)
    {
       let titulo = res.titulo;
       let cuerpo = res.cuerpo;
       let accion = res.accion;

       if(accion === 'success')
       {
         mis_listas();
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
})