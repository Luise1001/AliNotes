$(document).on('click', '#guardar_barco', function()
{
    nuevo_barco();
})

function nuevo_barco()
{
    let nombre = $('#nombre_barco').val();
    let page = 'nuevo_barco';

    $.ajax
    ({
       url: '../../server/functions/agregar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
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