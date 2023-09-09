$(document).ready(mis_notas());

function mis_notas()
{
    let page = 'mis_notas';

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
      $('.my-notes').html(res.notas);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}
