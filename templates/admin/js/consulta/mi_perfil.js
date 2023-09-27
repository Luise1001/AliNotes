$(document).ready(mi_perfil());

function mi_perfil()
{
    let page = 'mi_perfil';

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
      $('.user-header').html(res.header);
      $('.personal-data').html(res.personal_data);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}