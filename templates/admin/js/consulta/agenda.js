$(document).ready(lista_de_usuarios());

function lista_de_usuarios()
{
    let page = 'lista_de_usuarios';

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
      $('.list-users').html(res.usuarios);
    })
    .fail(function(err)
    {
        console.log(err);
    })

}
