$(document).ready(mis_secciones());

function mis_secciones()
{
    let page = 'mis_secciones';

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
      $('.my-sections').html(res.secciones);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}