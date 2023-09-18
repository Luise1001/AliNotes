$(document).on('click', '.btn-eliminar-titulo-lista', function(data)
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
           eliminar_lista(id);
         break;
         
       default: false;
     }
   });
})


function eliminar_lista(id)
{
    let page = 'eliminar_lista';

    $.ajax
    ({
       url: '../../server/functions/eliminar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          id: id
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
}