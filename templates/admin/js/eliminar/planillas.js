$(document).on('click', '.btn-eliminar-planilla', function(data)
{
    let archivo = data.currentTarget.attributes.archivo.value;

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
            eliminar_planilla(archivo);
          break;
          
        default: false;
      }
    });
})

function eliminar_planilla(archivo)
{
    let page = 'eliminar_planilla';

    $.ajax
    ({
       url: '../../server/functions/eliminar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          archivo: archivo
       }
  
    })
    .done(function(res)
    {
        let titulo = res.titulo;
        let cuerpo = res.cuerpo;
        let accion = res.accion;
 
        if(accion === 'success')
        { 
           mis_planillas();
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