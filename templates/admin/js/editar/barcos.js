$(document).on('click', '.btn-edit-barco', function(data)
{
    let id = data.currentTarget.id;
    let nombre = data.currentTarget.attributes.nombre.value;

    $('#barco_id').val(id);
    $('#edit_nombre_barco').val(nombre);
})

$(document).on('click', '#editar_barco', function()
{
   editar_barco();
})

function editar_barco()
{
    let id = $('#barco_id').val();
    let nombre = $('#edit_nombre_barco').val();

    let page = 'editar_barco';

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
          nombre: nombre
       }
  
    })
    .done(function(res)
    {
       let titulo = res.titulo;
       let cuerpo = res.cuerpo;
       let accion = res.accion;

       if(accion === 'success')
       {
         mis_barcos();
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