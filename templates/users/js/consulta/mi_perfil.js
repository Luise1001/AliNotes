$(document).ready(mi_perfil(), personal_info(), business_info());

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

function personal_info()
{
    let page = 'personal_info';

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
      $('.personal-info').html(res.personal_data);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}
function business_info()
{
    let page = 'business_info';

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
      $('.business_info').html(res.business_info);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}