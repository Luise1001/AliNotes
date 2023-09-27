$(document).ready(mis_conductores());

function mis_conductores()
{
    let page = 'mis_conductores';

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
      $('.my-drivers').html(res.conductores);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}