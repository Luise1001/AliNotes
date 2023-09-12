$(document).on('click','#save_item_lista', function()
{
    nuevo_item_lista();
})

function nuevo_item_lista()
{
    let id = $('#lista_id').val();
    let item = $('#item_name').val();
    let page = 'nuevo_item_lista';

    $.ajax
    ({
       url: '../../server/functions/agregar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          id: id,
          item: item
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
        console.log(err);
    })
}

