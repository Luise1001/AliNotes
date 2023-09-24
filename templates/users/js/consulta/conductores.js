$(document).ready(mis_barcos());

function mis_barcos()
{
    let page = 'mis_barcos';

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
      $('.my-ships').html(res.barcos);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}