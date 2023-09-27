$(document).on('click', '.btn-edit-carro', function(data)
{
    let id = data.currentTarget.id;
    let marca = data.currentTarget.attributes.marca.value;
    let tipo = data.currentTarget.attributes.tipo.value;
    let modelo = data.currentTarget.attributes.modelo.value;
    let placa = data.currentTarget.attributes.placa.value;
    let year = data.currentTarget.attributes.year.value;

    $('#vehiculo_id').val(id);
    $('#edit_marca_vehiculo').val(marca);
    $('#edit_tipo_vehiculo').val(tipo);
    $('#edit_modelo_vehiculo').val(modelo);
    $('#edit_placa').val(placa);
    $('#edit_year').val(year);

})

$(document).on('click', '#editar_vehiculo', function()
{
   editar_carro();
})

function editar_carro()
{
   let id = $('#vehiculo_id').val();
   let marca = $('#edit_marca_vehiculo').val();
   let tipo = $('#edit_tipo_vehiculo').val();
   let modelo = $('#edit_modelo_vehiculo').val();
   let placa = $('#edit_placa').val();
   let year = $('#edit_year').val();

    let page = 'editar_carro';

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
          marca: marca,
          tipo: tipo,
          modelo: modelo,
          placa: placa,
          year: year
       }
  
    })
    .done(function(res)
    {
       let titulo = res.titulo;
       let cuerpo = res.cuerpo;
       let accion = res.accion;

       if(accion === 'success')
       {
         mis_carros();
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