$(document).ready(mis_carros());

function mis_carros()
{
    let page = 'mis_carros';

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
      $('.header-icons').html(res.botones);
      $('.my-cars').html(res.carros);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}