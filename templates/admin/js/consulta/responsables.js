$(document).ready(mis_responsables());

function mis_responsables()
{
    let page = 'mis_responsables';

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
      $('.mis-responsables').html(res.responsables);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}

$("#sello").change(function () 
{
   let container = '#img_sello';
  readImage(container, this);
});

$(document).on('click', '.btn-watch-sign', function(data)
{
    let sello = data.currentTarget.attributes.sello.value;
    $('#ver_sello').attr('src', sello);
})