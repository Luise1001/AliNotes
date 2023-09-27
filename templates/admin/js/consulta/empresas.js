$(document).ready(mis_empresas());

function mis_empresas()
{
    let page = 'mis_empresas';

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
      $('.mis-empresas').html(res.empresas);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}

