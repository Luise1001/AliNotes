$(document).on('click', '#guardar_nota', function()
{
    nueva_nota();
})

function nueva_nota()
{
    let titulo = $('#nota_titulo').val();
    let contenido = $('#nota_in').val();
    let page = 'nueva_nota';

    $.ajax
    ({
       url: '../../server/functions/agregar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          titulo: titulo,
          contenido: contenido
       }
  
    })
    .done(function(res)
    {
       let titulo = res.titulo;
       let cuerpo = res.cuerpo;
       let accion = res.accion;

       if(accion === 'success')
       { 
          mis_notas();
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