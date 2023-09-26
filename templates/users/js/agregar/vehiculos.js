$(document).on('click', '#guardar_vehiculo', function()
{
    nuevo_carro();
})

function nuevo_carro()
{
    let marca = $('#marca_vehiculo').val();
    let tipo = $('#tipo_vehiculo').val();
    let placa = $('#placa').val();
    let modelo = $('#modelo_vehiculo').val();
    let year = $('#year').val();

    let page = 'nuevo_carro';

    $.ajax
    ({
       url: '../../server/functions/agregar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          marca: marca,
          tipo: tipo,
          placa: placa,
          modelo: modelo,
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