$(document).ready(mis_manifiestos());

function mis_manifiestos()
{
    let page = 'mis_manifiestos';

    $.ajax
    ({
       url: '../../server/functions/consultas.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page
       }
  
    })
    .done(function(res)
    {
      $('.my-manifest').html(res.manifiestos);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}

$(document).on('click', '.datos-manifiesto', function()
{
    datos_manifiesto();
})

function datos_manifiesto()
{
    let page = 'datos_manifiesto';

    $.ajax
    ({
       url: '../../server/functions/consultas.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page
       }
  
    })
    .done(function(res)
    { 
        if(res.titular === false || res.barco === false)
        {
            $('#generar_manifiesto').addClass('disabled');
        }
        else
        {
          $('#generar_manifiesto').removeClass('disabled');
        }

        if(res.titular === false)
        {
          $('.alert-titular').html('<span class="obligatory-span">Debe Registrar Sus Datos En Perfil</span>');
        }
        else
        {
            $('#titular_manifiesto').html(res.titular);
        }
         if(res.barco === false)
        {
          $('.alert-barco').html('<span class="obligatory-span">Debe Registrar Barcos En El Menu De Configuración</span>');
        }
        else
        {
            $('#barco_manifiesto').html(res.barco);
        }

    })
    .fail(function(err)
    {
        console.log(err);
    })
}

$(document).on('click', '#generar_manifiesto', function()
{
    generar_manifiesto();
})


function generar_manifiesto()
{ 
    let titular = $('#titular_manifiesto').val();
    let barco = $('#barco_manifiesto').val();
    let page = 'generar_manifiesto';

    $.ajax
    ({
       url: '../../server/functions/agregar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          titular: titular,
          barco: barco,
          items: items
       }
  
    })
    .done(function(res)
    {
        let titulo = res.titulo;
        let cuerpo = res.cuerpo;
        let accion = res.accion;
       
        swal(titulo, cuerpo, accion);
      
    })
    .fail(function(err)
    {
        console.log(err);
    })
}