$(document).on('click', '.btn-edit-conductor', function(data)
{
    let id = data.currentTarget.id;
    let nombre = data.currentTarget.attributes.nombre.value;
    let apellido = data.currentTarget.attributes.apellido.value;
    let letra = data.currentTarget.attributes.letra.value;
    let cedula = data.currentTarget.attributes.cedula.value;
    
    $('#conductor_id').val(id);
    $('#edit_nombre_conductor').val(nombre);
    $('#edit_apellido_conductor').val(apellido);
    $('#edit_tipo_id_conductor').val(letra);
    $('#edit_cedula_conductor').val(cedula);
})

$(document).on('click', '#editar_conductor', function()
{
   editar_conductor();
})

function editar_conductor()
{

   let id = $('#conductor_id').val();
   let nombre = $('#edit_nombre_conductor').val();
   let apellido = $('#edit_apellido_conductor').val();
   let letra = $('#edit_tipo_id_conductor').val();
   let cedula = $('#edit_cedula_conductor').val();

    let page = 'editar_conductor';

    $.ajax
    ({
       url: '../../server/functions/editar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          id:id,
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