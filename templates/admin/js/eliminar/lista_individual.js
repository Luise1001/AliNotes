$(document).on('click', '.btn-eliminar-item-lista', function(data)
{
   let id = data.currentTarget.id;

   swal('Seguro que desea eliminar','', 'warning',
   {
     buttons: {
       cancel: 'Cancelar',
       Confirmar: true,
     },
   })
   .then((value) => 
   {
     switch (value) {
    
       case "Confirmar":
           eliminar_item_lista(id);
         break;
         
       default: false;
     }
   });
})


function eliminar_item_lista(id_item)
{
    let id_lista = $('#lista_id').val();
    let page = 'eliminar_item_lista';

    $.ajax
    ({
       url: '../../server/functions/eliminar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          id_lista: id_lista,
          id_item: id_item
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