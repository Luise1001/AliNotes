$(document).on('click', '.btn-eliminar-responsable', function(data)
{
    let id = data.currentTarget.id;
    let numero = data.currentTarget.attributes.numero.value;

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
            eliminar_responsable(id, numero);
          break;
          
        default: false;
      }
    });
})

function eliminar_responsable(id, numero)
{
    let page = 'eliminar_responsable';

    $.ajax
    ({
       url: '../../server/functions/eliminar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          id: id,
          numero: numero
       }
  
    })
    .done(function(res)
    {
        let titulo = res.titulo;
        let cuerpo = res.cuerpo;
        let accion = res.accion;
 
        if(accion === 'success')
        { 
           mis_responsables();
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