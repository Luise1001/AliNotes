$(document).ready(mis_planillas());

function mis_planillas()
{
    let page = 'mis_planillas';

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
      $('.mis-planillas').html(res.planillas);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}

$(document).on('click', '.datos-planilla', function()
{
    datos_planilla();
})

$(document).on('change', '#tipo_planilla', function()
{
    datos_planilla();
})

function datos_planilla()
{
    let tipo = $('#tipo_planilla').val();
    let page = 'datos_planilla';

    $.ajax
    ({
       url: '../../server/functions/consultas.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          tipo: tipo
       }
  
    })
    .done(function(res)
    { 
        if(res.titular === false || res.responsable === false || res.vehiculo === false || res.conductor === false)
        {
            $('#generar_planilla').addClass('disabled');
        }
        else
        {
          $('#generar_planilla').removeClass('disabled');
        }

        if(res.titular === false)
        {
          $('.alert-titular').html('<span class="obligatory-span">Debe Registrar Sus Datos En Perfil</span>');
        }
        else
        {
            $('#titular_planilla').html(res.titular);
        }
         if(res.responsable === false)
        {
          $('.alert-responsable').html('<span class="obligatory-span">Debe Registrar Responsables En El Menu De Configuración</span>');
        }
        else
        {
            $('#responsable_planilla').html(res.responsable);
        }
         if(res.vehiculo === false)
        {
          $('.alert-vehiculo').html('<span class="obligatory-span">Debe Registrar Vehículos En El Menu De Configuración</span>');
        }
        else
        {
            $('#vehiculo_planilla').html(res.vehiculo);
        }
         if(res.conductor === false)
        {
          $('.alert-conductor').html('<span class="obligatory-span">Debe Registrar Conductores En El Menu De Configuración</span>');
        }
        else
        {
            $('#conductor_planilla').html(res.conductor);
        }

    })
    .fail(function(err)
    {
        console.log(err);
    })
}

$(document).on('click', '#generar_planilla', function()
{
    generar_planilla();
})


function generar_planilla()
{ 
    let tipo = $('#tipo_planilla').val();
    let titular = $('#titular_planilla').val();
    let responsable = $('#responsable_planilla').val();
    let vehiculo = $('#vehiculo_planilla').val();
    let conductor = $('#conductor_planilla').val();
    let page = 'generar_planilla';

    $.ajax
    ({
       url: '../../server/functions/agregar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          tipo: tipo,
          titular: titular,
          responsable: responsable,
          vehiculo: vehiculo,
          conductor: conductor,
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