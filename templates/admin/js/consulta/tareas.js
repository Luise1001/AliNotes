$(document).ready(mis_tareas());

function mis_tareas()
{
    let page = 'mis_tareas';

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
      $('.my-tasks').html(res.tareas);
      $('.my-finished-tasks').html(res.completadas);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}

