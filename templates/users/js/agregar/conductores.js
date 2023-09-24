$(document).on('click', '#guardar_conductor', function()
{
    nuevo_conductor();
})

function nuevo_conductor()
{
    let nombre = $('#nombre_conductor').val();
    let apellido = $('#apellido_conductor').val();
    let letra = $('#tipo_id_conductor').val();
    let cedula = $('#cedula_conductor').val();
    
    let page = 'nuevo_conductor';

    $.ajax
    ({
       url: '../../server/functions/agregar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          nombre: nombre,
          apellido: apellido,
          letra: letra,
          cedula: cedula
       }
  
    })
    .done(function(res)
    {
       let titulo = res.titulo;
       let cuerpo = res.cuerpo;
       let accion = res.accion;

       if(accion === 'success')
       { 
          mis_conductores();
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