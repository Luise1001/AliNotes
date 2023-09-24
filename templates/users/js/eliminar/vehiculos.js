$(document).on('click', '.btn-eliminar-carro', function(data)
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
            eliminar_carro(id);
          break;
          
        default: false;
      }
    });
})

function eliminar_carro(id)
{
    let page = 'eliminar_carro';

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
           mis_carros();
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