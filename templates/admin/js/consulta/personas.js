$(document).ready(mis_personas());

function mis_personas()
{
    let page = 'mis_personas';

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
      $('.mis-personas').html(res.personas);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}

