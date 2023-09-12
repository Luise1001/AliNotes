$(document).ready(lista_individual());

function lista_individual()
{
    let id = $('#lista_id').val();
    let page = 'lista_individual';

    $.ajax
    ({
       url: '../../server/functions/consultas.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          id: id
       }
  
    })
    .done(function(res)
    {
      $('.header-icons').html(res.botones);
      $('.list-title').html(res.titulo);
      $('.my-list').html(res.contenido);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}

