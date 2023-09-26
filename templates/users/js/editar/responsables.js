$(document).on('click', '.btn-edit-responsable', function(data)
{
    let id = data.currentTarget.id;
    let nombre = data.currentTarget.attributes.nombre.value;
    let letra = data.currentTarget.attributes.letra.value;
    let numero = data.currentTarget.attributes.numero.value;
    let sello = data.currentTarget.attributes.sello.value;
    
    
    $('#responsable_id').val(id);
    $('#edit_nombre_responsable').val(nombre);
    $('#edit_tipo_id_responsable').val(letra);
    $('#edit_numero_identidad').val(numero);
    $('#edit_img_sello').attr('src', sello);
})

$(document).on('click', '#editar_responsable', function()
{
   editar_responsable();
})

function editar_responsable()
{

   let id = $('#responsable_id').val();
   let nombre = $('#edit_nombre_responsable').val();
   let letra = $('#edit_tipo_id_responsable').val();
   let numero = $('#edit_numero_identidad').val();
   var sello = $('#edit_sello')[0].files[0];
   let page = 'editar_responsable';
   var formData = new FormData();

   formData.append('page', page);
   formData.append('id', id);
   formData.append('nombre', nombre);
   formData.append('letra', letra);
   formData.append('numero', numero);
   formData.append('file', sello);
   

    $.ajax
    ({
       url: '../../server/functions/editar.php',
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

$("#edit_sello").change(function () 
{
   let container = '#edit_img_sello';
  readImage(container, this);
});