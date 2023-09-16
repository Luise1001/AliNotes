$(document).ready(mis_listas());

function mis_listas()
{
    let page = 'mis_listas';

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
      $('.my-lists').html(res.listas);
      $('.hidden-lists').html(res.ocultas);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}

