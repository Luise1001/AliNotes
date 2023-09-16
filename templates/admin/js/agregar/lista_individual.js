$(document).on('click','#save_section', function()
{
    nueva_seccion();
})

function nueva_seccion()
{
    let lista = $('#lista_id').val();
    let seccion = $('#section_name').val();
    let page = 'nueva_seccion';

    $.ajax
    ({
       url: '../../server/functions/agregar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          lista: lista,
          seccion: seccion
       }
  
    })
    .done(function(res)
    {   
        let titulo = res.titulo;
        let cuerpo = res.cuerpo;
        let accion = res.accion;
 
        if(accion === 'success')
        { 
           lista_individual();
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

$(document).on('click','#save_item_lista', function()
{
    nuevo_item_lista();
})

function nuevo_item_lista()
{
    let seccion = $('#seccion').val();
    let tipo_unidad = $('#tipo_unidad').val();
    let descripcion = $('#descripcion').val();
    let peso = $('#peso').val();
    let cantidad = $('#cantidad').val();
    let observacion = $('#observacion').val();
    let lista = $('#lista_id').val();

    let page = 'nuevo_item_lista';

    $.ajax
    ({
       url: '../../server/functions/agregar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          seccion: seccion,
          tipo_unidad: tipo_unidad,
          descripcion: descripcion,
          peso: peso,
          cantidad: cantidad,
          observacion: observacion,
          lista: lista
       }
  
    })
    .done(function(res)
    {   
        let titulo = res.titulo;
        let cuerpo = res.cuerpo;
        let accion = res.accion;
 
        if(accion === 'success')
        { 
           lista_individual();
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

