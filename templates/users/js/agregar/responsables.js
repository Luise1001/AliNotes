$(document).on('click', '#guardar_responsable', function()
{
    nuevo_responsable();
})

function nuevo_responsable()
{
    let nombre = $('#nombre_responsable').val();
    let letra = $('#tipo_id_responsable').val();
    let identidad = $('#numero_identidad').val();
    var sello = $('#sello')[0].files[0];
    let page = 'nuevo_responsable';
    var formData = new FormData();

    if(!sello)
    {
       sello = 'Sin Sello';
    }

    formData.append('page', page);
    formData.append('file', sello);
    formData.append('nombre', nombre);
    formData.append('letra', letra);
    formData.append('identidad', identidad);

    

    $.ajax
    ({
       url: '../../server/functions/agregar.php',
       type: 'POST',
       dataType: 'json',
       async: true,
       data: formData,
       contentType: false,
       processData: false
  
    })
    .done(function(res)
    {
       let titulo = res.titulo;
       let cuerpo = res.cuerpo;
       let accion = res.accion;

       if(accion === 'success')
       { 
          mis_responsables();
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