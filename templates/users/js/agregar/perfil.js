$(document).on('click', '#guardar_personal_info', function()
{
    agregar_informacion_personal();
})

function agregar_informacion_personal()
{
   let nombre = $('#nombre').val();
   let apellido = $('#apellido').val();
   let letra = $('#tipo_id').val();
   let cedula = $('#cedula').val();
   let page = 'agregar_informacion_personal';

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
           mi_perfil();
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

$(document).on('click', '#guardar_juridica_info', function()
{
    agregar_juridica_personal();
})

function agregar_juridica_personal()
{
   let razon_social = $('#razon_social').val();
   let letra = $('#tipo_id_emp').val();
   let rif = $('#rif').val();
   let direccion = $('#direccion').val();
   let page = 'agregar_informacion_juridica';

    $.ajax
    ({
       url: '../../server/functions/agregar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          razon_social: razon_social,
          letra: letra,
          rif: rif,
          direccion: direccion
       }
  
    })
    .done(function(res)
    {   
        let titulo = res.titulo;
        let cuerpo = res.cuerpo;
        let accion = res.accion;
 
        if(accion === 'success')
        { 
           mi_perfil();
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