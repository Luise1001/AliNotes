$(document).on('click', '#guardar_juridica_info', function()
{
    agregar_empresa();
})

function agregar_empresa()
{
   let razon_social = $('#razon_social').val();
   let letra = $('#tipo_id_emp').val();
   let rif = $('#rif').val();
   let direccion = $('#direccion').val();
   let page = 'agregar_empresa';

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
  
          mis_empresas();
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