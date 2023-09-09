$(document).on('click', '.btn-edit-nota', function(data)
{
    let id = data.currentTarget.id;
    let titulo = data.currentTarget.attributes.titulo.value;
    let nota = data.currentTarget.attributes.nota.value;

    $('#nota_id').val(id);
    $('#edit_nota_titulo').val(titulo);
    $('#edit_nota_in').val(nota);
})

$(document).on('click', '#editar_nota', function()
{
   editar_nota();
})

function editar_nota()
{
    let id = $('#nota_id').val();
    let titulo = $('#edit_nota_titulo').val();
    let nota = $('#edit_nota_in').val();

    let page = 'editar_nota';

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
          titulo:titulo,
          nota:nota
       }
  
    })
    .done(function(res)
    {
       let titulo = res.titulo;
       let cuerpo = res.cuerpo;
       let accion = res.accion;

       if(accion === 'success')
       {
         mis_notas();
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